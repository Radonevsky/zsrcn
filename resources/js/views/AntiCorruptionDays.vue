<script setup>
import {ref} from "vue";

const antiCorruptionImages = ref([
    {
        id: 1,
        fileName: '../../antiCorruption1.png',
    },
    {
        id: 2,
        fileName: '../../antiCorruption2.png',
    },
])
import ContentContainer from "../layouts/ContentContainer.vue";
</script>

<template>
    <ContentContainer>
        <img v-for="img in antiCorruptionImages" :src="img.fileName" alt="license" class="mb-[20px]">
    </ContentContainer>
</template>

<style scoped>

</style>
