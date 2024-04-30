<script setup>
import useCommon from "../use/common.js";

const props = defineProps({
    id: Number,
    title: String,
    prevUrl: String,
    originalUrl: String,
})
const {isAdmin} = useCommon()
const emits = defineEmits(['deletePhoto'])
</script>

<template>
<div class='w-[25%] mb-[32px] px-[15px] relative photo-container'>
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
@media only screen and (max-width: 750px) {
    .photo-container {
        min-width: 250px;
    }
}
</style>
