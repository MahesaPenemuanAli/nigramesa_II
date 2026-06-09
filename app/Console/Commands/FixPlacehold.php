<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

#[Signature('fix:placehold')]
#[Description('Removes placehold.co links from the database without wiping data')]
class FixPlacehold extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Membersihkan placehold.co dari database...');

        $updates = [
            'produks' => 'gambar',
            'tanamans' => 'gambar',
            'literaturs' => 'cover_gambar',
            'webinars' => 'cover_gambar',
            'video_pembelajarans' => 'cover_gambar',
        ];

        foreach ($updates as $table => $column) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, $column)) {
                $count = DB::table($table)
                    ->where($column, 'like', '%placehold.co%')
                    ->update([$column => null]);
                
                $this->info("Tabel {$table}: {$count} baris diperbarui.");
            }
        }

        $this->info('Selesai! Semua link placehold.co telah dibersihkan dari database.');
    }
}
