<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import TabButton from "../components/TabButton.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([
    {
        id: 1,
        name: 'Памятка',
        link: '/anti-corruption/memo',
    },
    {
        id: 2,
        name: '9 декабря - международный день борьбы с коррупцией',
        link: '/anti-corruption/day',
    },
    {
        id: 3,
        name: 'Буклеты о противодействии коррупции',
        link: '/anti-corruption/booklets',
    },
])
</script>

<template>
    <router-link to='/anti-corruption/memo' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Противодействие коррупции' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
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
