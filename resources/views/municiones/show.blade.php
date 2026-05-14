@extends('layouts.app')

@section('title', 'Detalles de Munición')

@section('content')
<div class="max-w-4xl mx-auto p-4 lg:p-6">
    <div class="glass rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-military-800 to-military-700 px-6 py-8">
            <h1 class="text-4xl font-bold text-white mb-2">{{ $municion->nombre }}</h1>
            <p class="text-military-200">Calibre: <span class="font-semibold text-military-100">{{ $municion->calibre }}</span> • Tipo: <span class="font-semibold text-military-100">{{ $municion->tipo }}</span></p>
        </div>

        <!-- Content -->
        <div class="px-6 py-8">
            <!-- Description -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl"></span> Descripción
                </h2>
                <p class="text-gray-300 leading-relaxed">{{ $municion->descripcion ?? 'Sin descripción disponible' }}</p>
            </div>

            <!-- Tanques que utilizan esta munición -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl"></span> Tanques que Utilizan esta Munición
                </h2>
                @if ($municion->tanques->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($municion->tanques as $tanque)
                            <a href="{{ route('tanques.show', $tanque) }}" class="glass p-4 rounded-lg hover:border-military-500 hover:shadow-lg transition-all group">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-semibold text-white group-hover:text-military-300 transition-colors">{{ $tanque->nombre }}</span>
                                    <span class="text-xl"></span>
                                </div>
                                <p class="text-sm text-gray-400 mt-1">Ver detalles →</p>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="glass p-8 rounded-lg text-center border border-dashed border-military-600">
                        <p class="text-gray-400 text-lg">Sin tanques registrados</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-dark-800 px-6 py-6 flex gap-3 justify-end border-t border-military-700">
            <a href="{{ route('municiones.index') }}" class="px-6 py-2 rounded-lg font-medium bg-dark-700 hover:bg-dark-600 text-gray-300 hover:text-white transition-colors">
                ← Volver
            </a>
            <a href="{{ route('municiones.edit', $municion) }}" class="px-6 py-2 rounded-lg font-medium bg-military-600 hover:bg-military-500 text-white transition-colors">
                Editar
            </a>
        </div>
    </div>
</div>
@endsection
