@extends('layouts.app')

@section('title', 'Países')

@section('content')
<div class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-[#f5f5f5] mb-2">Países</h1>
            <p class="text-[#999999]">Gestiona los países y sus tanques militares</p>
        </div>
        <a href="{{ route('paises.create') }}" class="px-6 py-3 bg-[#6b9969] text-white rounded-lg hover:bg-[#87a787] transition-all inline-flex items-center gap-2 font-medium">
            <span>+</span> Nuevo País
        </a>
    </div>
</div>

<div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-[#252525] border-b border-[#2a2a2a]">
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Nombre</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Código</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Tanques</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a2a]">
                @forelse ($paises as $pais)
                    <tr class="hover:bg-[#252525]/50 transition-colors">
                        <td class="px-6 py-4 text-[#f5f5f5] font-medium">{{ $pais->nombre }}</td>
                        <td class="px-6 py-4 text-[#999999]">{{ $pais->codigo }}</td>
                        <td class="px-6 py-4 text-[#999999]"><span class="px-3 py-1 bg-[#6b9969]/20 text-[#6b9969] rounded text-sm font-medium">{{ $pais->tanques->count() }}</span></td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('paises.show', $pais) }}" class="px-3 py-1 bg-[#6b9969]/20 text-[#6b9969] rounded hover:bg-[#6b9969]/30 transition-colors text-sm font-medium">Ver</a>
                                <a href="{{ route('paises.edit', $pais) }}" class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded hover:bg-blue-500/30 transition-colors text-sm font-medium">Editar</a>
                                <form method="POST" action="{{ route('paises.destroy', $pais) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500/20 text-red-400 rounded hover:bg-red-500/30 transition-colors text-sm font-medium" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                    <td colspan="4" class="text-center text-muted">No hay países registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $paises->links() }}
</div>
@endsection
