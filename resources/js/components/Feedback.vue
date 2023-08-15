<script setup>
import useCommon from "../use/common.js";

const { getImgUrl } = useCommon()

</script>

<template>
    <p class='font-roboto400 leading-[17px] self-center text-justify'>
        <slot name='text'></slot>
    </p>

    <p class='feedback-name font-roboto300 relative self-center'>
        <slot name='name'></slot>
    </p>
</template>

<style scoped>

</style>
