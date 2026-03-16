<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Person;
use App\Models\Position;
use App\Models\PositionType;
use Illuminate\Support\Facades\Storage;
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
        $request->validate([
            "full_name" => "required|string|max:255",
            "nip" => "required|string|unique:people,nip",
            "gender" => "required|in:laki-laki,perempuan",
            "education_id" => "required|exists:educations,id",
            "position_id" => "required|exists:positions,id",
            "position_type_id" => "required|exists:position_types,id",
            "image" => "nullable|image|mimes:jpeg,png,jpg|max:2048"
        ]);  

        $newRequest = $request->all();
        $newRequest['image'] = "";

        if($request->file('image')){
            $file = $request->file('image');
            $fileName = microtime() . '.' . $file->getClientOriginalExtension();

            Storage::disk('public')->putFileAs('person_images', $file, $fileName);
            $newRequest['image'] = $fileName;
        }

        $newRequest['is_active'] = $request->has('is_active') ? 1 : 0;
        $person = Person::create($newRequest);

        return redirect()->route('admin.dashboard')->with("message", "{$person->full_name} berhasil ditambahkan");
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
    public function edit(String $id)
    {
        $educations = Education::all();
        $positions = Position::all();
        $positionTypes = PositionType::all();
        $person = Person::with('position.positionType')->findOrFail($id);

        return view('admin.edit-data', compact('educations', 'positions', 'positionTypes', 'person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
    $person = Person::findOrFail($id);
    
    $validated = $request->validate([
        "full_name" => "required|string|max:255",
        "nip" => "required|string|unique:people,nip," . $person->id, 
        "gender" => "required|in:laki-laki,perempuan",
        "education_id" => "required|exists:educations,id",
        "position_id" => "required|exists:positions,id", 
        "image" => "nullable|image|mimes:jpeg,png,jpg|max:2048", 
    ]);

    $updateData = $validated;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        
        // kalo filenya ada dari inputan, hapus dulu file lamanya
        if ($person->image && Storage::disk('public')->exists('person_images/' . $person->image)) {
            Storage::disk('public')->delete('person_images/' . $person->image);
        }
        
        // strore file barunya
        Storage::disk('public')->putFileAs('person_images', $file, $fileName);
        $updateData['image'] = $fileName;
    }

    $updateData['is_active'] = $request->has('is_active') ? 1 : 0;
    $person->update($updateData);

    return redirect()->route('admin.dashboard')->with("message", "{$person->full_name} berhasil diedit");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $person = Person::findOrFail($id);

        if($person->image){
            Storage::disk('public')->delete('person_images/' . $person->image);
        }

        $person->delete();

        return redirect()->back()->with("message", "{$person->full_name} berhasil di hapus");
    }

    public function getPositionsByType($typeId)
    {
        return \App\Models\Position::where('position_type_id', $typeId)
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    public function getPositionType($id)
    {
        $position = \App\Models\Position::find($id);

        if (!$position) {
            return response()->json(['type_id' => ''], 404);
        }

        return response()->json([
            'type_id' => $position->position_type_id
        ]);
    }

    public function pdf()
    {
        // kode untuk menghasilkan PDF
        $people = Person::with('position.positionType')->get();

        return view('admin.data-pdf', compact('people'));
    }
}