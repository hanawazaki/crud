<template>
    <MainLayout>
        <div class="max-w-xs text-sm breadcrumbs">
            <ul>
                <li><Link :href="route('member.index')">Home</Link></li>
                <li>View</li>
            </ul>
        </div>
        <div class="flex justify-between">
            <h3 class="font-bold text-lg">View Data</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>
                        <label>{{ props.member.name }}</label>
                    </th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>
                        <label>{{ props.member.email }}</label>
                    </th>
                </tr>
                <tr>
                    <th>Phone</th>
                    <th>
                        <label>{{ props.member.phone }}</label>
                    </th>
                </tr>
                <tr>
                    <th>Gender</th>
                    <th>
                        <label>{{ props.member.gender }}</label>
                    </th>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>
                        <label>{{ props.member.status }}</label>
                    </th>
                </tr>
            </thead>
        </table>
    </MainLayout>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import MainLayout from "../../Layouts/MainLayout.vue";

const props = defineProps({
    member: {
        type: Object,
    },
});
</script>

<style lang="scss" scoped></style>
