<script setup>
import useCommon from "../use/common.js";

const { getImgUrl } = useCommon()

const props = defineProps({
    title: String,
    text: String,
    bgClass: String,
    imgPath: String,
})
</script>

<template>
<article class='flex gap-[65px] h-[490px] max-w-[1028px] pt-[50px] pb-[80px] px-[50px] rounded-[30px] self-center' :class='props.bgClass'>
    <img :src="getImgUrl(props.imgPath)" alt='photo' class='max-w-[340px] max-h-[350px]'>
    <div class='flex flex-col gap-[40px] text-white'>
        <h6 class='font-roboto700 text-[30px] leading-[35px]'>
            {{ props.title }}
        </h6>
        <div class='overflow-auto custom-scrollbar'>
            <p class='font-roboto500 text-[15px] leading-[18px]'>
                {{ props.text }}
            </p>
        </div>
    </div>
</article>
</template>

<style scoped>

</style>
