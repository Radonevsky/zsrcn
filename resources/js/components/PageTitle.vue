<script setup>
const props = defineProps({
    bgClass: String,
    title: String,
})
</script>

<template>
<div :class='props.bgClass' class='h-[118px] flex justify-center items-center'>
    <h4 class='text-tblue-light font-roboto500 text-[20px]'>
        {{ props.title }}
    </h4>
</div>
</template>

<style scoped>

</style>
