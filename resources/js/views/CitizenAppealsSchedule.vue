<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import { ref } from "vue";
import { useRouter } from "vue-router";
import AddButton from "./AddButton.vue";
import SectionDocumentItem from "../components/SectionDocumentItem.vue";
import AddSectionDocument from "../components/AddSectionDocument.vue";
import CommonButton from "../components/CommonButton.vue";

const router = useRouter()
const routeHref = ref(router.currentRoute.value.href)
const sections = ref([])
const addSectionMode = ref(false)

const loaded = ref(false)
const scheduleRows = ref([])
const editTableMode = ref(false)
let scheduleSnapshot = []

const {
    isImpairedVision,
    fetchDocumentsByType,
    isAdmin,
    fetchCitizenAppealsPageContent,
    updateCitizenAppealsPageContent,
} = useCommon()

function cloneRows(rows) {
    return JSON.parse(JSON.stringify(rows))
}

async function setDocuments() {
    addSectionMode.value = false
    sections.value = await fetchDocumentsByType('citizen-appeals-docs')
}

async function loadSchedule() {
    const data = await fetchCitizenAppealsPageContent()
    if (data !== false) {
        scheduleRows.value = cloneRows(data.schedule_rows ?? [])
    }
    loaded.value = true
}

function startEditTable() {
    scheduleSnapshot = cloneRows(scheduleRows.value)
    editTableMode.value = true
}

function cancelEditTable() {
    scheduleRows.value = scheduleSnapshot
    editTableMode.value = false
}

async function saveTable() {
    loaded.value = false
    const ok = await updateCitizenAppealsPageContent({
        schedule_rows: scheduleRows.value,
    })
    if (ok) {
        await loadSchedule()
        editTableMode.value = false
    }
    loaded.value = true
}

function addRow() {
    scheduleRows.value.push({ label: '', value: '' })
}

function removeRow(index) {
    scheduleRows.value.splice(index, 1)
}

function moveRow(index, delta) {
    const j = index + delta
    if (j < 0 || j >= scheduleRows.value.length) {
        return
    }
    const next = [...scheduleRows.value]
    const t = next[index]
    next[index] = next[j]
    next[j] = t
    scheduleRows.value = next
}

function isSingleEmail(value) {
    const t = String(value ?? '').trim()
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(t)
}

setDocuments()
loadSchedule()
</script>

<template>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
            <add-button v-if="isAdmin" @click="addSectionMode = true">Добавить документ</add-button>
            <add-section-document
                v-if="addSectionMode && isAdmin"
                @uploaded="setDocuments"
                type="citizen-appeals-docs">
            </add-section-document>
            <div class="flex flex-col gap-[22px] mt-[20px]">
                <section-document-item
                    v-for="item in sections"
                    :type="item.type"
                    :rout="routeHref"
                    :name="item.name"
                    :uuid="item.uuid"
                    :key="item.uuid">
                </section-document-item>
            </div>
            <h2 class='font-roboto700 max-w-[900px] m-auto'>
                График приема граждан
            </h2>

            <div v-if="!loaded" class="mt-[20px]">
                <img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Загрузка">
            </div>

            <template v-else>
                <table class="citizen-schedule-table table-auto mt-[20px]">
                    <tbody>
                    <tr v-for="(row, index) in scheduleRows" :key="index">
                        <td>
                            <template v-if="!editTableMode">{{ row.label }}</template>
                            <textarea
                                v-else
                                v-model="row.label"
                                rows="3"
                                class="w-full p-[6px] border border-light-purple rounded-[6px] resize-y"
                            ></textarea>
                        </td>
                        <td class="schedule-value-cell">
                            <template v-if="!editTableMode">
                                <span v-if="isSingleEmail(row.value)">
                                    <a :href="'mailto:' + String(row.value).trim()">{{ String(row.value).trim() }}</a>
                                </span>
                                <span v-else style="white-space: pre-line;">{{ row.value }}</span>
                            </template>
                            <textarea
                                v-else
                                v-model="row.value"
                                rows="4"
                                class="w-full p-[6px] border border-light-purple rounded-[6px] resize-y"
                            ></textarea>
                        </td>
                        <td v-if="editTableMode && isAdmin" class="citizen-schedule-actions align-top">
                            <button type="button" class="block underline text-left mb-[4px]" @click="moveRow(index, -1)">Вверх</button>
                            <button type="button" class="block underline text-left mb-[4px]" @click="moveRow(index, 1)">Вниз</button>
                            <button type="button" class="block underline text-left text-red-700" @click="removeRow(index)">Удалить</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div v-if="editTableMode && isAdmin" class="mt-[12px]">
                    <button type="button" class="underline" @click="addRow">Добавить строку</button>
                </div>

                <div v-if="!editTableMode && isAdmin" class="mt-[16px]">
                    <common-button text="Редактировать таблицу" @click="startEditTable"></common-button>
                </div>
                <div v-if="editTableMode && isAdmin" class="mt-[16px]">
                    <common-button text="Сохранить таблицу" @click="saveTable"></common-button>
                    <common-button text="Отмена" class="ml-[10px]" @click="cancelEditTable"></common-button>
                </div>
            </template>
        </div>
    </ContentContainer>
</template>

<style scoped>
table {
    text-align: center;
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    padding: 3px 7px;
    border: 1px solid black;
    text-align: left;
}
th {
    text-align: center;
}

.citizen-schedule-actions {
    width: 100px;
    text-align: left;
    white-space: nowrap;
}

h2, h4 {
    @media only screen and (max-width: 750px) {
        font-size: 16px;
    }
}
table {
    @media only screen and (max-width: 750px) {
        font-size: 14px;
    }
}

@media only screen and (max-width: 750px) {
    .citizen-schedule-table {
        font-size: 14px;
    }

    .citizen-schedule-actions {
        font-size: 12px;
    }
}
</style>
