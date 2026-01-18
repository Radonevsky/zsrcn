<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {ref} from "vue";
import CommonButton from "../components/CommonButton.vue";

const {
    isImpairedVision,
    isAdmin,
    fetchStructureContent,
    updateStructureContent,
} = useCommon()

const content = ref(null)
const loaded = ref(false)
const editMode = ref(false)
const description = ref('')

const setStructureContent = async ()=> {
    content.value = await fetchStructureContent()
    if (content.value) {
        description.value = content.value.description || ''
    }
    loaded.value = true
}

const saveStructureContent = async ()=> {
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
        // If update failed, reload from server
        await setStructureContent()
        editMode.value = false
    }
}

setStructureContent()
</script>

<template>
<ContentContainer>
    <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:#000':''">
        <p>Структура центра</p>

        <!-- Description Text - Editable -->
        <div class='mt-[20px]' v-if="loaded && !editMode" style="white-space: pre-line;">
            {{ description }}
        </div>
        <textarea
            v-if="editMode && loaded"
            v-model="description"
            class="mt-[20px] p-[5px] w-full border-light-purple border-[1px] rounded-[10px] outline-1 py-[15px] focus:shadow-around
            focus:border-orange text-[20px] font-roboto400 text-link-dark-blue resize-none"
            rows="12">
        </textarea>

        <!-- Edit Buttons -->
        <span v-if="!editMode && isAdmin && loaded" class="mt-[20px] block">
            <common-button text="Редактировать текст" @click="editMode = true"></common-button>
        </span>
        <span v-if="editMode && isAdmin && loaded" class="mt-[20px] block">
            <common-button text="Сохранить" @click="saveStructureContent"></common-button>
            <common-button text="Отмена" @click="editMode = false; description = content.description" class="mt-[10px] ml-[10px]"></common-button>
        </span>
    </div>

    <!-- Org Chart Title - Not editable for now -->
    <div class='text-[20px] font-roboto700 text-link-dark-blue max-w-[863px] text-center mx-auto mt-[45px]' :style="isImpairedVision ? 'color:#000':''">
        Структура ГБУСО «Заиграевский социально – реабилитационный центр для несовершеннолетних»
    </div>

    <!-- Org Chart - Not editable for now -->
    <div class='text-[30px] mt-[55px] font-roboto700 '>
        <div class="tree">
            <div class='tree__item--head flex justify-center'>
                <div class="tree__item tree__item--bottom-center" :class="isImpairedVision ? 'for_impaired':''">Директор</div>
            </div>

            <div class="tree__item tree__item--top-right" :class="isImpairedVision ? 'for_impaired':''">
                Заведующий отделением
            </div>
            <div class="tree__item tree__item--top-center" :class="isImpairedVision ? 'for_impaired':''">
                Начальник хозяйственного отдела
            </div>
            <div class="tree__item tree__item--top-left" :class="isImpairedVision ? 'for_impaired':''">
                Административно- управленческий персонал
            </div>
            <div class="tree__item tree__item--top-center" :class="isImpairedVision ? 'for_impaired':''">
                Отделение временного содержания детей сирот и детей, оставшихся без попечения родителей, а так же, детей оказавшихся в трудной жизненной ситуациию
            </div>
            <div class="tree__item tree__item--top-center max-h-[178px]" :class="isImpairedVision ? 'for_impaired':''">
                Персонал хозяйственного отдела
            </div>
            <div class="tree__item tree__item--empty">
            </div>
        </div>
        <img v-if="isImpairedVision" src="../../images/centerStructure.png" alt="Структура центра" class="w-full hidden">
        <img v-if="!isImpairedVision" src="../../images/centerStructure1.png" alt="Структура центра" class="w-full hidden">
    </div>
</ContentContainer>
</template>

<style scoped>
@media only screen and (max-width: 1000px) {
    .tree__item {
        font-size: 20px;
    }
}
@media only screen and (max-width: 750px) {
    .tree__item {
        font-size: 16px;
    }
}
@media only screen and (max-width: 600px) {
    .tree__item {
        font-size: 10px;
    }
}

.tree {
    --vertical-gap: 50px;
    --horizontal-gap: 20px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin: 0;
    padding: 0;
    list-style: none;
    width: 100%;
    color: #fff;
}

.tree__item {
    position: relative;
    margin: 0 calc(var(--horizontal-gap) / 2);
    width: calc(33% - var(--horizontal-gap));
    max-width: 392px;
    margin-top: var(--vertical-gap);
    background-color: #ACB9E1;
    box-sizing: border-box;
    padding: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 10px;
}



.tree__item:first-child {
    margin-top: 0;
}

.tree__item--head {
    width: 100%;
}

.tree__item--empty {
    background-color: #fff;
}

.tree__item::before, .tree__item::after {
    content: '';
    position: absolute;
    background-color: #ACB9E1;
}

.tree__item--bottom-right::before {
    top: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}

.tree__item--bottom-right::after {
    bottom: calc(var(--vertical-gap) / -2);
    left: calc(50% - 1px);
    width: calc(50% + var(--horizontal-gap) / 2 + 1px);
    height: 3px;
}

.tree__item--top-right::before {
    bottom: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}

.tree__item--top-right::after {
    top: calc(var(--vertical-gap) / -2);
    left: calc(50% - 1px);
    width: calc(100% + 20px);
    height: 3px;
}

.tree__item--top-left::before {
    bottom: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}

.tree__item--top-left::after {
    top: calc(var(--vertical-gap) / -2);
    right: calc(50% - 1px);
    width: calc(100% + 20px);
    height: 3px;
}

.tree__item--top-center::before {
    bottom: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap));
}

.tree__item--bottom-center::before {
    top: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}

.for_impaired {
    background-color: #fff;
    border: 2px solid #000;
    color: #000;
}

.for_impaired::before, .for_impaired::after {
    background-color: #000;
}
@media only screen and (max-width: 450px) {
    img {
        display: block;
    }
    .tree {
        display: none;
    }
}
</style>
