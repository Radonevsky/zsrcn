import {ref} from "vue";
import {Dropzone} from "dropzone";
import axios from "axios";
import adminApi from "../adminApi.js";
import router from "../router.js";
import imageCompression from 'browser-image-compression';

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
    dropzone.value.on('addedfile', () => {
        storePhotoButtonShow.value = true
    })

    dropzone.value.on('removedfile', () => {
        if (dropzone.value.getAcceptedFiles().length <= 0) {
            storePhotoButtonShow.value = false
        }
    })
}

async function fetchAlbums(page, partly) {
    const response = await axios.get(`/api/albums?page=${page}&partly=${partly ? 1 : 0}`)
    return response.data.albums
}

async function fetchAlbumOtherPhotos(albumId, offset) {
    const response = await axios.get(`/api/albums/${albumId}?offset=${offset}`)
    return response.data.images
}



async function storePhotosToAlbum(albumId) {
    try {
        let data = new FormData()
        const imgArray = dropzone.value.getAcceptedFiles()

        for (const img of imgArray) {
            const compressedImg = await compressImage(img);
            data.append('photos[]', compressedImg);
            dropzone.value.removeFile(img);
        }

        await adminApi.post(`/api/auth/albums/${albumId}`, data)

        storePhotoButtonShow.value = false

        return true
    } catch (error) {
        alert('Ошибка при сохранении фото:', error);
        return false
    }
}

async function storeAlbum(name) {
    let data = new FormData()
    data.append('name', name)
    const imgArray = dropzone.value.getAcceptedFiles()

    for (const img of imgArray) {
        const compressedImg = await compressImage(img);
        data.append('photos[]', compressedImg);
        dropzone.value.removeFile(img);
    }

    await adminApi.post('/api/auth/albums', data)

    storePhotoButtonShow.value = false
}

async function compressImage(file) {
    const options = {
        maxSizeMB: 1,
        useWebWorker: true,
        initialQuality: 1,
    };
    try {
        const blob = await imageCompression(file, options);
        const compressedFile = new File([blob], file.name, {
            type: file.type,
            lastModified: Date.now()
        });
        return compressedFile;
    } catch (error) {
        console.error('Ошибка сжатия изображения:', error);
        throw error;
    }
}

async function removeAlbum(id) {
    const confirmed = confirm('Удалить альбом?')
    if (confirmed) {
        try {
            await adminApi.delete(`/api/auth/albums/${id}`);
            return true
        } catch (error) {
            alert('Ошибка при удалении альбома:', error);
            return false
        }
    } else {
        return false
    }
}

async function removePhoto(id) {
    const confirmed = confirm('Удалить фото?')
    if (confirmed) {
        try {
            await adminApi.delete(`/api/auth/photos/${id}`);
            return true
        } catch (error) {
            alert('Ошибка при удалении фото:', error);
            if (error.status === 401) {
                router.push({name: 'login'})
            }
            return false
        }
    } else {
        return false
    }
}

export default function useGallery() {
    return {
        dropzoneElement,
        dropzone,
        storePhotoButtonShow,
        photos,
        currentPage,
        initializeDropzone,
        storeAlbum,
        fetchAlbums,
        fetchAlbumOtherPhotos,
        removeAlbum,
        storePhotosToAlbum,
        removePhoto,
        compressImage,
    }
}
