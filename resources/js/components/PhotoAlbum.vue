<script setup>

import GalleryPhoto from "./GalleryPhoto.vue";
import useGallery from "../use/gallery.js";
import {ref} from "vue";
import ImageViewModal from "./ImageViewModal.vue";
import CommonButton from "./CommonButton.vue";

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
})
const emits = defineEmits(['loadFullAlbum'])
const viewMode = ref(false)
function openPhoto(photo) {
    currentPhotoUrl.value = photo.url
    currentPhotoIndex.value = props.images.indexOf(photo)
    viewMode.value = true
}
</script>

<template>
    <div class="mt-[28px]">
        <p class="text-[25px] font-roboto700 text-tblue text-center">
            {{ props.name }}
        </p>
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
