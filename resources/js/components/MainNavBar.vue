<script setup>
import MainMenuTab from "./MainMenuTab.vue";

const tabs = [
    {
        title: 'Главная',
        bg: 'bg-pink',
        link: '/'
    },
    {
        title: 'Новости',
        bg: 'bg-orange',
        link: '/news'
    },
    {
        title: 'Галерея',
        bg: 'bg-yellow',
        link: '/'
    },
    {
        title: 'Ау, Родители',
        bg: 'bg-green',
        link: '/'
    },
    {
        title: 'Усыновление.ру',
        bg: 'bg-light-blue',
        link: '/'
    },
    {
        title: 'Контакты',
        bg: 'bg-violet',
        link: '/'
    },
]
</script>

<template>
    <div class='flex justify-end gap-[10px] overflow-hidden'>
        <router-link v-for='tab in tabs' :to='tab.link'>
            <MainMenuTab :background='tab.bg'>
                {{ tab.title.toUpperCase() }}
            </MainMenuTab>
        </router-link>
    </div>
</template>

<style scoped>

</style>
