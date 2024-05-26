<script setup>
import {useRouter} from "vue-router";
import {ref} from "vue";
import useCommon from "../use/common.js";
import DocumentDownloadUpload from "./DocumentDownloadUpload.vue";
import CommonButton from "./CommonButton.vue";

const router = useRouter()
const uuid = ref(null)
const document = ref(null)
const loaded = ref(false)
const description = ref(null)
const editMode = ref(false)
const preloader = ref(false)

uuid.value = router.currentRoute.value.params.uuid

const { isAdmin, documentsScrollUp, fetchDocumentsByUuid, deleteDocumentsByUuid, saveDocDescriptionByUuid } = useCommon()
documentsScrollUp()

async function setDocument() {
    preloader.value = true
    document.value = await fetchDocumentsByUuid(uuid.value)
    description.value = document.value.description
    loaded.value = true
    preloader.value = false
}
setDocument()

async function deleteDocument() {
    preloader.value = true
    await deleteDocumentsByUuid(uuid.value)
    preloader.value = false
    router.push({
        name: document.value.type
    })
}

async function saveDescription() {
    preloader.value = true
    await saveDocDescriptionByUuid(uuid.value, description.value)
    editMode.value = false
    preloader.value = false
}
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <div v-if="loaded">
        <common-button
            v-if="isAdmin && !preloader"
            text="Удалить страницу и документ" @click="deleteDocument"></common-button>
        <document-download-upload
            :name="document.name"
            :type="null"
            @update-doc="setDocument"
            :uuid="document.uuid"></document-download-upload>
        <common-button
            v-if="isAdmin && !preloader"
            text="Редактировать описание"
            @click="editMode = !editMode"
            class="mt-[16px]"></common-button>
        <textarea
            v-if="editMode && isAdmin && !preloader"
            v-model="description"
            rows="5"
            class="border text-link-dark-blue font-roboto500 text-[20px] mt-[15px] p-[10px] border-blue-border rounded-[8px] w-full border"></textarea>
        <common-button
            v-if="editMode && isAdmin && !preloader"
            text="Сохранить описание документа"
            @click="saveDescription"></common-button>
        <p v-if="description && !editMode"
           class="text-link-dark-blue font-roboto500 text-[20px] mt-[20px]" :style="isImpairedVision ? 'color:black':''">
            {{ description }}
        </p>
        <div v-if="preloader" class="w-[100px] mx-auto">
            <img src="../../../resources/images/preloader.gif" class="w-[100px] h-[100px]" alt="Loading">
        </div>
    </div>
</template>

<style scoped>

</style>
