<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import Contacts from "./Contacts.vue";
import ImpiredVision from "./ImpiredVision.vue";
import MainNavBar from "./MainNavBar.vue";
import useCommon from "../use/common.js";

const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <div>
        <ImpiredVision/>
        <ContentContainer>
            <div class='pt-10 flex justify-between header-container'>
                <div class='w-[604px]'>
                    <router-link to="/">
                        <h1
                            class='text-[30px] text-tblue font-roboto500 leading-[35px] hover:underline'
                            :style="isImpairedVision ? 'color: #000;' : ''">
                            Государственное бюджетное учреждение социального обслуживания “Заиграевский реабилитационный центр для несовершеннолетних”
                        </h1>
                    </router-link>
                </div>
                <Contacts/>
            </div>
            <main-nav-bar></main-nav-bar>
        </ContentContainer>
        <div class='w-full h-[3px] bg-purpl-blue' :style="isImpairedVision ? 'background-color: #000' : ''"></div>
    </div>
</template>

<style scoped>
@media only screen and (max-width: 750px) {
    h1 {
        font-size: 22px;
        line-height: 24px;
    }
    .header-container {
        padding-top: 20px;
        gap: 20px;
    }
}
@media only screen and (max-width: 550px) {
    h1 {
        font-size: 18px;
        line-height: 20px;
    }
}
</style>
