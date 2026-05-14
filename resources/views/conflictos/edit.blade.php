@extends('layouts.app')

@section('title', 'Editar Conflicto')

@section('content')
<div class="max-w-2xl mx-auto p-4 lg:p-6">
    <div class="glass rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-military-800 to-military-700 px-6 py-6">
            <h1 class="text-3xl font-bold text-white">✏️ Editar Conflicto</h1>
            <p class="text-military-200 mt-1">{{ $conflicto->nombre }}</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('conflictos.update', $conflicto) }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-semibold text-white mb-2">Nombre del Conflicto *</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $conflicto->nombre) }}" required
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('nombre') border-red-500 @enderror">
                @error('nombre')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fechas (lado a lado en desktop) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fecha de Inicio -->
                <div>
                    <label for="fecha_inicio" class="block text-sm font-semibold text-white mb-2">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', $conflicto->fecha_inicio) }}"
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('fecha_inicio') border-red-500 @enderror">
                    @error('fecha_inicio')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fecha de Fin -->
                <div>
                    <label for="fecha_fin" class="block text-sm font-semibold text-white mb-2">Fecha de Fin</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin', $conflicto->fecha_fin) }}"
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('fecha_fin') border-red-500 @enderror">
                    @error('fecha_fin')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Ubicación -->
            <div>
                <label for="ubicacion" class="block text-sm font-semibold text-white mb-2">Ubicación</label>
                <input type="text" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $conflicto->ubicacion) }}"
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('ubicacion') border-red-500 @enderror">
                @error('ubicacion')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-semibold text-white mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('descripcion') border-red-500 @enderror">{{ old('descripcion', $conflicto->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 justify-end pt-4 border-t border-military-700">
                <a href="{{ route('conflictos.index') }}" class="px-6 py-2 rounded-lg font-medium bg-dark-700 hover:bg-dark-600 text-gray-300 hover:text-white transition-colors">
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
