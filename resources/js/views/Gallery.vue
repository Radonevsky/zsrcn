<script setup>
import {onMounted, ref} from "vue";
import useGallery from "../use/gallery.js";
import ContentContainer from "../layouts/ContentContainer.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import PlusIcon from "../components/icons/plusIcon.vue";
import SaveButton from "../components/SaveButton.vue";
import GalleryPhoto from "../components/GalleryPhoto.vue";

const {
    dropzoneElement,
    storePhotoButtonShow,
    photos,
    initializeDropzone,
    storePhotos,
} = useGallery()

const dropzoneMode = ref(false)
const isAdmin = ref(true)

onMounted(() => {
    if (isAdmin) {
        initializeDropzone()
    }
})

function savePhotos() {
    dropzoneMode.value = false
    storePhotos()
}

</script>

<template>
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
                        Скрыть
                    </span>
            </button>
            <div
                v-show='dropzoneMode'
                ref='dropzoneElement'
                class='min-h-[100px] pt-3 border-light-orange border-2 border-dashed hover:cursor-pointer text-center bg-light-bg text-tblue
                       flex justify-items-center'>
            </div>
            <SaveButton
                v-if='storePhotoButtonShow'
                @click=savePhotos
                text='Сохранить'
                class='mx-auto mt-9'/>

            <div class='flex flex-wrap justify-start align-top -mx-[15px]'>
                <GalleryPhoto
                    v-for='photo in photos'
                    :prev-url='photo.preview_url'/>
            </div>

            <ShowMoreButton text='показать еще' class='mx-auto mt-[60px]'/>
        </ContentContainer>
    </div>
</template>

<style scoped>
</style>
