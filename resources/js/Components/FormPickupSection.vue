<script setup>
import { reactive, watch } from 'vue';
import { Truck, AlertCircle, Calendar, Clock } from 'lucide-vue-next';
import WhatsAppIcon from './Icons/WhatsAppIcon.vue';
import CustomSelect from './CustomSelect.vue';

const props = defineProps({
    layanan: {
        type: Array,
        required: true,
    },
    tanggalOptions: {
        type: Array,
        required: true,
    },
    jamOptions: {
        type: Array,
        required: true,
    },
    adminNumber: {
        type: String,
        required: true,
    },
    preselectedLayanan: {
        type: String,
        default: '',
    },
});

const form = reactive({
    nama: '',
    whatsapp: '',
    layanan: props.preselectedLayanan || '',
    estimasi: '',
    alamat: '',
    catatan: '',
    tanggal: '',
    jam: '',
});

const errors = reactive({
    nama: '',
    whatsapp: '',
    layanan: '',
    alamat: '',
    tanggal: '',
    jam: '',
});

watch(
    () => props.preselectedLayanan,
    (newVal) => {
        if (newVal) {
            form.layanan = newVal;
            errors.layanan = '';
        }
    }
);

const clearError = (field) => {
    errors[field] = '';
};

const handleFormSubmit = () => {
    let isValid = true;

    // Validate Nama
    if (!form.nama.trim()) {
        errors.nama = 'Wajib diisi';
        isValid = false;
    } else {
        errors.nama = '';
    }

    // Validate WhatsApp (must start with 08 and be a valid phone number)
    const phoneTrimmed = form.whatsapp.trim().replace(/[-\s]/g, '');
    if (!phoneTrimmed) {
        errors.whatsapp = 'Wajib diisi';
        isValid = false;
    } else if (!/^08[0-9]{8,12}$/.test(phoneTrimmed)) {
        errors.whatsapp = 'Format nomor tidak valid (wajib diawali 08, 10-14 digit)';
        isValid = false;
    } else {
        errors.whatsapp = '';
    }

    // Validate Layanan
    if (!form.layanan) {
        errors.layanan = 'Wajib diisi';
        isValid = false;
    } else {
        errors.layanan = '';
    }

    // Validate Alamat
    if (!form.alamat.trim()) {
        errors.alamat = 'Wajib diisi';
        isValid = false;
    } else {
        errors.alamat = '';
    }

    // Validate Tanggal
    if (!form.tanggal) {
        errors.tanggal = 'Wajib diisi';
        isValid = false;
    } else {
        errors.tanggal = '';
    }

    // Validate Jam
    if (!form.jam) {
        errors.jam = 'Wajib diisi';
        isValid = false;
    } else {
        errors.jam = '';
    }

    // If validation fails, scroll to first error
    if (!isValid) {
        const firstErrorField = Object.keys(errors).find((key) => errors[key]);
        if (firstErrorField) {
            const inputEl = document.getElementById(firstErrorField);
            if (inputEl) {
                inputEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                inputEl.focus();
            }
        }
        return;
    }

    // Template pesan WhatsApp strictly adhering to PRD Section 7.2
    const message = `Halo, saya ingin melakukan penjemputan laundry.
Nama: ${form.nama.trim()}
No. WhatsApp: ${form.whatsapp.trim()}
Layanan: ${form.layanan}
Estimasi Berat: ${form.estimasi.trim() || '-'}
Alamat: ${form.alamat.trim()}
Patokan/Catatan Alamat: ${form.catatan.trim() || '-'}
Tanggal Pickup: ${form.tanggal}
Jam Pickup: ${form.jam}`;

    const adminNumber = props.adminNumber || '6281234567890';
    const waUrl = `https://wa.me/${adminNumber}?text=${encodeURIComponent(message)}`;

    window.open(waUrl, '_blank');
};
</script>

<template>
    <!-- Section Form Pickup with Vibrant Living Gradient Background -->
    <section class="relative w-full py-24 scroll-mt-20 overflow-hidden bg-gradient-to-b from-[#f8f9ff] via-[#eff6ff] to-[#f8f9ff]" id="pickup-form">
        <!-- Ambient Decorative Radial Gradient -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-gradient-to-tr from-primary-fixed/25 via-secondary-container/30 to-tertiary-fixed/20 blur-3xl pointer-events-none -z-10 rounded-full"></div>

        <div class="max-w-[900px] mx-auto px-4 sm:px-6 relative z-10">
            <div class="text-center max-w-xl mx-auto mb-10">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed text-xs font-bold mb-2 shadow-sm">
                    <Truck class="w-3.5 h-3.5 text-primary-container" />
                    <span>Formulir Penjemputan Cepat</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-bold font-headline text-on-surface tracking-tight">Atur Jadwal Penjemputan</h2>
                <p class="text-sm sm:text-base text-secondary mt-1">
                    Lengkapi detail penjemputan di bawah. Tim kami siap meluncur tepat waktu!
                </p>
            </div>

            <!-- Elevated Main Form Card -->
            <div class="bg-surface/95 backdrop-blur-sm rounded-3xl p-6 sm:p-10 shadow-[0_12px_40px_-5px_rgba(0,0,0,0.07)] hover:shadow-[0_20px_50px_-5px_rgba(0,0,0,0.1)] transition-shadow duration-300 border border-border/50">
                <form @submit.prevent="handleFormSubmit" class="flex flex-col gap-6" novalidate>
                    
                    <!-- Field 1 & 2: Nama & WhatsApp -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-1.5">
                            <label for="nama" class="text-sm font-semibold text-on-surface flex items-center gap-1">
                                Nama Lengkap <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <input
                                    id="nama"
                                    v-model="form.nama"
                                    @input="clearError('nama')"
                                    maxlength="100"
                                    type="text"
                                    placeholder="Contoh: Budi Santoso"
                                    :class="[
                                        'w-full bg-surface-container-lowest text-text-primary px-4 py-3 rounded-lg border transition-all focus:outline-none focus:ring-2 focus:ring-primary-container text-sm',
                                        errors.nama ? 'border-error ring-1 ring-error' : 'border-border focus:border-transparent'
                                    ]"
                                />
                            </div>
                            <span v-if="errors.nama" class="text-xs text-error flex items-center gap-1 mt-0.5">
                                <AlertCircle class="w-3.5 h-3.5 shrink-0" />
                                <span>{{ errors.nama }}</span>
                            </span>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label for="whatsapp" class="text-sm font-semibold text-on-surface flex items-center gap-1">
                                No. WhatsApp <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <input
                                    id="whatsapp"
                                    v-model="form.whatsapp"
                                    @input="clearError('whatsapp')"
                                    type="tel"
                                    placeholder="Contoh: 081234567890"
                                    :class="[
                                        'w-full bg-surface-container-lowest text-text-primary px-4 py-3 rounded-lg border transition-all focus:outline-none focus:ring-2 focus:ring-primary-container text-sm',
                                        errors.whatsapp ? 'border-error ring-1 ring-error' : 'border-border focus:border-transparent'
                                    ]"
                                />
                            </div>
                            <span v-if="errors.whatsapp" class="text-xs text-error flex items-center gap-1 mt-0.5">
                                <AlertCircle class="w-3.5 h-3.5 shrink-0" />
                                <span>{{ errors.whatsapp }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Field 3 & 4: Layanan & Estimasi Berat -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-1.5">
                            <label for="layanan" class="text-sm font-semibold text-on-surface flex items-center gap-1">
                                Pilihan Layanan <span class="text-error">*</span>
                            </label>
                            <CustomSelect
                                id="layanan"
                                v-model="form.layanan"
                                :options="props.layanan"
                                placeholder="Pilih salah satu layanan..."
                                :error="errors.layanan"
                                @change="clearError('layanan')"
                            />
                            <span v-if="errors.layanan" class="text-xs text-error flex items-center gap-1 mt-0.5">
                                <AlertCircle class="w-3.5 h-3.5 shrink-0" />
                                <span>{{ errors.layanan }}</span>
                            </span>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <div class="flex items-center justify-between">
                                <label for="estimasi" class="text-sm font-semibold text-on-surface">
                                    Estimasi Berat / Jumlah
                                </label>
                                <span class="px-2 py-0.5 rounded bg-surface-container text-text-secondary text-xs">Opsional</span>
                            </div>
                            <input
                                id="estimasi"
                                v-model="form.estimasi"
                                type="text"
                                placeholder="Misal: ~4 kg atau 2 bedcover"
                                class="w-full bg-surface-container-lowest text-text-primary px-4 py-3 rounded-lg border border-border focus:outline-none focus:ring-2 focus:ring-primary-container transition-all text-sm"
                            />
                        </div>
                    </div>

                    <!-- Field 5: Alamat Lengkap with Character Counter (Max 100 char) -->
                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                            <label for="alamat" class="text-sm font-semibold text-on-surface flex items-center gap-1">
                                Alamat Lengkap <span class="text-error">*</span>
                            </label>
                            <span class="text-xs text-text-secondary">
                                {{ form.alamat.length }}/100
                            </span>
                        </div>
                        <textarea
                            id="alamat"
                            v-model="form.alamat"
                            @input="clearError('alamat')"
                            maxlength="100"
                            rows="3"
                            placeholder="Tuliskan nama jalan, nomor rumah, RT/RW, kelurahan atau nama kos/apartemen..."
                            :class="[
                                'w-full bg-surface-container-lowest text-text-primary px-4 py-3 rounded-lg border transition-all resize-none focus:outline-none focus:ring-2 focus:ring-primary-container text-sm',
                                errors.alamat ? 'border-error ring-1 ring-error' : 'border-border focus:border-transparent'
                            ]"
                        ></textarea>
                        <span v-if="errors.alamat" class="text-xs text-error flex items-center gap-1 mt-0.5">
                            <AlertCircle class="w-3.5 h-3.5 shrink-0" />
                            <span>{{ errors.alamat }}</span>
                        </span>
                    </div>

                    <!-- Field 6: Patokan / Catatan Khusus (Max 100 char) -->
                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                            <label for="catatan" class="text-sm font-semibold text-on-surface">
                                Patokan / Catatan Khusus
                            </label>
                            <span class="px-2 py-0.5 rounded bg-surface-container text-text-secondary text-xs">Opsional</span>
                        </div>
                        <input
                            id="catatan"
                            v-model="form.catatan"
                            maxlength="100"
                            type="text"
                            placeholder="Dekat minimarket, pagar hitam, titip di resepsionis, dll"
                            class="w-full bg-surface-container-lowest text-text-primary px-4 py-3 rounded-lg border border-border focus:outline-none focus:ring-2 focus:ring-primary-container transition-all text-sm"
                        />
                    </div>

                    <!-- Field 7 & 8: Tanggal & Jam Penjemputan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-1.5">
                            <label for="tanggal" class="text-sm font-semibold text-on-surface flex items-center gap-1">
                                Tanggal Penjemputan <span class="text-error">*</span>
                            </label>
                            <CustomSelect
                                id="tanggal"
                                v-model="form.tanggal"
                                :options="props.tanggalOptions"
                                placeholder="Pilih Tanggal..."
                                :icon="Calendar"
                                :error="errors.tanggal"
                                @change="clearError('tanggal')"
                            />
                            <span v-if="errors.tanggal" class="text-xs text-error flex items-center gap-1 mt-0.5">
                                <AlertCircle class="w-3.5 h-3.5 shrink-0" />
                                <span>{{ errors.tanggal }}</span>
                            </span>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label for="jam" class="text-sm font-semibold text-on-surface flex items-center gap-1">
                                Jam Penjemputan <span class="text-error">*</span>
                            </label>
                            <CustomSelect
                                id="jam"
                                v-model="form.jam"
                                :options="props.jamOptions"
                                placeholder="Pilih Jam..."
                                :icon="Clock"
                                :error="errors.jam"
                                @change="clearError('jam')"
                            />
                            <span v-if="errors.jam" class="text-xs text-error flex items-center gap-1 mt-0.5">
                                <AlertCircle class="w-3.5 h-3.5 shrink-0" />
                                <span>{{ errors.jam }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Submit Button with Official WhatsApp Icon & Disclaimer Notice -->
                    <div class="flex flex-col items-center gap-3 pt-4">
                        <button
                            type="submit"
                            class="w-full sm:w-3/4 py-4 px-8 rounded-full text-base sm:text-lg font-bold text-on-primary bg-primary-container hover:bg-primary-hover shadow-[0_15px_30px_-5px_rgba(249,115,22,0.4)] transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-3 cursor-pointer"
                        >
                            <WhatsAppIcon class="w-5 h-5 text-white" />
                            <span>Pesan via WhatsApp</span>
                        </button>
                        <p class="text-xs text-text-secondary text-center max-w-md leading-relaxed">
                            Data Anda hanya digunakan untuk membuat format pesan WhatsApp dan tidak disimpan oleh sistem.
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </section>
</template>
