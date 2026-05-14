<?php

namespace App\Http\Controllers;

use App\Models\Municion;
use Illuminate\Http\Request;

class MunicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municiones = Municion::with('tanques')->paginate(10);
        return view('municiones.index', compact('municiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('municiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'calibre' => 'required|string',
            'tipo' => 'required|string',
            'descripcion' => 'nullable|string'
        ]);

        Municion::create($validated);
        return redirect()->route('municiones.index')->with('success', 'Munición creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Municion $municion)
    {
        $municion->load('tanques');
        return view('municiones.show', compact('municion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municion $municion)
    {
        return view('municiones.edit', compact('municion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Municion $municion)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'calibre' => 'required|string',
            'tipo' => 'required|string',
            'descripcion' => 'nullable|string'
        ]);

        $municion->update($validated);
        return redirect()->route('municiones.index')->with('success', 'Munición actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municion $municion)
    {
        $municion->tanques()->detach();
        $municion->delete();
        return redirect()->route('municiones.index')->with('success', 'Munición eliminada exitosamente.');
    }
}
