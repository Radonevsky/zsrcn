<script setup>
const props = defineProps({
    id: Number,
    title: String,
    prevUrl: String,
    originalUrl: String,
})
</script>

<template>
<div>
    <img :src='props.prevUrl' alt='Фотография'>
</div>
</template>

<style scoped>

</style>
