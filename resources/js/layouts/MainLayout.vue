<script setup>

import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
</script>

<template>
    <div>
        <Header/>
        <slot></slot>
        <Footer/>
    </div>
</template>

<style scoped>

</style>
