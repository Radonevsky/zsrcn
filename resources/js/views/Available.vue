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
            <p>Количество свободных мест</p>
            <p class='mt-[20px]'>
                Информация о наличии свободных мест по состоянию на 06.07.2023 г.
            </p>
            <p class='mt-[20px]'>
                форма обслуживания: стационарное отделение
            </p>
            <p>
                количество мест: 34
            </p>
            <p>
                количество свободных мест: 0
            </p>

        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
