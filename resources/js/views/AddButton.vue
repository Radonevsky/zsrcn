<script setup>

import PlusIcon from "../components/icons/plusIcon.vue";
</script>

<template>
    <button
        class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
        @click='$emit("click")'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        <slot></slot>
                    </span>
        <plusIcon></plusIcon>
    </button>
</template>

<style scoped>

</style>
