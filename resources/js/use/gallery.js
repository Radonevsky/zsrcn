import {ref, watch} from "vue";
import {Dropzone} from "dropzone";
import axios from "axios";

const dropzoneElement = ref(null)
const dropzone = ref(null)
const storePhotoButtonShow = ref(false)
const photos = ref([])
const currentPage = ref(0)
const currentPhotoIndex = ref(null)
const currentPhotoUrl = ref(null)

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

async function fetchAlbums(page, partly) {
    const response = await axios.get(`/api/albums?page=${page}&partly=${partly ? 1 : 0}`)
    return response.data.albums
}

async function fetchAlbumOtherPhotos(albumId) {
    const response = await axios.get(`/api/albums/${albumId}`)
    return response.data.images
}

async function setPhotos(page) {
    const partionedPhotos = await fetchPhotos(page)

    if (partionedPhotos.length > 0) {
        photos.value.push(...partionedPhotos)
        currentPage.value++
        return true
    }

    return false
}

async function setPhotoToViewer(direction) {
    const nextPhotoIndex = currentPhotoIndex.value + direction
    if (!!photos.value[nextPhotoIndex]) {
        currentPhotoUrl.value = photos.value[nextPhotoIndex].url
        currentPhotoIndex.value += direction
    } else if (!photos.value[nextPhotoIndex] && nextPhotoIndex > photos.value.length - 1) {

        const haveMorePhotos = await setPhotos(currentPage.value)
        if (haveMorePhotos) {
            currentPhotoUrl.value = photos.value[nextPhotoIndex].url
            currentPhotoIndex.value++
        }
    }
}

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

async function storeAlbum(name) {
    let data = new FormData()
    data.append('name', name)
    const imgArray = dropzone.value.getAcceptedFiles()

    imgArray.forEach(img => {
        data.append('photos[]', img)
        dropzone.value.removeFile(img)
    })

    const uploadedAlbum = await axios.post('/api/albums', data)

    storePhotoButtonShow.value = false
    photos.value.unshift(...uploadedAlbum.data.photos)
}

export default function useGallery() {
    return {
        dropzoneElement,
        dropzone,
        storePhotoButtonShow,
        photos,
        currentPage,
        currentPhotoIndex,
        currentPhotoUrl,
        initializeDropzone,
        storePhotos,
        setPhotoToViewer,
        storeAlbum,
        fetchAlbums,
        fetchAlbumOtherPhotos,
    }
}
