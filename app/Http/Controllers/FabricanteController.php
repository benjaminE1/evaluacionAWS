<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fabricantes = Fabricante::with('tanques')->paginate(10);
        return view('fabricantes.index', compact('fabricantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fabricantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:fabricantes',
            'pais' => 'required|string',
            'año_fundacion' => 'nullable|integer',
            'descripcion' => 'nullable|string'
        ]);

        Fabricante::create($validated);
        return redirect()->route('fabricantes.index')->with('success', 'Fabricante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fabricante $fabricante)
    {
        $fabricante->load('tanques');
        return view('fabricantes.show', compact('fabricante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fabricante $fabricante)
    {
        return view('fabricantes.edit', compact('fabricante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fabricante $fabricante)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:fabricantes,nombre,' . $fabricante->id,
            'pais' => 'required|string',
            'año_fundacion' => 'nullable|integer',
            'descripcion' => 'nullable|string'
        ]);

        $fabricante->update($validated);
        return redirect()->route('fabricantes.index')->with('success', 'Fabricante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();
        return redirect()->route('fabricantes.index')->with('success', 'Fabricante eliminado exitosamente.');
    }
}
