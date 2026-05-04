<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(PendaftaranWebinar::class);
    }

    public function chats()
    {
        return $this->hasMany(ChatWebinar::class);
    }
}
