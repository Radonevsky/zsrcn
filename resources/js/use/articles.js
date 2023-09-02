import {ref, watch} from "vue";
import {Dropzone} from "dropzone";
import axios from "axios";

const articles = ref([])
const newArticleTitle = ref('')
const newArticleText = ref('')
const textareaElement = ref(null)
const dropzoneElement = ref(null)
const dropzone = ref(null)
const articleBgClassColors = [
    'bg-light-pink',
    'bg-light-blue',
    'bg-purpl-blue',
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

function initializeDropzone() {
    dropzone.value = new Dropzone(dropzoneElement.value, {
        url: '/asfg',
        autoProcessQueue: false,
        maxFiles: 1,
    })
}

async function deleteArticle(id) {
    await axios.delete(`/api/articles/${id}`)
    articles.value = articles.value.filter(item => item.id !== id)
    alert('Удалено')
}
watch(textareaElement, ()=> {
    if (textareaElement.value) {
        textareaElement.value.style.height = '237px'
    }
})
watch(newArticleText, ()=> {
    if (newArticleText.value && parseInt(textareaElement.value.scrollHeight) > 237) {
        textareaElement.value.style.height = `${textareaElement.value.scrollHeight}px`
    }
})

export default function useArticles() {
    return {
        articles,
        dropzoneElement,
        dropzone,
        textareaElement,
        newArticleTitle,
        newArticleText,
        storeArticle,
        deleteArticle,
        setArticles,
        initializeDropzone,
    }
}
