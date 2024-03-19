<script setup>

const props = defineProps([
    'link',
    'specPadding',
])
</script>

<template>
    <div class="mb-[30px]">
        <router-link :to="link">
            <button
                class='bg-violet w-full max-w-[392px] leading-[23px] px-[5px] py-[20px] btn rounded-[10px] text-link-dark-blue hover:bg-btngreen'
                :class="props.specPadding ? specPadding : ''">
                <slot></slot>
            </button>
        </router-link>
    </div>
</template>

<style scoped>

</style>
