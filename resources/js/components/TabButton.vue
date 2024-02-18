<script setup>

const props = defineProps({
    link: String,
})
</script>

<template>
<button class='flex gap-[15px] bg-purpl-blue py-[3px] px-[15px] btn rounded-[5px] max-w-[298px] hover:bg-btngreen'>
    <slot></slot>
</button>
</template>

<style scoped>

</style>
