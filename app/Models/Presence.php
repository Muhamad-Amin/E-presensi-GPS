<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    /** @use HasFactory<\Database\Factories\PresenceFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            // 1. Ubah string "2025-11-24" menjadi Objek Carbon
            // Supaya bisa diformat: $data->attendance_date->format('d F Y')
            'attendance_date' => 'date',

            // 2. Ubah string "07:30:00" menjadi Objek Carbon
            // Supaya bisa diformat: $data->check_in_time->format('H:i')
            'check_in_time' => 'datetime',
            'check_out_time' => 'datetime',
            
            // 3. (Opsional) Jika kolom location Anda isinya JSON, gunakan 'array'.
            // Tapi karena tipe data Anda 'text' (kemungkinan string biasa), biarkan default.
            
            // 4. Standar Timestamps
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
