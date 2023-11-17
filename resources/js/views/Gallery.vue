<script setup>
import {onMounted, ref} from "vue";
import useGallery from "../use/gallery.js";
import ContentContainer from "../layouts/ContentContainer.vue";
import ShowMoreButton from "../components/ShowMoreButton.vue";
import PlusIcon from "../components/icons/plusIcon.vue";

const {
    dropzoneElement,
    initializeDropzone
} = useGallery()

const dropzoneMode = ref(false)
const isAdmin = ref(true)

onMounted(() => {
    if (isAdmin) {
        initializeDropzone()
    }
})

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
            <ShowMoreButton text='показать еще' class='mx-auto mt-[60px]'/>
        </ContentContainer>
    </div>
</template>

<style scoped>
</style>
