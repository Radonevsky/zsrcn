<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import {useRouter} from "vue-router";
import useCommon from "../use/common.js";
import {ref} from "vue";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";
const router = useRouter();
const { documentsScrollUp } = useCommon()
const routerName = ref('center-passport-2023')

router.afterEach((to) => {
    documentsScrollUp()
    routerName.value = to.name
});
</script>

<template>
    <ContentContainer>
        <div v-if="routerName === 'center-passport-2023'">
            <document-download-upload name="Паспорт учреждения 2023г." type="passport_2023"></document-download-upload>
        </div>
        <div v-if="routerName === 'center-passport-2021'">
            <document-download-upload name="Паспорт учреждения 2021г." type="passport_2021"></document-download-upload>
        </div>
        <div v-if="routerName === 'center-passport-2020'">
            <document-download-upload name="Паспорт учреждения 2020г." type="passport_2020"></document-download-upload>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
