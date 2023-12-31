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
        <div class="grid grid-cols-2 gap-3">
            <label>{{ props.member.name }}</label>
            <label>{{ props.member.email }}</label>
            <label>{{ props.member.phone }}</label>
            <label>{{ props.member.gender }}</label>
            <label>{{ props.member.status }}</label>
        </div>
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
