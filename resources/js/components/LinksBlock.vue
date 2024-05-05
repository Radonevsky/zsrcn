<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import {ref} from "vue";
import useCommon from "../use/common.js";

const links = ref([
    [
        {
            id: 1,
            title: 'О центре',
            href: '/about',
        },
        {
            id: 2,
            title: 'Документы',
            href: '/documents',
        },
        {
            id: 3,
            title: 'Отчетные документы',
            href: '/statements',
        },
        {
            id: 4,
            title: 'Планирование финансово-хозяйственной деятельности',
            href: '/planning',
        },
        {
            id: 5,
            title: 'Служба сопровождения замещающих семей',
            href: '/support-foster',
        },
        {
            id: 6,
            title: 'Обращения граждан',
            href: '/citizen-appeals',
        },
    ],
    [
        {
            id: 7,
            title: 'Методическая работа',
            href: '/methodical',
        },
        {
            id: 8,
            title: 'Противодействие коррупции',
            href: '/anti-corruption',
        },
        {
            id: 9,
            title: 'Независимая оценка качества условий оказания услуг',
            href: '/quality-assessment',
        },
        {
            id: 10,
            title: 'Органы власти субъектов РФ — навстречу детям',
            href: '/towards-children',
        },
        {
            id: 11,
            title: '#СЕТЕВИЧОК',
            href: 'https://xn--b1afankxqj2c.xn--p1ai/index.php',
            externalLink: true,
        },
        {
            id: 12,
            title: 'Информационная безопасность',
            href: '/information-security',
        },
    ],

])
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<div class='bg-light-purple py-[60px] links-container' :class="isImpairedVision ? 'bg-white border-[2px]' : ''">
    <ContentContainer>
        <div class='flex justify-between gap-[10px] links-column-container'>
            <div v-for='column in links'>
                <ul class='flex flex-col gap-[35px] font-roboto300 pl-[20px] text-[20px] leading-[23px] text-link-dark-blue links-column
                    before:bg-link-dark-blue' :style="isImpairedVision ? 'color: black; font-weight: 700' : ''">
                    <li v-for='link in column' :key='link.id' class='main-link hover:underline hover:underline-offset-4'>
                        <a v-if="link.externalLink" :href="link.href" target="_blank">{{ link.title }}</a>
                        <router-link v-else :to='link.href'>{{ link.title }}</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </ContentContainer>
</div>
</template>

<style scoped>
@media only screen and (max-width: 750px) {
    .links-column {
        font-size: 16px;
    }
    .links-container {
        padding: 20px 0;
    }

}
@media only screen and (max-width: 550px) {
    .links-column-container {
        flex-wrap: wrap;
    }
}
</style>
