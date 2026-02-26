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
    x-data="{ sidebarOpen: true, mobileSidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="mobileSidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-40 lg:hidden"
        @click="mobileSidebarOpen = false" x-cloak></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="fixed inset-y-0 left-0 z-50 flex flex-col bg-white border-r border-slate-200 shadow-xl lg:shadow-none transition-all duration-300 ease-in-out transform lg:static lg:translate-x-0"
        :class="{ 'translate-x-0': mobileSidebarOpen, '-translate-x-full': !mobileSidebarOpen }">

        <!-- Sidebar Header (Logo & Toggle) -->
        <div class="h-16 flex items-center justify-between px-4 border-b border-slate-100 shrink-0">
            <a href="#" class="flex items-center gap-3 overflow-hidden"
                :class="!sidebarOpen && 'lg:justify-center'">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-emerald-400 flex items-center justify-center text-white font-bold text-lg shadow-md shrink-0">
                    P
                </div>
                <span
                    class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-dark to-primary whitespace-nowrap transition-opacity duration-300"
                    :class="!sidebarOpen ? 'lg:opacity-0 lg:w-0' : 'opacity-100'">
                    Petshop
                </span>
            </a>

            <!-- Mobile Close Button -->
            <button @click="mobileSidebarOpen = false"
                class="lg:hidden p-1.5 text-muted hover:text-dark hover:bg-slate-100 rounded-lg transition-colors">
                <i class="ph ph-x text-xl"></i>
            </button>
        </div>

        <!-- Sidebar Content (Navigation) -->
        <div
            class="flex-1 overflow-y-auto py-4 scrollbar-thin scrollbar-thumb-slate-200 hover:scrollbar-thumb-slate-300 px-3">
            <ul class="space-y-1.5">
                <!-- Nav Item: Home -->
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200 group text-primary bg-primary/10 relative overflow-hidden"
                        title="Dashboard">
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary rounded-r-full"></div>
                        <i class="ph ph-squares-four text-xl shrink-0 transition-transform group-hover:scale-110"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'lg:opacity-0 lg:w-0' : 'opacity-100'">
                            Dashboard
                        </span>
                    </a>
                </li>

                <!-- Section Label -->
                <li x-show="sidebarOpen" class="px-3 pt-4 pb-2 lg:block" :class="!sidebarOpen && 'lg:hidden'">
                    <p class="text-[11px] font-bold tracking-wider text-slate-400 uppercase">Manajemen Data</p>
                </li>

                <!-- Nav Item: Data Category -->
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-muted hover:text-dark hover:bg-slate-100 transition-all duration-200 group relative"
                        title="Data Kategori">
                        <i
                            class="ph ph-folder-notch text-xl shrink-0 transition-transform group-hover:scale-110 group-hover:text-secondary"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'lg:opacity-0 lg:w-0' : 'opacity-100'">
                            Data Kategori
                        </span>
                    </a>
                </li>

                <!-- Nav Item: Data Hewan -->
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-muted hover:text-dark hover:bg-slate-100 transition-all duration-200 group relative"
                        title="Data Hewan">
                        <i
                            class="ph ph-paw-print text-xl shrink-0 transition-transform group-hover:scale-110 group-hover:text-emerald-500"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'lg:opacity-0 lg:w-0' : 'opacity-100'">
                            Data Hewan
                        </span>
                    </a>
                </li>

                <!-- Nav Item: Data Produk -->
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-muted hover:text-dark hover:bg-slate-100 transition-all duration-200 group relative"
                        title="Data Produk">
                        <i
                            class="ph ph-package text-xl shrink-0 transition-transform group-hover:scale-110 group-hover:text-blue-500"></i>
                        <span class="font-medium whitespace-nowrap transition-opacity duration-300"
                            :class="!sidebarOpen ? 'lg:opacity-0 lg:w-0' : 'opacity-100'">
                            Data Produk
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Footer & Toggle -->
        <div class="p-4 border-t border-slate-100 shrink-0">
            <button @click="sidebarOpen = !sidebarOpen"
                class="hidden lg:flex w-full items-center justify-center p-2 rounded-xl text-muted hover:text-dark hover:bg-slate-100 transition-colors bg-slate-50 border border-slate-200">
                <i class="ph text-xl transition-transform duration-300"
                    :class="sidebarOpen ? 'ph-caret-left' : 'ph-caret-right'"></i>
            </button>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-50 overflow-hidden relative">

        <!-- Header -->
        <header
            class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-4 lg:px-8 shrink-0 z-30 sticky top-0 shadow-sm/50">
            <!-- Left Header -->
            <div class="flex items-center gap-4">
                <button @click="mobileSidebarOpen = true"
                    class="lg:hidden p-2 text-muted hover:text-dark hover:bg-slate-100 rounded-lg transition-colors">
                    <i class="ph ph-list text-2xl"></i>
                </button>

                <!-- Page Title Route (Optional, can be dynamic) -->
                <h2 class="text-xl font-bold text-dark hidden sm:block">{{ $headerTitle ?? 'DashboardOverview' }}</h2>
            </div>

            <!-- Right Header Actions -->
            <div class="flex items-center gap-4">

                <!-- Notifications -->
                <button
                    class="relative p-2 text-muted hover:text-primary hover:bg-primary/5 rounded-full transition-colors group">
                    <i class="ph ph-bell text-xl group-hover:animate-wiggle"></i>
                    <span
                        class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
                </button>

                <!-- Divider -->
                <div class="h-6 w-px bg-slate-200 hidden sm:block"></div>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ profileOpen: false }" @click.away="profileOpen = false">
                    <button @click="profileOpen = !profileOpen"
                        class="flex items-center gap-3 p-1.5 pr-3 rounded-full hover:bg-slate-100 border border-transparent hover:border-slate-200 transition-all">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=10b981&color=fff&rounded=true"
                            alt="Admin Profile" class="w-8 h-8 rounded-full shadow-sm">
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
                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-2 z-50 origin-top-right"
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

        <!-- Main Content Area -->
        <main
            class="flex-1 overflow-y-auto overflow-x-hidden p-4 lg:p-8 scroll-smooth scrollbar-thin scrollbar-thumb-slate-200">
            <!-- Decorative Background blob in main area -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10 pointer-events-none">
            </div>

            <div class="mx-auto max-w-7xl animate-fade-up">
                {{ $slot }}
            </div>

            <!-- Footer directly inside main scroll area -->
            <footer
                class="mt-12 py-6 border-t border-slate-200/60 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-muted">
                <p>&copy; {{ date('Y') }} <span class="font-semibold text-primary">Petshop</span>. All rights
                    reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="hover:text-dark transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-dark transition-colors">Terms of Service</a>
                </div>
            </footer>
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
</body>

</html>
