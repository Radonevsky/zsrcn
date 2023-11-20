<script setup>
import ChevronArrow from "./ChevronArrow.vue";

const props = defineProps({
    id: Number,
    title: String,
    url: String,
})

defineEmits([
    'close',
    'prevPhoto',
    'nextPhoto',
])
</script>

<template>
<div
    @click='$emit("close")'
    class='top-0 left-0 bottom-0 right-0 fixed bg-gray-bg flex items-center justify-center'>
    <ChevronArrow @click.stop='$emit("prevPhoto")' class='rotate-180 scale-50  fixed top-[40%] -left-10'/>
    <img
        :src='props.url'
        class='block max-w-[80%] max-h-[95%] select-none'
        alt='Фотография'
        @click.stop>
    <ChevronArrow @click.stop='$emit("nextPhoto")' class='scale-50 fixed top-[40%] -right-10'/>
</div>
</template>

<style scoped>

</style>
