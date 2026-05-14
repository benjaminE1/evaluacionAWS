<?php

namespace App\Http\Controllers;

use App\Models\Conflicto;
use Illuminate\Http\Request;

class ConflictoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conflictos = Conflicto::with('tanques')->paginate(10);
        return view('conflictos.index', compact('conflictos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conflictos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:conflictos',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'descripcion' => 'nullable|string',
            'ubicacion' => 'nullable|string'
        ]);

        Conflicto::create($validated);
        return redirect()->route('conflictos.index')->with('success', 'Conflicto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conflicto $conflicto)
    {
        $conflicto->load('tanques');
        return view('conflictos.show', compact('conflicto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conflicto $conflicto)
    {
        return view('conflictos.edit', compact('conflicto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conflicto $conflicto)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:conflictos,nombre,' . $conflicto->id,
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'descripcion' => 'nullable|string',
            'ubicacion' => 'nullable|string'
        ]);

        $conflicto->update($validated);
        return redirect()->route('conflictos.index')->with('success', 'Conflicto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conflicto $conflicto)
    {
        $conflicto->tanques()->detach();
        $conflicto->delete();
        return redirect()->route('conflictos.index')->with('success', 'Conflicto eliminado exitosamente.');
    }
}
