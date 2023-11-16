<script setup>
import {onMounted} from "vue";
import useGallery from "../use/gallery.js";

const {
    dropzoneElement,
    initializeDropzone
} = useGallery()

onMounted(() => {
    initializeDropzone()
})

</script>

<template>
    <div>
        <div ref='dropzoneElement' class='p-5 bg-bggray text-center text-tblue'>
            Загрузить
        </div>
    </div>
</template>

<style scoped>
</style>
