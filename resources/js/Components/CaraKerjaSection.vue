<script setup>
import { Smartphone, Truck, Waves, PackageCheck, CheckCircle2 } from 'lucide-vue-next';

const props = defineProps({
    items: {
        type: Array,
        required: true,
    },
});

const getStepIcon = (iconName) => {
    switch (iconName) {
        case 'Smartphone': return Smartphone;
        case 'Truck': return Truck;
        case 'Waves': return Waves;
        case 'PackageCheck': return PackageCheck;
        default: return CheckCircle2;
    }
};
</script>

<template>
    <section class="w-full bg-surface-container-low py-16 scroll-mt-20 border-t-0" id="cara-kerja">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-12">
                <span class="text-xs sm:text-sm uppercase tracking-wider text-primary-container font-bold">Proses Mudah &amp; Cepat</span>
                <h2 class="text-2xl sm:text-3xl font-bold font-headline text-on-surface tracking-tight mt-1">Cara Kerja yang Praktis</h2>
                <p class="text-sm sm:text-base text-secondary mt-2">
                    Hanya perlu 4 langkah simpel tanpa repot keluar rumah. Cucian beres tepat waktu.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    v-for="item in props.items"
                    :key="item.step"
                    class="group relative bg-surface p-6 rounded-2xl shadow-[0_4px_12px_rgba(0,0,0,0.03)] hover:shadow-[0_16px_30px_rgba(0,0,0,0.08)] hover:-translate-y-1.5 hover:border-primary-container/30 border border-border/40 transition-all duration-300 flex flex-col cursor-default"
                >
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-high group-hover:bg-primary-container group-hover:text-white flex items-center justify-center text-primary-container group-hover:scale-110 transition-all duration-300 shrink-0 shadow-sm">
                            <component :is="getStepIcon(item.icon)" class="w-6 h-6" />
                        </div>
                        <h3 class="text-lg font-bold font-headline text-on-surface leading-snug group-hover:text-primary-container transition-colors">
                            {{ item.title }}
                        </h3>
                    </div>
                    <p class="text-sm text-text-secondary leading-relaxed">
                        {{ item.desc }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
