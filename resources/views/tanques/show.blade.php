@extends('layouts.app')

@section('title', 'Detalles del Tanque')

@section('content')
<div class="max-w-6xl mx-auto p-4 lg:p-6">
    <div class="glass rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-military-800 to-military-700 px-6 py-8">
            <h1 class="text-4xl font-bold text-white mb-2">{{ $tanque->nombre }}</h1>
            <p class="text-military-200">País: <a href="{{ route('paises.show', $tanque->pais) }}" class="font-semibold text-military-100 hover:text-white transition-colors">{{ $tanque->pais->nombre }}</a> • Fabricante: <a href="{{ route('fabricantes.show', $tanque->fabricante) }}" class="font-semibold text-military-100 hover:text-white transition-colors">{{ $tanque->fabricante->nombre }}</a></p>
        </div>

        <!-- Content -->
        <div class="px-6 py-8">
            <!-- Specifications Grid -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl"></span> Especificaciones Técnicas
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div class="glass p-4 rounded-lg text-center">
                        <p class="text-gray-400 text-sm mb-1">Año de Producción</p>
                        <p class="text-white font-bold text-lg">{{ $tanque->año_produccion ?? '-' }}</p>
                    </div>
                    <div class="glass p-4 rounded-lg text-center">
                        <p class="text-gray-400 text-sm mb-1">Blindaje</p>
                        <p class="text-white font-bold text-lg">{{ $tanque->blindaje ? $tanque->blindaje . ' mm' : '-' }}</p>
                    </div>
                    <div class="glass p-4 rounded-lg text-center">
                        <p class="text-gray-400 text-sm mb-1">Potencia Motor</p>
                        <p class="text-white font-bold text-lg">{{ $tanque->potencia_motor ? $tanque->potencia_motor . ' HP' : '-' }}</p>
                    </div>
                    <div class="glass p-4 rounded-lg text-center">
                        <p class="text-gray-400 text-sm mb-1">Velocidad Máxima</p>
                        <p class="text-white font-bold text-lg">{{ $tanque->velocidad_maxima ? $tanque->velocidad_maxima . ' km/h' : '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Combustible -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl"></span> Combustible
                </h2>
                <a href="{{ route('combustibles.show', $tanque->combustible) }}" class="glass p-4 rounded-lg hover:border-military-500 hover:shadow-lg transition-all group inline-block w-full">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-lg font-semibold text-white group-hover:text-military-300 transition-colors">{{ $tanque->combustible->nombre }}</span>
                            <p class="text-sm text-gray-400 mt-1">Tipo: {{ $tanque->combustible->tipo }}</p>
                        </div>
                        <span class="text-xl"></span>
                    </div>
                </a>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl"></span> Descripción Histórica
                </h2>
                <p class="text-gray-300 leading-relaxed">{{ $tanque->descripcion_historica ?? 'Sin descripción disponible' }}</p>
            </div>

            <!-- Municiones -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl"></span> Municiones Disponibles
                </h2>
                @if ($tanque->municiones->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($tanque->municiones as $municion)
                            <a href="{{ route('municiones.show', $municion) }}" class="glass p-4 rounded-lg hover:border-military-500 hover:shadow-lg transition-all group">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <span class="text-lg font-semibold text-white group-hover:text-military-300 transition-colors">{{ $municion->nombre }}</span>
                                        <p class="text-sm text-gray-400 mt-1">Calibre: {{ $municion->calibre }}</p>
                                    </div>
                                    <span class="text-xl"></span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="glass p-8 rounded-lg text-center border border-dashed border-military-600">
                        <p class="text-gray-400 text-lg">Sin municiones registradas</p>
                    </div>
                @endif
            </div>

            <!-- Conflictos -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl"></span> Conflictos en los que Participó
                </h2>
                @if ($tanque->conflictos->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($tanque->conflictos as $conflicto)
                            <a href="{{ route('conflictos.show', $conflicto) }}" class="glass p-4 rounded-lg hover:border-military-500 hover:shadow-lg transition-all group">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <span class="text-lg font-semibold text-white group-hover:text-military-300 transition-colors">{{ $conflicto->nombre }}</span>
                                        <p class="text-sm text-gray-400 mt-1">{{ $conflicto->ubicacion ?? 'Ubicación no especificada' }}</p>
                                    </div>
                                    <span class="text-xl"></span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="glass p-8 rounded-lg text-center border border-dashed border-military-600">
                        <p class="text-gray-400 text-lg">Sin conflictos registrados</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-dark-800 px-6 py-6 flex gap-3 justify-end border-t border-military-700">
            <a href="{{ route('tanques.index') }}" class="px-6 py-2 rounded-lg font-medium bg-dark-700 hover:bg-dark-600 text-gray-300 hover:text-white transition-colors">
                ← Volver
            </a>
            <a href="{{ route('tanques.edit', $tanque) }}" class="px-6 py-2 rounded-lg font-medium bg-military-600 hover:bg-military-500 text-white transition-colors">
                Editar
            </a>
        </div>
    </div>
</div>
@endsection
