<script setup>
import { Zap, Sparkles, CheckCircle2 } from 'lucide-vue-next';

const props = defineProps({
    layanan: {
        type: Array,
        required: true,
    },
});

const emit = defineEmits(['select-service']);

const handleSelect = (serviceSelectValue) => {
    emit('select-service', serviceSelectValue);
};
</script>

<template>
    <section class="w-full py-20 bg-surface scroll-mt-20" id="layanan">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-12">
                <span class="text-xs sm:text-sm uppercase tracking-wider text-primary-container font-bold">Harga Sahabat &amp; Jujur</span>
                <h2 class="text-2xl sm:text-3xl font-bold font-headline text-on-surface tracking-tight mt-1">Pilihan Layanan &amp; Tarif Transparan</h2>
                <p class="text-sm sm:text-base text-secondary mt-2">
                    Tanpa biaya tersembunyi. Timbangan tepat disaksikan langsung saat penjemputan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                <div
                    v-for="item in props.layanan"
                    :key="item.id"
                    :class="[
                        'rounded-2xl p-6 flex flex-col justify-between transition-all duration-300 group',
                        item.is_populer
                            ? 'relative bg-surface shadow-[0_12px_30px_rgba(249,115,22,0.14)] ring-2 ring-primary-container md:-translate-y-2 hover:-translate-y-3 hover:shadow-[0_20px_40px_rgba(249,115,22,0.22)]'
                            : 'bg-surface-alt shadow-[0_4px_16px_rgba(0,0,0,0.04)] hover:shadow-[0_16px_36px_rgba(0,0,0,0.09)] hover:-translate-y-2 border border-border/50 hover:border-primary-container/40'
                    ]"
                >
                    <!-- Most Popular Floating Badge -->
                    <div
                        v-if="item.is_populer"
                        class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-primary-container text-on-primary text-xs px-4 py-1 rounded-full shadow-sm uppercase tracking-wider font-bold whitespace-nowrap"
                    >
                        {{ item.populer_badge }}
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3 pt-1">
                            <span
                                :class="[
                                    'px-3 py-1 rounded-full text-xs font-semibold transition-colors',
                                    item.is_populer
                                        ? 'bg-primary-fixed text-on-primary-fixed-variant'
                                        : 'bg-surface-container text-tertiary group-hover:bg-primary-fixed group-hover:text-primary-container'
                                ]"
                            >
                                {{ item.badge }}
                            </span>
                            <Zap v-if="item.is_populer" class="w-5 h-5 text-primary-container animate-pulse" />
                            <Sparkles v-else class="w-5 h-5 text-text-secondary group-hover:text-primary-container transition-colors" />
                        </div>

                        <h3 class="text-xl font-bold font-headline text-on-surface group-hover:text-primary-container transition-colors">
                            {{ item.nama }}
                        </h3>
                        <p class="text-sm text-text-secondary mt-1 min-h-[40px]">
                            {{ item.deskripsi }}
                        </p>

                        <div class="my-6 pb-4 border-b border-surface-container">
                            <div class="flex items-baseline gap-1">
                                <span
                                    :class="[
                                        'text-3xl font-bold font-headline transition-transform group-hover:scale-105 inline-block origin-left',
                                        item.is_populer ? 'text-primary-container' : 'text-on-surface'
                                    ]"
                                >
                                    {{ item.harga_display }}
                                </span>
                                <span class="text-sm text-text-secondary">{{ item.unit }}</span>
                            </div>
                            <span class="text-xs font-medium text-text-secondary block mt-1">
                                {{ item.catatan_harga }}
                            </span>
                        </div>

                        <ul class="flex flex-col gap-2.5 text-sm text-on-surface mb-6">
                            <li
                                v-for="(fitur, idx) in item.fitur"
                                :key="idx"
                                class="flex items-start gap-2.5"
                            >
                                <CheckCircle2
                                    :class="[
                                        'w-4 h-4 mt-0.5 shrink-0',
                                        item.is_populer ? 'text-primary-container' : 'text-whatsapp-green'
                                    ]"
                                />
                                <span class="text-text-primary text-xs sm:text-sm">{{ fitur }}</span>
                            </li>
                        </ul>
                    </div>

                    <button
                        type="button"
                        @click="handleSelect(item.select_value)"
                        :class="[
                            'w-full text-center py-3 rounded-full text-sm font-semibold transition-all duration-200 cursor-pointer hover:scale-[1.02] active:scale-[0.98]',
                            item.is_populer
                                ? 'text-on-primary bg-primary-container hover:bg-primary-hover shadow-md hover:shadow-lg'
                                : 'text-on-surface bg-surface-container hover:bg-surface-container-high hover:text-primary-container'
                        ]"
                    >
                        Pilih Layanan
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
