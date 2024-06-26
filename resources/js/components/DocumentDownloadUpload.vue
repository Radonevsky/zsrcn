<script setup>

import DownloadDocButton from "./DownloadDocButton.vue";
import CommonButton from "./CommonButton.vue";
import useCommon from "../use/common.js";
import {defineEmits, ref} from "vue";

const props = defineProps({
    name: String,
    type: String,
    uuid: String,
})

const emit = defineEmits(['updateDoc'])

const {
    isAdmin,
    uploadDocument,
    downloadDocument,
    replaceDocument,
    downloadByUuid,
} = useCommon()
const uploadMode = ref(false)
const documentToUpload = ref(null)
const isHideDownloadAnotherBtn = ref(false)
const preloader = ref(false)

function docAttachmentChange(e) {
    documentToUpload.value = e.target.files[0]
    isHideDownloadAnotherBtn.value = true
}

async function triggerUploadDocument() {
    preloader.value = true
    if (props.uuid) {
        await replaceDocument(documentToUpload.value, props.uuid)
    } else {
        await uploadDocument(documentToUpload.value, props.type)
    }
    emit('updateDoc')
    documentToUpload.value = null
    uploadMode.value = false
    isHideDownloadAnotherBtn.value = false
    preloader.value = false
}

async function triggerDownloadDocument() {
    if (props.uuid) {
        downloadByUuid(props.uuid, props.name)
    } else {
        downloadDocument(props.name, props.type)
    }
}

</script>

<template>
    <div v-if="preloader" class="w-[100px] mx-auto">
        <img src="../../../resources/images/preloader.gif" class="w-[100px] h-[100px]" alt="Loading">
    </div>
    <div class="mt-[20px]" v-if="!preloader">
        <div class="flex font-roboto700 items-center">
            <download-doc-button
                @click="triggerDownloadDocument">
                {{ name }}
            </download-doc-button>
            <common-button
                v-if="isAdmin && !isHideDownloadAnotherBtn"
                @click="uploadMode = !uploadMode"
                class="ml-[10px]"
                text="Загрузить другой документ">
            </common-button>
        </div>
        <div v-if="uploadMode && isAdmin" class="mt-[16px]">
            <label for="customFile" class="custom-file-upload">
                <span v-if="!documentToUpload">Выберите файл</span>
                <span v-else>Выбранный файл:</span>
                <span class="ml-[10px]" v-if="documentToUpload">{{documentToUpload.name}}</span>
            </label>
            <input id="customFile" type="file" @change="docAttachmentChange"  style="display: none;">
        </div>
        <common-button
            v-if="documentToUpload && uploadMode && isAdmin"
            class="mt-[20px]"
            text="Загрузить"
            @click="triggerUploadDocument">
        </common-button>
    </div>
</template>

<style scoped>
.custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f0f0f0;
}

.custom-file-upload:hover {
    background-color: #e0e0e0;
}

.custom-file-upload span {
    display: inline-block;
    vertical-align: middle;
}
</style>
