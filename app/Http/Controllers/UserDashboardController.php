<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use Faker\Extension\PersonExtension;

class UserDashboardController extends Controller
{
        public function index (Request $request) {
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

        if (request()->routeIs('user.tenaga-pendidik')) {
            $perPage = request('per_page', 10);

            $tenagaPendidik = Person::with(['position'])
                ->where('position_type_id', 2)
                ->where('is_active', 1)
                ->when($request->search, function ($q) use ($request) {
                    $q->where('full_name', 'like', '%' . $request->search . '%')
                    ->orWhereHas('position', function ($q2) use ($request) {
                        $q2->where('name', 'like', '%' . $request->search . '%');
                    });
                })
                ->paginate($perPage)
                ->withQueryString();

            return view('tenaga-pendidik', compact('tenagaPendidik'));
        }

        return view('dashboard', compact(
            'persons', 
            'genderStats', 
            'positionTypeStats', 
            'statusStats', 
            'educationStats', 
            'totalPersons'
        ));
    }
}
