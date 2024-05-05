<script setup>
import Feedback from "./Feedback.vue";
import { ref, onMounted, onUnmounted } from "vue";
import useCommon from "../use/common.js";

const y = ref(0)
const feedbacksBlock = ref(null)
const isFeedbackActive = ref(false)
const viewportHeight = window.innerHeight

onMounted(() => {
    window.addEventListener("scroll", handleScroll)
})
onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll)
})

const handleScroll = () => {
    y.value = window.scrollY
    if (y.value >= feedbacksBlock.value.offsetTop - viewportHeight + 50) {
        isFeedbackActive.value = true
    }
}
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <div class="bg-bluebg bg-[url('../images/bgReviews.png')] py-[60px] lamps-block-container" ref='feedbacksBlock'
         :class="isImpairedVision ? 'bg-white' : ''">
        <div class="max-w-[804px] mx-auto flex flex-col gap-[50px]">
            <div class='flex gap-[50px] lamps-block'>
                <div class="feedback feedback-left top-left
                            bg-[url('../images/bgReview1.png')] w-[440px] h-[211px] pt-[54px] flex justify-center"
                     :class='{ "feedback-active": isFeedbackActive}'
                     :style="isImpairedVision ? 'background: none; border: 2px solid #000; border-radius: 20px' : ''">
                    <div
                        class='max-w-[340px] text-[15px] text-tdarkblue flex flex-col gap-[15px] top-left-text'
                        :style="isImpairedVision ? 'color: black' : ''">
                        <Feedback>
                            <template v-slot:text>
                                Мне нравится в центре. Хорошие дети, вкусно кормят. На прогулке хорошо играем.
                                Мы делаем поделки, мне нравится Саша. Мне нравится воспитатель.
                            </template>
                            <template v-slot:name>
                                Ельёр 8 лет
                            </template>
                        </Feedback>
                    </div>
                </div>
                <div class="feedback feedback-right delay-75
                            bg-[url('../images/bgReview2.png')] w-[314px] h-[211px] pt-[64px] flex justify-center"
                     :class='{ "feedback-active": isFeedbackActive}'
                     :style="isImpairedVision ? 'background: none; border: 2px solid #000; border-radius: 20px' : ''">
                    <div class='max-w-[214px] text-[15px] text-tdarkblue flex flex-col gap-[15px]'
                         :style="isImpairedVision ? 'color: black' : ''">
                        <Feedback>
                            <template v-slot:text>
                                Мне нравится этот центр, потому что здесь друзья и воспитатели самые лучшие.
                            </template>
                            <template v-slot:name>
                                Ксения 12 лет
                            </template>
                        </Feedback>
                    </div>
                </div>
            </div>
            <div class='flex gap-[50px] lamps-block'>
                <div class="feedback feedback-left delay-100
                            bg-[url('../images/bgReview3.png')] w-[352px] h-[283px] pt-[108px] flex justify-center"
                     :class='{ "feedback-active": isFeedbackActive}'
                     :style="isImpairedVision ? 'background: none; border: 2px solid #000; border-radius: 20px' : ''">
                    <div class='max-w-[252px] text-[15px] text-tdarkblue flex flex-col gap-[15px]'
                         :style="isImpairedVision ? 'color: black' : ''">
                        <Feedback>
                            <template v-slot:text>
                                Мне нравится центр, потому что здесь весело, красиво и хорошо.
                            </template>
                            <template v-slot:name>
                                Кристина 10 лет
                            </template>
                        </Feedback>
                    </div>
                </div>
                <div class="feedback feedback-right delay-150
                            bg-[url('../images/bgReview4.png')] w-[314px] h-[329px] pt-[118px] flex justify-center"
                     :class='{ "feedback-active": isFeedbackActive}'
                     :style="isImpairedVision ? 'background: none; border: 2px solid #000; border-radius: 20px' : ''">
                    <div class='max-w-[214px] text-[15px] text-tdarkblue flex flex-col gap-[15px]'
                         :style="isImpairedVision ? 'color: black' : ''">
                        <Feedback>
                            <template v-slot:text>
                                Мне нравится в центре, потому что хорошее отношение воспитателей к детям.
                            </template>
                            <template v-slot:name>
                                Дмитрий 16 лет
                            </template>
                        </Feedback>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<style scoped>
.lamps-block {
    flex-wrap: wrap;
    justify-content: center;
}
.lamps-block-container {
    padding-left: 20px;
    padding-right: 20px;
}

@media only screen and (max-width: 490px) {
    .top-left {
        width: 257px;
        height: 269px;
        background-image: url("../../images/bgReviewSmall.png");
    }
    .top-left-text {
        width: 207px;
        height: 269px;
    }
}
</style>
