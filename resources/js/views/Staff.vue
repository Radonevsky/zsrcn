<script setup>

import ContentContainer from '../layouts/ContentContainer.vue'
import useCommon from '../use/common.js'
import { ref } from 'vue'
import CommonButton from '../components/CommonButton.vue'

const {
    isImpairedVision,
    isAdmin,
    fetchStaffPageContent,
    updateStaffPageContent,
} = useCommon()

const loaded = ref(false)
const introText = ref('')
const directorText = ref('')
const roster = ref([])

const editTextMode = ref(false)
const editTableMode = ref(false)

let textSnapshot = { intro: '', director: '' }
let rosterSnapshot = []

function cloneRoster(rows) {
    return JSON.parse(JSON.stringify(rows))
}

async function loadStaff() {
    const data = await fetchStaffPageContent()
    if (data !== false) {
        introText.value = data.intro_text ?? ''
        directorText.value = data.director_text ?? ''
        roster.value = cloneRoster(data.roster ?? [])
    }
    loaded.value = true
}

function startEditText() {
    textSnapshot = { intro: introText.value, director: directorText.value }
    editTextMode.value = true
}

function cancelEditText() {
    introText.value = textSnapshot.intro
    directorText.value = textSnapshot.director
    editTextMode.value = false
}

async function saveText() {
    loaded.value = false
    const ok = await updateStaffPageContent({
        intro_text: introText.value,
        director_text: directorText.value,
        roster: roster.value,
    })
    if (ok) {
        await loadStaff()
        editTextMode.value = false
    }
    loaded.value = true
}

function startEditTable() {
    rosterSnapshot = cloneRoster(roster.value)
    editTableMode.value = true
}

function cancelEditTable() {
    roster.value = rosterSnapshot
    editTableMode.value = false
}

async function saveTable() {
    loaded.value = false
    const ok = await updateStaffPageContent({
        intro_text: introText.value,
        director_text: directorText.value,
        roster: roster.value,
    })
    if (ok) {
        await loadStaff()
        editTableMode.value = false
    }
    loaded.value = true
}

function addSectionRow() {
    roster.value.push({ kind: 'section', title: '' })
}

function addPersonRow() {
    roster.value.push({ kind: 'person', name: '', position: '' })
}

function removeRow(index) {
    roster.value.splice(index, 1)
}

function moveRow(index, delta) {
    const j = index + delta
    if (j < 0 || j >= roster.value.length) {
        return
    }
    const next = [...roster.value]
    const t = next[index]
    next[index] = next[j]
    next[j] = t
    roster.value = next
}

loadStaff()
</script>

<template>
    <ContentContainer>
        <div class="text-[20px] font-roboto400 text-link-dark-blue" :style="isImpairedVision ? 'color:black':''">
            <p>Персональный состав</p>

            <div v-if="!loaded" class="mt-[20px]">
                <img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Загрузка">
            </div>

            <template v-else>
                <div v-if="!editTextMode" class="mt-[20px]" style="white-space: pre-line;">
                    {{ introText }}
                </div>
                <textarea
                    v-else
                    v-model="introText"
                    rows="8"
                    class="mt-[20px] w-full p-[12px] border border-light-purple rounded-[10px] text-[20px] font-roboto400 resize-y"
                ></textarea>

                <div v-if="!editTextMode" class="mt-[20px]" style="white-space: pre-line;">
                    {{ directorText }}
                </div>
                <textarea
                    v-else
                    v-model="directorText"
                    rows="6"
                    class="mt-[20px] w-full p-[12px] border border-light-purple rounded-[10px] text-[20px] font-roboto400 resize-y"
                ></textarea>

                <div v-if="!editTextMode && !editTableMode && isAdmin" class="mt-[16px]">
                    <common-button text="Редактировать текст" @click="startEditText"></common-button>
                </div>
                <div v-if="editTextMode && isAdmin" class="mt-[16px]">
                    <common-button text="Сохранить текст" @click="saveText"></common-button>
                    <common-button text="Отмена" class="ml-[10px]" @click="cancelEditText"></common-button>
                </div>

                <table class="mt-[20px] staff-roster-table">
                    <thead>
                        <tr>
                            <th>Ф.И.О.</th>
                            <th>Должность</th>
                            <th v-if="editTableMode && isAdmin" class="staff-roster-actions"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(row, index) in roster" :key="index">
                            <tr v-if="row.kind === 'section'">
                                <td class="font-roboto700" colspan="2">
                                    <template v-if="!editTableMode">{{ row.title }}</template>
                                    <input
                                        v-else
                                        v-model="row.title"
                                        class="w-full p-[6px] border border-light-purple rounded-[6px] font-roboto700"
                                        type="text"
                                    >
                                </td>
                                <td v-if="editTableMode && isAdmin" class="staff-roster-actions align-top">
                                    <button type="button" class="block underline text-left mb-[4px]" @click="moveRow(index, -1)">Вверх</button>
                                    <button type="button" class="block underline text-left mb-[4px]" @click="moveRow(index, 1)">Вниз</button>
                                    <button type="button" class="block underline text-left text-red-700" @click="removeRow(index)">Удалить</button>
                                </td>
                            </tr>
                            <tr v-else-if="row.kind === 'person'">
                                <td>
                                    <template v-if="!editTableMode">{{ row.name }}</template>
                                    <textarea
                                        v-else
                                        v-model="row.name"
                                        rows="2"
                                        class="w-full p-[6px] border border-light-purple rounded-[6px] resize-y"
                                    ></textarea>
                                </td>
                                <td style="white-space: pre-line;">
                                    <template v-if="!editTableMode">{{ row.position }}</template>
                                    <textarea
                                        v-else
                                        v-model="row.position"
                                        rows="3"
                                        class="w-full p-[6px] border border-light-purple rounded-[6px] resize-y"
                                    ></textarea>
                                </td>
                                <td v-if="editTableMode && isAdmin" class="staff-roster-actions align-top">
                                    <button type="button" class="block underline text-left mb-[4px]" @click="moveRow(index, -1)">Вверх</button>
                                    <button type="button" class="block underline text-left mb-[4px]" @click="moveRow(index, 1)">Вниз</button>
                                    <button type="button" class="block underline text-left text-red-700" @click="removeRow(index)">Удалить</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>

                <div v-if="editTableMode && isAdmin" class="mt-[12px] flex flex-wrap gap-[12px]">
                    <button type="button" class="underline" @click="addSectionRow">Добавить подразделение (заголовок)</button>
                    <button type="button" class="underline" @click="addPersonRow">Добавить строку (ФИО + должность)</button>
                </div>

                <div v-if="!editTableMode && !editTextMode && isAdmin" class="mt-[16px]">
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

table,
th,
td {
    border: 1px solid black;
    padding: 6px 8px;
    vertical-align: top;
}

.staff-roster-actions {
    width: 100px;
    text-align: left;
    white-space: nowrap;
}

@media only screen and (max-width: 750px) {
    .staff-roster-table {
        font-size: 14px;
    }

    .staff-roster-actions {
        font-size: 12px;
    }
}
</style>
