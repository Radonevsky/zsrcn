<script setup>

import useCommon from "../use/common.js";

const props = defineProps({
    text: String,
})
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<button class='flex gap-[15px] bg-purpl-blue py-[3px] px-[15px] self-center btn rounded-[5px] max-w-[298px] hover:bg-btngreen'
        :style="isImpairedVision ? 'background-color: white' : ''">
    <span class='font-roboto500 text-[18px] text-center text-white' :style="isImpairedVision ? 'color: black':''">
        {{ props.text }}
    </span>
</button>
</template>

<style scoped>

</style>
