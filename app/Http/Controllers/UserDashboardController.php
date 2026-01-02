<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class UserDashboardController extends Controller
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
                $q->where('education_id', $request->jenisPosisi);
            });

            $query->when($request->filled('jenisPosisi'), function ($q) use ($request) {
                $q->where('position_type_id', $request->pendidikan);
            });

            $persons = $query->with(['education', 'position', 'position_type'])->get();
            // dd($persons);

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
            // dd($persons);

        return view('dashboard', compact(
            'persons', 
            'genderStats', 
            'positionTypeStats', 
            'statusStats', 
            'educationStats', 
            'totalPersons'
        ));
    }

    public function tenagaPendidik(Request $request) {

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

    public function tenagaPendidikDetail(String $id) {
        $detailPerson = Person::with(['position', 'education'])->findOrFail($id);
        
        return view('tenaga-pendidik-detailed', compact('detailPerson'));
    }

    public function plpTeknisiLab(Request $request) {
        //ini mirip kayak yang di atas
        $perPage = request('per_page', 10);

            $plpTeknisiLab = Person::with(['position'])
                ->where('position_type_id', 1)
                ->where('is_active', 1)
                ->when($request->search, function ($q) use ($request) {
                    $q->where('full_name', 'like', '%' . $request->search . '%')
                    ->orWhereHas('position', function ($q2) use ($request) {
                        $q2->where('name', 'like', '%' . $request->search . '%');
                    });
                })
                ->paginate($perPage)
                ->withQueryString();
        return view('plp-teknisi-lab', compact('plpTeknisiLab'));
    }

    public function plpTeknisiDetail(String $id) {
        $detailPerson = Person::with(['position', 'education'])->findOrFail($id);
        
        return view('plp-teknisi-lab-detailed', compact('detailPerson'));
    }
}
