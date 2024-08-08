<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
import {ref} from "vue";
import CommonButton from "../components/CommonButton.vue";
const {
    isImpairedVision,
    isAdmin,
    fetchExperienceContent,
    updateExperienceContent,
    fetchExperienceTableContent,
    updateExperienceTableContent
} = useCommon()

const experienceContent = ref(null)
const loadedExperience = ref(false)
const editExperienceMode = ref(false)
const experienceTableContent = ref(null)
const loadedExperienceTable = ref(false)
const editExperienceTableMode = ref(false)

const setExperienceContent = async ()=> {
    experienceContent.value = await fetchExperienceContent()
    loadedExperience.value = true
}

const setExperienceTableContent = async () => {
    experienceTableContent.value = await fetchExperienceTableContent();
    loadedExperienceTable.value = true;
};

const saveAExperienceContent = async ()=> {
    loadedExperience.value = false
    await updateExperienceContent(experienceContent.value)
    editExperienceMode.value = false
    loadedExperience.value = true
}

const saveExperienceTableContent = async () => {
    loadedExperienceTable.value = false;
    await updateExperienceTableContent(experienceTableContent.value);
    editExperienceTableMode.value = false;
    loadedExperienceTable.value = true;
};
setExperienceContent()
setExperienceTableContent();
</script>

<template>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
            <p>Опыт работы за последние 5 лет</p>
            <p class='mt-[20px] mb-[30px]' v-if="loadedExperience && !editExperienceMode" style="white-space: pre-line;">
                {{ experienceContent }}
            </p>
            <textarea
                v-if="editExperienceMode"
                v-model="experienceContent"
                class="p-[5px] w-[400px] h-[200px] border-light-purple border-[1px] rounded-[10px] outline-1 py-[15px] focus:shadow-around
                    focus:border-orange text-[20px] font-roboto400 text-link-dark-blue w-[150px] resize-none">
            </textarea>
            <span v-if="!editExperienceMode && isAdmin && loadedExperience">
                <common-button text="Редактировать" @click="editExperienceMode = true"></common-button>
            </span>
            <span v-if="editExperienceMode && isAdmin && loadedExperience">
                <common-button text="Сохранить" @click="saveAExperienceContent"></common-button>
            </span>

            <table class="table-auto mt-[20px] experience-table" v-if="loadedExperienceTable">
                <thead>
                <tr class='bg-light-bg'>
                    <th>Жизнеустройство детей, находящихся на воспитании в ЗСРЦН</th>
                    <th v-for="year in experienceTableContent" :key="'year-' + year.id">
                        <template v-if="!editExperienceTableMode">{{ year.year }}г.</template>
                        <template v-else>
                            <input v-model="year.year" type="number" class="w-full"/>
                        </template>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="first-column">Возвращено в родные семьи</td>
                    <td v-for="year in experienceTableContent" :key="'returned-' + year.id">
                        <template v-if="!editExperienceTableMode">{{ year.returned_to_family }}</template>
                        <template v-else>
                            <input v-model="year.returned_to_family" type="number" class="w-full"/>
                        </template>
                    </td>
                </tr>
                <tr>
                    <td class="first-column">Семейное жизнеустройство (СВГ, приемная семья, опека, попечительство, усыновление)</td>
                    <td v-for="year in experienceTableContent" :key="'family-' + year.id">
                        <template v-if="!editExperienceTableMode">{{ year.family_welfare }}</template>
                        <template v-else>
                            <input v-model="year.family_welfare" type="number" class="w-full"/>
                        </template>
                    </td>
                </tr>
                <tr>
                    <td class="first-column">Направлено в образовательные учреждения для детей – сирот и детей, оставшихся без попечения родителей</td>
                    <td v-for="year in experienceTableContent" :key="'educational-' + year.id">
                        <template v-if="!editExperienceTableMode">{{ year.sent_to_educational_institutions }}</template>
                        <template v-else>
                            <input v-model="year.sent_to_educational_institutions" type="number" class="w-full"/>
                        </template>
                    </td>
                </tr>
                <tr>
                    <td class="first-column">Другие формы жизнеустройства (определены на учебу в ПУ, направлены на лечение, самовольно покинули учреждение, переданы в СРЦН)</td>
                    <td v-for="year in experienceTableContent" :key="'other-' + year.id">
                        <template v-if="!editExperienceTableMode">{{ year.other_forms }}</template>
                        <template v-else>
                            <input v-model="year.other_forms" type="number" class="w-full"/>
                        </template>
                    </td>
                </tr>
                </tbody>
            </table>

            <span v-if="!editExperienceTableMode && isAdmin && loadedExperienceTable">
                <CommonButton text="Редактировать таблицу" @click="editExperienceTableMode = true"></CommonButton>
            </span>
            <span v-if="editExperienceTableMode && isAdmin && loadedExperienceTable">
                <CommonButton text="Сохранить таблицу" @click="saveExperienceTableContent"></CommonButton>
            </span>

            <p class='mt-[20px]'>
                Разработана и реализуется программа развития учреждения «Взгляд в будущее» 2022-2025 гг.,
                реализованы рабочие программы кружковой деятельности педагогов: «Подружка», «Мир книги», «Музыкальная капель»,
                «Здоровей-ка», «Путевка в жизнь», «Я познаю мир», «Декоративно-прикладное искусство «Фантазия» , «Наши руки не для скуки»,
                программа по социализации подростков, волонтерское движение «Шаг вперед». В 2017 году в рамках реализации благотворительной
                программы «С любовью к детям» реализуемой совместно и при поддержке Благотворительного фонда компании «Амвэй»
                «В ответе за будущее», Фонд поддержки и развития филантропии «КАФ» проводили открытый конкурс проектов «С любовью к детям»,
                нами был написан и реализован грантовый проект «Солнышко в ладошках» на сумму 870тыс. рублей., благодаря которому усовершенствовалась
                работа по сопровождению замещающих семей.
            </p>
            <p class='text-end'>Директор Г.И.Кочетова</p>
        </div>
    </ContentContainer>
</template>

<style scoped>
@media only screen and (max-width: 870px) {
    .experience-table {
        font-size: 14px;
    }
}
@media only screen and (max-width: 500px) {
    .experience-table {
        font-size: 12px;
    }
    .experience-table th {
        word-break: break-word;
    }
}
table {
    text-align: center;
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    padding: 3px 7px;
    border: 1px solid black;
}
th:first-child, td:first-child {
    text-align: left;
    max-width: 600px;
}
</style>
