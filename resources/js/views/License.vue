<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import {ref} from "vue";
import useCommon from "../use/common.js";

const licenseImages = ref([
    {
        id: 1,
        fileName: '../../licensePage1.png',
    },
    {
        id: 2,
        fileName: '../../licensePage2.jpeg',
    },
    {
        id: 3,
        fileName: '../../licensePage3.jpeg',
    },
])
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <ContentContainer>
        <div class="text-[20px] font-roboto400 text-link-dark-blue" :style="isImpairedVision ? 'color:black':''">
            <p>Информация о лицензии</p>
            <p class='mt-[20px]'>
                Настоящая лицензия предоставлена: Государственное бюджетное учреждение социального обслуживания
                "Заиграевский социально-реабилитационный центр для несовершеннолетних" ГБУСО "Заиграевский СРЦН"
            </p>
            <img v-for="img in licenseImages" :src="img.fileName" alt="license">
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
