<?php

namespace App\Imports;

use App\Models\Education;
use App\Models\Position;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PeopleImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 2; 
    }   

    public function model(array $row)
    {
        $teksJabatan = $row['nama_jabatan_untuk_sianita'] ?? null;

        if (!$teksJabatan) {
            return null;
        }

        $position = Position::where('name', trim($teksJabatan))->first();

        $education = Education::where('name', trim($row['pendidikan']))->first();

        return \App\Models\Person::updateOrCreate(
        [
            'nip' => $row['nip'],
        ],
        [
            'full_name'    => $row['nama'],
            'gender'       => (trim($row['jenis_kelamin']) == 'WANITA') ? 'perempuan' : 'laki-laki',
            'education_id' => $education?->id,
            'position_id'  => $position?->id,
            'is_active'    => 1,
            'image'        => 'default.jpg',
        ]
    );
    }
}
