<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import TabButton from "../components/TabButton.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([
    {
        id: 1,
        name: 'Результаты проверки 2021 г.',
        link: '/quality-assessment/results-2021',
    },
    {
        id: 2,
        name: 'План мероприятий 2021 г.',
        link: '/quality-assessment/plan-2021',
    },
    {
        id: 3,
        name: 'Сводная ведомость результатов проведения специальной оценки условий труда',
        link: '/quality-assessment/workplace-quality',
    },
    {
        id: 4,
        name: 'Перечень рекомендуемых мероприятий по улучшению условий труда',
        link: '/quality-assessment/workplace-improvements',
    },
    {
        id: 5,
        name: 'Отчет НОК 2021 г.',
        link: '/quality-assessment/nok-report',
    },
])
</script>

<template>
    <router-link to='/quality-assessment/results-2021' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Независимая оценка качества условий оказания услуг' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
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
