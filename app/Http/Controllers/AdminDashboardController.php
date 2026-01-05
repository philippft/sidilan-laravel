<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index (Request $request) {
        // $persons = Person::all();
            $query = Person::query();

            $query->when($request->filled('gender'), function ($q) use ($request) {
                $q->where('gender', $request->gender);
            });
            
            $query->when($request->filled('status'), function ($q) use ($request) {
                $q->where('is_active', $request->status);
            });

            $query->when($request->filled('pendidikan'), function ($q) use ($request) {
                $q->where('education_id', $request->pendidikan);
            });

            $query->when($request->filled('jenisPosisi'), function ($q) use ($request) {
            // Gunakan whereHas untuk masuk ke relasi 'position'
            $q->whereHas('position', function ($queryPosition) use ($request) {
                $queryPosition->where('position_type_id', $request->jenisPosisi);
            });
            });

            $persons = $query->with(['education', 'position.positionType'])->paginate(7)->withQueryString();
            // dd($persons);

            //jenis kelamin
            $genderStats = Person::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();
            // plp dan tendik
            $positionTypeStats = DB::table('position_types')
            ->leftJoin('positions', 'position_types.id', '=', 'positions.position_type_id')
            ->leftJoin('people', 'positions.id', '=', 'people.position_id')
            ->select(
                'position_types.name as nama_jenis_posisi', 
                DB::raw('COUNT(people.id) as total_jenis_posisi')
            )
            ->groupBy('position_types.id', 'position_types.name')
            ->get();
            // dd($positionTypeStats);
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
            // dd($persons);

        return view('admin.dashboard-admin', compact(
            'persons', 
            'genderStats', 
            'positionTypeStats', 
            'statusStats', 
            'educationStats', 
            'totalPersons'
        ));
    }

    public function managementData () {
        $perPage = request('per_page', 10);

        // paginationnya
        $persons = Person::with(['education', 'position.positionType'])
            ->when(request('search'), function ($q) {
                $q->where('full_name', 'like', '%' . request('search') . '%')
                ->orWhereHas('position', function ($q2) {
                    $q2->where('name', 'like', '%' . request('search') . '%')->orWhereHas('positionType', function ($q3) {
                        $q3->where('name', 'like', '%' . request('search') . '%');
                    });
                })->orWhereHas('education', function ($q3) {
                    $q3->where('name', 'like', '%' . request('search') . '%');
                });
            })
            ->paginate($perPage)
            ->withQueryString();
        return view('admin.management-data', compact('persons'));
    }
    // public function paginationManagementData
}
