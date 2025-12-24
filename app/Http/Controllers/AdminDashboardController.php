<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index () {
        $persons = Person::all();

        return view('admin.dashboard-admin', compact('persons'));
    }
    
    public function managementData () {
        $persons = Person::all();

        return view('admin.management-data', compact('persons'));
    }
}
