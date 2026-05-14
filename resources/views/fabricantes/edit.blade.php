@extends('layouts.app')

@section('title', 'Editar Fabricante')

@section('content')
<div class="max-w-2xl mx-auto p-4 lg:p-6">
    <div class="glass rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-military-800 to-military-700 px-6 py-6">
            <h1 class="text-3xl font-bold text-white">✏️ Editar Fabricante</h1>
            <p class="text-military-200 mt-1">{{ $fabricante->nombre }}</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('fabricantes.update', $fabricante) }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-semibold text-white mb-2">Nombre de la Empresa *</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $fabricante->nombre) }}" required
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('nombre') border-red-500 @enderror">
                @error('nombre')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- País -->
            <div>
                <label for="pais" class="block text-sm font-semibold text-white mb-2">País *</label>
                <input type="text" id="pais" name="pais" value="{{ old('pais', $fabricante->pais) }}" required
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('pais') border-red-500 @enderror">
                @error('pais')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Año de Fundación -->
            <div>
                <label for="año_fundacion" class="block text-sm font-semibold text-white mb-2">Año de Fundación</label>
                <input type="number" id="año_fundacion" name="año_fundacion" value="{{ old('año_fundacion', $fabricante->año_fundacion) }}" min="1800" max="2100"
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('año_fundacion') border-red-500 @enderror">
                @error('año_fundacion')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-semibold text-white mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('descripcion') border-red-500 @enderror">{{ old('descripcion', $fabricante->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 justify-end pt-4 border-t border-military-700">
                <a href="{{ route('fabricantes.index') }}" class="px-6 py-2 rounded-lg font-medium bg-dark-700 hover:bg-dark-600 text-gray-300 hover:text-white transition-colors">
                    ✗ Cancelar
                </a>
                <button type="submit" class="px-6 py-2 rounded-lg font-medium bg-military-600 hover:bg-military-500 text-white transition-colors">
                    ✓ Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
