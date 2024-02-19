<script setup>

import {ref} from "vue";

window.scrollTo(0, 300)

const tabs = ref([
    {
        id: 1,
        name: 'Устав',
        link: 'center-charter-doc',
    },
    {
        id: 2,
        name: 'ОГРН',
        link: 'ogrn',
    },
    {
        id: 3,
        name: 'Изменения в уставе',
        link: 'charter-changes',
    },
])
</script>

<template>
    <div class="w-full">
        <div class='pb-[60px] text-link-dark-blue text-[20px] w-full font-roboto700 flex justify-between'>
            <router-link v-for="tab in tabs"
                         :to='tab.link'
                         class='text-center hover:underline underline-offset-8'
                         active-class='underline underline-offset-8'>
                {{ tab.name }}
            </router-link>
        </div>
    </div>
</template>

<style scoped>

</style>
