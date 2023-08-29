<script setup>
import { ref } from "vue";
import useCommon from "../use/common.js";

const { getImgUrl } = useCommon()
const props = defineProps({
    shifted: Boolean,
    active: Boolean,
    id: Number,
})
function getImageUrl(path) {
    return getImgUrl(path)
}

let light = ref(false)
</script>

<template>
    <div  @mouseover='light = true'
          @mouseleave='light = false'
          class='lamp w-[218px] flex-col relative transition-all hover:cursor-pointer
            hover:delay-0 hover:duration-200 duration-700 ease-in-out'
         :class='{
            "-top-[450px]" : !props.active,
            "top-0" : !props.shifted && props.active,
            "-top-[5px]" : props.shifted && light,
            "-top-[56px]" : props.shifted && !light && props.active,
        }'>
        <div>
            <img
            class='mx-auto h-[291px]'
            :src='light
            ? getImageUrl("../../images/lampOn.png")
            : getImageUrl("../../images/lampOff.png")'
            alt='lamp'>
        </div>
        <p class='text-center font-roboto700 text-[25px] leading-[29px] mt-[50px]'
           :class='light ? "text-dark-yellow" : "text-white"'>
            <slot name='title'></slot>
        </p>
    </div>
</template>

<style scoped>

</style>
