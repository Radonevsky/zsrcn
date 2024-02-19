<script setup>

const props = defineProps({
    link: String,
})
</script>

<template>
    <div class="max-w-[392px]">
        <button class='bg-violet mb-[30px] w-full py-[20px] btn rounded-[10px] text-link-dark-blue hover:bg-btngreen'>
            <slot></slot>
        </button>
    </div>
</template>

<style scoped>

</style>
