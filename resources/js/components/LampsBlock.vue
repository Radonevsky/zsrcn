<script setup>
import ContentContainer from "../layouts/ContentContainer.vue";
import Lamp from "./Lamp.vue";
import { ref } from "vue";

const lamps = ref([
    {
        id: 1,
        text: 'Памятные даты',
        shifted: true,
        href: '/memory-dates',
    },
    {
        id: 2,
        text: 'Информационные материалы фонда поддержки детей',
        shifted: false,
        href: '/child-support-fund',
    },
    {
        id: 3,
        text: 'Министерство соцзащиты РБ',
        shifted: true,
        href: 'https://egov-buryatia.ru/minsoc/',
        externalLink: true,
    },
    {
        id: 4,
        text: 'Обратная связь',
        shifted: false,
        href: '/feedback',
    },
])
</script>

<template>
<div class='bg-bluergba overflow-hidden pb-[60px] lamps-block-container' ref='lampsBlock'>
    <content-container>
        <div class='flex justify-between lamps-block'>
            <Lamp
                v-for='lamp in lamps'
                :key='lamp.id'
                :id='lamp.id'
                :shifted='lamp.shifted'
                :active='true'
                :external="lamp.externalLink"
                :href='lamp.href'>
                <template v-slot:title>{{ lamp.text }}</template>
            </Lamp>
        </div>
    </content-container>
</div>
</template>

<style scoped>
@media only screen and (max-width: 950px) {
    .lamps-block {
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    .lamps-block-container {
        padding: 10px 5px;
    }
}
</style>
