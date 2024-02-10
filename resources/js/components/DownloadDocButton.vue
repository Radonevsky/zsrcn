<script setup>

import DownloadDocIcon from "./icons/downloadDocIcon.vue";

</script>

<template>
    <div class="flex hover:cursor-pointer gap-[8px]">
        <div class="w-[32px] flex items-center">
            <download-doc-icon></download-doc-icon>
        </div>

        <p class="hover:underline"><slot></slot></p>

    </div>
</template>

<style scoped>

</style>
