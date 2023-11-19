import {ref, watch} from "vue";
import {Dropzone} from "dropzone";
import axios from "axios";

const dropzoneElement = ref(null)
const dropzone = ref(null)
const storePhotoButtonShow = ref(false)
const photos = ref([])
const currentPage = ref(0)

function initializeDropzone() {
    dropzone.value = new Dropzone(dropzoneElement.value, {
        url: '/',
        autoProcessQueue: false,
        addRemoveLinks: true,
        dictRemoveFile: 'Удалить',
    })
    dropzone.value.on('addedfile', file => {
        storePhotoButtonShow.value = true
    })

    dropzone.value.on('removedfile', file => {
        if (dropzone.value.getAcceptedFiles().length <= 0) {
            storePhotoButtonShow.value = false
        }
    })
}

async function fetchPhotos(page) {
    const response = await axios.get(`/api/photos?page=${page}`)
    return response.data.photos
}

async function setPhotos(page) {
    const partionedPhotos = await fetchPhotos(page)

    if (partionedPhotos.length > 0) {
        photos.value.push(...partionedPhotos)
        currentPage.value++
    }
}

setPhotos(currentPage.value)

async function storePhotos() {
    let data = new FormData()
    const imgArray = dropzone.value.getAcceptedFiles()

    imgArray.forEach(img => {
        data.append('photos[]', img)
        dropzone.value.removeFile(img)
    })

    const uploadedPhotos = await axios.post('/api/photos', data)

    storePhotoButtonShow.value = false
    photos.value.unshift(...uploadedPhotos.data.photos)
}

export default function useGallery() {
    return {
        dropzoneElement,
        dropzone,
        storePhotoButtonShow,
        photos,
        currentPage,
        setPhotos,
        initializeDropzone,
        storePhotos,
    }
}
