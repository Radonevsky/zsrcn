<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
</script>

<template>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue'>
            <h2 class='font-roboto700 max-w-[900px] m-auto'>
                Правовая основа
            </h2>
            <ul class='mt-[20px] list-disc'>
                <li>
                    Федеральный закон №59 от 02.05.2006г. "О ПОРЯДКЕ РАССМОТРЕНИЯ ОБРАЩЕНИЙ ГРАЖДАН РОССИЙСКОЙ ФЕДЕРАЦИИ"
                </li>
                <li>
                    Федеральный закон №152 от 27.07.2006г. "О ПЕРСОНАЛЬНЫХ ДАННЫХ"
                </li>
                <li>
                    Положение о порядке рассмотрения обращений граждан
                </li>
            </ul>
        </div>
    </ContentContainer>
</template>

<style scoped>
table {
    text-align: center;
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    padding: 3px 7px;
    border: 1px solid black;
    text-align: left;
}
th {
    text-align: center;
}

div {
    @media only screen and (max-width: 750px) {
        font-size: 14px;
    }
}
</style>
