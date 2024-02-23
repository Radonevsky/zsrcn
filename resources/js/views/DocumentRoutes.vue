<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import TabButton from "../components/TabButton.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([
    {
        id: 1,
        name: 'Устав учреждения',
        link: '/documents/charter',
    },
    {
        id: 2,
        name: 'Паспорт учреждения',
        link: '/documents/passport',
    },
    {
        id: 3,
        name: 'Конвенция о правах ребенка',
        link: '/documents/convention',
    },
    {
        id: 4,
        name: 'Национальная стратегия действий',
        link: '/documents/strategy',
    },
    {
        id: 5,
        name: 'Положение о защите детей',
        link: '/documents/protection',
    },
    {
        id: 6,
        name: 'Социальная экспертиза',
        link: '/documents/assessment',
    },
    {
        id: 7,
        name: 'Правила внутреннего распорядка',
        link: '/documents/internal-rules',
    },
    {
        id: 8,
        name: 'Материально-техническое обеспечение',
        link: '/documents/material-technical',
    },
    {
        id: 9,
        name: 'Попечительский совет',
        link: '/documents/board-trustees',
    },
    {
        id: 10,
        name: 'Акты проверок',
        link: '/documents/inspection-reports',
    },
])
</script>

<template>
    <router-link to='/documents' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Документы' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
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
