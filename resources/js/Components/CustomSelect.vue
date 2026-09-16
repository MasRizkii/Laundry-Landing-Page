<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { ChevronDown, Check } from 'lucide-vue-next';

const props = defineProps({
    modelValue: {
        type: [String, Number],
        default: '',
    },
    options: {
        type: Array,
        required: true,
    },
    placeholder: {
        type: String,
        default: 'Pilih salah satu...',
    },
    error: {
        type: String,
        default: '',
    },
    id: {
        type: String,
        default: '',
    },
    icon: {
        type: [Object, Function],
        default: null,
    },
});

const emit = defineEmits(['update:modelValue', 'change']);

const isOpen = ref(false);
const containerRef = ref(null);

// Normalize options to { value, label, badge }
const normalizedOptions = computed(() => {
    return props.options.map((item) => {
        if (typeof item === 'object' && item !== null) {
            return {
                value: item.select_value || item.value || item.id || '',
                label: item.select_value || item.nama || item.label || '',
                badge: item.badge || '',
            };
        }
        return {
            value: item,
            label: item,
            badge: '',
        };
    });
});

const selectedOption = computed(() => {
    return normalizedOptions.value.find((opt) => opt.value === props.modelValue);
});

const toggleDropdown = () => {
    isOpen.value = !isOpen.value;
};

const closeDropdown = () => {
    isOpen.value = false;
};

const selectOption = (opt) => {
    emit('update:modelValue', opt.value);
    emit('change', opt.value);
    closeDropdown();
};

const handleClickOutside = (event) => {
    if (containerRef.value && !containerRef.value.contains(event.target)) {
        closeDropdown();
    }
};

const handleKeyDown = (event) => {
    if (event.key === 'Escape') {
        closeDropdown();
    } else if (event.key === 'ArrowDown' && !isOpen.value) {
        event.preventDefault();
        isOpen.value = true;
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<template>
    <div ref="containerRef" class="relative w-full" @keydown="handleKeyDown">
        <!-- Trigger Button -->
        <button
            :id="id"
            type="button"
            @click="toggleDropdown"
            :aria-expanded="isOpen"
            aria-haspopup="listbox"
            :class="[
                'w-full bg-surface-container-lowest px-4 py-3 rounded-lg border text-left flex items-center justify-between text-sm cursor-pointer select-none transition-all duration-200 focus:outline-none',
                error
                    ? 'border-error ring-1 ring-error text-text-primary'
                    : isOpen
                        ? 'border-transparent ring-2 ring-primary-container shadow-sm text-text-primary'
                        : 'border-border hover:border-primary-container/60 text-text-primary'
            ]"
        >
            <span
                :class="[
                    'truncate pr-2',
                    selectedOption ? 'text-on-surface font-medium' : 'text-text-secondary/70'
                ]"
            >
                {{ selectedOption ? selectedOption.label : placeholder }}
            </span>

            <div class="flex items-center gap-2 shrink-0">
                <!-- Optional leading custom icon (e.g. Calendar, Clock) -->
                <component
                    v-if="icon"
                    :is="icon"
                    class="w-4 h-4 text-text-secondary"
                />

                <!-- Chevron Icon with 180deg flip on open -->
                <ChevronDown
                    :class="[
                        'w-4 h-4 text-text-secondary transition-transform duration-200',
                        isOpen ? 'rotate-180 text-primary-container' : ''
                    ]"
                />
            </div>
        </button>

        <!-- Custom Dropdown Menu with Transition -->
        <Transition
            enter-active-class="transition duration-150 ease-out"
            enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-100 ease-in"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"
        >
            <div
                v-if="isOpen"
                role="listbox"
                class="absolute left-0 right-0 top-full mt-1.5 z-50 bg-surface rounded-xl border border-border/70 shadow-[0_12px_32px_rgba(0,0,0,0.12)] backdrop-blur-md overflow-hidden py-1.5 max-h-60 overflow-y-auto"
            >
                <div
                    v-for="opt in normalizedOptions"
                    :key="opt.value"
                    role="option"
                    :aria-selected="opt.value === modelValue"
                    @click="selectOption(opt)"
                    :class="[
                        'px-4 py-2.5 text-sm cursor-pointer flex items-center justify-between transition-colors duration-150 select-none',
                        opt.value === modelValue
                            ? 'bg-primary-fixed/50 text-primary-container font-semibold'
                            : 'text-text-primary hover:bg-surface-container-high hover:text-primary-container active:bg-primary-fixed/30'
                    ]"
                >
                    <div class="flex items-center gap-2 truncate pr-2">
                        <span class="truncate">{{ opt.label }}</span>
                        <span
                            v-if="opt.badge"
                            class="text-[10px] uppercase tracking-wider font-bold px-2 py-0.5 rounded-full bg-surface-container text-tertiary shrink-0"
                        >
                            {{ opt.badge }}
                        </span>
                    </div>

                    <Check
                        v-if="opt.value === modelValue"
                        class="w-4 h-4 text-primary-container shrink-0"
                    />
                </div>
            </div>
        </Transition>
    </div>
</template>
