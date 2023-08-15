<script setup>
const props = defineProps({
    vertical: Boolean,
    bgColorClass: String,
})
function getCardClass() {
    let cardClass = props.bgColorClass + ' ' + 'rounded-[30px] '
    cardClass += props.vertical ?
        `gap-[38px] flex-col w-[497px] h-[730px]`
        : `gap-[25px] flex-row w-[709px] h-[350px]`
    return cardClass
}
</script>

<template>
<div
    class='p-[50px] flex'
    :class='getCardClass()'>
    <slot name='photo'></slot>
    <div class='text-white'>
        <h3 class='font-roboto700 text-[25px] leading-[30px]' :class='props.vertical ? "text-center" : ""'>
            <slot name='title'></slot>
        </h3>
        <div class='font-roboto500 text-[15px] mt-[15px] text-justify leading-[18px]'>
            <slot name='text'></slot>
        </div>
    </div>
</div>
</template>

<style scoped>

</style>
