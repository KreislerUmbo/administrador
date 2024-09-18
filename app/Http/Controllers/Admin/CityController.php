<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cities = City::orderBy('id', 'desc')->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'country_id' => 'required|exists:countries,id',
            'name' => 'required'
        ]);

        City::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'Categoria Creada Correctamente.'
        ]);

        return redirect()->route('admin.cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries = Country::all();
        return view('admin.cities.edit', compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $city->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'Ciudad Actualizada Correctamente.'
        ]);
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        if ($city->destinos->count() > 0) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Ups!',
                'text' => 'Esta Ciudad esta Relacionada con un Destino.'
            ]);
            return redirect()->route('admin.cities.index');
        }

        $city->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'Familia Eliminada Correctamente.'
        ]);

        return redirect()->route('admin.cities.index');
    }
}
