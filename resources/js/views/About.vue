<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import useCommon from "../use/common.js";

window.scrollTo(0, 0)
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <router-link to='/about/description' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='О центре' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='pt-[30px] pb-[60px] text-link-dark-blue text-[20px] font-roboto700 flex gap-[10px] justify-between tabs'
             :style="isImpairedVision ? 'color:black':''">
            <router-link
                to='/about/structure'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Структура центра
            </router-link>
            <router-link
                to='/about/staff'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Персональный состав
            </router-link>
            <router-link
                to='/about/activities'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Деятельность центра
            </router-link>
            <router-link
                to='/about/available'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Количество свободных мест
            </router-link>
            <router-link
                to='/about/experience'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Опыт работы
            </router-link>
            <router-link
                to='/about/social-services'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Виды социальных услуг
            </router-link>
            <router-link
                to='/about/license'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Лицензия
            </router-link>
            <router-link
                to='/about/board-trustees'
                class='text-center hover:underline underline-offset-8'
                active-class='underline underline-offset-8'>
                Попечительский совет
            </router-link>
        </div>
        <div class='pb-[60px]'>
            <router-view></router-view>
        </div>
    </ContentContainer>
</template>

<style scoped>
@media only screen and (max-width: 870px) {
    .tabs {
        flex-direction: column;
    }
}
</style>
