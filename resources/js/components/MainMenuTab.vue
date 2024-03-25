<script setup>
import { useRoute } from 'vue-router';
import {computed} from "vue";
const props = defineProps({
    background: String,
    name: String,
    to: String,
    externalLink: Boolean,
})

const routeName = computed(() => {
    return useRoute().name
})
</script>

<template>
    <a v-if="props.externalLink" :href='props.to' target="_blank">
        <div :class='`min-w-[118px] pt-[10px] pb-[2px] px-[5px] rounded-t-[10px] ${props.background} cursor-pointer
            relative h-[48px] ${props.name === routeName ? "top-0" : "top-[15px]"} hover:top-0 transition-all ease-out`'>
            <p class='font-roboto400 text-[15px] text-center text-tdarkblue'>
                <slot></slot>
            </p>
        </div>
    </a>
    <router-link v-else :to='props.to'>
        <div :class='`min-w-[118px] pt-[10px] pb-[2px] px-[5px] rounded-t-[10px] ${props.background} cursor-pointer
            relative h-[48px] ${props.name === routeName ? "top-0" : "top-[15px]"} hover:top-0 transition-all ease-out`'>
            <p class='font-roboto400 text-[15px] text-center text-tdarkblue'>
                <slot></slot>
            </p>
        </div>
    </router-link>
</template>

<style scoped>

</style>
