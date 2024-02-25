<script setup>

import {ref} from "vue";
import useCommon from "../use/common.js";

const { documentsScrollUp } = useCommon()
documentsScrollUp()

const tabs = ref([
    {
        id: 1,
        name: 'Паспорт учреждения 2023',
        link: 'passport-2023',
    },
    {
        id: 2,
        name: 'Паспорт учреждения 2021',
        link: 'passport-2021',
    },
    {
        id: 3,
        name: 'Паспорт учреждения 2020',
        link: 'passport-2020',
    },
])
</script>

<template>
    <div class="w-full">
        <div class='pb-[60px] text-link-dark-blue text-[20px] gap-[10px] w-full font-roboto700 flex justify-between'>
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
</template>

<style scoped>

</style>
