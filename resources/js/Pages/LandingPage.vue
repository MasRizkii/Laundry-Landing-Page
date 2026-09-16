<script setup>
import { ref } from 'vue';
import Navbar from '../Components/Navbar.vue';
import HeroSection from '../Components/HeroSection.vue';
import CaraKerjaSection from '../Components/CaraKerjaSection.vue';
import LayananHargaSection from '../Components/LayananHargaSection.vue';
import FormPickupSection from '../Components/FormPickupSection.vue';
import LokasiSection from '../Components/LokasiSection.vue';
import Footer from '../Components/Footer.vue';
import WhatsAppFab from '../Components/WhatsAppFab.vue';

const props = defineProps({
    laundry: {
        type: Object,
        required: true,
    },
});

const selectedService = ref('');

const onSelectService = (serviceValue) => {
    selectedService.value = serviceValue;
    const formSection = document.getElementById('pickup-form');
    if (formSection) {
        formSection.scrollIntoView({ behavior: 'smooth' });
    }
};
</script>

<template>
    <!-- Single root container for Vue component -->
    <div class="min-h-screen bg-background text-on-surface flex flex-col font-sans relative overflow-x-hidden selection:bg-primary-container/20 selection:text-primary-hover">
        <Navbar :admin-number="props.laundry.whatsapp_admin_number" />

        <main class="w-full pt-20 flex-grow" id="beranda">
            <HeroSection />
            <CaraKerjaSection :items="props.laundry.cara_kerja" />
            <LayananHargaSection
                :layanan="props.laundry.layanan"
                @select-service="onSelectService"
            />
            <FormPickupSection
                :layanan="props.laundry.layanan"
                :tanggal-options="props.laundry.tanggal_options"
                :jam-options="props.laundry.jam_pickup_options"
                :admin-number="props.laundry.whatsapp_admin_number"
                :preselected-layanan="selectedService"
            />
            <LokasiSection :laundry="props.laundry" />
        </main>

        <WhatsAppFab :admin-number="props.laundry.whatsapp_admin_number" />
        <Footer :laundry="props.laundry" />
    </div>
</template>
