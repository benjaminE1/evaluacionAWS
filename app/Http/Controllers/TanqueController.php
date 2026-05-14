<?php

namespace App\Http\Controllers;

use App\Models\Tanque;
use App\Models\Pais;
use App\Models\Fabricante;
use App\Models\Combustible;
use App\Models\Municion;
use App\Models\Conflicto;
use Illuminate\Http\Request;

class TanqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanques = Tanque::with('pais', 'fabricante', 'combustible')->paginate(10);
        return view('tanques.index', compact('tanques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = Pais::all();
        $fabricantes = Fabricante::all();
        $combustibles = Combustible::all();
        $municiones = Municion::all();
        $conflictos = Conflicto::all();
        return view('tanques.create', compact('paises', 'fabricantes', 'combustibles', 'municiones', 'conflictos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:tanques',
            'pais_id' => 'required|exists:pais,id',
            'fabricante_id' => 'required|exists:fabricantes,id',
            'combustible_id' => 'required|exists:combustibles,id',
            'blindaje' => 'nullable|integer',
            'potencia_motor' => 'nullable|integer',
            'velocidad_maxima' => 'nullable|integer',
            'año_produccion' => 'nullable|integer',
            'descripcion_historica' => 'nullable|string',
            'municiones' => 'nullable|array',
            'municiones.*' => 'exists:municiones,id',
            'conflictos' => 'nullable|array',
            'conflictos.*' => 'exists:conflictos,id'
        ]);

        $municiones = $validated['municiones'] ?? [];
        $conflictos = $validated['conflictos'] ?? [];
        unset($validated['municiones'], $validated['conflictos']);

        $tanque = Tanque::create($validated);
        $tanque->municiones()->attach($municiones);
        $tanque->conflictos()->attach($conflictos);

        return redirect()->route('tanques.index')->with('success', 'Tanque creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanque $tanque)
    {
        $tanque->load('pais', 'fabricante', 'combustible', 'municiones', 'conflictos');
        return view('tanques.show', compact('tanque'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanque $tanque)
    {
        $paises = Pais::all();
        $fabricantes = Fabricante::all();
        $combustibles = Combustible::all();
        $municiones = Municion::all();
        $conflictos = Conflicto::all();
        $tanque->load('municiones', 'conflictos');
        return view('tanques.edit', compact('tanque', 'paises', 'fabricantes', 'combustibles', 'municiones', 'conflictos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanque $tanque)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:tanques,nombre,' . $tanque->id,
            'pais_id' => 'required|exists:pais,id',
            'fabricante_id' => 'required|exists:fabricantes,id',
            'combustible_id' => 'required|exists:combustibles,id',
            'blindaje' => 'nullable|integer',
            'potencia_motor' => 'nullable|integer',
            'velocidad_maxima' => 'nullable|integer',
            'año_produccion' => 'nullable|integer',
            'descripcion_historica' => 'nullable|string',
            'municiones' => 'nullable|array',
            'municiones.*' => 'exists:municiones,id',
            'conflictos' => 'nullable|array',
            'conflictos.*' => 'exists:conflictos,id'
        ]);

        $municiones = $validated['municiones'] ?? [];
        $conflictos = $validated['conflictos'] ?? [];
        unset($validated['municiones'], $validated['conflictos']);

        $tanque->update($validated);
        $tanque->municiones()->sync($municiones);
        $tanque->conflictos()->sync($conflictos);

        return redirect()->route('tanques.index')->with('success', 'Tanque actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanque $tanque)
    {
        $tanque->municiones()->detach();
        $tanque->conflictos()->detach();
        $tanque->delete();
        return redirect()->route('tanques.index')->with('success', 'Tanque eliminado exitosamente.');
    }
}
