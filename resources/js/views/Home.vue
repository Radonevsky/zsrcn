<script setup>
import MainLayout from "../layouts/MainLayout.vue"
import SocialAdd from "../components/SocialAdd.vue";
import WelcomeBlock from "../components/WelcomeBlock.vue";
import CardsBlock from "../components/CardsBlock.vue";
import LampsBlock from "../components/LampsBlock.vue";
import FeedbacksBlock from "../components/FeedbacksBlock.vue";
import LinksBlock from "../components/LinksBlock.vue";
</script>

<template>
    <div>
        <MainLayout>
            <div class='w-full h-[571px] bg-cover bg-[url("../images/Home.png")]'>
                <social-add class='top-[38%] left-[55%]'></social-add>
            </div>
            <WelcomeBlock></WelcomeBlock>
            <CardsBlock></CardsBlock>
            <LampsBlock></LampsBlock>
            <FeedbacksBlock></FeedbacksBlock>
            <LinksBlock></LinksBlock>
        </MainLayout>
    </div>
</template>

<style scoped>

</style>
