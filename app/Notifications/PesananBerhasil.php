<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PesananBerhasil extends Notification
{
    use Queueable;

    private $pesananId;
    private $totalHarga;

    public function __construct($pesananId, $totalHarga)
    {
        $this->pesananId = $pesananId;
        $this->totalHarga = $totalHarga;
    }

    public function via(object $notifiable): array
    {
        // Hanya menyetor lewat database panel lonceng
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'pesanan_id' => $this->pesananId,
            'pesan' => 'Tagihan transaksi produk alat pertanian senilai Rp ' . number_format($this->totalHarga, 0, ',', '.') . ' telah diterbitkan. Segera selesaikan pembayaran.',
            'url' => route('checkout.success', $this->pesananId),
        ];
    }
}
