<script setup>
const props = defineProps(['color'])
</script>

<template>
    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.49976 8L16.8783 2.25C16.514 0.9375 15.3605 0 13.964 0H3.03547C1.63904 0 0.485471 0.9375 0.121185 2.25L8.49976 8Z" :fill="color"/>
        <path d="M8.86429 9.25C8.74286 9.3125 8.62143 9.375 8.5 9.375C8.37857 9.375 8.25714 9.3125 8.13571 9.25L0 3.6875V11.875C0 13.625 1.33571 15 3.03571 15H13.9643C15.6643 15 17 13.625 17 11.875V3.6875L8.86429 9.25Z" :fill="color"/>
    </svg>
</template>

<style scoped>

</style>
