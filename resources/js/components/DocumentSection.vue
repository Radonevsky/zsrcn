<script setup>
import {useRouter} from "vue-router";
import {ref} from "vue";
import useCommon from "../use/common.js";

const router = useRouter()
const uuid = ref(null)
const document = ref(null)
const loaded = ref(false)

uuid.value = router.currentRoute.value.params.uuid

router.afterEach(() => {
    documentsScrollUp()
});

const { documentsScrollUp, fetchDocumentsByUuid } = useCommon()
documentsScrollUp()

async function setDocument() {
    document.value = await fetchDocumentsByUuid(uuid.value)
    loaded.value = true
}
setDocument()

</script>

<template>
    <div v-if="loaded">
        {{ document.name }}
    </div>
</template>

<style scoped>

</style>
