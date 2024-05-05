<script setup>

import useCommon from "../use/common.js";

const props = defineProps([
    'link',
    'specPadding',
])
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <div class="mb-[30px] tab">
        <router-link :to="link">
            <button
                class='bg-violet w-full max-w-[392px] leading-[23px] px-[5px] py-[20px] btn rounded-[10px] text-link-dark-blue hover:bg-btngreen'
                :class="props.specPadding ? specPadding : ''" :style="isImpairedVision ? 'color:#000; background-color:white; border: 1px solid #000;':''">
                <slot></slot>
            </button>
        </router-link>
    </div>
</template>

<style scoped>

@media only screen and (max-width: 750px) {
    .tab {
        max-width: 121px;
    }
    button {
        max-width: 121px;
    }
}

@media only screen and (max-width: 550px) {
    button {
        max-width: none;
        padding-top: 5px;
        padding-bottom: 5px;
        line-height: 16px;
    }
    .tab {
        width: 100%;
        max-width: none;
        margin-bottom: 5px;
    }
}
</style>
