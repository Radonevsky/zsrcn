<script setup>

import {ref} from "vue";

const props = defineProps(['placeholder'])
const inputValue = ref('')

</script>

<template>
    <input
        :placeholder="props.placeholder"
        v-model="inputValue"
        type='text'
        class='p-[5px] border-light-purple w-full border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                focus:border-orange text-[20px] text-tblue font-roboto700 max-w-[465px]'>
</template>

<style scoped>

</style>
