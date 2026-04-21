<script setup>

import ContentContainer from '../layouts/ContentContainer.vue'
import useCommon from '../use/common.js'
import { ref } from 'vue'
import CommonButton from '../components/CommonButton.vue'
import PersonnelContactsTable from '../components/PersonnelContactsTable.vue'

const {
    isImpairedVision,
    isAdmin,
    fetchStructureContent,
    updateStructureContent,
    fetchContactsContent,
    updateContactsContent,
} = useCommon()

const content = ref(null)
const loaded = ref(false)
const editMode = ref(false)
const description = ref('')

const personnelRows = ref([])
const loadedPersonnel = ref(false)
const editPersonnelMode = ref(false)

async function setStructureContent() {
    content.value = await fetchStructureContent()
    if (content.value) {
        description.value = content.value.description || ''
    }
    loaded.value = true
}

async function loadPersonnel() {
    const data = await fetchContactsContent()
    if (data !== false && data !== null) {
        personnelRows.value = Array.isArray(data) ? [...data] : []
    } else {
        personnelRows.value = []
    }
    loadedPersonnel.value = true
}

const saveStructureContent = async () => {
    const updated = await updateStructureContent({
        description: description.value,
        org_chart_data: content.value?.org_chart_data || null,
        additional_data: content.value?.additional_data || null,
    })

    if (updated) {
        content.value = updated
        description.value = updated.description || ''
        editMode.value = false
    } else {
        await setStructureContent()
        editMode.value = false
    }
}

async function savePersonnel() {
    loadedPersonnel.value = false
    const ok = await updateContactsContent(personnelRows.value)
    if (ok) {
        await loadPersonnel()
        editPersonnelMode.value = false
    }
    loadedPersonnel.value = true
}

function cancelPersonnelEdit() {
    editPersonnelMode.value = false
    loadPersonnel()
}

setStructureContent()
loadPersonnel()
</script>

<template>
    <ContentContainer>
        <div class="text-[20px] font-roboto400 text-link-dark-blue" :style="isImpairedVision ? 'color:#000':''">
            <p>Структура центра</p>

            <div v-if="loaded && !editMode" class="mt-[20px]" style="white-space: pre-line;">
                {{ description }}
            </div>
            <textarea
                v-if="editMode && loaded"
                v-model="description"
                class="mt-[20px] p-[5px] w-full border-light-purple border-[1px] rounded-[10px] outline-1 py-[15px] focus:shadow-around
            focus:border-orange text-[20px] font-roboto400 text-link-dark-blue resize-none"
                rows="12"
            ></textarea>

            <span v-if="!editMode && isAdmin && loaded" class="mt-[20px] block">
                <common-button text="Редактировать текст" @click="editMode = true"></common-button>
            </span>
            <span v-if="editMode && isAdmin && loaded" class="mt-[20px] block">
                <common-button text="Сохранить" @click="saveStructureContent"></common-button>
                <common-button
                    text="Отмена"
                    class="mt-[10px] ml-[10px]"
                    @click="editMode = false; description = content?.description || ''"
                ></common-button>
            </span>

            <h3 class="text-center mt-[40px] font-roboto700" :style="isImpairedVision ? 'color:#000':''">
                Структурные подразделения учреждения
            </h3>
            <div class="mt-[20px]" :style="isImpairedVision ? 'color:#000':''">
                <PersonnelContactsTable
                    :rows="personnelRows"
                    :editable="editPersonnelMode && isAdmin"
                    :loaded="loadedPersonnel"
                    @update:rows="personnelRows = $event"
                />
            </div>

            <span v-if="!editPersonnelMode && isAdmin && loadedPersonnel" class="mt-[16px] inline-block">
                <common-button text="Редактировать таблицу" @click="editPersonnelMode = true"></common-button>
            </span>
            <span v-if="editPersonnelMode && isAdmin && loadedPersonnel" class="mt-[16px] inline-block">
                <common-button text="Сохранить" @click="savePersonnel"></common-button>
                <common-button text="Отмена" class="ml-[10px]" @click="cancelPersonnelEdit"></common-button>
            </span>
        </div>
    </ContentContainer>
</template>

<style scoped>
</style>
