<script setup>
const props = defineProps({
    id: Number,
    title: String,
    prevUrl: String,
    originalUrl: String,
})
</script>

<template>
<div class='w-[25%] mb-[32px] px-[15px]'>
    <img :src='props.prevUrl' alt='Фотография' class='w-full h-auto'>
</div>
</template>

<style scoped>

</style>
