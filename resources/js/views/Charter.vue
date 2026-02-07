<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";
import AddButton from "./AddButton.vue";
import SectionDocumentItem from "../components/SectionDocumentItem.vue";
import AddSectionDocument from "../components/AddSectionDocument.vue";

const router = useRouter();
const {
    documentsScrollUp,
    fetchDocumentsByType,
    isAdmin,
} = useCommon()
const routerName = ref('center-charter-doc')
const charterChangesSections = ref([])
const addCharterChangesMode = ref(false)

async function setCharterChangesDocuments() {
    addCharterChangesMode.value = false
    charterChangesSections.value = await fetchDocumentsByType('charter-changes-docs')
}

router.afterEach((to) => {
    documentsScrollUp()
    routerName.value = to.name
    if (to.name === 'center-charter-changes') {
        setCharterChangesDocuments()
    }
});

if (routerName.value === 'center-charter-changes') {
    setCharterChangesDocuments()
}

</script>
<template>
    <ContentContainer>
        <div v-if="routerName === 'center-charter-doc'">
            <document-download-upload name="Устав" type="charter"></document-download-upload>
        </div>
        <div v-if="routerName === 'center-ogrn'">
            <img src="../../../public/ogrn.png" alt="ОГРН">
        </div>
        <div v-if="routerName === 'center-charter-changes'">
            <add-button v-if="isAdmin" @click="addCharterChangesMode = true">Добавить документ</add-button>
            <add-section-document
                v-if="addCharterChangesMode && isAdmin"
                @uploaded="setCharterChangesDocuments"
                type="charter-changes-docs">
            </add-section-document>
            <div class="flex flex-col gap-[22px] mt-[20px]">
                <section-document-item
                    v-for="item in charterChangesSections"
                    :type="item.type"
                    :rout="router.currentRoute.value.path"
                    :name="item.name"
                    :uuid="item.uuid"
                    :key="item.uuid">
                </section-document-item>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
