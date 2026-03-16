<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MasterImport implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    private $importType;

    public function __construct($importType = 'positions')
    {
        $this->importType = $importType;
    }

    public function sheets(): array
    {
        $sheets = [];

        if ($this->importType === 'positions') {
            $sheets = [
                1 => new PositionsImport('Tenaga Kependidikan'),
                2 => new PositionsImport('PLP dan Laboran'),
            ];
        } else {
            $sheets = [
                1 => new PeopleImport(),
                2 => new PeopleImport(),
            ];
        }

        return $sheets;
    }
}
