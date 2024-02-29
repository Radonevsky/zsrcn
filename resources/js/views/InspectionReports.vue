<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";

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
sections.value = await fetchDocumentsByType('reports')

</script>

<template>
    <ContentContainer>
        Reports
    </ContentContainer>
</template>

<style scoped>

</style>
