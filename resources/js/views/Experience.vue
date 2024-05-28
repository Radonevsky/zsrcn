<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
            <p>Опыт работы за последние 5 лет</p>
            <p class='mt-[20px]'>
                Реабилитацию прошли:
            </p>
            <p>
                2019г. - 243 несовершеннолетних
            </p>
            <p>
                2020г. - 238 несовершеннолетних
            </p>
            <p>
                2021г. - 235 несовершеннолетних
            </p>
            <p>
                2022г. - 203 несовершеннолетних
            </p>
            <p>
                2023г. - 243 несовершеннолетних
            </p>

            <table class="table-auto mt-[20px] experience-table">
                <thead>
                <tr class='bg-light-bg'>
                    <th>Жизнеустройство детей, находящихся на воспитании в ЗСРЦН</th>
                    <th>2019г.</th>
                    <th>2020г.</th>
                    <th>2021г.</th>
                    <th>2022г.</th>
                    <th>2023г.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="first-column">Возвращено в родные семьи</td>
                    <td>168</td>
                    <td>163</td>
                    <td>153</td>
                    <td>119</td>
                    <td>157</td>
                </tr>
                <tr>
                    <td class="first-column">Семейное жизнеустройство (СВГ, приемная семья, опека, попечительство, усыновление)</td>
                    <td>23</td>
                    <td>11</td>
                    <td>25</td>
                    <td>19</td>
                    <td>21</td>
                </tr>
                <tr>
                    <td class="first-column">Направлено в образовательные учреждения для детей – сирот и детей, оставшихся без попечения родителей)</td>
                    <td>12</td>
                    <td>7</td>
                    <td>39</td>
                    <td>36</td>
                    <td>29</td>
                </tr>
                <tr>
                    <td class="first-column">Другие формы жизнеустройства (определены на учебу в ПУ, направлены на лечение, самовольно покинули учреждение, переданы в СРЦН)</td>
                    <td>6</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                </tbody>
            </table>

            <p class='mt-[20px]'>
                Разработана и реализуется программа развития учреждения «Взгляд в будущее» 2015-2020 гг.,
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
    .experience-table th{
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
