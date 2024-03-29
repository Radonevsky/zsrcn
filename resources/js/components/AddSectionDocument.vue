<script setup>

import DocumentUpload from "./DocumentUpload.vue";
import useCommon from "../use/common.js";
import {defineEmits, ref} from "vue";
import CommonButton from "./CommonButton.vue";

const {
    uploadDocument,
} = useCommon()

const props = defineProps({
    type: String,
})

const emit = defineEmits(['uploaded', 'docChange',])
const documentToUpload = ref(null)
const description = ref(null)

function setDoc(e) {
    documentToUpload.value = e
}

async function triggerUploadDocumentSection() {
    await uploadDocument(documentToUpload.value, props.type, description.value)
    emit('uploaded')
    documentToUpload.value = null
}

</script>

<template>
    <div class="text-link-dark-blue font-roboto500 text-[20px] flex flex-col justify-center">
        <document-upload
            @doc-change="setDoc"
            :upload-btn="false"
            type="reports">
        </document-upload>
        <p class="mt-[16px]">Введите описание</p>
        <textarea
            v-model="description"
            rows="5"
            class="border mt-[15px] p-[10px] border-blue-border rounded-[8px] border"></textarea>
        <common-button
            v-if="documentToUpload"
            class="mt-[20px]"
            text="Сохранить"
            @click="triggerUploadDocumentSection">
        </common-button>
    </div>
</template>

<style scoped>

</style>
