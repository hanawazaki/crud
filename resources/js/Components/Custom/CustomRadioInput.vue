<template>
    <div class="flex flex-col gap-2 mb-5 w-full">
        <label for="name" class="">{{ label }}</label>
        <div class="flex gap-3">
            <div class="flex gap-2">
                <label class="label cursor-pointer">
                    <span class="label-text mr-3">Pria</span>
                    <input
                        type="radio"
                        name="radio-10"
                        class="radio checked:bg-red-500"
                        :checked="selectedOption === 'Pria'"
                        @change="updateSelectedOption('Pria')"
                    />
                </label>
            </div>
            <div class="flex gap-2">
                <label class="label cursor-pointer">
                    <span class="label-text mr-3">Wanita</span>
                    <input
                        type="radio"
                        name="radio-10"
                        class="radio checked:bg-blue-500"
                        :checked="selectedOption === 'wanita'"
                        @change="updateSelectedOption('Wanita')"
                    />
                </label>
            </div>
        </div>
        <InputError :message="isError" />
    </div>
</template>

<script setup>
import { ref, watchEffect } from "vue";
import InputError from "../../Components/InputError.vue";

const emit = defineEmits();

const props = defineProps({
    label: {
        type: String,
    },
    modelValue: {
        type: String,
    },
    isError: {
        type: String,
    },
});

const selectedOption = ref(props.modelValue);

watchEffect(() => {
    emit("update:modelValue", selectedOption.value);
});

const updateSelectedOption = (option) => {
    selectedOption.value = option;
};
</script>

<style lang="scss" scoped></style>
