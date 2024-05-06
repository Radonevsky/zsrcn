<script setup>
import ContentContainer from "../layouts/ContentContainer.vue";
import HomeCard from "./HomeCard.vue";
import useCommon from "../use/common.js";
import {onMounted, onUnmounted, ref} from "vue";
import img3 from '../../images/PhotoChild3.png'
import img2 from '../../images/PhotoChild2.png'
import img1 from '../../images/PhotoChild1.png'

const { getImgUrl } = useCommon()

const cards = [
    {
        bgColorClass: 'bg-purpl-blue',
        vertical: true,
        imgPath: img1,
        title: 'Арт-терапия',
        text: 'В своей работе с детьми мы применяем прогрессивные и раскрывающие творческий потенциал ребенка' +
            ' методики: арт-терапия, рисование песком, сказкотерапия, оригами и многое другое.<br>' +
            ' Мы поможем вашему ребенку раскрыть таланты и обрести новое хобби.',
    },
    {
        bgColorClass: 'bg-light-pink',
        vertical: false,
        imgPath: img2,
        title: 'Сбалансированное питание',
        text: 'В нашем центре - пятиразовое питание. Работают профессиональные повара, обеспечивающие качественное' +
            ' приготовление пищи по САНПИН.<br>Вся пища готовится из свежих высококачественных продуктов.',
    },
    {
        bgColorClass: 'bg-light-orange',
        vertical: false,
        imgPath: img3,
        title: 'Без отрыва от учебы',
        text: 'При длительном пребывании в центре ребенок посещает Новобрянскую СОШ. Также, если у ребенка до этого' +
            ' наблюдались проблемы в учебе - мы поможем подтянуть успеваемость.',
    },
]

const y = ref(0)
const cardsBlock = ref(null)
const isBlockActive = ref(false)
const viewportHeight = window.innerHeight

function getImageUrl(path) {
    return getImgUrl(path)
}

onMounted(() => {
    window.addEventListener("scroll", handleScroll)
})
onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll)
})

const handleScroll = () => {
    y.value = window.scrollY
    if (y.value >= cardsBlock.value.offsetTop - viewportHeight + 50) {
        isBlockActive.value = true
    }
}
</script>

<template>
<div class='bg-white'>
    <content-container>
        <div class='flex gap-[34px] py-[60px] justify-center feedbacks-container' ref='cardsBlock'>
            <HomeCard
                class="feedback feedback-left"
                :class='{ "feedback-active": isBlockActive}'
                :bgColorClass='cards[0].bgColorClass'
                :vertical='cards[0].vertical'>
                <template v-slot:photo>
                    <img :src='cards[0].imgPath' alt='child' class='max-h-[388px]'>
                </template>
                <template v-slot:title>{{ cards[0].title }}</template>
                <template v-slot:text><p v-html='cards[0].text'></p></template>
            </HomeCard>
            <div class='flex flex-col gap-[30px] w-auto'>
                <HomeCard
                    class="feedback feedback-right-top"
                    :class='{ "feedback-active": isBlockActive}'
                    :bgColorClass='cards[1].bgColorClass'
                    :vertical='cards[1].vertical'>
                    <template v-slot:photo>
                        <img :src='cards[1].imgPath' alt='child' class="min-w-[180px]">
                    </template>
                    <template v-slot:title>{{ cards[1].title }}</template>
                    <template v-slot:text><p v-html='cards[1].text'></p></template>
                </HomeCard>
                <HomeCard
                    class="feedback feedback-right-bottom"
                    :class='{ "feedback-active": isBlockActive}'
                    :bgColorClass='cards[2].bgColorClass'
                    :vertical='cards[2].vertical'>
                    <template v-slot:photo>
                        <img :src='cards[2].imgPath' alt='child' class="min-w-[180px]">
                    </template>
                    <template v-slot:title>{{ cards[2].title }}</template>
                    <template v-slot:text><p v-html='cards[2].text'></p></template>
                </HomeCard>
            </div>
        </div>
    </content-container>
</div>
</template>

<style scoped>
.feedbacks-container {
    @media only screen and (max-width: 952px) {
        flex-direction: column;
    }
}

</style>
