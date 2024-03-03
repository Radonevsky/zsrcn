<script setup>
const props = defineProps(['name', 'type'])
</script>

<template>
    <div class="bg-light-blue">
        {{ name }}{{ type }}
    </div>
</template>

<style scoped>

</style>
