<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $rayons = Rayon::when($search, function ($query, $search) {
            return $query->where('rayons', 'like', "%{$search}%");
        })->paginate(5);
        return view('rayons.index', compact('rayons'));
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
            'rayons' => ['required', 'regex:/[0-9]/', 'unique:rayons,rayons'],
        ], [
            'rayons.regex' => 'Field rayons must have one number.',
            'rayons.unique' => 'The rayons name has already been taken.',
        ]);

        Rayon::create($request->all());
        Alert::success('Success', 'Successfully create rayons');
        return redirect('rayons');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rayon $rayon)
    {
        $request->validate([
            'rayons' => ['required', 'regex:/[0-9]/', 'unique:rayons,rayons'],
        ], [
            'rayons.regex' => 'Field rayons must have one number.',
            'rayons.unique' => 'The rayons name has already been taken.',
        ]);

        $rayon->update($request->all());
        Alert::success('Success', 'Successfully update rayons');
        return redirect('rayons');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rayon::find($id)->delete();
        Alert::success('Success', 'Successfully delete rayons');
        return redirect('rayons');
    }

    public function rayonsPdf(){
        $rayons = Rayon::all();
        $pdf = Pdf::loadView('rayons.rayons-pdf', compact('rayons'));
        return $pdf->download('rayons.pdf');
    }
}
