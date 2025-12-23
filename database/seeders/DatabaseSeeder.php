<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $faker = Faker::create('id_ID');

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
            ['full_name' => 'Ahmad Rizki', 'nip' => '198012345678901', 'education_id' => 6, 'position_id' => 1, 'position_type_id' => 1, 'gender' => 'laki-laki', 'is_active' => true, 'image' => ''],
            ['full_name' => 'Siti Aminah', 'nip' => '198112345678902', 'education_id' => 7, 'position_id' => 2, 'position_type_id' => 2, 'gender' => 'perempuan', 'is_active' => true, 'image' => ''],
            ['full_name' => 'Budi Santoso', 'nip' => '198212345678903', 'education_id' => 5, 'position_id' => 3, 'position_type_id' => 1, 'gender' => 'laki-laki', 'is_active' => true, 'image' => ''],
            ['full_name' => 'Maya Sari', 'nip' => '198312345678904', 'education_id' => 8, 'position_id' => 1, 'position_type_id' => 1, 'gender' => 'perempuan', 'is_active' => true, 'image' => ''],
            ['full_name' => 'Rudi Hermawan', 'nip' => '198412345678905', 'education_id' => 4, 'position_id' => 4, 'position_type_id' => 2, 'gender' => 'laki-laki', 'is_active' => true, 'image' => ''],
            ['full_name' => 'Dewi Kartika', 'nip' => '198512345678906', 'education_id' => 6, 'position_id' => 5, 'position_type_id' => 2, 'gender' => 'perempuan', 'is_active' => true, 'image' => ''],
            ['full_name' => 'Joko Prasetyo', 'nip' => '198612345678907', 'education_id' => 7, 'position_id' => 6, 'position_type_id' => 1, 'gender' => 'laki-laki', 'is_active' => true, 'image' => ''],
            ['full_name' => 'Linda Wati', 'nip' => '198712345678908', 'education_id' => 6, 'position_id' => 7, 'position_type_id' => 1, 'gender' => 'perempuan', 'is_active' => true, 'image' => ''],
        ];

        for ($i = 0; $i < 20; $i++) {
            $gender = $faker->randomElement(['laki-laki', 'perempuan']);
            $people[] = [
                'full_name' => $faker->name($gender == 'laki-laki' ? 'male' : 'female'),
                'nip' => $faker->unique()->numerify('199###########'), 
                'education_id' => $faker->numberBetween(1, 8),
                'position_id' => $faker->randomElement([2, 4, 5]), 
                'position_type_id' => 2,
                'gender' => $gender,
                'is_active' => true,
                'image' => '',
            ];
        }


        foreach ($people as $person) {
            DB::table('people')->insert([
                ...$person,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        }
    }

