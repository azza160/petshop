<section class="py-24 bg-white relative overflow-hidden" id="statistik">
    <!-- Decorative Background Shapes -->
    <div class="absolute top-0 right-0 w-full h-full overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-secondary/5 rounded-full blur-3xl"></div>
    </div>

    <div class="px-4 xl:max-w-[1300px] mx-auto">
        <!-- Reusable Heading Section Component -->
        <x-heading-section 
            title="Pencapaian & Jejak Langkah Kami" 
            subtitle="Statistik & Kepercayaan" 
            align="center"
        />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-20 items-center mt-12 md:mt-16">
            
            <!-- Left: Promotional Text & Info -->
            <div class="flex flex-col gap-8" data-aos="fade-right" data-aos-delay="100">
                <div class="space-y-6">
                    <h3 class="text-3xl md:text-4xl lg:text-[40px] font-bold text-dark leading-snug relative inline-block">
                        Bukti Nyata Dedikasi Kami untuk <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-emerald-500 relative z-10">Kebahagiaan Hewan</span>
                        <!-- Decorative underline -->
                        <span class="absolute bottom-2 left-0 w-full h-3 bg-secondary/20 -z-10 transform -rotate-1 rounded-full"></span>
                    </h3>
                    
                    <p class="text-muted text-lg leading-relaxed">
                        Kami sangat bangga dengan setiap senyuman pelanggan dan setiap peliharaan yang sehat berkat layanan kami. 
                        Ribuan produk berkualitas telah terdistribusi, dan banyak sahabat berbulu telah menemukan keluarga baru yang penuh kasih sayang. 
                        Bergabunglah dengan komunitas kami yang terus berkembang!
                    </p>
                </div>

                <!-- Engaging UI Element -->
                <div class="flex flex-col gap-5 mt-2">
                    <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100 hover:shadow-md transition-shadow group">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-dark font-bold text-lg">Layanan Berkualitas</p>
                            <p class="text-sm text-muted">Kepuasan Anda dan kenyamanan hewan adalah prioritas.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100 hover:shadow-md transition-shadow group">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 text-secondary flex items-center justify-center shrink-0 group-hover:bg-secondary group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-dark font-bold text-lg">Produk Terlengkap</p>
                            <p class="text-sm text-muted">Ribuan produk dari berbagai merek ternama.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="#" class="btn-primary inline-flex items-center justify-center shadow-lg shadow-primary/30 group w-full sm:w-auto">
                        <span class="flex items-center gap-2">
                            Jadi Bagian dari Kami
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Right: 4 Statistic Cards Grid -->
            <!-- pb-8 or lg:pb-12 to accommodate the translated items -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6 pb-4 md:pb-12" data-aos="fade-left" data-aos-delay="200">
                
                <!-- Card 1: Total Pelanggan -->
                <div class="relative overflow-hidden rounded-[2rem] aspect-square sm:aspect-[4/5] lg:aspect-square group bg-white shadow-xl flex flex-col justify-end">
                    <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?q=80&w=2669&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Pelanggan Setia">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/90 via-dark/40 to-transparent group-hover:from-dark/95 transition-all"></div>
                    
                    <div class="relative z-10 p-6 md:p-8 transform transition-transform group-hover:-translate-y-2">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-2xl mb-4 text-white ring-1 ring-white/50">
                            🧑‍🤝‍🧑
                        </div>
                        <h4 class="text-4xl md:text-5xl font-bold text-white mb-1">15k<span class="text-primary">+</span></h4>
                        <p class="text-slate-200 font-medium">Pelanggan Setia</p>
                    </div>
                </div>

                <!-- Card 2: Total Product Terjual (Offset down) -->
                <div class="relative overflow-hidden rounded-[2rem] aspect-square sm:aspect-[4/5] lg:aspect-square group bg-white shadow-xl flex flex-col justify-end sm:translate-y-8 lg:translate-y-12">
                    <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?q=80&w=2688&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Produk Terjual">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/90 via-dark/40 to-transparent group-hover:from-dark/95 transition-all"></div>
                    
                    <div class="relative z-10 p-6 md:p-8 transform transition-transform group-hover:-translate-y-2">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-2xl mb-4 text-white ring-1 ring-white/50">
                            📦
                        </div>
                        <h4 class="text-4xl md:text-5xl font-bold text-white mb-1">50k<span class="text-secondary">+</span></h4>
                        <p class="text-slate-200 font-medium">Produk Terjual</p>
                    </div>
                </div>

                <!-- Card 3: Hewan Adopsi -->
                <div class="relative overflow-hidden rounded-[2rem] aspect-square sm:aspect-[4/5] lg:aspect-square group bg-white shadow-xl flex flex-col justify-end mt-4 sm:mt-0">
                    <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=2574&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Hewan Adopsi">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/40 to-transparent group-hover:from-blue-900/95 transition-all"></div>
                    
                    <div class="relative z-10 p-6 md:p-8 transform transition-transform group-hover:-translate-y-2">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-2xl mb-4 text-white ring-1 ring-white/50">
                            🐾
                        </div>
                        <h4 class="text-4xl md:text-5xl font-bold text-white mb-1">2.5k<span class="text-blue-400">+</span></h4>
                        <p class="text-slate-200 font-medium">Hewan Adopsi</p>
                    </div>
                </div>

                <!-- Card 4: Kepuasan Pelanggan (Offset down) -->
                <div class="relative overflow-hidden rounded-[2rem] aspect-square sm:aspect-[4/5] lg:aspect-square group bg-white shadow-xl flex flex-col justify-end mt-4 sm:mt-0 sm:translate-y-8 lg:translate-y-12">
                    <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?q=80&w=2786&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Kepuasan Pelanggan">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/90 via-emerald-900/40 to-transparent group-hover:from-emerald-900/95 transition-all"></div>
                    
                    <div class="relative z-10 p-6 md:p-8 transform transition-transform group-hover:-translate-y-2">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-2xl mb-4 text-white ring-1 ring-white/50">
                            💖
                        </div>
                        <h4 class="text-4xl md:text-5xl font-bold text-white mb-1">99<span class="text-emerald-400">%</span></h4>
                        <p class="text-slate-200 font-medium">Tingkat Kepuasan</p>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</section>
