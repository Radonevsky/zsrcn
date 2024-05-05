<script setup>
import HouseIcon from "./icons/houseIcon.vue";
import useCommon from "../use/common.js";

const props = defineProps({
    text: String,
})
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<button
    class='flex gap-[15px] bg-purpl-blue py-[15px] pl-[30px] pr-[23px] btn rounded-[10px] max-w-[298px] hover:bg-btngreen'
    :class="isImpairedVision ? 'bg-white border-[2px] hover:bg-white' : ''">
    <HouseIcon/>
    <span class='mt-[25px] font-roboto700 leading-[29px] text-[25px] text-center text-white'
          :style="isImpairedVision ? 'color: black' : ''">
        {{ props.text }}
    </span>
</button>
</template>

<style scoped>

</style>
