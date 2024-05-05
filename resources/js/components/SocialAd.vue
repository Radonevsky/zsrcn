<script setup>
import useCommon from "../use/common.js";

const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<div
    class='bg-cover bg-[url("../images/Swash.png")] w-[460px] h-[177px] relative ad-container'
    :class="isImpairedVision ? 'bg-none' : ''">
    <router-link
        to='/social-add'
        class='font-roboto400 text-white text-[30px] absolute top-[30%] left-[20%] ad
                hover:underline decoration-2 underline-offset-8'
        :style="isImpairedVision ? 'color: black;' : ''">
        Социальная реклама
    </router-link>
</div>
</template>

<style scoped>
@media only screen and (max-width: 920px) {
    .ad-container {
        left: auto;
        right: 10%;
    }
}

@media only screen and (max-width: 590px) {
    .ad-container {
        scale: 0.7;
        right: auto;
    }
}

@media only screen and (max-width: 375px) {
    .ad-container {
        left: -30%;
    }
}
</style>
