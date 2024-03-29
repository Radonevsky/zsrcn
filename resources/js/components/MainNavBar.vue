<script setup>
import MainMenuTab from "./MainMenuTab.vue";

const tabs = [
    {
        title: 'Главная',
        bg: 'bg-pink',
        link: '/',
        name: 'main',
    },
    {
        title: 'Новости',
        bg: 'bg-orange',
        link: '/news',
        name: 'news',
    },
    {
        title: 'Галерея',
        bg: 'bg-yellow',
        link: '/gallery',
        name: 'gallery',
    },
    {
        title: 'Ау, Родители',
        bg: 'bg-green',
        link: '/hey-parents',
        name: 'parents',
    },
    {
        title: 'Усыновите.ру',
        bg: 'bg-light-blue',
        link: 'https://www.usynovite.ru/',
        name: 'adoption',
        externalLink: true,
    },
    {
        title: 'Контакты',
        bg: 'bg-violet',
        link: '/contacts',
        name: 'contacts',
    },
]
</script>

<template>
    <div class='flex justify-end gap-[10px] overflow-hidden'>
        <MainMenuTab v-for='tab in tabs' :to='tab.link' :background='tab.bg' :name='tab.name' :external-link="tab.externalLink">
            {{ tab.title.toUpperCase() }}
        </MainMenuTab>
    </div>
</template>

<style scoped>

</style>
