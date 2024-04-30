<script setup>
import MainMenuTab from "./MainMenuTab.vue";
import {ref, watch} from "vue";
import TimeIcon from "./icons/timeIcon.vue";

const tabs = [
    {
        title: 'Главная',
        bg: 'bg-pink',
        link: '/',
        name: 'home',
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
        name: 'hey-parents',
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

const isShowBurgerMenu = ref(false)

watch(isShowBurgerMenu, (newValue) => {
    if (newValue) {
        document.body.style.overflowY = 'hidden'

        return
    }

    document.body.style.overflowY = 'scroll'
})
</script>

<template>
    <div class='flex justify-end gap-[10px] overflow-hidden tabs-container'>
        <MainMenuTab v-for='tab in tabs' :to='tab.link' :background='tab.bg' :name='tab.name' :external-link="tab.externalLink">
            {{ tab.title.toUpperCase() }}
        </MainMenuTab>
    </div>
    <div v-if="!isShowBurgerMenu"  @click="isShowBurgerMenu = !isShowBurgerMenu" class="burger hidden p-[5px] w-[46px] ml-auto relative bottom-[20px]">
        <div class="w-[36px] flex flex-col space-between gap-[6px]">
            <span class="burger-line w-full h-[5px] bg-purpl-blue"></span>
            <span class="burger-line w-full h-[5px] bg-purpl-blue"></span>
            <span class="burger-line w-full h-[5px] bg-purpl-blue"></span>
        </div>
    </div>
    <div
        v-show="isShowBurgerMenu"
        class="absolute top-0 bottom-0 left-0 bg-purpl-blue burger-menu h-screen z-50"
        :class="isShowBurgerMenu ? 'right-0' : '-right-100'">
        <div class="flex ">
            <div
                @click="isShowBurgerMenu = !isShowBurgerMenu"
                class="z-50 burger hidden p-[5px] w-[46px] ml-auto absolute top-0 rounded bg-violet">
                <div class="w-[36px] flex flex-col space-between gap-[6px]">
                    <span class="burger-line w-full h-[5px] bg-purpl-blue"></span>
                    <span class="burger-line w-full h-[5px] bg-purpl-blue"></span>
                    <span class="burger-line w-full h-[5px] bg-purpl-blue"></span>
                </div>
            </div>
            <div class="p-[10px]" @click="isShowBurgerMenu = false">
                <time-icon></time-icon>
            </div>
        </div>

        <div class='burger-menu__tabs-container relative -left-[60px] flex flex-col gap-[15px] py-[20px] px-[15px]'>
            <MainMenuTab
                v-for='tab in tabs'
                @click="isShowBurgerMenu = false"
                :to='tab.link'
                :background='tab.bg'
                :name='tab.name'
                :external-link="tab.externalLink">
                {{ tab.title.toUpperCase() }}
            </MainMenuTab>
        </div>
    </div>

</template>

<style scoped>
@media only screen and (max-width: 810px) {
    .tabs-container {
        display: none;
    }
    .burger {
        display: block;
    }
}
@media only screen and (min-width: 810px) {
    .burger-menu {
        display: none;
    }
}
@media only screen and (max-width: 810px) {
    .burger {
        position: static;
        margin: 20px auto 20px 15px;

    }
}
</style>
