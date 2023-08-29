<script setup>
import ContentContainer from "../layouts/ContentContainer.vue";
import Lamp from "./Lamp.vue";
import { ref } from "vue";

const lamps = ref([
    {
        id: 1,
        text: 'Памятные даты',
        shifted: true,
    },
    {
        id: 2,
        text: 'Информационные материалы фонда поддержки детей',
        shifted: false,
    },
    {
        id: 3,
        text: 'Министерство соцзащиты РБ',
        shifted: true,
    },
    {
        id: 4,
        text: 'Обратная связь',
        shifted: false,
    },
])
</script>

<template>
<div class='bg-bluergba overflow-hidden pb-[60px]' ref='lampsBlock'>
    <content-container>
        <div class='flex justify-between'>
            <Lamp
                v-for='lamp in lamps'
                :key='lamp.id'
                :id='lamp.id'
                :shifted='lamp.shifted'
                :active='true'>
                <template v-slot:title>{{ lamp.text }}</template>
            </Lamp>
        </div>
    </content-container>
</div>
</template>

<style scoped>

</style>
