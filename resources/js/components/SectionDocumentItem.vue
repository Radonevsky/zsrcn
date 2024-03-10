<script setup>
import ToViewIcon from "./icons/toViewIcon.vue";
import {ref} from "vue";

const props = defineProps(['name', 'type', 'uuid', 'routName'])
const showToView = ref(false)

</script>

<template>
    <router-link :to="`${routName}/${uuid}`">
        <div
            @mouseover="showToView = true"
            @mouseleave="showToView = false"
            class="flex justify-between items-center hover:bg-light-blue hover:cursor-pointer rounded-[5px] h-[32px]  px-[16px] text-link-dark-blue">
            <div class="font-roboto500 text-[20px]">
                {{ name }}
            </div>
            <div class="flex" v-show="showToView">
                <to-view-icon class="scale-[200%] mr-[24px]"></to-view-icon>
            </div>
        </div>
    </router-link>
</template>

<style scoped>

</style>
