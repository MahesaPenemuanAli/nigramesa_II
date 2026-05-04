<?php
namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\PendaftaranWebinar;
use App\Models\ChatWebinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebinarController extends Controller
{
    public function index()
    {
        $liveWebinars = Webinar::where('status', 'live')->latest('waktu_mulai')->get();
        $upcomingWebinars = Webinar::where('status', 'upcoming')->orderBy('waktu_mulai', 'asc')->get();
        
        $registeredWebinarIds = PendaftaranWebinar::where('user_id', Auth::id())
                                ->pluck('webinar_id')
                                ->toArray();

        return view('webinar.index', compact('liveWebinars', 'upcomingWebinars', 'registeredWebinarIds'));
    }

    public function daftar(Request $request, Webinar $webinar)
    {
        PendaftaranWebinar::firstOrCreate([
            'user_id' => Auth::id(),
            'webinar_id' => $webinar->id,
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftar ke webinar!');
    }

    public function streaming(Webinar $webinar)
    {
        $isRegistered = PendaftaranWebinar::where('user_id', Auth::id())
                            ->where('webinar_id', $webinar->id)
                            ->exists();

        if (!$isRegistered) {
            return redirect()->route('webinar.index')->with('error', 'Anda harus mendaftar webinar ini terlebih dahulu sebelum masuk ke ruangan streaming.');
        }

        $chats = $webinar->chats()->with('user')->orderBy('created_at', 'asc')->get();

        return view('webinar.show', compact('webinar', 'chats'));
    }

    public function chat(Request $request, Webinar $webinar)
    {
        $request->validate(['pesan' => 'required|string']);

        ChatWebinar::create([
            'user_id' => Auth::id(),
            'webinar_id' => $webinar->id,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back();
    }
}
