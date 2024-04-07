<script setup>
import {ref} from "vue";

const props = defineProps({
    id: Number,
    title: String,
    prevUrl: String,
    originalUrl: String,
})
const isAdmin = ref(true);
const emits = defineEmits(['deletePhoto'])
</script>

<template>
<div class='w-[25%] mb-[32px] px-[15px] relative'>
    <img :src='props.prevUrl' alt='Фотография' class='w-full h-auto cursor-pointer'>
    <button
        v-if="isAdmin"
        @click.stop="emits('deletePhoto', props.id)"
        class='absolute top-2 left-4 ml-[10px] bg-pink p-[2px] text-[16px] rounded opacity-40 hover:cursor-pointer hover:opacity-100'>
        Удалить фото
    </button>
</div>
</template>

<style scoped>

</style>
