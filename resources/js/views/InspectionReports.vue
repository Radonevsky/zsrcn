<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";
import AddButton from "./AddButton.vue";
import DocumentUpload from "../components/DocumentUpload.vue";

const router = useRouter();
const currentRoute = ref(null)

currentRoute.value = router.currentRoute.value.name

router.afterEach(() => {
    documentsScrollUp()
});

const {
    documentsScrollUp,
    fetchDocumentsByType,
} = useCommon()
documentsScrollUp()

const addSectionMode = ref(false)
const sections = ref([])
async function fetchDocuments() {
    sections.value = await fetchDocumentsByType('reports')
}

fetchDocuments()
</script>

<template>
    <ContentContainer>
        <add-button @click="addSectionMode = true">Добавить документ</add-button>
        <document-upload type="reports">
        </document-upload>
    </ContentContainer>
</template>

<style scoped>

</style>
