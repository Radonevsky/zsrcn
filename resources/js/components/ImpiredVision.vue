<script setup>
import useCommon from "../use/common.js";

const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<div class='w-full bg-purpl-blue py-2.5' :class="isImpairedVision ? 'bg-white border-b-[2px] -mb-[2px] ' : ''">
    <p
        v-if="!isImpairedVision"
        @click="isImpairedVision = true"
        class='uppercase text-base font-semibold text-white text-center hover:cursor-pointer hover:text-pink'>
        Версия для слабовидящих
    </p>
    <p
        v-else
        @click="isImpairedVision = false"
        class='uppercase text-base font-semibold text-black text-center hover:cursor-pointer hover:text-pink'>
        Выйти из версии для слабовидящих
    </p>
</div>
</template>

<style scoped>

</style>
