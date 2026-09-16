<script setup>
import { Clock, Truck, ShieldCheck, MapPin, ExternalLink } from 'lucide-vue-next';
import WhatsAppIcon from './Icons/WhatsAppIcon.vue';

const props = defineProps({
    laundry: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <!-- Section Lokasi with Living Ambient Gradient Background -->
    <section class="relative w-full py-24 bg-gradient-to-br from-[#f8f9ff] via-[#eff6ff] to-[#e0f2fe]/40 border-t border-border/50 scroll-mt-20 overflow-hidden" id="hubungi-kami">
        <!-- Ambient decorative shapes -->
        <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-secondary-container/30 blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute top-10 right-10 w-96 h-96 rounded-full bg-primary-fixed/20 blur-3xl pointer-events-none -z-10"></div>

        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                
                <!-- Left Column: Operasional & Coverage -->
                <div class="lg:col-span-6 flex flex-col justify-between bg-surface/95 backdrop-blur-sm rounded-2xl p-6 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] hover:shadow-[0_16px_32px_rgba(0,0,0,0.06)] hover:-translate-y-1 border border-border/40 transition-all duration-300">
                    <div class="flex flex-col gap-6">
                        <div>
                            <span class="text-xs uppercase tracking-wider text-primary-container font-bold">Cakupan Area &amp; Jadwal</span>
                            <h3 class="text-2xl font-bold font-headline text-on-surface mt-1">Detail Operasional Outlet</h3>
                        </div>

                        <!-- Operational hours item -->
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-surface flex items-center justify-center text-tertiary shrink-0 shadow-sm">
                                <Clock class="w-5 h-5 text-tertiary" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-on-surface">Jam Operasional</span>
                                <span class="text-xs sm:text-sm text-text-secondary">{{ props.laundry.jam_operasional }}</span>
                            </div>
                        </div>

                        <!-- Free Area item -->
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-surface flex items-center justify-center text-primary-container shrink-0 shadow-sm">
                                <Truck class="w-5 h-5 text-primary-container" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-on-surface">Area Pickup Gratis</span>
                                <span class="text-xs sm:text-sm text-text-secondary">{{ props.laundry.area_pickup_gratis }} ({{ props.laundry.radius_layanan }}).</span>
                            </div>
                        </div>

                        <!-- Guarantee item -->
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-surface flex items-center justify-center text-whatsapp-green shrink-0 shadow-sm">
                                <ShieldCheck class="w-5 h-5 text-whatsapp-green" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-on-surface">Jaminan &amp; Garansi</span>
                                <span class="text-xs sm:text-sm text-text-secondary">Garansi tepat waktu &amp; perlindungan pakaian aman dari luntur ataupun tertukar.</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-surface-container flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <span class="text-sm text-text-secondary">Butuh penjemputan di luar area kami?</span>
                        <a
                            :href="`https://wa.me/${props.laundry.whatsapp_admin_number}`"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full text-sm text-on-primary bg-whatsapp-green hover:brightness-95 shadow-[0_4px_12px_rgba(37,211,102,0.3)] transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0 font-semibold shrink-0"
                        >
                            <WhatsAppIcon class="w-4 h-4 text-white shrink-0" />
                            <span>Konsultasi via WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Interactive Map Box -->
                <div class="lg:col-span-6 flex flex-col bg-surface/95 backdrop-blur-sm rounded-2xl p-6 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] hover:shadow-[0_16px_32px_rgba(0,0,0,0.06)] hover:-translate-y-1 border border-border/40 justify-between transition-all duration-300">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-tertiary font-bold">Pusat Workshop</span>
                                <h4 class="text-xl font-bold font-headline text-on-surface">{{ props.laundry.lokasi.nama_hub }}</h4>
                            </div>
                        </div>

                        <!-- Map View Box -->
                        <div class="w-full h-64 rounded-xl bg-surface-container relative overflow-hidden flex flex-col items-center justify-center text-center p-6 shadow-inner group border border-border/40">
                            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#006398_1px,transparent_1px)] [background-size:16px_16px]"></div>
                            <div class="relative z-10 w-12 h-12 rounded-full bg-primary-container text-on-primary flex items-center justify-center shadow-lg mb-3 group-hover:scale-110 transition-transform duration-300">
                                <MapPin class="w-6 h-6 text-white" />
                            </div>
                            <p class="relative z-10 text-base font-bold text-on-surface">{{ props.laundry.lokasi.alamat_lengkap }}</p>
                            <p class="relative z-10 text-xs sm:text-sm text-text-secondary max-w-xs mt-1">
                                {{ props.laundry.lokasi.keterangan }}
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <span class="text-xs sm:text-sm text-text-secondary">Arahkan navigasi rute ke outlet kami</span>
                        <a
                            :href="props.laundry.lokasi.maps_url"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-on-surface bg-surface-container-high hover:bg-surface-container transition-colors border border-border/50 hover:text-primary-container"
                        >
                            <ExternalLink class="w-4 h-4 text-text-secondary" />
                            <span>Buka di Google Maps</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>
