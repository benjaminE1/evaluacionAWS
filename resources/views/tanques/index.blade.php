@extends('layouts.app')

@section('title', 'Tanques')

@section('content')
<div class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-[#f5f5f5] mb-2">Tanques de Guerra</h1>
            <p class="text-[#999999]">Gestiona la base de datos de tanques militares</p>
        </div>
        <a href="{{ route('tanques.create') }}" class="px-6 py-3 bg-[#6b9969] text-white rounded-lg hover:bg-[#87a787] transition-all inline-flex items-center gap-2 font-medium">
            <span>+</span> Nuevo Tanque
        </a>
    </div>
</div>

<!-- Table Container -->
<div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-[#252525] border-b border-[#2a2a2a]">
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Nombre</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">País</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Fabricante</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Potencia Motor</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Año</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-[#f5f5f5]">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a2a]">
                @forelse ($tanques as $tanque)
                    <tr class="hover:bg-[#252525]/50 transition-colors">
                        <td class="px-6 py-4 text-[#f5f5f5] font-medium">{{ $tanque->nombre }}</td>
                        <td class="px-6 py-4 text-[#999999]">{{ $tanque->pais->nombre }}</td>
                        <td class="px-6 py-4 text-[#999999]">{{ $tanque->fabricante->nombre }}</td>
                        <td class="px-6 py-4 text-[#999999]">{{ $tanque->potencia_motor ? $tanque->potencia_motor . ' HP' : '-' }}</td>
                        <td class="px-6 py-4 text-[#999999]">{{ $tanque->año_produccion ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('tanques.show', $tanque) }}" class="px-3 py-1 bg-[#6b9969]/20 text-[#6b9969] rounded hover:bg-[#6b9969]/30 transition-colors text-sm font-medium">
                                    Ver
                                </a>
                                <a href="{{ route('tanques.edit', $tanque) }}" class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded hover:bg-blue-500/30 transition-colors text-sm font-medium">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('tanques.destroy', $tanque) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500/20 text-red-400 rounded hover:bg-red-500/30 transition-colors text-sm font-medium" onclick="return confirm('¿Estás seguro?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-[#999999]">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <span class="text-4xl"></span>
                                <p>No hay tanques registrados todavía</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
@if ($tanques->hasPages())
    <div class="mt-8 flex justify-center">
        <nav class="flex gap-2">
            {{ $tanques->links() }}
        </nav>
    </div>
@endif
@endsection
