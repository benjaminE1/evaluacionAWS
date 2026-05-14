<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tankpedia - Enciclopedia de Tanques')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --background: #0d0d0d;
            --foreground: #f5f5f5;
            --card: #1a1a1a;
            --sidebar: #141414;
            --primary: #6b9969;
            --muted-foreground: #999999;
            --border: #2a2a2a;
        }

        html {
            background-color: #0d0d0d;
            color: #f5f5f5;
        }

        body {
            background-color: #0d0d0d;
            color: #f5f5f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .glass {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .military-grid {
            background-image: 
                linear-gradient(0deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent);
            background-size: 50px 50px;
        }

        .nav-link {
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(107, 153, 105, 0.1);
            color: #6b9969;
        }

        .nav-link.active {
            background-color: rgba(107, 153, 105, 0.2);
            color: #6b9969;
            border-left: 2px solid #6b9969;
        }

        .module-card {
            transition: all 0.3s ease;
            border: 1px solid #2a2a2a;
        }

        .module-card:hover {
            border-color: rgba(107, 153, 105, 0.5);
            box-shadow: 0 0 20px rgba(107, 153, 105, 0.1);
        }

        .module-card:hover .module-title {
            color: #6b9969;
        }

        .module-card:hover .module-arrow {
            transform: translateX(4px);
        }
    </style>
</head>

<body class="bg-[#0d0d0d] text-[#f5f5f5]">
    <div class="flex min-h-screen">
        <!-- Sidebar Desktop -->
        <aside class="hidden lg:flex fixed left-0 top-0 h-screen w-64 flex-col bg-[#141414] border-r border-[#252525] z-40">
            <div class="p-6 border-b border-[#252525]">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#6b9969]/20 flex items-center justify-center">
                        <span class="text-lg font-bold text-[#6b9969]"></span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-[#f5f5f5]">TANKPEDIA</h1>
                        <p class="text-xs text-[#999999] tracking-widest uppercase">Enciclopedia</p>
                    </div>
                </a>
            </div>
            
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                @php
                    $menuItems = [
                        ['route' => '/', 'label' => 'Inicio', 'icon' => ''],
                        ['route' => route('tanques.index'), 'label' => 'Tanques', 'icon' => ''],
                        ['route' => route('paises.index'), 'label' => 'Países', 'icon' => ''],
                        ['route' => route('fabricantes.index'), 'label' => 'Fabricantes', 'icon' => ''],
                        ['route' => route('municiones.index'), 'label' => 'Municiones', 'icon' => ''],
                        ['route' => route('combustibles.index'), 'label' => 'Combustibles', 'icon' => ''],
                        ['route' => route('conflictos.index'), 'label' => 'Conflictos', 'icon' => ''],
                    ];
                @endphp
                
                @foreach($menuItems as $item)
                    @php
                        $isActive = request()->is(trim(parse_url($item['route'], PHP_URL_PATH), '/') . '*') || 
                                   (request()->path() === '' && $item['route'] === '/');
                    @endphp
                    <a href="{{ $item['route'] }}" 
                       class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg {{ $isActive ? 'active' : '' }}">
                        <span class="text-lg">{{ $item['icon'] }}</span>
                        <span class="font-medium">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 lg:ml-64">
            <!-- Mobile Header -->
            <header class="lg:hidden fixed top-0 left-0 right-0 bg-[#1a1a1a] border-b border-[#2a2a2a] z-30 p-4 flex items-center justify-between">
                <a href="/" class="flex items-center gap-2">
                    <span class="text-lg font-bold text-[#6b9969]">⚔️ TANKPEDIA</span>
                </a>
                <button class="text-[#f5f5f5] lg:hidden" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </header>

            <!-- Main Content Area -->
            <div class="pt-16 lg:pt-0">
                <!-- Session Messages -->
                @if ($message = session('success'))
                    <div class="bg-green-900/20 border border-green-800 text-green-100 px-6 py-3 rounded-lg m-6 flex items-center justify-between">
                        <span>{{ $message }}</span>
                        <button onclick="this.parentElement.style.display='none'" class="text-green-300 hover:text-green-100">×</button>
                    </div>
                @endif

                @if ($message = session('error'))
                    <div class="bg-red-900/20 border border-red-800 text-red-100 px-6 py-3 rounded-lg m-6 flex items-center justify-between">
                        <span>{{ $message }}</span>
                        <button onclick="this.parentElement.style.display='none'" class="text-red-300 hover:text-red-100">×</button>
                    </div>
                @endif

                <!-- Page Content -->
                <div class="px-4 lg:px-8 py-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-[#0d0d0d] border-t border-[#2a2a2a] mt-12">
        <div class="max-w-7xl mx-auto px-6 py-8 text-center text-[#999999]">
            <p>&copy; 2026 Tankpedia - Enciclopedia de Tanques de Guerra. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const nav = document.getElementById('mobileNav');
            if (nav) nav.classList.toggle('hidden');
        }
    </script>
</body>

</html>