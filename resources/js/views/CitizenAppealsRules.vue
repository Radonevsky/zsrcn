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
            <h2 class='font-roboto700 max-w-[900px] m-auto'>
                О порядке рассмотрения обращения граждан
            </h2>
            <p class='mt-[20px]'>
                Обращение предусматривает возможность получения социальных услуг, направления жалобы предложения,
                отзывов по вопросам качества оказания социальных услуг как физических, так и юридических лиц.
                В случае, если обращения соответствуют требованиям Федерального закона от 2 мая 2006 года N 59-ФЗ
                «О порядке рассмотрения обращений граждан Российской Федерации» (далее — Федеральный закон), такие
                обращения будут приняты к рассмотрению и на них будет дан ответ в установленные Федеральным законом сроки.
            </p>
            <p class='mt-[20px]'>
                Право подать обращение в ГБУСО «Заиграевский социально-реабилитационный центр для несовершеннолетних»
                можно следующими способами:
            </p>
            <ul class='list-disc pl-[20px]'>
                <li>
                    В устной форме
                </li>
                <li>
                    В форме электронного документа на электронную почту
                </li>
                <li>
                    В письменной форме
                </li>
                <li>
                    Обратиться по телефонной линии +7 (30136) 53-6-66
                </li>
            </ul>
            <p class='mt-[20px]'>
                Обращение, поступившее в учреждение, подлежит рассмотрению в порядке, установленном Федеральным законом
                от 02.05.2006 № 59-ФЗ «О порядке рассмотрения обращений граждан Российской Федерации»
            </p>
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
div {
    @media only screen and (max-width: 750px) {
        font-size: 14px;
    }
}
</style>
