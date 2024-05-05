<script setup>
import { useRoute } from 'vue-router';
import {computed} from "vue";
import useCommon from "../use/common.js";
const props = defineProps({
    background: String,
    name: String,
    to: String,
    externalLink: Boolean,
})

const routeName = computed(() => {
    return useRoute().name
})

const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <a v-if="props.externalLink" :href='props.to' target="_blank">
        <div :class='`min-w-[118px] pt-[10px] pb-[2px] px-[5px] rounded-t-[10px] ${props.background} cursor-pointer tab
            relative h-[48px] ${props.name === routeName ? "top-0" : "top-[15px]"} hover:top-0 transition-all ease-out`'
             :style="isImpairedVision ? 'background-color: #fff; border: 1px solid #000; color: #000;' : ''">
            <p class='font-roboto400 text-[15px] text-center text-tdarkblue tab-title' :style="isImpairedVision ? 'color: #000;' : ''">
                <slot></slot>
            </p>
        </div>
    </a>
    <router-link v-else :to='props.to'>
        <div :class='`min-w-[118px] pt-[10px] pb-[2px] px-[5px] rounded-t-[10px] ${props.background} cursor-pointer tab
            relative h-[48px] ${props.name === routeName ? "top-0 left-[40px]" : "top-[15px]"} hover:top-0 transition-all ease-out`'
             :style="isImpairedVision ? 'background-color: #fff; border: 1px solid #000; color: #000;' : ''">
            <p class='font-roboto400 text-[15px] text-center text-tdarkblue tab-title' :style="isImpairedVision ? 'color: #000;' : ''">
                <slot></slot>
            </p>
        </div>
    </router-link>
</template>

<style scoped>
@media only screen and (min-width: 810px) {
    .tab {
        left: 0;
    }
}
@media only screen and (max-width: 810px) {
    .tab {
        max-width: 250px;
        height: auto;
        font-size: 18px;
        top: 0;
        border-radius: 10px;
        padding: 15px 5px;
    }
}
</style>
