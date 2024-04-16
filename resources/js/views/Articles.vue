<script setup>
import PageTitle from "../components/PageTitle.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
import PlusIcon from "../components/icons/plusIcon.vue";
import useArticles from "../use/articles.js";
import ArticleCard from "../components/ArticleCard.vue";
import AddButton from "./AddButton.vue";
import {ref, watch} from "vue";
import axios from "axios";

const {fetchArticles, coloredBg, storeArticle, dropzone} = useArticles()

const isAdmin = true
const textareaMaxHeight = ref(237)
const currentArticlesPage = ref(0)
const articles = ref([])
const newArticleMode = ref(false)
const newArticleTitle = ref('')
const newArticleText = ref('')
const textareaCreateElement = ref(null)

async function setArticles() {
    const partionedArticles = await fetchArticles(currentArticlesPage.value)
    if (partionedArticles.length > 0) {
        partionedArticles.forEach(item => {
            return coloredBg(item)
        })
        articles.value.push(...partionedArticles)
        currentArticlesPage.value++
    }
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
            await axios.delete(`/api/articles/${id}`)
            articles.value = articles.value.filter(item => item.id !== id)
            alert('Удалено')
        } catch (error) {
            alert('Ошибка при удалении новости:', error);
            return false
        }
    } else {
        return false
    }

}

async function saveArticle(body) {
    const imgArray = dropzone.value.getAcceptedFiles()
    const data = new FormData()
    data.append('image', imgArray[0])
    data.append('title', body.title)
    data.append('content', body.text)
    await storeArticle(data);
    articles.value = []
    currentArticlesPage.value = 0
    await setArticles()
    newArticleMode.value = false
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
</script>

<template>
    <div>
        <PageTitle title='Наши новости' bgClass='bg-orange'/>
        <div class='pb-[60px]' :class='isAdmin && !newArticleMode ? "pt-[25px] " : "pt-[77px] "'>
            <ContentContainer>
                <add-button
                    v-if='isAdmin && !newArticleMode'
                    @click='newArticleMode = true'
                    class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'>
                    Добавить новость
                </add-button>
                <div class='flex flex-col gap-[60px]'>
                    <ArticleCard
                        v-if='isAdmin && newArticleMode'
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
                        :content='item.content'
                        :img_url='item.img_prev_url'
                        :bg-class='item.bgClass'/>
                </div>
                <ShowMoreButton @click="setArticles(currentArticlesPage)" text='показать еще' class='mx-auto mt-[60px]'/>
            </ContentContainer>
        </div>
    </div>
</template>

<style scoped>

</style>
