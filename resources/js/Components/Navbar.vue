<script setup>
import { ref } from 'vue';
import { Menu, X } from 'lucide-vue-next';
import WhatsAppIcon from './Icons/WhatsAppIcon.vue';

const props = defineProps({
    adminNumber: {
        type: String,
        required: true,
    },
});

const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const closeMobileMenu = () => {
    isMobileMenuOpen.value = false;
};
</script>

<template>
    <header class="fixed top-0 left-0 right-0 z-50 bg-surface/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] border-b border-border/40">
        <div class="h-20 max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <a href="#beranda" class="flex items-center gap-2" aria-label="Beranda LaundryQu" @click="closeMobileMenu">
                <img src="/images/logo.svg" alt="Logo LaundryQu" class="w-auto h-11 object-contain" />
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="#beranda" class="text-sm font-medium text-text-secondary hover:text-primary-container transition-colors">Beranda</a>
                <a href="#cara-kerja" class="text-sm font-medium text-text-secondary hover:text-primary-container transition-colors">Cara Kerja</a>
                <a href="#layanan" class="text-sm font-medium text-text-secondary hover:text-primary-container transition-colors">Layanan</a>
                <a href="#hubungi-kami" class="text-sm font-medium text-text-secondary hover:text-primary-container transition-colors">Lokasi</a>
            </nav>

            <!-- Action Button for Tablet & Desktop -->
            <div class="hidden sm:flex items-center gap-4">
                <a
                    :href="`https://wa.me/${props.adminNumber}`"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-medium text-text-primary bg-surface shadow-[0_1px_4px_rgba(0,0,0,0.06)] border border-border/60 hover:bg-surface-alt hover:text-primary-container hover:border-primary-container/30 transition-all duration-200"
                >
                    <WhatsAppIcon class="w-4 h-4 text-whatsapp-green" />
                    <span>Hubungi Kami</span>
                </a>
            </div>

            <!-- Hamburger Button for Mobile -->
            <div class="flex items-center md:hidden">
                <button
                    type="button"
                    @click="toggleMobileMenu"
                    class="p-2 rounded-xl text-text-primary hover:bg-surface-container-high transition-colors focus:outline-none"
                    aria-label="Toggle Navigation Menu"
                >
                    <Menu v-if="!isMobileMenuOpen" class="w-6 h-6" />
                    <X v-else class="w-6 h-6" />
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-2"
        >
            <div
                v-if="isMobileMenuOpen"
                class="md:hidden bg-surface border-b border-border/60 px-4 pt-3 pb-6 shadow-xl flex flex-col gap-4"
            >
                <nav class="flex flex-col gap-3">
                    <a
                        href="#beranda"
                        @click="closeMobileMenu"
                        class="px-3 py-2 rounded-lg text-base font-medium text-text-primary hover:bg-surface-container-low hover:text-primary-container transition-colors"
                    >
                        Beranda
                    </a>
                    <a
                        href="#cara-kerja"
                        @click="closeMobileMenu"
                        class="px-3 py-2 rounded-lg text-base font-medium text-text-primary hover:bg-surface-container-low hover:text-primary-container transition-colors"
                    >
                        Cara Kerja
                    </a>
                    <a
                        href="#layanan"
                        @click="closeMobileMenu"
                        class="px-3 py-2 rounded-lg text-base font-medium text-text-primary hover:bg-surface-container-low hover:text-primary-container transition-colors"
                    >
                        Layanan & Tarif
                    </a>
                    <a
                        href="#hubungi-kami"
                        @click="closeMobileMenu"
                        class="px-3 py-2 rounded-lg text-base font-medium text-text-primary hover:bg-surface-container-low hover:text-primary-container transition-colors"
                    >
                        Lokasi & Operasional
                    </a>
                </nav>

                <div class="pt-2 border-t border-border/40">
                    <a
                        :href="`https://wa.me/${props.adminNumber}`"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full flex items-center justify-center gap-2 px-5 py-3 rounded-full text-sm font-semibold text-on-primary bg-whatsapp-green hover:brightness-95 shadow-md transition-all"
                    >
                        <WhatsAppIcon class="w-4 h-4 text-white" />
                        <span>Hubungi Kami via WhatsApp</span>
                    </a>
                </div>
            </div>
        </transition>
    </header>
</template>
