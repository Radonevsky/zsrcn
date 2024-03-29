<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import TabButton from "../components/TabButton.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([
    {
        id: 1,
        name: '2023',
        link: '/statements/2023',
    },
    {
        id: 2,
        name: '2022',
        link: '/statements/2022',
    },
    {
        id: 3,
        name: '2021',
        link: '/statements/2021',
    },
    {
        id: 4,
        name: '2020',
        link: '/statements/2020',
    },
    {
        id: 5,
        name: '2019',
        link: '/statements/2019',
    },
    {
        id: 6,
        name: '2018',
        link: '/statements/2018',
    },
    {
        id: 7,
        name: '2017',
        link: '/statements/2017',
    },
])
</script>

<template>
    <router-link to='/statements' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Отчетные документы' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='mt-[60px] gap-[40px] mb-[30px] text-[20px] font-roboto700 flex justify-between'>
            <div class="flex-column w-full max-w-[400px]">
                <tab-button v-for="tab in tabs" :key="tab.id" :link="tab.link">
                    {{ tab.name }}
                </tab-button>
            </div>
            <div class="flex-column w-full grow">
                <router-view></router-view>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
