<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref, watch} from "vue";
import AddButton from "./AddButton.vue";
import SectionDocumentItem from "../components/SectionDocumentItem.vue";
import AddSectionDocument from "../components/AddSectionDocument.vue";

const router = useRouter()
const currentRoute = ref(null)
const routeHref = ref(null)
const sections = ref([])
const addSectionMode = ref(false)

currentRoute.value = router.currentRoute.value.name
routeHref.value = router.currentRoute.value.href

const {
    documentsScrollUp,
    fetchDocumentsByType,
    isAdmin,
} = useCommon()
documentsScrollUp()

async function setDocuments() {
    addSectionMode.value = false
    sections.value = await fetchDocumentsByType(currentRoute.value)
}

setDocuments()
watch(async () => router.currentRoute.value, async (to) => {
    to.then((route)=> {
        currentRoute.value = route.name
        setDocuments()
    })
})

</script>

<template>
    <ContentContainer>
        <add-button v-if="isAdmin" @click="addSectionMode = true">Добавить документ</add-button>
        <add-section-document
            v-if="addSectionMode && isAdmin"
            @uploaded="setDocuments"
            :type="currentRoute">
        </add-section-document>
        <div class="flex flex-col gap-[22px] mt-[20px]">
            <section-document-item
                v-for="item in sections"
                :type="item.type"
                :rout="routeHref"
                :name="item.name"
                :uuid="item.uuid"
                :key="item.uuid">
            </section-document-item>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
