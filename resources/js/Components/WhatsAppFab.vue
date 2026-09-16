<script setup>
import WhatsAppIcon from './Icons/WhatsAppIcon.vue';

const props = defineProps({
    adminNumber: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <aside class="fixed bottom-6 right-6 z-40 flex items-center md:hidden">
        <a
            :href="`https://wa.me/${props.adminNumber}`"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Hubungi LaundryQu via WhatsApp"
            class="group relative flex items-center justify-center w-14 h-14 rounded-full bg-whatsapp-green text-on-primary shadow-[0_10px_25px_-5px_rgba(37,211,102,0.4)] hover:scale-105 active:scale-95 transition-transform duration-200"
        >
            <span class="absolute -inset-1 rounded-full bg-whatsapp-green opacity-40 animate-ping pointer-events-none"></span>
            <WhatsAppIcon class="w-7 h-7 relative z-10 text-white" />
        </a>
    </aside>
</template>
