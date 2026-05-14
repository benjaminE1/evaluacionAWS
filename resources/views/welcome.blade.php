@extends('layouts.app')

@section('title', 'Inicio - Tankpedia')

@section('content')
<div class="min-h-[calc(100vh-100px)]">
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-20 lg:py-32">
        <!-- Military Grid Background -->
        <div class="absolute inset-0 military-grid opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#6b9969]/5 via-transparent to-[#0d0d0d]"></div>
        
        <div class="relative px-6 max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass mb-6 justify-center">
                <span class="text-sm"></span>
                <span class="text-sm font-medium text-[#999999]">Base de Datos de Vehículos Militares</span>
            </div>
            
            <!-- Main Heading -->
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight mb-6 text-[#f5f5f5]">
                La Enciclopedia
                <br>
                <span class="text-[#6b9969]">de Tanques Definitiva</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg text-[#999999] max-w-2xl mx-auto mb-12">
                Explora especificaciones detalladas, historia de combate y datos técnicos de tanques militares 
                de todo el mundo. Desde leyendas de la Segunda Guerra Mundial hasta tanques de batalla principales modernos.
            </p>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-4 hover:border-[#6b9969]/50 transition-all">
                    <div class="text-2xl md:text-3xl font-bold text-[#6b9969]">6</div>
                    <div class="text-sm text-[#999999]">Módulos</div>
                </div>
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-4 hover:border-[#6b9969]/50 transition-all">
                    <div class="text-2xl md:text-3xl font-bold text-[#6b9969]">∞</div>
                    <div class="text-sm text-[#999999]">Datos</div>
                </div>
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-4 hover:border-[#6b9969]/50 transition-all">
                    <div class="text-2xl md:text-3xl font-bold text-[#6b9969]">100%</div>
                    <div class="text-sm text-[#999999]">Sincronizado</div>
                </div>
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-4 hover:border-[#6b9969]/50 transition-all">
                    <div class="text-2xl md:text-3xl font-bold text-[#6b9969]">2026</div>
                    <div class="text-sm text-[#999999]">Actualizado</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modules Section -->
    <section class="px-6 py-16 border-t border-[#2a2a2a] bg-gradient-to-b from-[#1a1a1a]/50 to-[#0d0d0d]">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-[#f5f5f5] mb-4">Explora los Módulos</h2>
                <p class="text-[#999999] max-w-2xl mx-auto">Accede a información detallada sobre cada aspecto de la tecnología militar blindada</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tanques -->
                <a href="{{ route('tanques.index') }}" class="group relative overflow-hidden rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] p-8 hover:border-[#6b9969]/50 hover:shadow-lg hover:shadow-[#6b9969]/10 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#6b9969]/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-4xl mb-4"></div>
                        <h3 class="text-xl font-bold text-[#f5f5f5] mb-2 group-hover:text-[#6b9969] transition-colors">Tanques</h3>
                        <p class="text-[#999999] text-sm mb-4">Consulta todas las variantes de tanques militares con especificaciones técnicas</p>
                        <div class="flex items-center text-[#6b9969] font-medium text-sm group-hover:translate-x-1 transition-transform">
                            Ver más →
                        </div>
                    </div>
                </a>

                <!-- Países -->
                <a href="{{ route('paises.index') }}" class="group relative overflow-hidden rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] p-8 hover:border-[#6b9969]/50 hover:shadow-lg hover:shadow-[#6b9969]/10 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#6b9969]/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-4xl mb-4"></div>
                        <h3 class="text-xl font-bold text-[#f5f5f5] mb-2 group-hover:text-[#6b9969] transition-colors">Países</h3>
                        <p class="text-[#999999] text-sm mb-4">Descubre qué países fabrican y utilizan tanques en todo el mundo</p>
                        <div class="flex items-center text-[#6b9969] font-medium text-sm group-hover:translate-x-1 transition-transform">
                            Ver más →
                        </div>
                    </div>
                </a>

                <!-- Fabricantes -->
                <a href="{{ route('fabricantes.index') }}" class="group relative overflow-hidden rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] p-8 hover:border-[#6b9969]/50 hover:shadow-lg hover:shadow-[#6b9969]/10 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#6b9969]/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-4xl mb-4"></div>
                        <h3 class="text-xl font-bold text-[#f5f5f5] mb-2 group-hover:text-[#6b9969] transition-colors">Fabricantes</h3>
                        <p class="text-[#999999] text-sm mb-4">Explora los grandes fabricantes de tanques de la historia</p>
                        <div class="flex items-center text-[#6b9969] font-medium text-sm group-hover:translate-x-1 transition-transform">
                            Ver más →
                        </div>
                    </div>
                </a>

                <!-- Municiones -->
                <a href="{{ route('municiones.index') }}" class="group relative overflow-hidden rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] p-8 hover:border-[#6b9969]/50 hover:shadow-lg hover:shadow-[#6b9969]/10 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#6b9969]/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-4xl mb-4"></div>
                        <h3 class="text-xl font-bold text-[#f5f5f5] mb-2 group-hover:text-[#6b9969] transition-colors">Municiones</h3>
                        <p class="text-[#999999] text-sm mb-4">Revisa los tipos de municiones y su compatibilidad con los tanques</p>
                        <div class="flex items-center text-[#6b9969] font-medium text-sm group-hover:translate-x-1 transition-transform">
                            Ver más →
                        </div>
                    </div>
                </a>

                <!-- Combustibles -->
                <a href="{{ route('combustibles.index') }}" class="group relative overflow-hidden rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] p-8 hover:border-[#6b9969]/50 hover:shadow-lg hover:shadow-[#6b9969]/10 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#6b9969]/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-4xl mb-4"></div>
                        <h3 class="text-xl font-bold text-[#f5f5f5] mb-2 group-hover:text-[#6b9969] transition-colors">Combustibles</h3>
                        <p class="text-[#999999] text-sm mb-4">Conoce los sistemas de propulsión y combustibles de los tanques</p>
                        <div class="flex items-center text-[#6b9969] font-medium text-sm group-hover:translate-x-1 transition-transform">
                            Ver más →
                        </div>
                    </div>
                </a>

                <!-- Conflictos -->
                <a href="{{ route('conflictos.index') }}" class="group relative overflow-hidden rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] p-8 hover:border-[#6b9969]/50 hover:shadow-lg hover:shadow-[#6b9969]/10 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#6b9969]/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="text-4xl mb-4"></div>
                        <h3 class="text-xl font-bold text-[#f5f5f5] mb-2 group-hover:text-[#6b9969] transition-colors">Conflictos</h3>
                        <p class="text-[#999999] text-sm mb-4">Descubre los conflictos históricos donde participaron tanques</p>
                        <div class="flex items-center text-[#6b9969] font-medium text-sm group-hover:translate-x-1 transition-transform">
                            Ver más →
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>

<style>
    .glass {
        @apply bg-black/20 backdrop-blur-md border border-white/10;
    }

    .military-grid {
        background-image: 
            linear-gradient(0deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent),
            linear-gradient(90deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent);
        background-size: 50px 50px;
    }
</style>
@endsection
