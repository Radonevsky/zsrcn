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
        link: 'charter',
    },
    {
        id: 2,
        name: 'Паспорт учреждения',
        link: 'passport',
    },
    {
        id: 3,
        name: 'Конвенция о правах ребенка',
        link: 'convention',
    },
    {
        id: 4,
        name: 'Национальная стратегия действий',
        link: 'strategy',
    },
    {
        id: 5,
        name: 'Положение о защите детей',
        link: 'protection',
    },
    {
        id: 6,
        name: 'Социальная экспертиза',
        link: 'assessment',
    },
    {
        id: 7,
        name: 'Правила внутреннего распорядка',
        link: 'internal-rules',
    },
    {
        id: 8,
        name: 'Материально-техническое обеспечение',
        link: 'material-technical',
    },
    {
        id: 9,
        name: 'Попечительский совет',
        link: 'board-trustees',
    },
    {
        id: 10,
        name: 'Акты проверок',
        link: 'inspection-reports',
    },
])
</script>

<template>
    <router-link to='description' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Документы' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='mt-[60px] mb-[30px] text-[20px] font-roboto700 flex justify-between'>
            <div class="flex-column">
                <tab-button v-for="tab in tabs" :key="tab.id" :link="tab.link">
                    {{ tab.name }}
                </tab-button>
            </div>
            <div class="flex-column">
                <div>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
