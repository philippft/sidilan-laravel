<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PositionsImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    private $categoryName;

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }
    
    public function headingRow(): int { return 2; }

    public function model(array $row)
    {

        $type = \App\Models\PositionType::firstOrCreate(['name' => $this->categoryName]);
        $namaJabatan = $row['nama_jabatan_untuk_sianita'] ?? null;

        if ($namaJabatan) {
            return \App\Models\Position::firstOrCreate([
                'name' => trim($namaJabatan),
                'position_type_id' => $type->id
            ]);
        }
    }
}

