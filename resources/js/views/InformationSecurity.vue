<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import useCommon from "../use/common.js";
import DocumentDownloadUpload from "../components/DocumentDownloadUpload.vue";
window.scrollTo(0, 0)
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <router-link to='/information-security' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Информационная безопасность' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
            <h2 class='font-roboto700 my-[20px]'>
                Что такое цифровая грамотность?
            </h2>
            <img src="../../../public/informationSecurity.png" alt="Информационная безопасность" class="pb-[20px]">
            <document-download-upload name="Памятка для детей" type="memo-kids"></document-download-upload>
            <document-download-upload name="Памятка для родителей" type="memo-parents"></document-download-upload>
            <p class="pt-[20px]">
                Если разобрать словосочетание «цифровая компетенция» по частям, то получится что-то вроде «навыков жизни
                в цифровом пространстве».
            </p>
            <p>
                Но что это за навыки и почему они столь критичны для поколения современной молодежи? Это серьёзный и сложный вопрос.
            </p>
            <p class="mb-[20px]">
                Ответ можно получить на лучшем ресурсе для детей — сайте
                <a href="https://xn--b1afankxqj2c.xn--p1ai/index.php" target="_blank" class="underline text-purpl-blue" :style="isImpairedVision ? 'color:black':''">
                    «Сетевичок»
                </a>
            </p>
            <h2 class='font-roboto700'>
                План мероприятий по обеспечению информационной безопасности детей в Республике Бурятия
            </h2>
            <p>
                В соответствие с ч. 2 ст. 4 Федерального закона «О защите детей от информации, причиняющей вред их здоровью
                и развитию» от 29.10.2010 г. № 426-ФЗ разработан и утвержден План мероприятий по обеспечению информационной
                безопасности детей, производства  информационной продукции для детей и оборота информационной  продукции в
                Республике Бурятия на 2019 — 2021 годы.
            </p>
            <p class="mb-[20px]">
                Ознакомиться с Планом можно по ссылке:
                <a
                    href="https://egov-buryatia.ru/upload/iblock/379/3796048525bf68c571bb882f14b7675e.pdf"
                    class="hover:underline"
                    style="word-break: break-word"
                    target="_blank">
                    https://egov-buryatia.ru/upload/iblock/379/3796048525bf68c571bb882f14b7675e.pdf
                </a>
            </p>
        </div>
    </ContentContainer>
</template>

<style scoped>
div {
    @media only screen and (max-width: 750px) {
        font-size: 14px;
    }
}
</style>
