<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";

const router = useRouter();
const currentRoute = ref(null)

currentRoute.value = router.currentRoute.value.name

router.afterEach(() => {
    documentsScrollUp()
});

const { documentsScrollUp } = useCommon()
documentsScrollUp()

</script>

<template>
    <ContentContainer>
        ReportsView
    </ContentContainer>
</template>

<style scoped>

</style>
