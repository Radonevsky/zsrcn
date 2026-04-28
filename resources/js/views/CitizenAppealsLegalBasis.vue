<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import { ref } from "vue";
import AddButton from "./AddButton.vue";
import SectionDocumentItem from "../components/SectionDocumentItem.vue";
import AddSectionDocument from "../components/AddSectionDocument.vue";
import CommonButton from "../components/CommonButton.vue";

const legalBasisListPath = '/citizen-appeals/legal-basis'

const sections = ref([])
const addSectionMode = ref(false)

const loaded = ref(false)
const items = ref([])
const editListMode = ref(false)
let itemsSnapshot = []

const {
    isImpairedVision,
    isAdmin,
    fetchDocumentsByType,
    fetchCitizenAppealsPageContent,
    updateCitizenAppealsPageContent,
} = useCommon()

function cloneItems(arr) {
    return JSON.parse(JSON.stringify(arr))
}

async function setDocuments() {
    addSectionMode.value = false
    sections.value = await fetchDocumentsByType('citizen-appeals-legal-basis-docs')
}

async function loadLegalBasis() {
    const data = await fetchCitizenAppealsPageContent()
    if (data !== false) {
        items.value = cloneItems(data.legal_basis_items ?? [])
    }
    loaded.value = true
}

function startEditList() {
    itemsSnapshot = cloneItems(items.value)
    editListMode.value = true
}

function cancelEditList() {
    items.value = itemsSnapshot
    editListMode.value = false
}

async function saveList() {
    loaded.value = false
    const ok = await updateCitizenAppealsPageContent({
        legal_basis_items: items.value,
    })
    if (ok) {
        await loadLegalBasis()
        editListMode.value = false
    }
    loaded.value = true
}

function addItem() {
    items.value.push('')
}

function removeItem(index) {
    items.value.splice(index, 1)
}

function moveItem(index, delta) {
    const j = index + delta
    if (j < 0 || j >= items.value.length) {
        return
    }
    const next = [...items.value]
    const t = next[index]
    next[index] = next[j]
    next[j] = t
    items.value = next
}

setDocuments()
loadLegalBasis()
</script>

<template>
    <ContentContainer>
        <div class="citizen-legal-basis-page text-[20px] font-roboto400 text-link-dark-blue" :style="isImpairedVision ? 'color:black':''">
            <h2 class='font-roboto700 max-w-[900px] m-auto'>
                Правовая основа
            </h2>

            <div v-if="!loaded" class="mt-[20px]">
                <img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Загрузка">
            </div>

            <template v-else>
                <ul class='mt-[20px] list-disc pl-[24px]'>
                    <li v-for="(text, index) in items" :key="index" class="mb-[8px]">
                        <template v-if="!editListMode">{{ text }}</template>
                        <div v-else class="flex flex-col gap-[8px] sm:flex-row sm:items-start">
                            <textarea
                                v-model="items[index]"
                                rows="3"
                                class="w-full flex-1 p-[6px] border border-light-purple rounded-[6px] resize-y"
                            ></textarea>
                            <div v-if="isAdmin" class="citizen-legal-actions shrink-0">
                                <button type="button" class="block underline text-left mb-[4px]" @click="moveItem(index, -1)">Вверх</button>
                                <button type="button" class="block underline text-left mb-[4px]" @click="moveItem(index, 1)">Вниз</button>
                                <button type="button" class="block underline text-left text-red-700" @click="removeItem(index)">Удалить</button>
                            </div>
                        </div>
                    </li>
                </ul>

                <div v-if="editListMode && isAdmin" class="mt-[12px]">
                    <button type="button" class="underline" @click="addItem">Добавить пункт</button>
                </div>

                <div v-if="!editListMode && isAdmin" class="mt-[16px]">
                    <common-button text="Редактировать список" @click="startEditList"></common-button>
                </div>
                <div v-if="editListMode && isAdmin" class="mt-[16px]">
                    <common-button text="Сохранить список" @click="saveList"></common-button>
                    <common-button text="Отмена" class="ml-[10px]" @click="cancelEditList"></common-button>
                </div>
            </template>

            <div class="mb-[30px] mt-[24px]">
                <add-button v-if="isAdmin" @click="addSectionMode = true">Добавить документ</add-button>
                <add-section-document
                    v-if="addSectionMode && isAdmin"
                    @uploaded="setDocuments"
                    type="citizen-appeals-legal-basis-docs"
                ></add-section-document>
                <div class="flex flex-col gap-[22px] mt-[20px]">
                    <section-document-item
                        v-for="item in sections"
                        :key="item.uuid"
                        :type="item.type"
                        :rout="legalBasisListPath"
                        :name="item.name"
                        :uuid="item.uuid"
                    ></section-document-item>
                </div>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>
.citizen-legal-actions {
    width: 100px;
    text-align: left;
    white-space: nowrap;
}

@media only screen and (max-width: 750px) {
    .citizen-legal-basis-page {
        font-size: 14px;
    }

    .citizen-legal-actions {
        font-size: 12px;
    }
}
</style>
