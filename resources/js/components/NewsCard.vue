<script setup>
import useCommon from "../use/common.js";

const { getImgUrl } = useCommon()

const props = defineProps({
    title: String,
    text: String,
    bgClass: String,
    imgPath: String,
    create: {
        type: Boolean,
        default: false,
    },
})
</script>

<template>
<article class='flex gap-[65px] h-[490px] max-w-[1028px] pt-[50px] pb-[80px] px-[50px] rounded-[30px] self-center w-full'
         :class='create ? "bg-bggray" : props.bgClass'>
    <div v-if='create' class='dropzone w-[330px] h-[350px] border-light-orange border-2 border-dashed'></div>
    <img v-if='!create' :src="getImgUrl(props.imgPath)" alt='photo' class='max-w-[340px] max-h-[350px]'>
    <div class='flex flex-col gap-[40px] text-white grow'>
        <input v-if='create' type='text' class='bg-bggray p-[5px] border-white border-[1px] rounded-[10px] outline-0
            py-[15px] focus:shadow-around focus:border-orange focus:bg-bluebg text-[30px] font-roboto700'>
        <h6 v-if='!create' class='font-roboto700 text-[30px] leading-[35px]'>
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
