<template>
    <div>
        <img
            v-if="gender === 'Pria'"
            src="../../../../public/men.png"
            alt="Avatar Tailwind CSS Component"
        />
        <img
            v-else
            src="../../../../public/women.png"
            alt="Avatar Tailwind CSS Component"
        />
    </div>
</template>

<script setup>
const props = defineProps({
    gender: {
        type: String,
    },
});
</script>

<style lang="scss" scoped></style>
