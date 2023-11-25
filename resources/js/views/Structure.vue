<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
</script>

<template>
<ContentContainer>
    <div class='text-[20px] font-roboto400 text-link-dark-blue'>
        <p>Структура центра</p>
        <p class='mt-[20px]'>В центре функционируют:</p>
        <p class='mt-[20px]'>1.Приёмно-карантинное отделение</p>
        <p>( рассчитано на 8 мест). Все дети, поступающие в центр, проходят через приёмно-карантинное отделение.</p>
        <p class='mt-[20px]'>2.Стационарное отделение (рассчитано на 34 места)</p>
        <p class='mt-[20px]'>3.Отделение службы сопровождения замещающих семей, создано в 2009 года. В рамках работы службы функционирует</p>
        <p>Школа приёмных родителей и Клуб замещающих родителей «Тепло домашнего очага»</p>
    </div>
    <div class='text-[20px] font-roboto700 text-link-dark-blue max-w-[863px] text-center mx-auto mt-[45px]'>
        Стру ктура ГБУСО «Заиграевский социально – реабилитационный центр для несовершеннолетних»
    </div>
    <div class='text-[30px] mt-[55px] font-roboto700 '>
        <div class="tree">
            <div class='tree__item--head flex justify-center'>
                <div class="tree__item tree__item--bottom-center">Директор</div>
            </div>

            <div class="tree__item tree__item--top-right">
                Заведующий отделением
            </div>
            <div class="tree__item tree__item--top-center">
                Начальник хозяйственного отдела
            </div>
            <div class="tree__item tree__item--top-left">
                Административно- управленческий персонал
            </div>
            <div class="tree__item tree__item--top-center ">
                Отделение временного содержания детей сирот и детей, оставшихся без попечения родителей, а так же, детей оказавшихся в трудной жизненной ситуациию
            </div>
            <div class="tree__item tree__item--top-center max-h-[178px]">
                Персонал хозяйственного отдела
            </div>
            <div class="tree__item tree__item--empty">
            </div>
            <div class="tree__item tree__item--top-center">
                Полустационарное отделение
            </div>
            <div class="tree__item tree__item--empty">
            </div>
            <div class="tree__item tree__item--empty">
            </div>
        </div>
    </div>
</ContentContainer>
</template>

<style scoped>
.tree {
    --vertical-gap: 50px;
    --horizontal-gap: 20px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin: 0;
    padding: 0;
    list-style: none;
    width: 100%;
    color: #fff;
}

.tree__item {
    position: relative;
    margin: 0 calc(var(--horizontal-gap) / 2);
    width: calc(33% - var(--horizontal-gap));
    max-width: 392px;
    margin-top: var(--vertical-gap);
    background-color: #ACB9E1;
    box-sizing: border-box;
    padding: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 10px;
}

.tree__item:first-child {
    margin-top: 0;
}

.tree__item--head {
    width: 100%;
}

.tree__item--empty {
    background-color: #fff;
}

.tree__item::before, .tree__item::after {
    content: '';
    position: absolute;
    background-color: #ACB9E1;
}

.tree__item--bottom-right::before {
    top: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}

.tree__item--bottom-right::after {
    bottom: calc(var(--vertical-gap) / -2);
    left: calc(50% - 1px);
    width: calc(50% + var(--horizontal-gap) / 2 + 1px);
    height: 3px;
}

.tree__item--top-right::before {
    bottom: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}

.tree__item--top-right::after {
    top: calc(var(--vertical-gap) / -2);
    left: calc(50% - 1px);
    width: calc(100% + 20px);
    height: 3px;
}

.tree__item--top-left::before {
    bottom: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}

.tree__item--top-left::after {
    top: calc(var(--vertical-gap) / -2);
    right: calc(50% - 1px);
    width: calc(100% + 20px);
    height: 3px;
}

.tree__item--top-center::before {
    bottom: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap));
}

.tree__item--bottom-center::before {
    top: 100%;
    left: calc(50% - 1px);
    width: 3px;
    height: calc(var(--vertical-gap) / 2);
}
</style>
