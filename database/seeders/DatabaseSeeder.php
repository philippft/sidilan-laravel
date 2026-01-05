<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MasterImport;

use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Admin::factory()->create([
            'username' => 'admin1',
            'password' => Hash::make('password'),
            'email' => 'test@example.com',
            'role' => 'admin'
        ]);

        $educations = [
            ['name' => 'SMA'],
            ['name' => 'D3'],
            ['name' => 'S1'],
            ['name' => 'S2'],
            ['name' => 'S3'],
        ];

        foreach ($educations as $education) {
            DB::table('educations')->insert([
                ...$education,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $filePath = database_path('seeders/data/data_pegawai.xlsx');

        Excel::import(new MasterImport('positions'), $filePath);
        Excel::import(new MasterImport('people'), $filePath);
    }
}

