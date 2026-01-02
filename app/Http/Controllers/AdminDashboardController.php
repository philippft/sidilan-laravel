<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index () {
        $persons = Person::all();
            //jenis kelamin
            $genderStats = Person::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();
            // plp dan tendik
            $positionTypeStats = DB::table('position_types')
            ->leftJoin('people', 'position_types.id', '=', 'people.position_type_id')
            ->select('position_types.name as nama_jenis_posisi', DB::raw('COUNT(people.id) as total_jenis_posisi'))
            ->groupBy('position_types.id', 'position_types.name')
            ->get();
            // status (aktif atau tidak aktif)
            $statusStats = Person::select('is_active', DB::raw('count(*) as total'))
            ->groupBy('is_active')
            ->get();
            //edukasi
            $educationStats = DB::table('educations')
            ->leftJoin('people', 'educations.id', '=', 'people.education_id')
            ->select('educations.name as jenjang_pendidikan', DB::raw('COUNT(people.id) as total_pegawai'))
            ->groupBy('educations.id', 'educations.name')
            ->get();
            //total
            $totalPersons = Person::count();

        return view('admin.dashboard-admin', compact(
                'persons', 
                'genderStats',
                'positionTypeStats',
                'statusStats',
                'educationStats',
                'totalPersons',
        ));
    }
    
    public function managementData () {
        $persons = Person::all();

        return view('admin.management-data', compact('persons'));
    }
}
