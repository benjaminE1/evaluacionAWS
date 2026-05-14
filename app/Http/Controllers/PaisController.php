<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = Pais::with('tanques')->paginate(10);
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:pais',
            'codigo' => 'required|string|size:3|unique:pais',
            'descripcion' => 'nullable|string'
        ]);

        Pais::create($validated);
        return redirect()->route('paises.index')->with('success', 'País creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pais $paise)
    {
        $paise->load('tanques');
        return view('paises.show', compact('paise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pais $paise)
    {
        return view('paises.edit', compact('paise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pais $paise)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:pais,nombre,' . $paise->id,
            'codigo' => 'required|string|size:3|unique:pais,codigo,' . $paise->id,
            'descripcion' => 'nullable|string'
        ]);

        $paise->update($validated);
        return redirect()->route('paises.index')->with('success', 'País actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pais $paise)
    {
        $paise->delete();
        return redirect()->route('paises.index')->with('success', 'País eliminado exitosamente.');
    }
}
