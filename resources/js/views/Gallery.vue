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

const {
    dropzoneElement,
    storePhotoButtonShow,
    initializeDropzone,
    fetchAlbums,
    storeAlbum,
    fetchAlbumOtherPhotos,
} = useGallery()

const dropzoneMode = ref(false)
const isAdmin = ref(true)

const createAlbumMode = ref(false)
const albumName = ref('')
const albums = ref([])
const currentAlbumsPage = ref(0)

onMounted(() => {
    if (isAdmin) {
        initializeDropzone()
    }
})

function saveAlbum() {
    dropzoneMode.value = false
    storeAlbum(albumName.value)
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
    const otherImages = await fetchAlbumOtherPhotos(e)
    let tergetAlbum = albums.value.find(album => album.id === e)
    tergetAlbum.images.push(...otherImages)
    tergetAlbum.partly = false
}
</script>

<template>
    <router-link to='/gallery' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Галерея' bg-class='bg-yellow' :router-link='true'/>
    </router-link>
    <div class='py-[30px]'>
        <ContentContainer>
            <button
                v-if='isAdmin && !createAlbumMode'
                class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                @click='createAlbumMode = true'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        Создать альбом
                    </span>
                <plusIcon></plusIcon>
            </button>
            <button
                v-if='isAdmin && createAlbumMode'
                class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                @click='createAlbumMode = false'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        Отменить создание
                    </span>
            </button>
            <div v-show='createAlbumMode' class="text-center mx-auto">
                <common-input
                    v-model="albumName"
                    placeholder="Название альбома">
                </common-input>
                <div
                    ref='dropzoneElement'
                    class='mt-[20px] min-h-[100px] mb-[30px] pt-3 border-light-orange border-2 border-dashed hover:cursor-pointer
                       text-center bg-light-bg text-tblue flex gap-6 justify-items-center flex-wrap justify-center'>
                </div>
                <SaveButton
                    v-if='storePhotoButtonShow && albumName.length'
                    @click=saveAlbum
                    text='Создать альбом'
                    class='mx-auto my-9'/>
            </div>
            <div v-for="album in albums">
                <photo-album
                    @load-full-album="getAlbumOtherPhotos"
                    :id="album.id"
                    :partly="album.partly"
                    :name="album.name"
                    :images="album.images">
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

.dz-success-mark,
.dz-error-mark {
    display: none;
}

.dz-preview {
    width: 200px;
    overflow: hidden;
}

.dz-filename {
    max-width: 100%;
}

</style>
