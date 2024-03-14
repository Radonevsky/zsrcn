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

uuid.value = router.currentRoute.value.params.uuid

router.afterEach(() => {
    documentsScrollUp()
});

const { documentsScrollUp, fetchDocumentsByUuid, deleteDocumentsByUuid } = useCommon()
documentsScrollUp()

async function setDocument() {
    document.value = await fetchDocumentsByUuid(uuid.value)
    loaded.value = true
}
setDocument()

async function deleteDocument() {
    await deleteDocumentsByUuid(uuid.value)
    router.push({
        name: 'center-inspection-report'
    })
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
        <p v-if="document.description"
           class="text-link-dark-blue font-roboto500 text-[20px] mt-[20px]">
            {{ document.description }}
        </p>
    </div>
</template>

<style scoped>

</style>
