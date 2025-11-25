<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index () {
        $persons = Person::all();

        return view('admin.dashboard', compact('persons'));
    }
}
