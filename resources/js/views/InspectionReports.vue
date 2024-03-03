<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";
import AddButton from "./AddButton.vue";
import DocumentUpload from "../components/DocumentUpload.vue";
import SectionDocumentItem from "../components/SectionDocumentItem.vue";

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
async function setDocuments() {
    addSectionMode.value = false
    sections.value = await fetchDocumentsByType('reports')
}

setDocuments()
</script>

<template>
    <ContentContainer>
        <add-button @click="addSectionMode = true">Добавить документ</add-button>
        <document-upload
            v-if="addSectionMode"
            @close="addSectionMode = false"
            @uploaded="setDocuments"
            type="reports">
        </document-upload>
        <section-document-item
            v-for="item in sections"
            :type="item.type"
            :name="item.uuid"
            :key="item.uuid">
        </section-document-item>
    </ContentContainer>
</template>

<style scoped>

</style>
