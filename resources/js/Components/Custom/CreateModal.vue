<template>
    <dialog class="modal" :class="{ 'modal-open': createModal }">
        <div class="modal-box max-w-[600px]">
            <div class="flex justify-between">
                <h3 class="font-bold text-lg">Tambah Data Baru</h3>
                <form method="dialog">
                    <button
                        class="btn btn-circle btn-outline btn-sm"
                        @click="closeModal"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </form>
            </div>
            <form @submit.prevent="handleSubmit" class="mt-5">
                <div class="grid grid-cols-2 gap-3">
                    <!-- name -->
                    <InputText
                        type="text"
                        label="Nama"
                        placeholder="isi nama"
                        v-model="formData.name"
                        :isError="hasErrors"
                    />
                    <!-- email -->
                    <InputText
                        type="email"
                        label="Email"
                        placeholder="isi email"
                        v-model="formData.email"
                        :isError="hasErrors"
                    />
                    <!-- status -->
                    <SelectInput
                        label="Status"
                        :options="selectOptions"
                        v-model="formData.status"
                    />
                    <!-- gender -->
                    <CustomRadioInput
                        label="Gender"
                        v-model="formData.gender"
                    />
                    <!-- notelp -->
                    <InputText
                        type="text"
                        label="No Telepon"
                        placeholder="isi no telepon"
                        v-model="formData.phone"
                    />
                </div>
                <div class="flex gap-2 justify-end">
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="resetForm"
                    >
                        resetForm
                    </button>
                    <button
                        type="submit"
                        v-if="!isSubmitted"
                        class="btn btn-primary w-32"
                    >
                        Simpan
                    </button>
                    <button type="button" v-else class="btn btn-primary w-32">
                        <Loader />
                    </button>
                </div>
            </form>
        </div>
    </dialog>
</template>

<script setup>
import { ref } from "vue";
import InputText from "./InputText.vue";
import SelectInput from "./SelectInput.vue";
import Loader from "./Loader.vue";
import CustomRadioInput from "./CustomRadioInput.vue";
import { useForm } from "@inertiajs/vue3";

const emits = defineEmits();

const props = defineProps({
    createModal: {
        type: Boolean,
    },
});

const formData = useForm({
    name: "",
    email: "",
    phone: "",
    gender: "",
    status: "",
});

const isSubmitted = ref(false);
const errors = ref([]);
const hasErrors = ref(false);
const modalShow = ref(props.createModal);

const closeModal = () => {
    emits("modalshow", (modalShow.value = false));
};

const resetForm = () => {
    formData.value.name = "";
    formData.value.email = "";
    formData.value.phone = "";
    formData.value.gender = "";
    formData.value.status = "";
};

const handleSubmit = () => {
    try {
        isSubmitted.value = true;

        formData.post(route("member.store"));
        isSubmitted.value = false;

        // resetForm();
        // closeModal();
        // console.log(formData);
    } catch (error) {
        console.log(error);
        isSubmitted.value = false;
    }
};

const selectOptions = ref(["Menikah", "Belum Menikah"]);
</script>

<style scoped>
.error-form {
    background-color: #ffe6e6;
}
</style>
