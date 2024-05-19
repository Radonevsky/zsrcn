<script setup>

import PageTitle from "../components/PageTitle.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
import useCommon from "../use/common.js";

window.scrollTo(0, 0)
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <div>
        <PageTitle title='Обратная связь' bg-class='bg-purpl-blue' text-color-class='text-white'/>
        <ContentContainer>
            <div class='py-[60px] text-link-dark-blue text-[20px] gap-[20px] font-roboto700 flex justify-between tabs'
                 :style="isImpairedVision ? 'color: black;':''">
                <router-link
                    to='faq'
                    active-class='underline underline-offset-8'>
                    Часто задаваемые вопросы
                </router-link>
                <router-link
                    to='satisfaction-questionnaire'
                    active-class='underline underline-offset-8'>
                    Анкета по анализу удовлетворенности
                </router-link>
                <router-link
                    to='ask'
                    active-class='underline underline-offset-8'>
                    Задать вопрос
                </router-link>
            </div>
            <div>
                <router-view></router-view>
            </div>
        </ContentContainer>
    </div>
</template>

<style scoped>
@media only screen and (max-width: 550px) {
    .tabs {
        flex-direction: column;
    }
}
</style>
