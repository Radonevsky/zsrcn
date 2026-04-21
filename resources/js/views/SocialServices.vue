<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import { ref } from "vue";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";
import CommonButton from "../components/CommonButton.vue";
import useCommon from "../use/common.js";

const centerInfoItems = ref([
    {
        id: '№',
        title: '',
        content: '',
    },
    {
        id: 1,
        title: 'Полное наименование учреждения',
        content: 'ГБУСО «Заиграевский социально – реабилитационный центр для несовершеннолетних»',
    },
    {
        id: 2,
        title: 'Индекс, почтовый адрес учреждения',
        content: '671325 Республика Бурятия Заиграевский р-н с.Новая Брянь пер. Верховской 1',
    },
    {
        id: 3,
        title: 'Электронный адрес',
        content: '<a href="mailto:gusonat@mail.ru" class="underline">gusonat@mail.ru</a>',
    },
    {
        id: 4,
        title: 'Компетенция учреждения (кратко)',
        content: 'Содержание, воспитание и реабилитация детей.',
    },
    {
        id: 5,
        title: 'ФИО (полностью) руководителя учреждения, осуществляющего прием граждан по телефону или видеосвязи',
        content: 'Кочетова Галина Ивановна',
    },
    {
        id: 6,
        title: 'Контакты руководителя (служебный телефон с указанием кода населенного пункта, личный)',
        content: '8 (30136) 53-6-66\n89247707609',
    },
    {
        id: 7,
        title: 'Место осуществления личного приема граждан руководителем (адрес, кабинет(офис))',
        content: 'Республика Бурятия Заиграевский р-н с.Новая Брянь пер. Верховской 1',
    },
    {
        id: 8,
        title: 'Дни недели и часы, определенные для приема граждан руководителем по телефону или видеосвязи',
        content: 'вторник, четверг с 10.00ч. до 16.00ч.',
    },
    {
        id: 9,
        title: 'Ф.И.О.( полностью) уполномоченного лица, определенного для осуществления приема граждан по телефону или видеосвязи',
        content: 'Москвитина Алла Александровна',
    },
    {
        id: 10,
        title: 'Должность уполномоченного лица, осуществляющего прием граждан по телефону или видеосвязи',
        content: 'Заведующая отделением',
    },
    {
        id: 11,
        title: 'Контакты (служебный   телефон с указанием кода населенного пункта, личный) уполномоченного лица, определенного для , осуществления приема граждан по телефону или видеосвязи',
        content: '8 (30136) 53- 9 – 32\n89246523502',
    },
    {
        id: 12,
        title: 'Место осуществления личного приема граждан руководителем (адрес, кабинет(офис))',
        content: 'Республика Бурятия Заиграевский р-н с.Новая Брянь пер. Верховской 1',
    },
    {
        id: 13,
        title: 'Дни недели и часы, определенные для приема граждан руководителем по телефону или видеосвязи',
        content: 'среда, пятница с 13.00 до 16.00ч.',
    },
    {
        id: 14,
        title: '№ и дата приказа по учреждению',
        content: '№ 30-ОД от 13.05.2016 г.',
    },

])

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
const regulationLoaded = ref(false)
const editRegulationMode = ref(false)
let regulationSnapshot = ''

async function loadRegulationText() {
    const data = await fetchSocialServicesPageContent()
    if (data !== false) {
        regulationText.value = data.regulation_text ?? ''
    }
    regulationLoaded.value = true
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
    regulationLoaded.value = false
    const ok = await updateSocialServicesPageContent({ regulation_text: regulationText.value })
    if (ok) {
        await loadRegulationText()
        editRegulationMode.value = false
    }
    regulationLoaded.value = true
}

loadRegulationText()

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
                    "",
                    "",
                    "Сопровождение в соц-знач. орг-ции, в том числе в медорганизации",
                ],
            },
            {
                title: "Социально-медицинские",
                items: [
                    "",
                    "Организация первичного медицинского осмотра и первичной санитарной",
                    "Организация первичной доврачебной помощи",
                    "Организация оздоровительных мероприятий",
                    "",
                    "Организация систематического наблюдения за получателями социальных услуг для выявления отклонений в состоянии их здоровья",
                    "",
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
                    "",
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
            <p class='mt-[40px]'>Учреждение работает в круглосуточном режиме.</p>
            <table class="table-auto socials-time">
                <tbody>
                <tr v-for='item in centerInfoItems'>
                    <td>
                        {{ item.id }}
                    </td>
                    <td>
                        {{ item.title }}
                    </td>
                    <td v-html="item.content">
                    </td>
                </tr>
                </tbody>
            </table>

            <div class='mt-[40px]'>
                <div v-if="!regulationLoaded" class="flex items-center gap-[12px]">
                    <img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Загрузка">
                </div>
                <template v-else>
                    <p v-if="!editRegulationMode" style="white-space: pre-line;">
                        {{ regulationText }}
                    </p>
                    <textarea
                        v-else
                        v-model="regulationText"
                        rows="8"
                        class="w-full p-[12px] border border-light-purple rounded-[10px] text-[20px] font-roboto400 resize-y"
                    ></textarea>
                    <div v-if="!editRegulationMode && isAdmin" class="mt-[16px]">
                        <common-button text="Редактировать текст" @click="startEditRegulation"></common-button>
                    </div>
                    <div v-if="editRegulationMode && isAdmin" class="mt-[16px]">
                        <common-button text="Сохранить" @click="saveRegulation"></common-button>
                        <common-button text="Отмена" class="ml-[10px]" @click="cancelEditRegulation"></common-button>
                    </div>
                </template>
            </div>

            <div
                v-for="(section, sectionIndex) in servicesSections"
                :key="sectionIndex"
                class="mt-[40px]"
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
