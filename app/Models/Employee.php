<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'nik';

    protected $guarded = ['nik'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            
            // Ubah timestamp menjadi Objek Carbon (Agar bisa diformat tanggal/jamnya)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            
            // (Opsional) Memastikan NIK & No Telp tetap dianggap String
            // Penting agar angka "0" di depan (seperti 0812...) tidak hilang.
            'nik' => 'string',
            'no_telp' => 'string',
        ];
    }
}
