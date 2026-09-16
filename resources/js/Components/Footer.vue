<script setup>
import InstagramIcon from './Icons/InstagramIcon.vue';
import TikTokIcon from './Icons/TikTokIcon.vue';

const props = defineProps({
    laundry: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <footer class="w-full bg-inverse-surface text-inverse-on-surface">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                
                <!-- Col 1: Brand Info -->
                <div class="md:col-span-4 flex flex-col gap-3">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold font-headline text-inverse-on-surface tracking-tight">
                            {{ props.laundry.brand_name }}
                        </span>
                    </div>
                    <p class="text-sm text-surface-variant max-w-sm leading-relaxed">
                        Layanan laundry higienis, cepat, dan terpercaya dengan penjemputan serta pengantaran langsung ke depan pintu Anda.
                    </p>
                </div>

                <!-- Col 2: Jam Operasional -->
                <div class="md:col-span-4 flex flex-col gap-2">
                    <span class="text-xs font-bold text-inverse-on-surface tracking-wider uppercase mb-1">Jam Operasional</span>
                    <p class="text-sm text-surface-variant">{{ props.laundry.jam_operasional }}</p>
                    <p class="text-sm text-primary-fixed-dim font-medium mt-1">Layanan Antar-Jemput Gratis</p>
                </div>

                <!-- Col 3: Kontak Cepat & Media Sosial Kami -->
                <div class="md:col-span-4 flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-bold text-inverse-on-surface tracking-wider uppercase">Kontak Cepat</span>
                        <p class="text-sm text-surface-variant">Pemesanan Instan via WhatsApp</p>
                        <p class="text-sm text-surface-variant font-medium">Customer Care: {{ props.laundry.whatsapp_admin_display }}</p>
                    </div>

                    <!-- Media Sosial Kami (Instagram & TikTok) -->
                    <div class="flex flex-col gap-2 pt-2 border-t border-white/10">
                        <span class="text-xs font-bold text-inverse-on-surface tracking-wider uppercase">Media Sosial Kami</span>
                        <div class="flex items-center gap-3">
                            <!-- Instagram -->
                            <a
                                :href="props.laundry.social?.instagram?.url || 'https://instagram.com'"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors duration-200 text-xs font-medium"
                                aria-label="Instagram LaundryQu"
                            >
                                <InstagramIcon class="w-4 h-4 text-[#E1306C]" />
                                <span>{{ props.laundry.social?.instagram?.name || 'Instagram' }}</span>
                            </a>

                            <!-- TikTok -->
                            <a
                                :href="props.laundry.social?.tiktok?.url || 'https://tiktok.com'"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors duration-200 text-xs font-medium"
                                aria-label="TikTok LaundryQu"
                            >
                                <TikTokIcon class="w-4 h-4 text-[#25F4EE]" />
                                <span>{{ props.laundry.social?.tiktok?.name || 'TikTok' }}</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-surface-dim text-xs">
                <p>© {{ props.laundry.copyright_year }} {{ props.laundry.brand_name }}. Seluruh hak cipta dilindungi undang-undang.</p>
                <p class="font-medium text-surface-dim">Higienis • Cepat • Terpercaya</p>
            </div>
        </div>
    </footer>
</template>
