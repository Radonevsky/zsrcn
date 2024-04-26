<script setup>
import {onMounted, ref, watch} from "vue";
import TimesIcon from "./icons/timesIcon.vue";
import useArticles from "../use/articles.js";
import useCommon from "../use/common.js";

const {
    dropzoneElement,
    updateArticle,
    initializeDropzone,
    dropzone,
} = useArticles()
const {isAdmin} = useCommon()

const emit = defineEmits(['saveArticle', 'articleUpdated', 'delete'])

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
const textareaEditElement = ref('')
const textareaCreateElement = ref(null)
const textareaMaxHeight = ref(237)
const newArticleTitle = ref('')
const editArticleTitle = ref('')
const newArticleText = ref('')
const editArticleText = ref('')

onMounted(() => {
    if (props.create) {
        initializeDropzone()
    }
})

watch(newArticleText, ()=> {
    if (newArticleText.value && parseInt(textareaCreateElement.value.scrollHeight) > textareaMaxHeight.value) {
        textareaCreateElement.value.style.height = `${textareaCreateElement.value.scrollHeight}px`
    }
})

watch(textareaCreateElement, ()=> {
    if (textareaCreateElement.value) {
        textareaCreateElement.value.style.height = `${textareaMaxHeight.value}px`
    }
})

watch(textareaEditElement, ()=> {
    if (textareaEditElement.value) {
        textareaEditElement.value.style.height = `${textareaMaxHeight.value}px`
        editArticleText.value = props.content
        editArticleTitle.value = props.title
    }
})

watch(editArticleText, ()=> {
    if (editArticleText.value && parseInt(textareaEditElement.value.scrollHeight) > textareaMaxHeight.value) {
        textareaEditElement.value.style.height = `${textareaEditElement.value.scrollHeight}px`
    }
})

async function store() {
    if (!dropzone.value.getAcceptedFiles().length) {
        alert('Выберите фотографию')
        return
    }
    if (!newArticleTitle.value.length || !newArticleText.value.length) {
        alert('Укажите заголовок и содержимое новости')
        return
    }
    emit('saveArticle', {title: newArticleTitle.value, text: newArticleText.value})
    newArticleTitle.value = ''
    newArticleText.value = ''
}

async function update() {
    const data = {
        title: editArticleTitle.value,
        content: editArticleText.value
    }
    await updateArticle(props.id, data)
    editMode.value = false
    emit('articleUpdated', props.id, data)
}

function save() {
    if (props.create) {
        store()
    } else if (editMode) {
        update()
    }
}
</script>

<template>
<article
    class='flex gap-[65px] h-[490px] max-w-[1028px] pt-[50px] pb-[80px] px-[50px] rounded-[30px] self-center w-full relative '
    :class='create || editMode ? "bg-bggray" : props.bgClass'>
    <div
        v-if='create && isAdmin'
        ref='dropzoneElement'
        class='w-[330px] h-[350px] border-light-orange border-2 border-dashed hover:cursor-pointer'>
    </div>
    <img v-if='!create'
        :src="props.img_url"
        alt='photo' class='max-w-[340px] max-h-[350px]'>
    <div class='flex flex-col gap-[40px] text-white grow'>
        <button
            v-if='isAdmin'
            class='absolute top-[50px] right-[50px] hover:cursor-pointer hover:scale-[1.2] transition-all active:scale-[1]'>
            <timesIcon
                @click='emit("delete", props.id)'/>
        </button>
        <button
            class='absolute top-[50px] right-[50px] hover:cursor-pointer hover:scale-[1.2] transition-all active:scale-[1]'>
            <timesIcon
                v-if='editMode && isAdmin'
                @click='editMode = false'/>
        </button>
        <input
            v-if='create && isAdmin'
            v-model='newArticleTitle'
            type='text'
            class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                focus:border-orange focus:bg-bluebg text-[30px] font-roboto700 max-w-[465px]'>
        <input
            v-if='editMode && isAdmin'
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
                v-if='create && isAdmin'
                v-model='newArticleText'
                ref='textareaCreateElement'
                class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] overflow-hidden
                    focus:shadow-around focus:border-orange focus:bg-bluebg text-[15px] font-roboto500 w-full resize-none'>

            </textarea>
            <textarea
                v-if='editMode && isAdmin'
                v-model='editArticleText'
                ref='textareaEditElement'
                class='bg-bggray p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] overflow-hidden
                    focus:shadow-around focus:border-orange focus:bg-bluebg text-[15px] font-roboto500 w-full resize-none'>
            </textarea>
            <p v-if='!create && !editMode' class='font-roboto500 text-[15px] leading-[18px]' style="white-space: pre-line;">
                {{ props.content }}
            </p>
        </div>
    </div>
    <button
        v-if='(props.create || editMode) && isAdmin'
        @click='save'
        class='absolute bottom-[50px] right-[75px] uppercase font-roboto500 text-white text-[20px]
        hover:cursor-pointer hover:scale-[1.2] active:scale-[1] transition-all' >
        Сохранить
    </button>
    <button
        v-if='!props.create && !editMode && isAdmin'
        @click='editMode = true'
        class='absolute bottom-[50px] right-[75px] uppercase font-roboto500 text-white text-[20px]
        hover:cursor-pointer hover:scale-[1.2] active:scale-[1] transition-all' >
        Редактировать
    </button>
</article>
</template>

<style scoped>

</style>
