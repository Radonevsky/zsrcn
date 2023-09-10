import {ref, watch} from "vue";
import {Dropzone} from "dropzone";
import axios from "axios";

const articles = ref([])
const newArticleTitle = ref('')
const newArticleText = ref('')
const textareaCreateElement = ref(null)
const textareaMaxHeight = ref(237)
const dropzoneElement = ref(null)
const dropzone = ref(null)
const newArticleMode = ref(false)
const articleBgClassColors = [
    'bg-purpl-blue',
    'bg-light-pink',
    'bg-light-blue',
]

const colorCounter = ref(0)
async function fetchArticles() {
    const response = await axios.get('/api/articles')
    return response.data.articles
}

async function setArticles() {
    articles.value = await fetchArticles()
    articles.value.forEach(item => {
        return coloredBg(item)
    })
}
setArticles()



function coloredBg(article) {
    if (colorCounter.value === articleBgClassColors.length) {
        colorCounter.value = 0
    }
    article.bgClass = articleBgClassColors[colorCounter.value]
    colorCounter.value++
    return article
}
async function storeArticle() {

    const imgArray = dropzone.value.getAcceptedFiles()

    const data = new FormData()
    data.append('image', imgArray[0])
    data.append('title', newArticleTitle.value)
    data.append('content', newArticleText.value)

    return axios.post('/api/articles', data)
}

async function updateArticle(id, data) {
    return axios.put(`/api/articles/${id}`, data)
}

function initializeDropzone() {
    dropzone.value = new Dropzone(dropzoneElement.value, {
        url: '/',
        autoProcessQueue: false,
        maxFiles: 1,
    })
}

async function deleteArticle(id) {
    if (!id) {
        newArticleMode.value = false
        newArticleTitle.value = ''
        newArticleText.value = ''
        return
    }
    await axios.delete(`/api/articles/${id}`)
    articles.value = articles.value.filter(item => item.id !== id)
    alert('Удалено')
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

export default function useArticles() {
    return {
        articles,
        dropzoneElement,
        dropzone,
        textareaCreateElement,
        newArticleTitle,
        newArticleText,
        newArticleMode,
        textareaMaxHeight,
        updateArticle,
        storeArticle,
        deleteArticle,
        setArticles,
        initializeDropzone,
    }
}
