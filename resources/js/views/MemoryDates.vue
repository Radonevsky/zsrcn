<script setup>

import PageTitle from "../components/PageTitle.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
</script>

<template>
    <div>
        <PageTitle title='Памятные даты' bg-class='bg-purpl-blue' text-color-class='text-white'/>
        <ContentContainer>
            <div class='py-[60px] text-link-dark-blue text-[20px]'>
                <h2 class='font-roboto700'>Проект "Памятные даты военной истории Отечества"</h2>
                <p class='mt-[30px]'>Проект «Памятные даты военной истории Отечества» осуществляется в рамках исполнения рекомендаций РОК «Победа».</p>
                <p class='mt-[30px]'>Информационные материалы размещены на федеральном портале ИСТОРИЯ.РФ</p>
                <a
                    class='mt-[30px] block cursor-pointer hover:underline'
                    href='http://rvio.histrf.ru/activities/projects/item-1141' target='_blank'>
                    http://rvio.histrf.ru/activities/projects/item-1141
                </a>
            </div>
        </ContentContainer>
    </div>
</template>

<style scoped>

</style>
