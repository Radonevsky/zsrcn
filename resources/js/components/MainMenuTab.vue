<script setup>
const props = defineProps({
    background: String
})
</script>

<template>
    <div :class='`min-w-[118px] pt-[10px] pb-[2px] px-[5px] rounded-t-[10px] ${props.background} cursor-pointer
        relative h-[48px] top-[15px] hover:top-0 transition-all ease-out`'>
        <p class='font-roboto400 text-[15px] text-center text-tdarkblue'>
            <slot></slot>
        </p>
    </div>
</template>

<style scoped>

</style>
