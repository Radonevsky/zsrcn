<script setup>

import PageTitle from "../components/PageTitle.vue";
import ContentContainer from "../layouts/ContentContainer.vue";
</script>

<template>
    <router-link to='/hey-parents' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Ау, родители!' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue'>
            <p class='mt-[20px]'>
                В данном разделе пока нет материалов
            </p>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
