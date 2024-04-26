<script setup>

import MainLayout from "./layouts/MainLayout.vue";
import useCommon from "./use/common.js";
import CommonButton from "./components/CommonButton.vue";
import ScrollUpButton from "./components/ScrollUpButton.vue";
import {onMounted, onUnmounted, ref} from "vue";

const {checkAdmin, logout, isAdmin} = useCommon()
const isShowScrollUpButton = ref(false)

checkAdmin()

onMounted(() => {
    window.addEventListener("scroll", handleScroll)
})
onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll)
})

const handleScroll = () => {
    if (window.scrollY >= 1200) {
        isShowScrollUpButton.value = true
    }
    if (window.scrollY < 1200) {
        isShowScrollUpButton.value = false
    }
}

const scrollUp = () => {
    window.scrollTo(0, 0)
}
</script>

<template>
    <MainLayout>
    </MainLayout>
    <common-button
        v-if="isAdmin"
        @click="logout"
        text="Выйти из режима администратора"
        class="fixed top-10 right-10 opacity-50 hover:opacity-100">
    </common-button>
    <scroll-up-button
        v-if="isShowScrollUpButton"
        @click="scrollUp"
        class="fixed bottom-20 left-10 opacity-30 hover:opacity-100">
        Наверх
    </scroll-up-button>
</template>

<style>
html {
    scroll-behavior: smooth;
}
</style>
