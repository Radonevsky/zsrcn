<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {ref} from "vue";
import CommonButton from "../components/CommonButton.vue";
const {
    isImpairedVision,
    isAdmin,
    fetchAvailableContent,
    updateAvailableContent,
} = useCommon()

const content = ref(null)
const loaded = ref(false)
const editMode = ref(false)

const setAvailableContent = async ()=> {
    content.value = await fetchAvailableContent()
    loaded.value = true
}

const saveAvailableContent = async ()=> {
    loaded.value = false
    await updateAvailableContent({
        update_date: content.value.update_date,
        count: content.value.count,
        free_count: content.value.free_count,
    })
    editMode.value = false
    loaded.value = true
}
setAvailableContent()
</script>

<template>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
            <p>Количество свободных мест</p>
            <div class='mt-[20px]'>
                <span>Информация о наличии свободных мест по состоянию на: </span>
                <input v-if="editMode" v-model="content.update_date" class="p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                    focus:border-orange text-[20px] text-tblue font-roboto700 w-[150px]">
                <span v-if="loaded && !editMode">{{ content.update_date }}</span>
                <span v-if="!loaded"><img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Loading"></span>
            </div>
            <div class='mt-[20px]'>
                форма обслуживания: стационарное отделение
            </div>
            <div>
                <span>количество мест: </span>
                <input v-if="editMode" v-model="content.count" class="p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                    focus:border-orange text-[20px] text-tblue font-roboto700 w-[150px]">
                <span v-if="loaded && !editMode" class="text-link-dark-blue">{{ content.count }}</span>
                <span v-if="!loaded"><img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Loading"></span>
            </div>
            <div>
                <span>количество свободных мест: </span>
                <input v-if="editMode" v-model="content.free_count" class="p-[5px] border-light-purple border-[1px] rounded-[10px] outline-0 py-[15px] focus:shadow-around
                    focus:border-orange text-[20px] text-tblue font-roboto700 w-[150px]">
                <span v-if="loaded && !editMode">{{ content.free_count }}</span>
                <span v-if="!loaded"><img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Loading"></span>
                <span v-if="!editMode && isAdmin && loaded">
                    <common-button text="Редактировать" @click="editMode = true"></common-button>
                </span>
                <span v-if="editMode && isAdmin && loaded">
                    <common-button text="Сохранить" @click="saveAvailableContent"></common-button>
                </span>
            </div>

        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
