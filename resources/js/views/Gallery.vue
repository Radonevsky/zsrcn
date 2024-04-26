<script setup>
import {onMounted, ref} from "vue";
import useGallery from "../use/gallery.js";
import ContentContainer from "../layouts/ContentContainer.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import PlusIcon from "../components/icons/plusIcon.vue";
import SaveButton from "../components/SaveButton.vue";
import PageTitle from "../components/PageTitle.vue";
import CommonInput from "../components/CommonInput.vue";
import PhotoAlbum from "../components/PhotoAlbum.vue";
import useCommon from "../use/common.js";

const {
    dropzoneElement,
    storePhotoButtonShow,
    initializeDropzone,
    fetchAlbums,
    storeAlbum,
    fetchAlbumOtherPhotos,
    removeAlbum,
    storePhotosToAlbum,
    removePhoto,
} = useGallery()

const {isAdmin} = useCommon()

const dropzoneMode = ref(false)
const createAlbumMode = ref(false)
const albumName = ref('')
const albums = ref([])
const currentAlbumsPage = ref(0)
const dropzoneIsBusy = ref(false)
const addPhotoToAlbumMode = ref(false)
const dropzoneForAlbum = ref(null)

onMounted(() => {
    if (isAdmin) {
        initializeDropzone()
    }
})

function createAlbumModeOn() {
    if (dropzoneIsBusy.value) {
        alert('Сначала отмените добавление фото в остальных местах')
        return
    }
    createAlbumMode.value = true
    dropzoneIsBusy.value = true
}

function createAlbumModeOff() {
    createAlbumMode.value = false
    dropzoneIsBusy.value = false
}

async function saveAlbum() {
    dropzoneMode.value = false
    await storeAlbum(albumName.value)
    dropzoneIsBusy.value = false
    createAlbumMode.value = false
    albums.value = []
    currentAlbumsPage.value = 0
    await setAlbums()
}

async function setAlbums() {
    const partionedAlbums = await fetchAlbums(currentAlbumsPage.value, true)

    if (partionedAlbums.length > 0) {
        albums.value.push(...partionedAlbums)
        currentAlbumsPage.value++
        return true
    }

    return false
}

setAlbums()

async function getAlbumOtherPhotos(e) {
    let tergetAlbum = albums.value.find(album => album.id === e)
    const otherImages = await fetchAlbumOtherPhotos(e, tergetAlbum.images.length)
    tergetAlbum.images.push(...otherImages)
    tergetAlbum.partly = false
}

async function deleteAlbum(e) {
    const res = await removeAlbum(e)
    if (res) {
        albums.value = []
        currentAlbumsPage.value = 0
        await setAlbums()
    }
}

function addPhotoModeByAlbumId(albumId) {
    if (dropzoneIsBusy.value) {
        alert('Сначала отмените создание альбома или добавление фото в другой альбом')
        return
    }
    dropzoneForAlbum.value = albums.value.find(album => album.id === albumId)
    dropzoneForAlbum.value.positionY = window.scrollY
    window.scroll(0,0)
    addPhotoToAlbumMode.value = true
    dropzoneIsBusy.value = true
}

function addPhotoModeOff() {
    window.scroll(0, dropzoneForAlbum.value.positionY)
    dropzoneForAlbum.value = null
    addPhotoToAlbumMode.value = false
    dropzoneIsBusy.value = false

}

async function savePhotos(albumId) {
    const stored = await storePhotosToAlbum(albumId)
    if (stored) {
        addPhotoModeOff()
        getAlbumOtherPhotos(albumId)
    }
}
async function deletePhotoFromAlbum(e) {
    const targetAlbum = albums.value.find(album => album.id === e.albumId)
    const res = await removePhoto(e.photoId)
    if (res) {
        targetAlbum.images = targetAlbum.images.filter(img => img.id !== e.photoId)
    }
}
</script>

<template>
    <router-link to='/gallery' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Галерея' bg-class='bg-yellow' :router-link='true'/>
    </router-link>
    <div class='py-[30px]'>
        <ContentContainer>
            <button
                v-if='isAdmin && !createAlbumMode && !addPhotoToAlbumMode'
                class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                @click='createAlbumModeOn'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        Создать альбом
                    </span>
                <plusIcon></plusIcon>
            </button>
            <button
                v-if='isAdmin && createAlbumMode'
                class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                @click='createAlbumModeOff'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        Отменить создание
                    </span>
            </button>
            <div v-show='createAlbumMode && isAdmin' class="text-center mx-auto">
                <common-input
                    v-model="albumName"
                    class="text-center"
                    placeholder="Название альбома">
                </common-input>
            </div>
            <div v-if='addPhotoToAlbumMode  && isAdmin' class="text-center mx-auto">
                <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                    Добавление фото в альбом {{ dropzoneForAlbum.name }}
                </span>
            </div>
            <div
                v-show='(createAlbumMode || addPhotoToAlbumMode) && isAdmin'
                ref='dropzoneElement'
                class='mt-[20px] min-h-[100px] mb-[30px] pt-3 border-light-orange border-2 border-dashed hover:cursor-pointer
                   text-center bg-light-bg text-tblue flex gap-6 justify-items-center flex-wrap justify-center'>
            </div>
            <SaveButton
                v-if='createAlbumMode && storePhotoButtonShow && albumName.length && isAdmin'
                @click=saveAlbum
                text='Создать альбом'
                class='mx-auto my-9'/>
            <SaveButton
                v-if='addPhotoToAlbumMode && storePhotoButtonShow && isAdmin'
                @click='savePhotos(dropzoneForAlbum.id)'
                text='Сохранить'
                class='mx-auto my-9'/>
            <button
                v-if='isAdmin && addPhotoToAlbumMode'
                class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                @click='addPhotoModeOff'>
                <span class='ml-[10px] bg-pink p-[2px] text-tblue text-[16px] rounded hover:cursor-pointer'>
                    Отменить добавление фото в альбом
                </span>
            </button>

            <div v-for="album in albums">
                <photo-album
                    @load-full-album="getAlbumOtherPhotos"
                    @delete="deleteAlbum"
                    @add-photo-on="addPhotoModeByAlbumId"
                    @delete-photo-from-album="deletePhotoFromAlbum"
                    :id="album.id"
                    :partly="album.partly"
                    :name="album.name"
                    :images="album.images">
                    <save-button
                        v-if="isAdmin && album.addPhotoMode && storePhotoButtonShow"
                        text="Сохранить фото"
                        class='ml-[10px] bg-pink p-[2px] text-[16px] rounded hover:cursor-pointer'>

                    </save-button>
                </photo-album>
            </div>
            <ShowMoreButton @click='setAlbums(currentAlbumsPage)' text='Еще альбомы' class='mx-auto mt-[60px]'/>
        </ContentContainer>
    </div>
</template>

<style>
.dz-image img {
    margin: 0 auto;
}
</style>
