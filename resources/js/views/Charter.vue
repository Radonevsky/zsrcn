<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";

const router = useRouter();
const { documentsScrollUp } = useCommon()
const routerName = ref('center-charter-doc')

router.afterEach((to) => {
    documentsScrollUp()
    routerName.value = to.name
});

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
            <document-download-upload name="Изменения в уставе" type="charter_changes"></document-download-upload>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
