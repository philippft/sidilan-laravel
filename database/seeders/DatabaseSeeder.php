<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::factory()->create([
            'username' => 'admin1',
            'password' => Hash::make('password'),
            'email' => 'test@example.com',
            'role' => 'admin'
        ]);

        $educations = [
            ['name' => 'SMA/SMK/Sederajat'],
            ['name' => 'D1 (Diploma 1)'],
            ['name' => 'D2 (Diploma 2)'],
            ['name' => 'D3 (Diploma 3)'],
            ['name' => 'D4 (Diploma 4)'],
            ['name' => 'S1 (Sarjana)'],
            ['name' => 'S2 (Magister)'],
            ['name' => 'S3 (Doktor)'],
        ];

        foreach ($educations as $education) {
            DB::table('educations')->insert([
                ...$education,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $positions = [
            ['name' => 'Dosen'],
            ['name' => 'Laboran'],
            ['name' => 'Teknisi'],
            ['name' => 'Administrasi'],
            ['name' => 'Staff TU'],
            ['name' => 'Kepala Laboratorium'],
            ['name' => 'Koordinator Praktikum'],
            ['name' => 'Asisten Ahli'],
        ];

        foreach ($positions as $position) {
            DB::table('positions')->insert([
                ...$position,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $positionTypes = [
            ['name' => 'PLP'],  
            ['name' => 'Tendik'], 
        ];

        foreach ($positionTypes as $positionType) {
            DB::table('position_types')->insert([
                ...$positionType,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $people = [
            [
                'full_name' => 'Ahmad Rizki',
                'nip' => '198012345678901',
                'education_id' => 6, // S1
                'position_id' => 1, // Dosen
                'position_type_id' => 1, // PLP
                'gender' => 'laki-laki',
                'is_active' => true,
            ],
            [
                'full_name' => 'Siti Aminah',
                'nip' => '198112345678902',
                'education_id' => 7, // S2
                'position_id' => 2, // Laboran
                'position_type_id' => 2, // Tendik
                'gender' => 'perempuan',
                'is_active' => true,
            ],
            [
                'full_name' => 'Budi Santoso',
                'nip' => '198212345678903',
                'education_id' => 5, // D4
                'position_id' => 3, // Teknisi
                'position_type_id' => 1, // PLP
                'gender' => 'laki-laki',
                'is_active' => true,
            ],
            [
                'full_name' => 'Maya Sari',
                'nip' => '198312345678904',
                'education_id' => 8, // S3
                'position_id' => 1, // Dosen
                'position_type_id' => 1, // PLP
                'gender' => 'perempuan',
                'is_active' => true,
            ],
            [
                'full_name' => 'Rudi Hermawan',
                'nip' => '198412345678905',
                'education_id' => 4, // D3
                'position_id' => 4, // Administrasi
                'position_type_id' => 2, // Tendik
                'gender' => 'laki-laki',
                'is_active' => true,
            ],
            [
                'full_name' => 'Dewi Kartika',
                'nip' => '198512345678906',
                'education_id' => 6, // S1
                'position_id' => 5, // Staff TU
                'position_type_id' => 2, // Tendik
                'gender' => 'perempuan',
                'is_active' => true,
            ],
            [
                'full_name' => 'Joko Prasetyo',
                'nip' => '198612345678907',
                'education_id' => 7, // S2
                'position_id' => 6, // Kepala Laboratorium
                'position_type_id' => 1, // PLP
                'gender' => 'laki-laki',
                'is_active' => true,
            ],
            [
                'full_name' => 'Linda Wati',
                'nip' => '198712345678908',
                'education_id' => 6, // S1
                'position_id' => 7, // Koordinator Praktikum
                'position_type_id' => 1, // PLP
                'gender' => 'perempuan',
                'is_active' => true,
            ],
        ];

        foreach ($people as $person) {
            DB::table('people')->insert([
                ...$person,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
