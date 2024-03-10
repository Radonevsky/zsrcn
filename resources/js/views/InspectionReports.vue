<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";
import AddButton from "./AddButton.vue";
import SectionDocumentItem from "../components/SectionDocumentItem.vue";
import AddSectionDocument from "../components/AddSectionDocument.vue";

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
        <add-section-document
            v-if="addSectionMode"
            @uploaded="setDocuments"
            type="reports">
        </add-section-document>
        <div class="flex flex-col gap-[22px] mt-[20px]">
            <section-document-item
                v-for="item in sections"
                :type="item.type"
                rout-name="inspection-reports"
                :name="item.name"
                :uuid="item.uuid"
                :key="item.uuid">
            </section-document-item>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
