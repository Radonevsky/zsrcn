<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";

const router = useRouter();

router.afterEach((to, from) => {
    documentsScrollUp()
});

const { documentsScrollUp } = useCommon()
documentsScrollUp()

</script>

<template>
    <ContentContainer>
        DocumentView
    </ContentContainer>
</template>

<style scoped>

</style>
