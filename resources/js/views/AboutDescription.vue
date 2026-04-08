<script setup>

import { ref } from 'vue'
import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import CommonButton from "../components/CommonButton.vue";
import RichHtmlEditor from "../components/RichHtmlEditor.vue";

const {
    isImpairedVision,
    isAdmin,
    fetchAboutDescriptionContent,
    updateAboutDescriptionContent,
} = useCommon()

const htmlContent = ref('')
const loaded = ref(false)
const editMode = ref(false)

const loadContent = async () => {
    const html = await fetchAboutDescriptionContent()
    if (html !== false) {
        htmlContent.value = html
    }
    loaded.value = true
}

const saveContent = async () => {
    loaded.value = false
    await updateAboutDescriptionContent(htmlContent.value)
    const html = await fetchAboutDescriptionContent()
    if (html !== false) {
        htmlContent.value = html
    }
    editMode.value = false
    loaded.value = true
}

loadContent()
</script>

<template>
    <ContentContainer>
        <div
            class='about-html text-[20px] font-roboto400 text-link-dark-blue'
            :style="isImpairedVision ? 'color: black':''"
        >
            <img
                v-if="!loaded"
                src="../../../resources/images/preloader.gif"
                class="inline h-[30px] w-[30px]"
                alt="Загрузка"
            >
            <template v-else>
                <RichHtmlEditor v-model="htmlContent" :edit-mode="editMode" />
                <span v-if="!editMode && isAdmin">
                    <CommonButton text="Редактировать" @click="editMode = true"></CommonButton>
                </span>
                <span v-if="editMode && isAdmin">
                    <CommonButton text="Сохранить" @click="saveContent"></CommonButton>
                </span>
            </template>
        </div>
    </ContentContainer>
</template>

<style scoped>
.about-html :deep(h2) {
    font-family: Roboto700, sans-serif;
    font-weight: 700;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

.about-html :deep(h2:last-of-type) {
    margin-top: 40px;
}

.about-html :deep(p) {
    margin-top: 20px;
}

.about-html :deep(strong),
.about-html :deep(b) {
    font-family: Roboto700, sans-serif;
    font-weight: 700;
}
</style>
