<script setup>

import DownloadDocIcon from "./icons/downloadDocIcon.vue";

</script>

<template>
    <div class="flex hover:cursor-pointer gap-[8px]">
        <download-doc-icon></download-doc-icon>
        <p class="hover:underline"><slot></slot></p>

    </div>
</template>

<style scoped>

</style>
