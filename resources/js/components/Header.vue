<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import Contacts from "./Contacts.vue";
import ImpiredVision from "./ImpiredVision.vue";
import MainNavBar from "./MainNavBar.vue";
</script>

<template>
    <div>
        <ImpiredVision/>
        <ContentContainer>
            <div class='pt-10 flex justify-between'>
                <div class='w-[604px]'>
                    <h1 class='text-[30px] text-tblue font-roboto500 leading-[35px]'>
                        Государственное бюджетное учреждение социального обслуживания “Заиграевский реабилитационный центр для несовершеннолетних”
                    </h1>
                </div>
                <Contacts/>
            </div>
            <main-nav-bar class='mt-[2px]'></main-nav-bar>
        </ContentContainer>
        <div class='w-full h-[3px] bg-purpl-blue'></div>
    </div>
</template>

<style scoped>

</style>
