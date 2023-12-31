<template>
    <MainLayout>
        <div class="max-w-xs text-sm breadcrumbs">
            <ul>
                <li><Link :href="route('member.index')">Home</Link></li>
                <li>Edit</li>
            </ul>
        </div>
        <div class="flex justify-between">
            <h3 class="font-bold text-lg">Ubah Data {{ props.member.name }}</h3>
        </div>
        <form @submit.prevent="handleSubmit" class="mt-5">
            <div class="grid grid-cols-2 gap-3">
                <!-- name -->
                <InputText
                    type="text"
                    label="Nama"
                    placeholder="isi nama"
                    v-model="formData.name"
                    :isError="formData.errors.name"
                />
                <!-- email -->
                <InputText
                    type="email"
                    label="Email"
                    placeholder="isi email"
                    v-model="formData.email"
                    :isError="formData.errors.email"
                />
                <!-- status -->
                <SelectInput
                    label="Status"
                    :options="selectOptions"
                    v-model="formData.status"
                    :isError="formData.errors.status"
                />
                <!-- gender -->

                <CustomRadioInput
                    label="Gender"
                    v-model="formData.gender"
                    :isError="formData.errors.gender"
                />
                <!-- notelp -->
                <InputText
                    type="text"
                    label="No Telepon"
                    placeholder="isi no telepon"
                    v-model="formData.phone"
                    :isError="formData.errors.phone"
                />
            </div>
            <div class="flex gap-2 justify-end">
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
    </MainLayout>
</template>

<script setup>
import { ref } from "vue";
import InputText from "../../Components/Custom/InputText.vue";
import SelectInput from "../../Components/Custom/SelectInput.vue";
import Loader from "../../Components/Custom/Loader.vue";
import CustomRadioInput from "../../Components/Custom/CustomRadioInput.vue";
import { Link, useForm } from "@inertiajs/vue3";
import MainLayout from "../../Layouts/MainLayout.vue";

const props = defineProps({
    member: {
        type: Object,
    },
});

const formData = useForm({
    name: props.member.name,
    email: props.member.email,
    phone: props.member.phone,
    gender: props.member.gender,
    status: props.member.status,
});

const isSubmitted = ref(false);

const handleSubmit = () => {
    try {
        isSubmitted.value = true;

        formData.put(route("member.update", props.member.id));
        isSubmitted.value = false;
    } catch (error) {
        console.log(error);
        isSubmitted.value = false;
    }
};

const selectOptions = ref(["Premium", "Basic"]);
</script>

<style lang="scss" scoped></style>
