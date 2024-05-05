<script setup>
import ToViewIcon from "./icons/toViewIcon.vue";
import {ref} from "vue";
import {useRouter} from "vue-router";
import useCommon from "../use/common.js";

const props = defineProps(['name', 'type', 'uuid', 'rout'])
const showToView = ref(false)
const router = useRouter();
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <router-link :to="`${rout}/${uuid}`">
        <div
            @mouseover="showToView = true"
            @mouseleave="showToView = false"
            class="flex justify-between items-center hover:bg-light-blue hover:cursor-pointer rounded-[5px] min-h-[32px] px-[16px] text-link-dark-blue"
            :style="isImpairedVision ? 'color:black':''">
            <div class="font-roboto500 text-[20px] max-w-[600px] break-all name">
                {{ name }}
            </div>
            <div class="flex" v-show="showToView">
                <to-view-icon class="scale-[200%] mr-[24px]"></to-view-icon>
            </div>
        </div>
    </router-link>
</template>

<style scoped>
@media only screen and (max-width: 750px) {
    .name {
        font-size: 16px;
    }
}

</style>
