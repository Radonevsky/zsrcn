<script setup>
import {onMounted, ref} from "vue";
import useGallery from "../use/gallery.js";
import ContentContainer from "../layouts/ContentContainer.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import PlusIcon from "../components/icons/plusIcon.vue";
import SaveButton from "../components/SaveButton.vue";
import GalleryPhoto from "../components/GalleryPhoto.vue";
import ImageViewModal from "../components/ImageViewModal.vue";
import PageTitle from "../components/PageTitle.vue";

const {
    dropzoneElement,
    storePhotoButtonShow,
    photos,
    currentPage,
    currentPhotoIndex,
    currentPhotoUrl,
    initializeDropzone,
    storePhotos,
    setPhotos,
    setPhotoToViewer,
} = useGallery()

const dropzoneMode = ref(false)
const isAdmin = ref(true)
const viewMode = ref(false)

onMounted(() => {
    if (isAdmin) {
        initializeDropzone()
    }
})

function savePhotos() {
    dropzoneMode.value = false
    storePhotos()
}

function openPhoto(photo) {
    currentPhotoUrl.value = photo.url
    currentPhotoIndex.value = photos.value.indexOf(photo)
    viewMode.value = true
}

</script>

<template>
    <router-link to='/gallery' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Галерея' bg-class='bg-yellow' :router-link='true'/>
    </router-link>
    <div class='py-[30px]'>
        <ContentContainer>
            <button
                v-if='isAdmin && !dropzoneMode'
                class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                @click='dropzoneMode = true'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        Загрузить фотографии
                    </span>
                <plusIcon></plusIcon>
            </button>
            <button
                v-if='isAdmin && dropzoneMode'
                class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
                @click='dropzoneMode = false'>
                    <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                        Скрыть область загрузки
                    </span>
            </button>
            <div
                v-show='dropzoneMode'
                ref='dropzoneElement'
                class='min-h-[100px] mb-[30px] pt-3 border-light-orange border-2 border-dashed hover:cursor-pointer
                       text-center bg-light-bg text-tblue flex gap-6 justify-items-center flex-wrap  justify-center'>
            </div>
            <SaveButton
                v-if='storePhotoButtonShow'
                @click=savePhotos
                text='Сохранить'
                class='mx-auto my-9'/>

            <div class='flex flex-wrap justify-start align-top -mx-[15px]'>
                <GalleryPhoto
                    v-for='photo in photos'
                    @click='openPhoto(photo)'
                    :prev-url='photo.preview_url'/>
            </div>

            <ShowMoreButton @click='setPhotos(currentPage)' text='показать еще' class='mx-auto mt-[60px]'/>

            <ImageViewModal
                v-if='viewMode'
                :url='currentPhotoUrl'
                @close='viewMode = false'
                @next-photo='setPhotoToViewer(1)'
                @prev-photo='setPhotoToViewer(-1)'/>

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
