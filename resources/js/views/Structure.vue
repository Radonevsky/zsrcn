<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
</script>

<template>
<ContentContainer>
    <div class='mt-[20px] text-[30px] font-roboto700 '>
        <div class="tree">
            <div class='tree__item--head flex justify-center'>
                <div class="tree__item">Директор</div>
            </div>

            <div class="tree__item tree__item--top-right">Заведующий отделением</div>
            <div class="tree__item tree__item--top-center">Начальник хозяйственного отдела</div>
            <div class="tree__item tree__item--top-left">Административно- управленческий персонал</div>
            <div class="tree__item tree__item--top-center">Административно- управленческий персонал</div>
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
    margin: calc(var(--vertical-gap) * -1) auto 0;
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
}

.tree__item--head {
    width: 100%;

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
    height: 2px;
}

.tree__item--bottom-left::before {
    top: 100%;
    left: calc(50% - 1px);
    width: 2px;
    height: calc(var(--vertical-gap) / 2);
}

.tree__item--bottom-left::after {
    bottom: calc(var(--vertical-gap) / -2);
    right: calc(50% - 1px);
    width: calc(50% + var(--horizontal-gap) / 2 + 1px);
    height: 2px;
}

.tree__item--top-center::before {
    bottom: 100%;
    left: calc(50% - 1px);
    width: 2px;
    height: calc(var(--vertical-gap) / 2);
}
</style>
