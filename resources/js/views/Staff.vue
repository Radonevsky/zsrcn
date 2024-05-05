<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<ContentContainer>
    <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
        <p>Персональный состав</p>
        <p class='mt-[20px]'>
            Коллектив состоит из 54 человека.
        </p>
        <p class='mt-[20px]'>
            Воспитатели, помощники воспитателей, педагог - психолог, специалисты по социальной работе, медицинский персонал, обслуживающий персонал.
            Все специалисты имеют высокую профессиональную квалификацию.
            Работники центра стараются дарить детям не только тепло и заботу, но и эффективно решать проблемы детского и семейного неблагополучия,
            оказывать планомерную поддержку детям и семьям.
        </p>
    </div>
</ContentContainer>
</template>

<style scoped>

</style>
