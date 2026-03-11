<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login &mdash; Petshop</title>
    <meta name="description" content="Masuk ke akun Petshop Anda.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body
    class="bg-slate-50 font-[Poppins] antialiased text-slate-800 selection:bg-primary selection:text-white min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Decorative Background Shapes -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
        <div
            class="absolute -top-[20%] -right-[10%] w-[70vw] h-[70vw] rounded-full bg-gradient-to-br from-primary/10 to-emerald-400/5 blur-3xl">
        </div>
        <div
            class="absolute -bottom-[20%] -left-[10%] w-[60vw] h-[60vw] rounded-full bg-gradient-to-tr from-secondary/10 to-amber-300/5 blur-3xl">
        </div>
    </div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-[420px] px-4 py-8 animate-fade-up">

        <!-- Back to Home -->
        <div class="mb-6 text-center">
            <a href="{{ url('/') }}"
                class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-white shadow-sm border border-slate-100 text-primary hover:text-emerald-700 hover:bg-slate-50 transition-all hover:scale-105 hover:shadow-md group">
                <i class="ph ph-house text-xl group-hover:-translate-y-0.5 transition-transform"></i>
            </a>
        </div>

        <!-- Form Card -->
        <div
            class="bg-white/80 backdrop-blur-xl border border-white shadow-2xl shadow-primary/10 rounded-3xl p-8 lg:p-10">

            <!-- Header section -->
            <div class="text-center mb-8">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg shadow-primary/30 rotate-3 cursor-default hover:rotate-6 transition-transform">
                    <span class="text-white font-bold text-3xl">P</span>
                </div>
                <h1 class="text-2xl font-bold text-dark mb-1">Selamat Datang Kembali!</h1>
                <p class="text-sm text-muted">Silakan masuk ke akun Anda.</p>
            </div>

            <!-- Error Alerts (If any) -->
            @if (session('error') || $errors->any())
                <div
                    class="bg-red-50 text-red-600 p-4 rounded-xl text-sm border border-red-100 flex items-start gap-3 mb-6">
                    <i class="ph ph-warning-circle text-lg mt-0.5 shrink-0"></i>
                    <div>
                        @if (session('error'))
                            <p class="font-medium">{{ session('error') }}</p>
                        @endif
                        @if ($errors->any())
                            <ul class="list-disc pl-4 mt-1 space-y-1">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="#" method="POST" class="space-y-5">
                @csrf

                <!-- Username Input -->
                <div>
                    <label for="username"
                        class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Username</label>
                    <div class="relative group">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                            <i class="ph ph-user text-lg"></i>
                        </div>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required
                            autofocus placeholder="Masukkan username Anda"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl text-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300">
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password"
                        class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Password</label>
                    <div class="relative group" x-data="{ show: false }">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                            <i class="ph ph-lock-key text-lg"></i>
                        </div>
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required
                            placeholder="••••••••"
                            class="block w-full pl-11 pr-12 py-3 bg-slate-50/50 border border-slate-200 rounded-xl text-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300">

                        <!-- Toggle Password Visibility -->
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition cursor-pointer">
                            <i class="ph text-lg" :class="show ? 'ph-eye-slash' : 'ph-eye'"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="relative w-full py-3.5 px-4 bg-gradient-to-r from-primary to-emerald-500 text-white font-bold rounded-xl text-sm shadow-lg shadow-primary/25 hover:shadow-primary/40 hover:-translate-y-0.5 transition-all duration-300 overflow-hidden group">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Masuk Sekarang
                            <i class="ph ph-sign-in text-lg group-hover:translate-x-1 transition-transform"></i>
                        </span>
                        <!-- Subtle hover flash -->
                        <div
                            class="absolute inset-0 h-full w-full bg-white/20 scale-x-0 group-hover:scale-x-100 transform origin-left transition-transform duration-500 rounded-xl">
                        </div>
                    </button>
                </div>
            </form>

        </div>

        <!-- Footer simple -->
        <p class="text-center text-xs text-slate-400 mt-8 font-medium">
            &copy; {{ date('Y') }} Petshop. All rights reserved.
        </p>
    </div>

</body>

</html>
