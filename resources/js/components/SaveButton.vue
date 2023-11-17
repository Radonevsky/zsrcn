<script setup>

const props = defineProps({
    text: String,
})
</script>

<template>
<button class='flex gap-[15px] bg-purpl-blue py-[15px] pl-[30px] pr-[23px] btn rounded-[10px] max-w-[298px] hover:bg-btngreen'>
    <span class='font-roboto700 leading-[29px] text-[25px] text-center text-white'>
        {{ props.text }}
    </span>
</button>
</template>

<style scoped>

</style>
