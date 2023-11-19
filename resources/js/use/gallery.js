import {ref, watch} from "vue";
import {Dropzone} from "dropzone";
import axios from "axios";

const dropzoneElement = ref(null)
const dropzone = ref(null)
const storePhotoButtonShow = ref(false)
const photos = ref([])

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

async function fetchPhotos() {
    const response = await axios.get('/api/photos')
    return response.data.photos
}

async function setPhotos() {
    photos.value = await fetchPhotos()
}

setPhotos()

async function storePhotos() {
    let data = new FormData()
    const imgArray = dropzone.value.getAcceptedFiles()

    imgArray.forEach(img => {
        data.append('photos[]', img)
        dropzone.value.removeFile(img)
    })

    await axios.post('/api/photos', data)

    storePhotoButtonShow.value = false
    setPhotos()
}

export default function useGallery() {
    return {
        dropzoneElement,
        dropzone,
        storePhotoButtonShow,
        photos,
        initializeDropzone,
        storePhotos,
    }
}
