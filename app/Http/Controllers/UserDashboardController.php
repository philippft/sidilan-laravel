<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class UserDashboardController extends Controller
{
        public function index () {
        $persons = Person::all();

        return view('dashboard', compact('persons'));
    }
}
