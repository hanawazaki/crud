<template>
    <MainLayout>
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Member List</h1>
            <div class="flex space-x-2">
                <input
                    type="text"
                    placeholder="Search..."
                    class="input input-sm input-bordered w-full max-w-xs"
                    v-model="search"
                />
                <Link
                    :href="route('member.create')"
                    class="btn btn-outline btn-sm"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                        />
                    </svg>
                    New Data
                </Link>
            </div>
        </div>
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr v-for="item in filteredData" :key="item.id">
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img
                                            src="https://daisyui.com/tailwind-css-component-profile-2@56w.png"
                                            alt="Avatar Tailwind CSS Component"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">
                                        {{ item.name }}
                                    </div>
                                    <div class="text-sm opacity-50">
                                        {{ item.status }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ item.email }}
                        </td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.gender }}</td>
                        <td class="">
                            <Link
                                :href="route('member.show', item.id)"
                                class="btn btn-info btn-xs mr-2"
                            >
                                View
                            </Link>
                            <Link
                                :href="route('member.edit', item.id)"
                                class="btn btn-success btn-xs mr-2"
                            >
                                Edit
                            </Link>

                            <button
                                @click="deleteData(item.id)"
                                class="btn btn-error btn-xs"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-center my-5">
            <div class="join">
                <button class="join-item btn">1</button>
                <button class="join-item btn btn-active">2</button>
                <button class="join-item btn">3</button>
                <button class="join-item btn">4</button>
            </div>
        </div>
        <!--  -->
    </MainLayout>
</template>

<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import { ref, onMounted, computed } from "vue";
import MainLayout from "../../Layouts/MainLayout.vue";

const props = defineProps({
    members: {
        type: Object,
        required: true,
    },
});
const search = ref("");
const createModal = ref(false);

const filteredData = computed(() => {
    return props.members.data.filter((member) =>
        member.name.toLowerCase().includes(search.value.toLowerCase())
    );
});

const deleteData = (id) => {
    if (confirm("are you sure?")) {
        router.delete(route("member.destroy", id), {
            preserveScroll: true,
        });
    }
};

function getPage(page) {
    router.visit(`/members?page=${page}`);
}

console.log(props.members.data);
</script>

<style scoped></style>
