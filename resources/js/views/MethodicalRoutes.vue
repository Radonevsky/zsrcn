<script setup>

import {ref} from "vue";
import useCommon from "../use/common.js";
import PageTitle from "../components/PageTitle.vue";
import ContentContainer from "../layouts/ContentContainer.vue";

const { documentsScrollUp } = useCommon()
documentsScrollUp()

const tabs = ref([
    {
        id: 1,
        name: 'Программа воспитательной работы “Разноцветное лето”',
        link: '/methodical/programm',
    },
    {
        id: 2,
        name: 'Социальные технологии',
        link: '/methodical/social-technologies',
    },
    {
        id: 3,
        name: 'Методическая работа',
        link: '/methodical/work',
    },
])
</script>

<template>
    <router-link to='/methodical/programm' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Методическая работа' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='mt-[60px] mb-[60px] text-[20px] font-roboto700'>
            <div class="w-full">
                <div class='pb-[60px] text-link-dark-blue text-[20px] w-full font-roboto700 flex justify-between'>
                    <router-link v-for="tab in tabs"
                                 :to='tab.link'
                                 class='text-center hover:underline underline-offset-8'
                                 active-class='underline underline-offset-8'>
                        {{ tab.name }}
                    </router-link>
                </div>
                <div>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
