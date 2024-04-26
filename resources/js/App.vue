<script setup>

import MainLayout from "./layouts/MainLayout.vue";
import useCommon from "./use/common.js";
import CommonButton from "./components/CommonButton.vue";

const {checkAdmin, logout, isAdmin} = useCommon()

checkAdmin()
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
</template>

<style>
html {
    scroll-behavior: smooth;
}
</style>
