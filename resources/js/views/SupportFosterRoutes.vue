<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import TabButton from "../components/TabButton.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([
    {
        id: 1,
        name: 'Общая информация о службе сопровождения',
        link: '/support-foster/foster-common',
        specPadding: 'pt-[9px] pb-[9px]',
    },
    {
        id: 2,
        name: 'Школа приемных родителей',
        link: '/support-foster/foster-school',
    },
    {
        id: 3,
        name: 'Клуб замещающих родителей',
        link: '/support-foster/foster-club',
    },
    {
        id: 4,
        name: 'Работа службы замещающих семей',
        link: '/support-foster/foster-service',
    },
])
</script>

<template>
    <router-link to='/statements' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Служба сопровождения замещающих семей' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='mt-[60px] gap-[40px] mb-[30px] text-[20px] font-roboto700 flex justify-between'>
            <div class="flex-column w-full max-w-[400px]">
                <tab-button v-for="tab in tabs" :key="tab.id" :link="tab.link" :spec-padding="tab.specPadding">
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
