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
    })
    dropzone.value.on('addedfile', file => {
        storePhotoButtonShow.value = true
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
    })

    return axios.post('/api/photos', data)
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
