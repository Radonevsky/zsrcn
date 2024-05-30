<script setup>
import PageTitle from "../components/PageTitle.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
import useArticles from "../use/articles.js";
import ArticleCard from "../components/ArticleCard.vue";
import AddButton from "./AddButton.vue";
import {ref, watch} from "vue";
import axios from "axios";
import useCommon from "../use/common.js";
import adminApi from "../adminApi.js";
import useGallery from "../use/gallery.js";
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import FilterIcon from "../components/icons/filterIcon.vue";

const {fetchArticles, coloredBg, storeArticle, dropzone} = useArticles()
const {isAdmin} = useCommon()
const {compressImage} = useGallery()

const textareaMaxHeight = ref(237)
const currentArticlesPage = ref(0)
const articles = ref([])
const newArticleMode = ref(false)
const newArticleTitle = ref('')
const newArticleText = ref('')
const textareaCreateElement = ref(null)
const preloader = ref(false)
const selectedDate = ref(null);
const filterOpened = ref(false)

async function setArticles() {
    preloader.value = true
    const partionedArticles = await fetchArticles(currentArticlesPage.value, selectedDate.value)
    if (partionedArticles.length > 0) {
        partionedArticles.forEach(item => {
            return coloredBg(item)
        })
        articles.value.push(...partionedArticles)
        currentArticlesPage.value++
    }
    preloader.value = false
}

setArticles()

function refreshArticle(id, data) {
    const targetArticle = articles.value.find(article => article.id === id)
    targetArticle.title = data.title
    targetArticle.content = data.content
}

async function deleteArticle(id) {
    if (!id) {
        newArticleMode.value = false
        newArticleTitle.value = ''
        newArticleText.value = ''
        return
    }
    const confirmed = confirm('Удалить новость?')
    if (confirmed) {
        try {
            preloader.value = true
            await adminApi.delete(`/api/auth/articles/${id}`)
            articles.value = articles.value.filter(item => item.id !== id)
            alert('Удалено')
            preloader.value = false
        } catch (error) {
            alert('Ошибка при удалении новости:', error);
            preloader.value = false
            return false
        }
    } else {
        return false
    }

}

async function saveArticle(body) {
    preloader.value = true
    const imgArray = dropzone.value.getAcceptedFiles()
    const data = new FormData()
    const compressedImg = await compressImage(imgArray[0])
    data.append('image', compressedImg)
    data.append('title', body.title)
    data.append('content', body.text)
    await storeArticle(data);
    articles.value = []
    currentArticlesPage.value = 0
    await setArticles()
    newArticleMode.value = false
    preloader.value = false
}

watch(textareaCreateElement, ()=> {
    if (textareaCreateElement.value) {
        textareaCreateElement.value.style.height = `${textareaMaxHeight.value}px`
    }
})

watch(newArticleText, ()=> {
    if (newArticleText.value && parseInt(textareaCreateElement.value.scrollHeight) > textareaMaxHeight.value) {
        textareaCreateElement.value.style.height = `${textareaCreateElement.value.scrollHeight}px`
    }
})
const {
    isImpairedVision,
} = useCommon()

const dateFilterChanged = (handleDate)=> {
    selectedDate.value = handleDate

    articles.value = []
    currentArticlesPage.value = 0
    setArticles()
}

const switchFilter = ()=> {
    if (filterOpened.value && !selectedDate.value) {
        filterOpened.value = false

        return
    }

    filterOpened.value = true
}
</script>

<template>
    <div>
        <PageTitle title='Наши новости' bgClass='bg-orange'/>
        <div class='pb-[60px]' :class='isAdmin && !newArticleMode ? "pt-[25px] " : "pt-[77px] "'>
            <ContentContainer>
                <div v-if="preloader" class="w-[100px] mx-auto">
                    <img src="../../../resources/images/preloader.gif" class="w-[100px] h-[100px]" alt="Loading">
                </div>
                <div class="max-w-[1028px] mx-auto mb-[45px] flex gap-[15px] min-h-[38px]">
                    <filter-icon
                        class="hover:cursor-pointer"
                        @click="switchFilter"
                        :color="filterOpened ? '#D1E683' : '#6070A3'"
                    ></filter-icon>
                    <VueDatePicker
                        :model-value="selectedDate"
                        v-if="filterOpened"
                        locale="ru"
                        select-text="Выбрать"
                        cancel-text="Отмена"
                        @update:model-value="dateFilterChanged"
                        @cleared="filterOpened = false"
                        month-picker
                        dark
                        class="max-w-[150px]"
                    ></VueDatePicker>
                </div>
                <add-button
                    v-if='isAdmin && !newArticleMode && !preloader'
                    @click='newArticleMode = true'
                    class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'>
                    Добавить новость
                </add-button>
                <div class='flex flex-col gap-[60px]'>
                    <ArticleCard
                        v-if='isAdmin && newArticleMode && !preloader'
                        :create='true'
                        @delete="deleteArticle"
                        @saveArticle='saveArticle'/>
                    <ArticleCard
                        v-for='item in articles'
                        :key='item.id'
                        @articleUpdated='refreshArticle'
                        @delete="deleteArticle"
                        :id='item.id'
                        :title='item.title'
                        :createdAt='item.created_date'
                        :content='item.content'
                        :img_url='item.img_prev_url'
                        :bg-class='item.bgClass'/>
                </div>
                <ShowMoreButton @click="setArticles(currentArticlesPage)" text='показать еще' class='mx-auto mt-[60px]'/>
            </ContentContainer>
        </div>
    </div>
</template>

<style>
.dp__theme_dark {
    --dp-primary-color: #D1E683;
    --dp-background-color: #6070A3;
    --dp-icon-color: #fff;
    --dp-border-color: #6070A3;
    --dp-hover-color: #D1E683;
}
</style>
