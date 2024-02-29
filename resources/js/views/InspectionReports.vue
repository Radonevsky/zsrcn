<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";
import AddButton from "./AddButton.vue";

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

const sections = ref([])
async function fetchDocuments() {
    sections.value = await fetchDocumentsByType('reports')
}

fetchDocuments()
</script>

<template>
    <ContentContainer>
        <add-button @click="open"></add-button>
        Reports
    </ContentContainer>
</template>

<style scoped>

</style>
