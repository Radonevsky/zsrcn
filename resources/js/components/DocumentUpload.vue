<script setup>

import CommonButton from "./CommonButton.vue";
import useCommon from "../use/common.js";
import {ref} from "vue";

const props = defineProps({
    type: String,
})

const {
    uploadDocument,
} = useCommon()
const uploadMode = ref(false)
const documentToUpload = ref(null)

function docAttachmentChange(e) {
    documentToUpload.value = e.target.files[0]
}

async function triggerUploadDocument() {
    await uploadDocument(documentToUpload.value, props.type)
    documentToUpload.value = null
    uploadMode.value = false
}
</script>

<template>
    <div class="mt-[20px]">
        <div class="mt-[16px]">
            <label for="customFile" class="custom-file-upload" @click="openFiles">
                <span v-if="!documentToUpload">Выберите файл</span>
                <span v-else>Выбранный файл:</span>
                <span class="ml-[10px]" v-if="documentToUpload">{{documentToUpload.name}}</span>
            </label>
            <input id="customFile" type="file" @change="docAttachmentChange" style="display: none;">
        </div>
        <common-button
            v-if="documentToUpload && uploadMode"
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
