<script setup>
import MainMenuTab from "./MainMenuTab.vue";

const tabs = [
    {
        title: 'Главная',
        bg: 'bg-pink',
    },
    {
        title: 'Новости',
        bg: 'bg-orange',
    },
    {
        title: 'Галерея',
        bg: 'bg-yellow',
    },
    {
        title: 'Ау, Родители',
        bg: 'bg-green',
    },
    {
        title: 'Усыновление.ру',
        bg: 'bg-light-blue',
    },
    {
        title: 'Контакты',
        bg: 'bg-violet',
    },
]
</script>

<template>
    <div class='flex justify-end gap-[10px] overflow-hidden'>
        <MainMenuTab
            v-for='tab in tabs' :background='tab.bg'>
            {{ tab.title.toUpperCase() }}
        </MainMenuTab>
    </div>
</template>

<style scoped>

</style>
