@extends('layouts.app')

@section('title', 'Editar Tanque')

@section('content')
<div class="max-w-4xl mx-auto p-4 lg:p-6">
    <div class="glass rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-military-800 to-military-700 px-6 py-6">
            <h1 class="text-3xl font-bold text-white">✏️ Editar Tanque</h1>
            <p class="text-military-200 mt-1">{{ $tanque->nombre }}</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('tanques.update', $tanque) }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-semibold text-white mb-2">Nombre del Tanque *</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $tanque->nombre) }}" required
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('nombre') border-red-500 @enderror">
                @error('nombre')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selects (País, Fabricante, Combustible, Año) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="pais_id" class="block text-sm font-semibold text-white mb-2">País de Origen *</label>
                    <select id="pais_id" name="pais_id" required
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('pais_id') border-red-500 @enderror">
                        <option value="">-- Seleccionar país --</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}" {{ old('pais_id', $tanque->pais_id) == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
                        @endforeach
                    </select>
                    @error('pais_id')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="fabricante_id" class="block text-sm font-semibold text-white mb-2">Fabricante *</label>
                    <select id="fabricante_id" name="fabricante_id" required
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('fabricante_id') border-red-500 @enderror">
                        <option value="">-- Seleccionar fabricante --</option>
                        @foreach ($fabricantes as $fabricante)
                            <option value="{{ $fabricante->id }}" {{ old('fabricante_id', $tanque->fabricante_id) == $fabricante->id ? 'selected' : '' }}>{{ $fabricante->nombre }}</option>
                        @endforeach
                    </select>
                    @error('fabricante_id')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="combustible_id" class="block text-sm font-semibold text-white mb-2">Combustible *</label>
                    <select id="combustible_id" name="combustible_id" required
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('combustible_id') border-red-500 @enderror">
                        <option value="">-- Seleccionar combustible --</option>
                        @foreach ($combustibles as $combustible)
                            <option value="{{ $combustible->id }}" {{ old('combustible_id', $tanque->combustible_id) == $combustible->id ? 'selected' : '' }}>{{ $combustible->nombre }}</option>
                        @endforeach
                    </select>
                    @error('combustible_id')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="año_produccion" class="block text-sm font-semibold text-white mb-2">Año de Producción</label>
                    <input type="number" id="año_produccion" name="año_produccion" value="{{ old('año_produccion', $tanque->año_produccion) }}" min="1900" max="2100"
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('año_produccion') border-red-500 @enderror">
                    @error('año_produccion')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Especificaciones técnicas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="blindaje" class="block text-sm font-semibold text-white mb-2">Blindaje (mm)</label>
                    <input type="number" id="blindaje" name="blindaje" value="{{ old('blindaje', $tanque->blindaje) }}"
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('blindaje') border-red-500 @enderror">
                    @error('blindaje')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="potencia_motor" class="block text-sm font-semibold text-white mb-2">Potencia Motor (HP)</label>
                    <input type="number" id="potencia_motor" name="potencia_motor" value="{{ old('potencia_motor', $tanque->potencia_motor) }}"
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('potencia_motor') border-red-500 @enderror">
                    @error('potencia_motor')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="velocidad_maxima" class="block text-sm font-semibold text-white mb-2">Velocidad Máxima (km/h)</label>
                    <input type="number" id="velocidad_maxima" name="velocidad_maxima" value="{{ old('velocidad_maxima', $tanque->velocidad_maxima) }}"
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('velocidad_maxima') border-red-500 @enderror">
                    @error('velocidad_maxima')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Descripción Histórica -->
            <div>
                <label for="descripcion_historica" class="block text-sm font-semibold text-white mb-2">Descripción Histórica</label>
                <textarea id="descripcion_historica" name="descripcion_historica" rows="4"
                    class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black placeholder-gray-500 focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all @error('descripcion_historica') border-red-500 @enderror">{{ old('descripcion_historica', $tanque->descripcion_historica) }}</textarea>
                @error('descripcion_historica')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Municiones y Conflictos (multiple select) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-military-700">
                <div>
                    <label for="municiones" class="block text-sm font-semibold text-white mb-2">Municiones</label>
                    <select id="municiones" name="municiones[]" multiple
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all">
                        @foreach ($municiones as $municion)
                            <option value="{{ $municion->id }}" {{ $tanque->municiones->contains($municion->id) ? 'selected' : '' }}>{{ $municion->nombre }} ({{ $municion->calibre }})</option>
                        @endforeach
                    </select>
                    <p class="mt-2 text-xs text-gray-400">💡 Ctrl+Click para seleccionar múltiples</p>
                </div>

                <div>
                    <label for="conflictos" class="block text-sm font-semibold text-white mb-2">Conflictos</label>
                    <select id="conflictos" name="conflictos[]" multiple
                        class="w-full bg-dark-700 border border-military-600 rounded-lg px-4 py-2 text-black focus:outline-none focus:border-military-400 focus:ring-2 focus:ring-military-400/30 transition-all">
                        @foreach ($conflictos as $conflicto)
                            <option value="{{ $conflicto->id }}" {{ $tanque->conflictos->contains($conflicto->id) ? 'selected' : '' }}>{{ $conflicto->nombre }}</option>
                        @endforeach
                    </select>
                    <p class="mt-2 text-xs text-gray-400">💡 Ctrl+Click para seleccionar múltiples</p>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 justify-end pt-6 border-t border-military-700">
                <a href="{{ route('tanques.index') }}" class="px-6 py-2 rounded-lg font-medium bg-dark-700 hover:bg-dark-600 text-gray-300 hover:text-white transition-colors">
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
