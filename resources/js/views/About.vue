<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
</script>

<template>
    <PageTitle title='Обратная связь' bg-class='bg-purpl-blue' text-color-class='text-white'/>
    <ContentContainer>
        <div class='py-[60px] text-link-dark-blue text-[20px] font-roboto700 flex justify-between'>
            <router-link
                to='structure'
                class='text-center'
                active-class='underline underline-offset-8'>
                Структура центра
            </router-link>
            <router-link
                to='staff'
                class='text-center'
                active-class='underline underline-offset-8'>
                Персональный состав
            </router-link>
            <router-link
                to='activities'
                class='text-center'
                active-class='underline underline-offset-8'>
                Деятельность центра
            </router-link>
            <router-link
                to='available'
                class='text-center'
                active-class='underline underline-offset-8'>
                Количество свободных мест
            </router-link>
            <router-link
                to='experience'
                class='text-center'
                active-class='underline underline-offset-8'>
                Опыт работы
            </router-link>
            <router-link
                to='social-services'
                class='text-center'
                active-class='underline underline-offset-8'>
                Виды социальных услуг
            </router-link>
            <router-link
                to='license'
                class='text-center'
                active-class='underline underline-offset-8'>
                Лицензия
            </router-link>
        </div>
        <div>
            <router-view></router-view>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
