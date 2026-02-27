<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - Petshop</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Phosphor Icons (for clean, modern icons) -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Vite CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-primary selection:text-white flex h-screen overflow-hidden"
    x-data="{ sidebarOpen: false }">

    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 sm:hidden"
        @click="sidebarOpen = false" x-transition.opacity.duration.300ms x-cloak></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'w-64 absolute sm:relative shadow-2xl sm:shadow-none h-full' : 'w-20 relative h-full'"
        class="flex flex-col bg-white border-r border-slate-200 transition-all duration-300 ease-in-out overflow-x-hidden shrink-0 z-50">

        <!-- Sidebar Header (Logo & Toggle) -->
        <div class="h-16 flex items-center justify-between px-4 border-b border-slate-100 shrink-0">
            <a href="#" class="flex items-center gap-3 overflow-hidden"
                :class="!sidebarOpen && 'justify-center w-full'">
                <div
                    class="w-8 h-8 rounded-md bg-gradient-to-br from-primary to-emerald-400 flex items-center justify-center text-white font-bold text-lg shadow-md shrink-0">
                    P
                </div>
                <span
                    class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-dark to-primary whitespace-nowrap transition-opacity duration-300"
                    :class="!sidebarOpen ? 'opacity-0 w-0' : 'opacity-100'">
                    Petshop
                </span>
            </a>
        </div>

        <!-- Sidebar Content (Navigation) -->
        <div
            class="flex-1 overflow-y-auto overflow-x-hidden py-4 scrollbar-thin scrollbar-thumb-slate-200 hover:scrollbar-thumb-slate-300 px-3">
            <ul class="space-y-1.5">
                <li>
                    <a href="{{ route('admin') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-md transition-all duration-200 group {{ request()->routeIs('admin') ? 'text-primary bg-primary/10 relative overflow-hidden' : 'text-muted hover:text-dark hover:bg-slate-100' }}"
                        title="Dashboard">
                        @if (request()->routeIs('admin'))
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary rounded-r-md"></div>
                        @endif
                        <i class="ph ph-squares-four text-xl shrink-0 transition-transform group-hover:scale-110"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'opacity-0 w-0' : 'opacity-100'">
                            Dashboard
                        </span>
                    </a>
                </li>

                <!-- Section Label -->
                <li x-show="sidebarOpen" class="px-3 pt-4 pb-2 transition-all duration-300"
                    :class="!sidebarOpen && 'hidden'">
                    <p class="text-[11px] font-bold tracking-wider text-slate-400 uppercase">Manajemen Data</p>
                </li>

                <li>
                    <a href="{{ route('admin.category') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-md transition-all duration-200 group {{ request()->routeIs('admin.category') ? 'text-primary bg-primary/10 relative overflow-hidden' : 'text-muted hover:text-dark hover:bg-slate-100' }}"
                        title="Data Kategori">
                        @if (request()->routeIs('admin.category'))
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary rounded-r-md"></div>
                        @endif
                        <i
                            class="ph ph-folder-notch text-xl shrink-0 transition-transform group-hover:scale-110 group-hover:text-secondary"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'opacity-0 w-0' : 'opacity-100'">
                            Data Kategori
                        </span>
                    </a>
                </li>

                <!-- Nav Item: Data Hewan -->
                <li>
                    <a href="{{ route('admin.hewan') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-md transition-all duration-200 group {{ request()->routeIs('admin.hewan') || request()->routeIs('admin.hewan.detail') ? 'text-primary bg-primary/10 relative overflow-hidden' : 'text-muted hover:text-dark hover:bg-slate-100' }}"
                        title="Data Hewan">
                        @if (request()->routeIs('admin.hewan') || request()->routeIs('admin.hewan.detail'))
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary rounded-r-md"></div>
                        @endif
                        <i
                            class="ph ph-paw-print text-xl shrink-0 transition-transform group-hover:scale-110 group-hover:text-emerald-500"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'opacity-0 w-0' : 'opacity-100'">
                            Data Hewan
                        </span>
                    </a>
                </li>

                <!-- Nav Item: Data Produk -->
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-md text-muted hover:text-dark hover:bg-slate-100 transition-all duration-200 group relative"
                        title="Data Produk">
                        <i
                            class="ph ph-package text-xl shrink-0 transition-transform group-hover:scale-110 group-hover:text-blue-500"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'opacity-0 w-0' : 'opacity-100'">
                            Data Produk
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Footer & Toggle -->
        <div class="p-4 border-t border-slate-100 shrink-0">
            <button @click="sidebarOpen = !sidebarOpen"
                class="flex w-full items-center justify-center p-3 rounded-md text-white bg-primary hover:bg-emerald-600 shadow-md shadow-primary/30 transition-all duration-300 group">
                <i class="ph text-xl transition-transform duration-300 group-hover:scale-110"
                    :class="sidebarOpen ? 'ph-caret-left' : 'ph-caret-right'"></i>
            </button>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-50 overflow-hidden relative" x-data="{ scrolled: false }">

        <!-- Header -->
        <header
            class="h-16 bg-white/95 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-4 lg:px-8 shrink-0 z-30 sticky top-0 transition-shadow duration-300"
            :class="{ 'shadow-md': scrolled, 'shadow-none': !scrolled }">
            <!-- Left Header -->
            <div class="flex items-center gap-4">
                <!-- Page Title Route (Optional, can be dynamic) -->
                <h2 class="text-xl font-bold text-dark">{{ $headerTitle ?? 'DashboardOverview' }}</h2>
            </div>

            <!-- Right Header Actions -->
            <div class="flex items-center gap-4">

                <!-- Notifications -->
                <button
                    class="relative p-2 text-muted hover:text-primary hover:bg-primary/5 rounded-md transition-colors group">
                    <i class="ph ph-bell text-xl group-hover:animate-wiggle"></i>
                    <span
                        class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
                </button>

                <!-- Divider -->
                <div class="h-6 w-px bg-slate-200 hidden sm:block"></div>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ profileOpen: false }" @click.away="profileOpen = false">
                    <button @click="profileOpen = !profileOpen"
                        class="flex items-center gap-3 p-1.5 pr-3 rounded-md hover:bg-slate-100 border border-transparent hover:border-slate-200 transition-all">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=10b981&color=fff&rounded=true"
                            alt="Admin Profile" class="w-8 h-8 bg-transparent">
                        <div class="hidden md:flex flex-col text-left">
                            <span class="text-sm font-semibold text-dark leading-tight">Admin Petshop</span>
                            <span class="text-[10px] text-muted font-medium">Administrator</span>
                        </div>
                        <i class="ph ph-caret-down text-muted text-sm transition-transform duration-200 hidden md:block"
                            :class="profileOpen && 'rotate-180'"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="profileOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-slate-100 py-2 z-50 origin-top-right overflow-hidden"
                        x-cloak>

                        <div class="px-4 py-2 border-b border-slate-100 md:hidden pb-3 mb-2">
                            <p class="text-sm font-semibold text-dark">Admin Petshop</p>
                            <p class="text-xs text-muted">Administrator</p>
                        </div>

                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:text-primary hover:bg-primary/5 transition-colors">
                            <i class="ph ph-user-circle text-lg"></i>
                            My Profile
                        </a>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:text-primary hover:bg-primary/5 transition-colors">
                            <i class="ph ph-gear text-lg"></i>
                            Settings
                        </a>
                        <div class="h-px bg-slate-100 my-2"></div>
                        <form method="POST" action="#"> <!-- Assuming logout route -->
                            @csrf
                            <button type="button"
                                class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <i class="ph ph-sign-out text-lg"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area with sticky footer handling -->
        <main @scroll="scrolled = $event.target.scrollTop > 10"
            class="flex-1 overflow-y-auto overflow-x-hidden scroll-smooth scrollbar-thin scrollbar-thumb-slate-200 relative">
            <div class="min-h-full flex flex-col">
                <!-- Decorative Background blob in main area -->
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10 pointer-events-none">
                </div>

                <div class="p-4 lg:p-8 w-full max-w-7xl mx-auto flex-1 animate-fade-up">
                    {{ $slot }}
                </div>

                <!-- Footer (now at the bottom of the content thread natively) -->
                <footer class="w-full shrink-0 bg-gradient-to-r from-primary to-emerald-600 relative overflow-hidden">
                    <!-- Decorative Elements -->
                    <div
                        class="absolute top-0 right-[-10%] w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div
                        class="absolute bottom-[-20%] left-[-5%] w-48 h-48 bg-secondary/20 rounded-full blur-2xl pointer-events-none">
                    </div>

                    <div
                        class="relative z-10 px-6 py-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-6 text-white">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-md bg-white/20 backdrop-blur-sm flex items-center justify-center text-xl shadow-inner border border-white/30 shrink-0">
                                🐾
                            </div>
                            <div>
                                <p class="font-semibold text-lg leading-tight">Petshop Admin</p>
                                <p class="text-emerald-100 text-xs sm:text-sm">&copy; {{ date('Y') }} All rights
                                    reserved.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-6 text-sm font-medium">
                            <a href="#"
                                class="text-emerald-50 hover:text-white transition-colors relative group">
                                Privacy Policy
                                <span
                                    class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                            </a>
                            <a href="#"
                                class="text-emerald-50 hover:text-white transition-colors relative group">
                                Terms of Service
                                <span
                                    class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                offset: 50,
                duration: 600,
                easing: 'ease-out-cubic',
            });
        });

        // Add custom wiggle animation for notification bell
        tailwind.config = {
            theme: {
                extend: {
                    keyframes: {
                        wiggle: {
                            '0%, 100%': {
                                transform: 'rotate(-3deg)'
                            },
                            '50%': {
                                transform: 'rotate(3deg)'
                            },
                        }
                    },
                    animation: {
                        wiggle: 'wiggle 1s ease-in-out infinite',
                    }
                }
            }
        }
    </script>

    @stack('modals')

    <!-- Global Image Modal -->
    <div x-data="{
        open: false,
        src: ''
    }" @open-global-image.window="src = $event.detail.src; open = true" x-show="open"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-8 bg-slate-900/90 backdrop-blur-md"
        x-cloak>

        <button @click="open = false"
            class="absolute top-4 right-4 sm:top-8 sm:right-8 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full w-12 h-12 flex items-center justify-center transition backdrop-blur z-[10000]">
            <i class="ph ph-x text-2xl font-bold"></i>
        </button>

        <img :src="src" @click.away="open = false"
            class="max-w-full max-h-full object-contain rounded-md shadow-2xl ring-1 ring-white/10">
    </div>
</body>

</html>
