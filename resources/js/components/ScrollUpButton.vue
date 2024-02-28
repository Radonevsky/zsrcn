3<script setup>

const props = defineProps({
    link: String,
})
</script>

<template>
    <div class="mb-[30px]">
        <router-link :to="link">
            <button class='bg-violet w-full max-w-[392px] px-[5px] py-[20px] btn rounded-[10px] text-link-dark-blue hover:bg-btngreen'>
                <slot></slot>
            </button>
        </router-link>
    </div>
</template>

<style scoped>

</style>
