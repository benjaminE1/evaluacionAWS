<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use Illuminate\Http\Request;

class CombustibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combustibles = Combustible::with('tanques')->paginate(10);
        return view('combustibles.index', compact('combustibles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('combustibles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:combustibles',
            'tipo' => 'required|string',
            'capacidad_litros' => 'nullable|integer',
            'descripcion' => 'nullable|string'
        ]);

        Combustible::create($validated);
        return redirect()->route('combustibles.index')->with('success', 'Combustible creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Combustible $combustible)
    {
        $combustible->load('tanques');
        return view('combustibles.show', compact('combustible'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Combustible $combustible)
    {
        return view('combustibles.edit', compact('combustible'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Combustible $combustible)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:combustibles,nombre,' . $combustible->id,
            'tipo' => 'required|string',
            'capacidad_litros' => 'nullable|integer',
            'descripcion' => 'nullable|string'
        ]);

        $combustible->update($validated);
        return redirect()->route('combustibles.index')->with('success', 'Combustible actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Combustible $combustible)
    {
        $combustible->delete();
        return redirect()->route('combustibles.index')->with('success', 'Combustible eliminado exitosamente.');
    }
}
