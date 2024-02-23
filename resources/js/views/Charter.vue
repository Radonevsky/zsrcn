<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {useRouter} from "vue-router";
import {ref} from "vue";

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
        <div v-if="routerName === 'center-ogrn'">
            <img src="/ogrn.png" alt="ogrn">
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
