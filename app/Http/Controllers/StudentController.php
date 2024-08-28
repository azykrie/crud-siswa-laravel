<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::when($search, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('nim', 'like', "%{$search}%");
        })->paginate(5);
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        return view('students.index', compact('students', 'rayons', 'rombels'));
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
            'name' => ['required', 'unique:students,name'],
            'nim' => ['required', 'unique:students,nim'],
            'gender' => ['required'],
            'rayons_id' => ['required', 'exists:rayons,id'],
            'rombels_id' => ['required', 'exists:rombels,id'],
        ]);
        Student::create($request->all());
        Alert::success('Success', 'Successfully create students');
        return redirect('students');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => ['required'],
            'nim' => ['required'],
            'gender' => ['required'],
            'rayons_id' => ['required', 'exists:rayons,id'],
            'rombels_id' => ['required', 'exists:rombels,id'],
        ]);
        
        $student->update($request->all());
        Alert::success('Success', 'Successfully update students');
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        Alert::success('Success', 'Successfully delete students');
        return redirect('students');
    }

    public function studentsPdf(){
        $students = Student::all();
        $pdf = PDF::loadView('students.students-pdf', compact('students'));
        return $pdf->download('students.pdf');
    }
}
