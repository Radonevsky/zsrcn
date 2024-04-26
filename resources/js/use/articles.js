import {ref, watch} from "vue";
import {Dropzone} from "dropzone";
import axios from "axios";
import adminApi from "../adminApi.js";

const dropzoneElement = ref(null)
const dropzone = ref(null)
const articleBgClassColors = [
    'bg-purpl-blue',
    'bg-light-pink',
    'bg-light-blue',
]
const colorCounter = ref(0)

async function fetchArticles(page) {
    const response = await axios.get(`/api/articles?page=${page}`)
    return response.data.articles
}

function coloredBg(article) {
    article.bgClass = articleBgClassColors[colorCounter.value]
    colorCounter.value++
    if (colorCounter.value > 2) {
        colorCounter.value = 0
    }

    return article
}


async function updateArticle(id, data) {
    return adminApi.put(`/api/auth/articles/${id}`, data)
}

function initializeDropzone() {
    dropzone.value = new Dropzone(dropzoneElement.value, {
        url: '/',
        autoProcessQueue: false,
        maxFiles: 1,
    })
}

async function storeArticle(data) {
    return adminApi.post('/api/auth/articles', data)
}


export default function useArticles() {
    return {
        dropzoneElement,
        dropzone,
        updateArticle,
        coloredBg,
        fetchArticles,
        initializeDropzone,
        storeArticle,
    }
}
