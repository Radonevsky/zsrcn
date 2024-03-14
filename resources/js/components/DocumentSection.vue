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

uuid.value = router.currentRoute.value.params.uuid

router.afterEach(() => {
    documentsScrollUp()
});

const { documentsScrollUp, fetchDocumentsByUuid, deleteDocumentsByUuid, saveDocDescriptionByUuid } = useCommon()
documentsScrollUp()

async function setDocument() {
    document.value = await fetchDocumentsByUuid(uuid.value)
    description.value = document.value.description
    loaded.value = true
}
setDocument()

async function deleteDocument() {
    await deleteDocumentsByUuid(uuid.value)
    router.push({
        name: 'center-inspection-report'
    })
}

async function saveDescription() {
    await saveDocDescriptionByUuid(uuid.value, description.value)
    editMode.value = false
}

</script>

<template>
    <div v-if="loaded">
        <common-button
            text="Удалить страницу и документ" @click="deleteDocument"></common-button>
        <document-download-upload
            :name="document.name"
            :type="null"
            @update-doc="setDocument"
            :uuid="document.uuid"></document-download-upload>
        <common-button
            text="Редактировать описание"
            @click="editMode = !editMode"
            class="mt-[16px]"></common-button>
        <textarea
            v-if="editMode"
            v-model="description"
            rows="5"
            class="border text-link-dark-blue font-roboto500 text-[20px] mt-[15px] p-[10px] border-blue-border rounded-[8px] w-full border"></textarea>
        <common-button
            v-if="editMode"
            text="Сохранить описание документа"
            @click="saveDescription"></common-button>
        <p v-if="description && !editMode"
           class="text-link-dark-blue font-roboto500 text-[20px] mt-[20px]">
            {{ description }}
        </p>
    </div>
</template>

<style scoped>

</style>
