<script setup>
import useCommon from "../use/common.js";

const props = defineProps({
    bgClass: String,
    title: String,
    textColorClass: {
        type: String,
        default: 'text-tblue-light',
    },
})
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<div :class='props.bgClass'
     class='h-[118px] flex justify-center items-center'
     :style="isImpairedVision ? 'background: #fff; border-bottom: 2px solid #000;' : ''">
    <h4 :class='props.textColorClass' class='font-roboto700 text-[30px]' :style="isImpairedVision ? ' color: black;' : ''">
        {{ props.title }}
    </h4>
</div>
</template>

<style scoped>

</style>
