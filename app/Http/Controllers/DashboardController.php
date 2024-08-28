<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalRombels = Rombel::count();
        $totalRayons = Rayon::count();
        return view('dashboard.index', compact('totalStudents', 'totalRombels', 'totalRayons'));
    }
}
