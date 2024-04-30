<script setup>
import SocialAdd from "../components/SocialAd.vue";
import WelcomeBlock from "../components/WelcomeBlock.vue";
import CardsBlock from "../components/CardsBlock.vue";
import LampsBlock from "../components/LampsBlock.vue";
import FeedbacksBlock from "../components/FeedbacksBlock.vue";
import LinksBlock from "../components/LinksBlock.vue";

window.scrollTo(0, 0)
</script>

<template>
    <div>
        <div class='w-full h-[571px] bg-cover bg-[url("../images/Home.png")]'>
            <social-add class='top-[38%] left-[55%]'></social-add>
        </div>
        <WelcomeBlock></WelcomeBlock>
        <CardsBlock></CardsBlock>
        <LampsBlock></LampsBlock>
        <FeedbacksBlock></FeedbacksBlock>
        <LinksBlock></LinksBlock>
    </div>
</template>

<style scoped>

</style>
