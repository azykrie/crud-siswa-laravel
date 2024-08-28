<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Rombel::query();

        if ($search = $request->query('search')) {
            $query->where('rombels', 'LIKE', "%{$search}%");
        }

        $rombels = $query->paginate(5);
        return view('rombels.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombels' => ['required', 'regex:/[0-9]/', 'unique:rombels,rombels'],
        ], [
            'rombels.regex' => 'Field rombels must have one number.',
            'rombels.unique' => 'The rombels name has already been taken.',
        ]);

        Rombel::create($request->all());
        Alert::success('Success', 'Successfully create rombels');
        return redirect('rombels');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombel $rombel)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rombel $rombel, )
    {
       
        $request->validate([
            'rombels' => ['required', 'regex:/[0-9]/', 'unique:rombels,rombels'],
        ], [
            'rombels.regex' => 'Field rombels must have one number.',
            'rombels.unique' => 'The rombels name has already been taken.',
        ]);

        $rombel->update($request->all());
        Alert::success('Success', 'Successfully edit rombels');
        return redirect('rombels');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rombel::find($id)->delete();
        Alert::success('Success', 'Successfully delete rombels');
        return redirect('rombels');
    }

    public function rombelsPdf(){
        $rombels = Rombel::all();
        $pdf = Pdf::loadView('rombels.rombels-pdf', compact('rombels'));
        return $pdf->download('rombels.pdf');
    }
}
