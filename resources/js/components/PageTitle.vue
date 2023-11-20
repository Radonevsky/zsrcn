<script setup>
const props = defineProps({
    bgClass: String,
    title: String,
    textColorClass: {
        type: String,
        default: 'text-tblue-light',
    },
})
</script>

<template>
<div :class='props.bgClass' class='h-[118px] flex justify-center items-center'>
    <h4 :class='props.textColorClass' class='font-roboto700 text-[30px]'>
        {{ props.title }}
    </h4>
</div>
</template>

<style scoped>

</style>
