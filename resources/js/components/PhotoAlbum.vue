<script setup>

import GalleryPhoto from "./GalleryPhoto.vue";
import useGallery from "../use/gallery.js";
import {ref} from "vue";
import ImageViewModal from "./ImageViewModal.vue";
import CommonButton from "./CommonButton.vue";
import PlusIcon from "./icons/plusIcon.vue";

const {
    currentPhotoUrl,
    currentPhotoIndex,
    setPhotoToViewer,
} = useGallery()

const props = defineProps({
    name: String,
    id: Number,
    images: Array,
    partly: Boolean,
    addPhotoMode: Boolean,
})
const emits = defineEmits(['loadFullAlbum', 'delete', 'addPhotoOn'])
const viewMode = ref(false)
const isAdmin = ref(true)

function openPhoto(photo) {
    currentPhotoUrl.value = photo.url
    currentPhotoIndex.value = props.images.indexOf(photo)
    viewMode.value = true
}
</script>

<template>
    <div class="mt-[28px]">
        <div class="text-[25px] font-roboto700 text-tblue text-center">
            <span>{{ props.name }}</span>
            <button
                v-if="isAdmin"
                @click="emits('delete', props.id)"
                class='ml-[10px] bg-pink p-[2px] text-[16px] rounded hover:cursor-pointer'>
                Удалить альбом
            </button>
        </div>
        <button
            v-if='isAdmin'
            class='mb-[30px] flex mx-auto gap-[5px] hover:cursor-pointer'
            @click='emits("addPhotoOn", props.id)'>
                <span class='font-roboto700 leading-[23px] text-tblue-light uppercase'>
                    Добавить фото
                </span>
            <plusIcon></plusIcon>
        </button>
        <slot></slot>
        <div class='flex flex-wrap justify-start align-top -mx-[15px] mt-[20px]'>
            <GalleryPhoto
                v-for='photo in props.images'
                @click='openPhoto(photo)'
                :prev-url='photo.preview_url'/>
        </div>
        <ImageViewModal
            v-if='viewMode'
            :url='currentPhotoUrl'
            @close='viewMode = false'
            @next-photo='setPhotoToViewer(1)'
            @prev-photo='setPhotoToViewer(-1)'/>
        <common-button
            v-if='partly'
            @click='emits("loadFullAlbum", props.id)'
            text='Показать весь альбом'
            class='mx-auto'/>
    </div>
</template>

<style scoped>

</style>
