import {ref, watch} from "vue";
import {Dropzone} from "dropzone";

const newArticleTitle = ref('')
const newArticleText = ref('')
const textareaElement = ref(null)
const dropzoneElement = ref(null)
const dropzone = ref(null)
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
watch(textareaElement, ()=> {
    textareaElement.value.style.height = '237px'
})
watch(newArticleText, ()=> {
    if (parseInt(textareaElement.value.scrollHeight) > 237) {
        textareaElement.value.style.height = `${textareaElement.value.scrollHeight}px`
    }
})

export default function useArticles() {
    return {
        dropzoneElement,
        dropzone,
        textareaElement,
        newArticleTitle,
        newArticleText,
        storeArticle,
        initializeDropzone,
    }
}
