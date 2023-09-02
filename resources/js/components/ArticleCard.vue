<script setup>
import useCommon from "../use/common.js";
import {onMounted} from "vue";
import TimesIcon from "./icons/timesIcon.vue";
import useArticles from "../use/articles.js";

const { getImgUrl } = useCommon()
const {
    textareaElement,
    dropzoneElement,
    dropzone,
    newArticleTitle,
    newArticleText,
    storeArticle,
    initializeDropzone,
} = useArticles()

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

onMounted(() => {
    if (props.create) {
        initializeDropzone()
    }
})

async function store() {
    await storeArticle()
    alert('Success')
}
</script>

<template>
<article class='flex gap-[65px] h-[490px] max-w-[1028px] pt-[50px] pb-[80px] px-[50px] rounded-[30px] self-center w-full relative'
         :class='create ? "bg-bggray" : props.bgClass'>
    <div
        v-if='create'
        ref='dropzoneElement'
        class='w-[330px] h-[350px] border-light-orange border-2 border-dashed hover:cursor-pointer'>
    </div>
    <img v-if='!create'
        :src="getImgUrl(props.imgPath)"
        alt='photo' class='max-w-[340px] max-h-[350px]'>
    <div class='flex flex-col gap-[40px] text-white grow'>
        <button
            class='absolute top-[50px] right-[50px] hover:cursor-pointer hover:scale-[1.2] transition-all active:scale-[1]'
            @click='$emit("closeCreate")'>
            <timesIcon />
        </button>
        <input
            v-if='create'
            v-model='newArticleTitle'
            type='text'
            class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                focus:border-orange focus:bg-bluebg text-[30px] font-roboto700 max-w-[465px]'>
        <h6 v-if='!create'
            class='font-roboto700 text-[30px] leading-[35px]'>
            {{ props.title }}
        </h6>
        <div class='overflow-auto custom-scrollbar h-[252px]'>
            <textarea
                v-if='create'
                v-model='newArticleText'
                ref='textareaElement'
                class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] overflow-hidden
                    focus:shadow-around focus:border-orange focus:bg-bluebg text-[15px] font-roboto500 w-full resize-none'>

            </textarea>
            <p v-if='!create' class='font-roboto500 text-[15px] leading-[18px]'>
                {{ props.text }}
            </p>
        </div>
    </div>
    <button
        v-if='props.create'
        @click='store'
        class='absolute bottom-[50px] right-[75px] uppercase font-roboto500 text-white text-[20px]
        hover:cursor-pointer hover:scale-[1.2] active:scale-[1] transition-all' >
        Сохранить
    </button>
    <button
        v-if='!props.create'
        class='absolute bottom-[50px] right-[75px] uppercase font-roboto500 text-white text-[20px]
        hover:cursor-pointer hover:scale-[1.2] active:scale-[1] transition-all' >
        Редактировать
    </button>
</article>
</template>

<style scoped>

</style>
