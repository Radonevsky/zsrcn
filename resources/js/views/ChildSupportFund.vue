<script setup>

import PageTitle from "../components/PageTitle.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
window.scrollTo(0, 0)
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <div>
        <PageTitle
            title='Информационные материалы фонда поддержки детей'
            bg-class='bg-purpl-blue'
            text-color-class='text-white'/>
        <ContentContainer>
            <div class='py-[60px] text-link-dark-blue text-[20px]' :style="isImpairedVision ? 'color: black' : ''">
                <h2 class='font-roboto700'>Информационные материалы фонда поддержки детей, находящихся в трудной жизненной ситуации</h2>
                <a
                    class='mt-[30px] block cursor-pointer hover:underline'
                    href='https://cloud.mail.ru/public/5MjM/jHNu5TRHU'
                    target='_blank'>
                    Видеоролики "Матрешки", "Сказки", "Ваза", "Диалоги", "Объявление", "Супергерои", "Угол", "Приснилось"
                </a>
            </div>
        </ContentContainer>
    </div>
</template>

<style scoped>

</style>
