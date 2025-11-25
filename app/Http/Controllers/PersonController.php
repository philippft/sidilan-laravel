<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Person;
use App\Models\Position;
use App\Models\PositionType;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();
        $positions = Position::all();
        $positionTypes = PositionType::all();

    return view('admin.tambah-data', compact('educations', 'positions', 'positionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "full_name" => "required|string|max:255",
            "nip" => "required|string|unique:people,nip",
            "gender" => "required|in:laki-laki,perempuan",
            "education_id" => "required|exists:educations,id",
            "position_id" => "required|exists:positions,id",
            "position_type_id" => "required|exists:position_types,id",
            "is_active" => "boolean"
        ]);


        $person = Person::create([
            "full_name" => $validated["full_name"],
            "nip" => $validated["nip"],
            "gender" => $validated["gender"],
            "education_id" => $validated["education_id"],
            "position_id" => $validated["position_id"],
            "position_type_id" => $validated["position_type_id"],
            "is_active"  => 1,
        ]);

        return redirect()->back()->with("message", "{$person->full_name} berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
