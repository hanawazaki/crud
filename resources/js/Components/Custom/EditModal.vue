<template>
  <dialog id="my_modal_2" class="modal">
    <div class="modal-box max-w-[600px]">
      <div class="flex justify-between">
        <h3 class="font-bold text-lg">Ubah Data</h3>
        <form method="dialog">
          <button class="btn btn-circle btn-outline btn-sm">
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
      <form @submit.prevent="handleSubmit">
        <div class="flex gap-3 justify-between">
          <!-- name -->
          <InputText
            type="text"
            label="Nama"
            placeholder="isi nama"
            v-model="formData.name"
          />
          <!-- email -->
          <InputText
            type="email"
            label="Email"
            placeholder="isi email"
            v-model="formData.email"
          />
        </div>
        <div class="flex gap-3 justify-between">
          <!-- religion -->
          <SelectInput
            label="Agama"
            :options="selectOptions"
            v-model="formData.religion"
          />
          <!-- gender -->
          <InputRadio label="Gender" v-model="formData.gender" />
        </div>
        <div class="flex gap-3 justify-between">
          <!-- notelp -->
          <InputText
            type="text"
            label="No Telepon"
            placeholder="isi no telepon"
            v-model="formData.notelp"
          />
          <!-- city -->
          <InputText
            type="text"
            label="Kota Asal"
            placeholder="isi nama kota"
            v-model="formData.city"
          />
        </div>
        <!-- alamat -->
        <div class="flex gap-2 justify-end">
          <button
            type="submit"
            v-if="!isSubmitted"
            class="btn btn-secondary w-32"
          >
            Ubah
          </button>
          <button type="button" v-else class="btn btn-secondary w-32">
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
import InputRadio from "./CustomRadioInput.vue";
import Loader from "./Loader.vue";

const formData = ref({
  name: "",
  email: "",
  notelp: "",
  gender: "",
  religion: "",
  city: "",
});

const isSubmitted = ref(false);

const handleSubmit = () => {
  try {
    isSubmitted.value = true;

    setTimeout(() => {
      isSubmitted.value = false;
      console.log("data submitted", formData.value);
    }, 2000);
  } catch (error) {
    console.log(error);
    isSubmitted.value = false;
  }
};

const selectOptions = ref(["Islam", "Kristen", "Katolik", "Hindu", "Budha"]);
</script>

<style lang="scss" scoped></style>
