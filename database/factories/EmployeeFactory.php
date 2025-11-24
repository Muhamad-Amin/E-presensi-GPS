<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        return [
            'nik' => $faker->unique()->numerify('#####'), 

            // Nama Lengkap: Nama orang Indonesia (misal: Budi Santoso, Siti Aminah)
            'full_name' => $faker->name(),

            // Jabatan: Kita batasi array manual agar tidak lebih dari 20 karakter
            // Karena $faker->jobTitle() kadang menghasilkan teks panjang
            'position' => $faker->randomElement([
                'Staff Administrasi', 
                'Staff IT', 
                'HRD', 
                'Marketing', 
                'Satpam', 
                'Supervisor', 
                'Manager', 
                'Direktur',
                'OB',
                'Akuntan'
            ]),

            // No Telp: Format 08... (max 13 digit)
            // Kita generate 10-11 digit acak setelah "08"
            'no_telp' => '08' . $faker->numerify('##########'), 

            // Password default: 'password'
            'password' => 'password', 
            
            'remember_token' => Str::random(10),
        ];
    }
}
