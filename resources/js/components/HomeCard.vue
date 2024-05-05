<script setup>
import useCommon from "../use/common.js";

const props = defineProps({
    vertical: Boolean,
    bgColorClass: String,
})
function getCardClass() {
    let cardClass = props.bgColorClass + ' ' + 'rounded-[30px] '
    cardClass += props.vertical ?
        `gap-[38px] flex-col w-[497px] h-[730px]`
        : `gap-[25px] flex-row max-w-[709px] h-[350px]`
    return cardClass
}
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
<div
    class='p-[50px] flex card'
    :class='getCardClass()'
    :style="isImpairedVision ? 'background: white; border: 2px solid #000; margin: -2px;' : ''">
    <div class="photo"><slot name='photo'></slot></div>
    <div class='text-white text' :class='props.vertical ? "" : "max-w-[280px]"' :style="isImpairedVision ? 'color: #000' : ''">
        <h3 class='font-roboto700 text-[25px] leading-[30px]' :class='props.vertical ? "text-center" : ""'>
            <slot name='title'></slot>
        </h3>
        <div class='font-roboto500 text-[15px] mt-[15px] text-justify leading-[18px] '>
            <slot name='text'></slot>
        </div>
    </div>
</div>
</template>

<style scoped>
.card {
    @media only screen and (max-width: 952px) {
        height: 350px;
        flex-direction: row;
        width: auto;
        max-width: none;
        gap: 25px;
    }
}
.card h3{
    @media only screen and (max-width: 952px) {
        text-align: left;
    }
}

.card .text {
    @media only screen and (max-width: 952px) {
        max-width: none;
        width: 100%;
    }
}
.card .photo {
    @media only screen and (max-width: 952px) {
        min-width: 258px;
    }
}


.card {
    @media only screen and (max-width: 625px) {
        height: auto;
        flex-direction: column;
        width: auto;
        max-width: none;
        gap: 25px;
        text-align: center;
    }
}

.card .photo {
    @media only screen and (max-width: 625px) {
        display: flex;
        justify-content: center;
        min-width: 10px;
    }
}

.card h3 {
    @media only screen and (max-width: 625px) {
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
    }
}

</style>
