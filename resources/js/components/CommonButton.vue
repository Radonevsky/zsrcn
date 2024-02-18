<script setup>

const props = defineProps({
    text: String,
})
</script>

<template>
<button class='flex gap-[15px] bg-purpl-blue py-[3px] px-[15px] btn rounded-[5px] max-w-[298px] hover:bg-btngreen'>
    <span class='font-roboto500 text-[18px] text-center text-white'>
        {{ props.text }}
    </span>
</button>
</template>

<style scoped>

</style>
