<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import { ref } from "vue";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";
import CommonButton from "../components/CommonButton.vue";
import useCommon from "../use/common.js";

const centerInfoItems = ref([])

const roundClockText = ref('')

const documents = ref([
    {
        id: 1,
        name: 'Договор о предоставлении социальных услуг (образец)',
        type: 'sample-contract',
    },
    {
        id: 2,
        name: 'Приказ от 31 мая 2019 г. N 457 Об утверждении тарифов на социальные услуги на основании подушевых нормативов финансирования социальных услуг',
        type: 'tariff-declaration',
    },
    {
        id: 3,
        name: 'Анкета опроса получателей социальных услуг',
        type: 'blank-social-client',
    },
    {
        id: 4,
        name: 'Правила внутреннего распорядка для получателей социальных услуг',
        type: 'internal-rules',
    },
    {
        id: 5,
        name: 'Бланк индивидуальной программы социальных услуг',
        type: 'personal-program',
    },
])
const {
    isImpairedVision,
    isAdmin,
    fetchSocialServicesPageContent,
    updateSocialServicesPageContent,
} = useCommon()

const regulationText = ref('')
const pageContentLoaded = ref(false)
const editRegulationMode = ref(false)
const editTableMode = ref(false)
let regulationSnapshot = ''
let tableSnapshot = { intro: '', rows: [] }

function cloneCenterRows(rows) {
    return JSON.parse(JSON.stringify(rows))
}

function restoreTable() {
    roundClockText.value = tableSnapshot.intro
    centerInfoItems.value = cloneCenterRows(tableSnapshot.rows)
}

async function loadPageContent() {
    const data = await fetchSocialServicesPageContent()
    if (data !== false) {
        regulationText.value = data.regulation_text ?? ''
        roundClockText.value = data.round_clock_text ?? ''
        centerInfoItems.value = data.center_info_items?.length
            ? cloneCenterRows(data.center_info_items)
            : []
    }
    pageContentLoaded.value = true
}

function startEditRegulation() {
    regulationSnapshot = regulationText.value
    editRegulationMode.value = true
}

function cancelEditRegulation() {
    regulationText.value = regulationSnapshot
    editRegulationMode.value = false
}

async function saveRegulation() {
    pageContentLoaded.value = false
    const ok = await updateSocialServicesPageContent({ regulation_text: regulationText.value })
    if (ok) {
        await loadPageContent()
        editRegulationMode.value = false
    }
    pageContentLoaded.value = true
}

function startEditTable() {
    tableSnapshot = { intro: roundClockText.value, rows: cloneCenterRows(centerInfoItems.value) }
    editTableMode.value = true
}

function cancelEditTable() {
    restoreTable()
    editTableMode.value = false
}

async function saveTable() {
    pageContentLoaded.value = false
    const ok = await updateSocialServicesPageContent({
        round_clock_text: roundClockText.value,
        center_info_items: centerInfoItems.value,
    })
    if (ok) {
        await loadPageContent()
        editTableMode.value = false
    }
    pageContentLoaded.value = true
}

function addCenterInfoRow() {
    centerInfoItems.value = [...centerInfoItems.value, { id: '', title: '', content: '' }]
}

function removeCenterInfoRow(index) {
    const next = [...centerInfoItems.value]
    next.splice(index, 1)
    centerInfoItems.value = next
}

function moveCenterInfoRow(index, delta) {
    const j = index + delta
    if (j < 0 || j >= centerInfoItems.value.length) {
        return
    }
    const next = [...centerInfoItems.value]
    const t = next[index]
    next[index] = next[j]
    next[j] = t
    centerInfoItems.value = next
}

loadPageContent()

const servicesSections = [
    {
        title: "Содержание и воспитание детей-сирот и детей, оставшихся без попечения родителей, детей, находящихся в трудной жизненной ситуации",
        headerFirstCol: "N п/п",
        categories: [
            {
                title: "Социально-бытовые",
                items: [
                    "Предоставление площади жилых помещений согласно утвержденным нормативам",
                    "Обеспечение питания согласно утвержденным нормативам",
                    "Обеспечение мягким инвентарем согласно утвержденным нормативам",
                    "Обеспечение книгами, журналами, газетами, настольными играми",
                    "Содейств. в транспортировке для лечения, обучения, участия в культурн. мероприятиях",
                    "Сопровождение в соц-знач. орг-ции, в том числе в медорганизации",
                ],
            },
            {
                title: "Социально-медицинские",
                items: [
                    "Организация первичного медицинского осмотра и первичной санитарной",
                    "Организация первичной доврачебной помощи",
                    "Организация оздоровительных мероприятий",
                    "Организация систематического наблюдения за получателями социальных услуг для выявления отклонений в состоянии их здоровья",
                    "Организация консультирования по социально-медицинским вопросам",
                    "Организация выполнения процедур, связанных с сохранением здоровья",
                    "Содействие в оказании медицинской помощи",
                    "Содействие в проведении медико-социальной экспертизы",
                    "Содействие в организации прохождения диспансеризации",
                ],
            },
            {
                title: "Социально-психологические",
                items: [
                    "Социально-психологическое консультирование, в том числе по вопросам внутрисемейных отношений",
                    "Психологическая диагностика и обследование личности",
                    "Психологический тренинг",
                    "Психологическая коррекция",
                    "Социально-психологический патронаж",
                ],
            },
            {
                title: "Социально-педагогические",
                items: [
                    "Социально-педагогическая коррекция, включая диагностику и консультирование",
                    "Формирование позитивных интересов и организация досуга",
                ],
            },
            {
                title: "Социально-правовые",
                items: [
                    "Оказание помощи в оформлении и восстановлении документов получателей социальных услуг",
                    "Оказание помощи в получении юридических услуг",
                    "Консультирование по социально-правовым вопросам, в том числе по вопросам, связанным с реализацией права граждан на социальное обслуживание",
                    "Содействие в получении полагающихся пенсий, пособий, других социальных выплат и мер социальной поддержки",
                    "Содействие в подготовке запросов, заявлений, ходатайств по вопросам социальной защиты населения",
                    "Содействие в получении бесплатной помощи адвоката, обеспечение представительства в суде",
                ],
            },
        ],
    },
    {
        title: "Предоставление социального обслуживания в полустационарной форме включая оказание социально-бытовых услуг, социально-медицинских услуг, социально-психологических услуг, социально-педагогических услуг, социально-трудовых услуг, социально-правовых услуг, услуг в целях повышения коммуникативного потенциала получателей социальных услуг, имеющих ограничения жизнедеятельности, в том числе детей-инвалидов, срочных социальных услуг",
        headerFirstCol: "N п/п",
        categories: [
            {
                title: "Социально-бытовые",
                items: [
                    "Предоставление площади жилых помещений согласно утвержденным нормативам",
                    "Обеспечение питания согласно утвержденным нормативам",
                    "Обеспечение мягким инвентарем согласно утвержденным нормативам",
                    "Обеспечение книгами, журналами, газетами, настольными играми",
                ],
            },
            {
                title: "Социально-медицинские",
                items: [
                    "Организация первичного медицинского осмотра и первичной санитарной",
                    "Организация первичной доврачебной помощи",
                    "Организация оздоровительных мероприятий",
                    "Организация систематического наблюдения за получателями социальных услуг для выявления отклонений в состоянии их здоровья",
                    "Организация консультирования по социально-медицинским вопросам",
                ],
            },
            {
                title: "Социально-психологические",
                items: [
                    "Социально-психологическое консультирование, в том числе по вопросам внутрисемейных отношений",
                    "Психологическая диагностика и обследование личности",
                    "Психологический тренинг",
                    "Психологическая коррекция",
                ],
            },
            {
                title: "Социально-педагогические",
                items: [
                    "Социально-педагогическая коррекция, включая диагностику и консультирование",
                    "Формирование позитивных интересов и организация досуга",
                ],
            },
            {
                title: "Социально-правовые",
                items: [
                    "Оказание помощи в оформлении и восстановлении документов получателей социальных услуг",
                    "Оказание помощи в получении юридических услуг",
                    "Консультирование по социально-правовым вопросам, в том числе по вопросам, связанным с реализацией права граждан на социальное обслуживание",
                    "Содействие в получении полагающихся пенсий, пособий, других социальных выплат и мер социальной поддержки",
                    "Содействие в подготовке запросов, заявлений, ходатайств по вопросам социальной защиты населения",
                ],
            },
        ],
    },
    {
        title: "Предоставление социального обслуживания по форме на дому",
        headerFirstCol: "№ п/п",
        categories: [
            {
                title: "Социально-психологические",
                items: [
                    "Социально-психологическое консультирование, в том числе по вопросам внутрисемейных отношений",
                    "Психологическая диагностика и обследование личности",
                    "Психологический тренинг",
                    "Социально-психологический патронаж",
                ],
            },
            {
                title: "Социально-педагогические",
                items: [
                    "Социально-педагогическая коррекция, включая диагностику и консультирование",
                ],
            },
            {
                title: "Социально-правовые",
                items: [
                    "Содействие в получении полагающихся пенсий, пособий, других социальных выплат и мер социальной поддержки",
                    "Консультирование по социально-правовым вопросам, в том числе по вопросам, связанным с реализацией права граждан на социальное обслуживание",
                    "Содействие в подготовке запросов, заявлений, ходатайств по вопросам социальной защиты населения",
                ],
            },
        ],
    },
]

</script>

<template>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
            <div v-if="!pageContentLoaded" class="mt-[40px] flex items-center gap-[12px]">
                <img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Загрузка">
            </div>
            <template v-else>
                <p
                    v-if="!editTableMode"
                    class="mt-[40px]"
                    style="white-space: pre-line;"
                >
                    {{ roundClockText }}
                </p>
                <textarea
                    v-else
                    v-model="roundClockText"
                    rows="2"
                    class="mt-[40px] w-full p-[12px] border border-light-purple rounded-[10px] text-[20px] font-roboto400 resize-y"
                ></textarea>

                <table class="table-auto socials-time">
                    <tbody>
                    <tr v-for="(item, rowIndex) in centerInfoItems" :key="rowIndex">
                        <td v-if="!editTableMode">
                            {{ item.id }}
                        </td>
                        <td v-else>
                            <input
                                v-model="item.id"
                                type="text"
                                class="w-full min-w-[2.5rem] p-[6px] border border-light-purple rounded-[6px] text-[20px] font-roboto400"
                            >
                        </td>
                        <td
                            v-if="!editTableMode"
                            style="white-space: pre-line;"
                        >
                            {{ item.title }}
                        </td>
                        <td v-else>
                            <textarea
                                v-model="item.title"
                                rows="3"
                                class="w-full p-[6px] border border-light-purple rounded-[6px] text-[20px] font-roboto400 resize-y"
                            ></textarea>
                        </td>
                        <td
                            v-if="!editTableMode"
                            v-html="item.content"
                        ></td>
                        <td v-else>
                            <textarea
                                v-model="item.content"
                                rows="4"
                                class="w-full p-[6px] border border-light-purple rounded-[6px] text-[20px] font-roboto400 resize-y"
                            ></textarea>
                        </td>
                        <td
                            v-if="editTableMode && isAdmin"
                            class="align-top w-[1%] min-w-[7rem] whitespace-nowrap p-[6px]"
                        >
                            <button type="button" class="block text-left mb-[4px] underline" @click="moveCenterInfoRow(rowIndex, -1)">Вверх</button>
                            <button type="button" class="block text-left mb-[4px] underline" @click="moveCenterInfoRow(rowIndex, 1)">Вниз</button>
                            <button type="button" class="block text-left text-red-700 underline" @click="removeCenterInfoRow(rowIndex)">Удалить</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div v-if="editTableMode && isAdmin" class="mt-[12px]">
                    <button type="button" class="underline" @click="addCenterInfoRow">Добавить строку</button>
                </div>
                <div
                    v-if="!editRegulationMode && !editTableMode && isAdmin"
                    class="mt-[16px]"
                >
                    <common-button text="Редактировать сведения и таблицу" @click="startEditTable"></common-button>
                </div>
                <div v-if="editTableMode && isAdmin" class="mt-[16px]">
                    <common-button text="Сохранить таблицу" @click="saveTable"></common-button>
                    <common-button text="Отмена" class="ml-[10px]" @click="cancelEditTable"></common-button>
                </div>

            <div class='mt-[40px]'>
                    <p v-if="!editRegulationMode" style="white-space: pre-line;">
                        {{ regulationText }}
                    </p>
                    <textarea
                        v-else
                        v-model="regulationText"
                        rows="8"
                        class="w-full p-[12px] border border-light-purple rounded-[10px] text-[20px] font-roboto400 resize-y"
                    ></textarea>
                    <div v-if="!editRegulationMode && !editTableMode && isAdmin" class="mt-[16px]">
                        <common-button text="Редактировать нормативный текст" @click="startEditRegulation"></common-button>
                    </div>
                    <div v-if="editRegulationMode && isAdmin" class="mt-[16px]">
                        <common-button text="Сохранить" @click="saveRegulation"></common-button>
                        <common-button text="Отмена" class="ml-[10px]" @click="cancelEditRegulation"></common-button>
                    </div>
            </div>
            </template>

            <p class="mt-[40px] text-[20px] font-roboto500 text-link-dark-blue">Виды социальных услуг</p>
            <div
                v-for="(section, sectionIndex) in servicesSections"
                :key="sectionIndex"
                class="mt-[20px]"
            >
                <p
                    class="services-section-title mb-3 text-center text-[20px] leading-snug font-roboto500"
                    :class="isImpairedVision ? 'text-black' : 'text-link-dark-blue'"
                >
                    {{ section.title }}
                </p>
                <table class="services-catalog-table w-full font-roboto400">
                    <thead>
                        <tr>
                            <th
                                class="services-catalog-group-col services-catalog-head"
                            >
                                {{ section.headerFirstCol ?? "N п/п" }}
                            </th>
                            <th class="services-catalog-head">
                                Наименование услуги
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <template
                            v-for="(category, categoryIndex) in section.categories"
                            :key="categoryIndex"
                        >
                            <tr
                                v-for="(item, itemIndex) in category.items"
                                :key="`${categoryIndex}-${itemIndex}`"
                            >
                                <td
                                    v-if="itemIndex === 0"
                                    class="services-catalog-group"
                                    :rowspan="category.items.length"
                                >
                                    {{ category.title }}
                                </td>
                                <td class="services-catalog-name">
                                    <template v-if="item">{{ item }}</template>
                                    <template v-else>&nbsp;</template>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <document-download-upload
                v-for="doc in documents" :key="doc.id"
                :name="doc.name"
                :type="doc.type">
            </document-download-upload>

        </div>
    </ContentContainer>
</template>

<style scoped>
@media only screen and (max-width: 500px) {
    .socials-table {
        font-size: 16px;
    }
}
@media only screen and (max-width: 415px) {
    .socials-table {
        font-size: 14px;
    }
}
@media only screen and (max-width: 415px) {
    .socials-time {
        font-size: 12px;
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
    text-align: left;
}
th {
    text-align: center;
}

.services-catalog-table {
    font-family: inherit;
    font-size: inherit;
}

.services-catalog-head {
    font-family: inherit;
    font-size: 18px;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
}

.services-catalog-table thead th {
    border-bottom: 3px double #000;
}

.services-catalog-group-col {
    width: 11rem;
    max-width: 28%;
}

.services-catalog-group {
    font-family: inherit;
    font-size: inherit;
    font-weight: 400;
    vertical-align: middle;
    text-align: center;
}

.services-catalog-name {
    text-align: left;
    vertical-align: top;
}
</style>
