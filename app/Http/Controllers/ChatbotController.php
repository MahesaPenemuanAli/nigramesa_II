<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function respond(Request $request)
    {
        $request->validate(["message" => "required|string|max:1000"]);

        $userMessage = $request->input("message");
        $apiKey = config("services.gemini.key");

        if (empty($apiKey)) {
            return response()->json(
                [
                    "reply" =>
                        "API Key belum dikonfigurasi. Hubungi administrator. 🔧",
                ],
                200,
            );
        }

        $systemPrompt =
            "Kamu adalah NigraBot, Asisten Virtual cerdas milik Nigramesa — sebuah platform e-commerce dan edukasi botani serta pertanian modern di Indonesia. " .
            "Jawab semua pertanyaan pengguna dengan ramah, hangat, dan menggunakan bahasa Indonesia yang baik dan mudah dimengerti. " .
            "Jika ditanya soal harga atau stok produk, arahkan pengguna ke menu 'Katalog' di website. " .
            "Jika ditanya soal cara merawat tanaman, arahkan ke menu 'Perawatan'. " .
            "Jika ditanya soal buku atau jurnal, arahkan ke menu 'Perpustakaan Digital'. " .
            "Jika ditanya soal video pembelajaran, kelas tonton ulang, atau materi edukasi, arahkan ke menu 'Edukasi'. " .
            "Batasi panjang jawabanmu agar ringkas namun informatif (2-4 kalimat). " .
            "Gunakan emoji tanaman sesekali untuk membuat percakapan terasa hangat (misal 🌿, 🌱, 🍃).";

        // Daftar model dari yang paling ringan ke terberat sebagai fallback
        $models = [
            "gemini-2.5-flash-lite",
            "gemini-2.0-flash-lite",
            "gemini-2.0-flash",
        ];

        foreach ($models as $modelName) {
            try {
                $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$modelName}:generateContent?key={$apiKey}";

                $response = Http::withoutVerifying()
                    ->timeout(25)
                    ->post($endpoint, [
                        "contents" => [
                            [
                                "role" => "user",
                                "parts" => [
                                    [
                                        "text" =>
                                            $systemPrompt .
                                            "\n\nPertanyaan pengguna: " .
                                            $userMessage,
                                    ],
                                ],
                            ],
                        ],
                        "generationConfig" => [
                            "temperature" => 0.7,
                            "maxOutputTokens" => 300,
                        ],
                    ]);

                // Jika berhasil, ambil balasan
                if ($response->successful()) {
                    $data = $response->json();
                    $reply =
                        $data["candidates"][0]["content"]["parts"][0]["text"] ??
                        null;

                    if ($reply) {
                        return response()->json(["reply" => trim($reply)]);
                    }
                }

                // Jika 429 atau 503, coba model berikutnya
                if (in_array($response->status(), [429, 503])) {
                    Log::warning(
                        "Gemini model {$modelName} unavailable (HTTP {$response->status()}), trying next model...",
                    );
                    continue;
                }

                // Error lainnya, log dan return pesan error
                Log::error("Gemini API Error on {$modelName}", [
                    "status" => $response->status(),
                    "body" => $response->body(),
                ]);

                return response()->json(
                    [
                        "reply" =>
                            "Maaf, NigraBot sedang mengalami gangguan teknis. Silakan coba beberapa saat lagi. 🌿",
                    ],
                    200,
                );
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                Log::error(
                    "Connection error on {$modelName}: " . $e->getMessage(),
                );
                continue;
            } catch (\Exception $e) {
                Log::error(
                    "Chatbot error on {$modelName}: " . $e->getMessage(),
                );
                continue;
            }
        }

        // Semua model gagal
        return response()->json(
            [
                "reply" =>
                    "NigraBot sedang dalam pemeliharaan. Semua server AI sedang sibuk. Silakan coba lagi dalam beberapa menit. 🌱",
            ],
            200,
        );
    }
}
