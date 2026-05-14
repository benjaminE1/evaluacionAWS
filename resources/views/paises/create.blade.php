@extends('layouts.app')

@section('title', 'Crear País')

@section('content')
<div class="max-w-2xl mx-auto p-4 lg:p-6">
    <div class="glass rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-military-800 to-military-700 px-6 py-6">
            <h1 class="text-3xl font-bold text-white">➕ Nuevo País</h1>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('paises.store') }}" class="p-6 space-y-6">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-semibold text-white mb-2">Nombre del País *</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('nombre') border-red-500 @enderror">
                @error('nombre')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Código -->
            <div>
                <label for="codigo" class="block text-sm font-semibold text-white mb-2">Código (3 letras) *</label>
                <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}" maxlength="3" required
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all uppercase @error('codigo') border-red-500 @enderror">
                @error('codigo')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-semibold text-white mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 justify-end pt-4 border-t border-military-700">
                <a href="{{ route('paises.index') }}" class="px-6 py-2 rounded-lg font-medium bg-dark-700 hover:bg-dark-600 text-gray-300 hover:text-white transition-colors">
                    ✗ Cancelar
                </a>
                <button type="submit" class="px-6 py-2 rounded-lg font-medium bg-military-600 hover:bg-military-500 text-white transition-colors">
                    ✓ Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
