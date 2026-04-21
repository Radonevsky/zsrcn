<script setup>

import ContentContainer from '../layouts/ContentContainer.vue'
import useCommon from '../use/common.js'
import { ref, watch } from 'vue'
import { useRouter } from 'vue-router'
import AddButton from './AddButton.vue'
import SectionDocumentItem from '../components/SectionDocumentItem.vue'
import AddSectionDocument from '../components/AddSectionDocument.vue'
import CommonButton from '../components/CommonButton.vue'
import RichHtmlEditor from '../components/RichHtmlEditor.vue'

const router = useRouter()
const boardTrusteesListPath = '/about/board-trustees'

const sections = ref([])
const addSectionMode = ref(false)

const htmlContent = ref('')
const loaded = ref(false)
const editMode = ref(false)

const {
    isImpairedVision,
    isAdmin,
    fetchDocumentsByType,
    fetchBoardTrusteesPageContent,
    updateBoardTrusteesPageContent,
    documentsScrollUp,
} = useCommon()

documentsScrollUp()

async function setDocuments() {
    addSectionMode.value = false
    sections.value = await fetchDocumentsByType('center-board-trustees')
}

async function loadHtml() {
    const html = await fetchBoardTrusteesPageContent()
    if (html !== false) {
        htmlContent.value = html
    }
    loaded.value = true
}

async function saveHtml() {
    loaded.value = false
    await updateBoardTrusteesPageContent(htmlContent.value)
    await loadHtml()
    editMode.value = false
}

setDocuments()
loadHtml()

watch(() => router.currentRoute.value.name, (name) => {
    if (name === 'board-trustees') {
        setDocuments()
        loadHtml()
    }
})
</script>

<template>
    <ContentContainer>
        <div
            class="board-trustees-page text-[20px] font-roboto400 text-link-dark-blue"
            :style="isImpairedVision ? 'color:black':''"
        >
            <h2 class="font-roboto700 text-center mb-[20px]">
                Попечительский совет
            </h2>

            <img
                v-if="!loaded"
                src="../../../resources/images/preloader.gif"
                class="inline h-[30px] w-[30px]"
                alt="Загрузка"
            >
            <template v-else>
                <RichHtmlEditor v-model="htmlContent" :edit-mode="editMode" />
                <span v-if="!editMode && isAdmin" class="mt-[12px] inline-block">
                    <CommonButton text="Редактировать" @click="editMode = true"></CommonButton>
                </span>
                <span v-if="editMode && isAdmin" class="mt-[12px] inline-block">
                    <CommonButton text="Сохранить" @click="saveHtml"></CommonButton>
                </span>
            </template>

            <div class="mb-[30px] mt-[24px]">
                <add-button v-if="isAdmin" @click="addSectionMode = true">Добавить документ</add-button>
                <add-section-document
                    v-if="addSectionMode && isAdmin"
                    @uploaded="setDocuments"
                    type="center-board-trustees"
                ></add-section-document>
                <div class="flex flex-col gap-[22px] mt-[20px]">
                    <section-document-item
                        v-for="item in sections"
                        :key="item.uuid"
                        :type="item.type"
                        :rout="boardTrusteesListPath"
                        :name="item.name"
                        :uuid="item.uuid"
                    ></section-document-item>
                </div>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>
.board-trustees-page :deep(ul) {
    list-style-type: disc;
    padding-left: 24px;
    margin-top: 8px;
}

.board-trustees-page :deep(p) {
    margin-top: 10px;
}

.board-trustees-page :deep(p:first-of-type) {
    margin-top: 0;
}

.board-trustees-page :deep(strong),
.board-trustees-page :deep(b) {
    font-family: Roboto700, sans-serif;
    font-weight: 700;
}

@media only screen and (max-width: 750px) {
    h2 {
        font-size: 18px;
    }
}
</style>
