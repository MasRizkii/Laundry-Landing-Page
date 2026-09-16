<script setup>
import { Sparkles, Truck, Tag } from 'lucide-vue-next';
</script>

<template>
    <section class="relative overflow-hidden pt-8 lg:pt-16 pb-0 bg-surface">
        <!-- Ambient Atmospheric Glow -->
        <div class="absolute top-0 right-1/4 -z-10 w-96 h-96 rounded-full bg-secondary-container/40 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-10 left-10 -z-10 w-80 h-80 rounded-full bg-primary-fixed/30 blur-2xl pointer-events-none"></div>

        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 pb-12 lg:pb-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">
                
                <!-- Left: Value Proposition -->
                <div class="lg:col-span-7 flex flex-col items-start gap-4">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-high text-tertiary text-xs sm:text-sm font-medium border border-tertiary/10">
                        <Sparkles class="w-4 h-4 shrink-0 text-tertiary" />
                        <span>Higienis • Wangi Tahan Lama • Antar-Jemput Gratis</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-headline text-on-surface tracking-tight leading-[1.15] max-w-xl">
                        Cuci Pakaian Tanpa Ribet, <span class="text-primary-container">Kami Jemput Sekarang!</span>
                    </h1>

                    <p class="text-base sm:text-lg text-secondary max-w-lg leading-relaxed">
                        Layanan laundry premium dengan penjemputan gratis di area Anda. Bersih higienis, disetrika rapi, dan diantar tepat waktu langsung ke depan pintu rumah Anda.
                    </p>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto pt-2">
                        <a
                            href="#pickup-form"
                            class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-base font-semibold text-on-primary bg-primary-container hover:bg-primary-hover shadow-[0_10px_25px_-5px_rgba(249,115,22,0.4)] transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0"
                        >
                            <Truck class="w-5 h-5 shrink-0" />
                            <span>Jemput Laundry Saya</span>
                        </a>
                        <a
                            href="#layanan"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-full text-base font-medium text-text-primary bg-surface-container-low hover:bg-surface-container transition-colors border border-border/50"
                        >
                            <Tag class="w-5 h-5 shrink-0 text-text-secondary" />
                            <span>Lihat Tarif Hemat</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Visual Showcase with Original Stitch Image & Floating Badges -->
                <div class="lg:col-span-5 relative mt-4 lg:mt-0">
                    <div class="relative mx-auto max-w-md lg:max-w-none group">
                        <!-- Back glow -->
                        <div class="absolute -inset-2 rounded-[2rem] bg-gradient-to-tr from-secondary-container via-surface-container to-primary-fixed-dim opacity-70 blur-xl group-hover:opacity-90 transition-opacity duration-300"></div>
                        
                        <!-- Main visual card with hover lift -->
                        <div class="relative rounded-2xl overflow-hidden shadow-[0_15px_35px_-10px_rgba(0,0,0,0.1)] group-hover:shadow-[0_20px_40px_-10px_rgba(0,0,0,0.15)] group-hover:-translate-y-1 bg-surface p-2.5 border border-border/50 transition-all duration-300">
                            <img
                                src="/images/hero-towels.jpg"
                                alt="Tumpukan pakaian bersih, lembut, rapi dan higienis hasil layanan LaundryQu"
                                class="w-full h-80 sm:h-96 object-cover rounded-xl group-hover:scale-[1.02] transition-transform duration-500"
                                loading="eager"
                            />
                            <div class="absolute inset-0 rounded-xl pointer-events-none shadow-[inset_0_0_20px_rgba(0,0,0,0.03)]"></div>
                        </div>

                        <!-- Floating Trust Badge 1: Clean & Scent -->
                        <div class="absolute -top-4 -left-4 sm:-left-6 bg-surface/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-[0_8px_20px_rgba(0,0,0,0.08)] hover:shadow-lg flex items-center gap-3 border border-border/50 transition-all duration-300 hover:-translate-y-0.5 animate-bounce" style="animation-duration: 4s;">
                            <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary-container">
                                <Sparkles class="w-5 h-5" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-on-surface">100% Bersih &amp; Wangi</span>
                                <span class="text-xs text-text-secondary">Detergen antibakteri</span>
                            </div>
                        </div>

                        <!-- Floating Trust Badge 2: Free Pickup -->
                        <div class="absolute -bottom-4 -right-4 sm:-right-6 bg-surface/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-[0_8px_20px_rgba(0,0,0,0.08)] hover:shadow-lg flex items-center gap-3 border border-border/50 transition-all duration-300 hover:-translate-y-0.5">
                            <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-tertiary">
                                <Truck class="w-5 h-5" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-on-surface">Gratis Antar-Jemput</span>
                                <span class="text-xs text-text-secondary">Area Kota &amp; Sekitarnya</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Soft Organic Wavy SVG Divider - Seamlessly connecting to bg-surface-container-low -->
        <div class="w-full overflow-hidden leading-none block -mb-[2px]">
            <svg
                class="w-full h-12 sm:h-16 lg:h-24 block align-bottom"
                viewBox="0 0 1440 120"
                fill="none"
                preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M0,32L60,42.7C120,53,240,75,360,74.7C480,75,600,53,720,48C840,43,960,53,1080,64C1200,75,1320,85,1380,90.7L1440,96L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z"
                    fill="#eff4ff"
                ></path>
            </svg>
        </div>
    </section>
</template>
