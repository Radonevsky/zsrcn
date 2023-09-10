<script setup>
import {onMounted, ref} from "vue";
import TimesIcon from "./icons/timesIcon.vue";
import useArticles from "../use/articles.js";

const {
    textareaElement,
    dropzoneElement,
    newArticleTitle,
    newArticleText,
    editArticleTitle,
    editArticleText,
    updateArticle,
    storeArticle,
    deleteArticle,
    initializeDropzone,
} = useArticles()

const emit = defineEmits(['articleCreated', 'articleUpdated'])

const props = defineProps({
    id: Number,
    title: String,
    content: String,
    bgClass: String,
    img_url: String,
    create: {
        type: Boolean,
        default: false,
    },
})

const editMode = ref(false)

onMounted(() => {
    if (props.create) {
        initializeDropzone()
    }
})

async function store() {
    await storeArticle()
    newArticleTitle.value = ''
    newArticleText.value = ''
    emit('articleCreated')
}

async function update() {
    await updateArticle(props.id)
    editMode.value = false
    editArticleTitle.value = ''
    editArticleText.value = ''
    emit('articleUpdated')
}

function save() {
    if (props.create) {
        store()
    } else if (editMode) {
        update()
    }
}

function editModeOn() {
    editMode.value = true
    editArticleTitle.value = props.title
    editArticleText.value = props.content
}
</script>

<template>
<article
    class='flex gap-[65px] h-[490px] max-w-[1028px] pt-[50px] pb-[80px] px-[50px] rounded-[30px] self-center w-full relative '
    :class='create || editMode ? "bg-bggray" : props.bgClass'>
    <div
        v-if='create'
        ref='dropzoneElement'
        class='w-[330px] h-[350px] border-light-orange border-2 border-dashed hover:cursor-pointer'>
    </div>
    <img v-if='!create'
        :src="props.img_url"
        alt='photo' class='max-w-[340px] max-h-[350px]'>
    <div class='flex flex-col gap-[40px] text-white grow'>
        <button
            class='absolute top-[50px] right-[50px] hover:cursor-pointer hover:scale-[1.2] transition-all active:scale-[1]'>
            <timesIcon
                v-if='create'
                @click='deleteArticle(props.id)'/>
        </button>
        <button
            class='absolute top-[50px] right-[50px] hover:cursor-pointer hover:scale-[1.2] transition-all active:scale-[1]'>
            <timesIcon
                v-if='editMode'
                @click='editMode = false'/>
        </button>
        <input
            v-if='create'
            v-model='newArticleTitle'
            type='text'
            class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                focus:border-orange focus:bg-bluebg text-[30px] font-roboto700 max-w-[465px]'>
        <input
            v-if='editMode'
            v-model='editArticleTitle'
            type='text'
            class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                focus:border-orange focus:bg-bluebg text-[30px] font-roboto700 max-w-[465px]'>
        <h6 v-if='!create && !editMode'
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
            <textarea
                v-if='editMode'
                v-model='editArticleText'
                ref='textareaElement'
                class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] overflow-hidden
                    focus:shadow-around focus:border-orange focus:bg-bluebg text-[15px] font-roboto500 w-full resize-none'>
            </textarea>
            <p v-if='!create && !editMode' class='font-roboto500 text-[15px] leading-[18px]'>
                {{ props.content }}
            </p>
        </div>
    </div>
    <button
        v-if='props.create || editMode'
        @click='save'
        class='absolute bottom-[50px] right-[75px] uppercase font-roboto500 text-white text-[20px]
        hover:cursor-pointer hover:scale-[1.2] active:scale-[1] transition-all' >
        Сохранить
    </button>
    <button
        v-if='!props.create && !editMode'
        @click='editModeOn'
        class='absolute bottom-[50px] right-[75px] uppercase font-roboto500 text-white text-[20px]
        hover:cursor-pointer hover:scale-[1.2] active:scale-[1] transition-all' >
        Редактировать
    </button>
</article>
</template>

<style scoped>

</style>
