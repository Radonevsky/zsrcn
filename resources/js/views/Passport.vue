<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import {useRouter} from "vue-router";
import useCommon from "../use/common.js";
import {ref} from "vue";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";
const router = useRouter();
const { documentsScrollUp } = useCommon()
const routerName = ref('center-passport-2026')

router.afterEach((to) => {
    documentsScrollUp()
    routerName.value = to.name
});
</script>

<template>
    <ContentContainer>
        <div v-if="routerName === 'center-passport-2026'">
            <document-download-upload name="Паспорт учреждения 2026г." type="passport_2026"></document-download-upload>
        </div>
        <div v-if="routerName === 'center-passport-2025'">
            <document-download-upload name="Паспорт учреждения 2025г." type="passport_2025"></document-download-upload>
        </div>
        <div v-if="routerName === 'center-passport-2024'">
            <document-download-upload name="Паспорт учреждения 2024г." type="passport_2024"></document-download-upload>
        </div>
        <div v-if="routerName === 'center-passport-2023'">
            <document-download-upload name="Паспорт учреждения 2023г." type="passport_2023"></document-download-upload>
        </div>
        <div v-if="routerName === 'center-passport-2021'">
            <document-download-upload name="Паспорт учреждения 2021г." type="passport_2021"></document-download-upload>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
