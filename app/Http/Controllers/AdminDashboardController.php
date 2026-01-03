<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Education;   
use App\Models\Position;
use App\Models\PositionType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index (Request $request) {
        $query = Person::query();

            $query->when($request->filled('gender'), function ($q) use ($request) {
                $q->where('gender', $request->gender)->paginate(10);
            });

            $query->when($request->filled('status'), function ($q) use ($request) {
                $q->where('is_active', $request->status)->paginate(10);
            });
            
            $query->when($request->filled('jenisPosisi'), function ($q) use ($request) {
                $q->where('position_type_id', $request->jenisPosisi)->paginate(10);
            });
            
            $query->when($request->filled('pendidikan'), function ($q) use ($request) {
                $q->where('education_id', $request->pendidikan)->paginate(10);
            });

            $persons = $query->with(['education', 'position', 'position_type'])->get();

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
        $perPage = request('per_page', 10);

        // paginationnya
        $persons = Person::with(['education', 'position', 'position_type'])
            ->when(request('search'), function ($q) {
                $q->where('full_name', 'like', '%' . request('search') . '%')
                ->orWhereHas('position', function ($q2) {
                    $q2->where('name', 'like', '%' . request('search') . '%');
                })->orWhereHas('education', function ($q3) {
                    $q3->where('name', 'like', '%' . request('search') . '%');
                })->orWhereHas('position_type', function ($q4) {
                    $q4->where('name', 'like', '%' . request('search') . '%');
                });
            })
            ->paginate($perPage)
            ->withQueryString();
        return view('admin.management-data', compact('persons'));
    }
    // public function paginationManagementData
}
