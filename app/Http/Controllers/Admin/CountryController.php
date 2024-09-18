<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries= Country::orderBy('id','desc')->paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'codpais'=>'required|',
            'abrev'=>'required|unique:countries',
            'name'=>'required',
        ]);
         Country::create($request->all());

         session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'País Creado Correctamente.'
        ]);
        return redirect()->route('admin.countries.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'codpais'=>"required|unique:countries,codpais,$country->id",
            'abrev'=>"required|unique:countries,abrev,$country->id",
            'name'=>'required',
        ]);

        $country->update($request->all());
        
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'Familia Actualizada Correctamente.'
        ]);

        return redirect()->route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        if ($country->cities->count() > 0) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Ups!',
                'text' => 'Este País esta Relacionada con una Ciudad.'
            ]);
            return redirect()->route('admin.countries.index');
        }
        $country->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'Familia Eliminada Correctamente.'
        ]);
        return redirect()->route('admin.countries.index');
    }
}
