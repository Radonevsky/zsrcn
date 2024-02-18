<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([

])
</script>

<template>
    <router-link to='description' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Документы' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        DocumentView
    </ContentContainer>
</template>

<style scoped>

</style>
