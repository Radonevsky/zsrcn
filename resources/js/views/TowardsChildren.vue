<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import useCommon from "../use/common.js";

window.scrollTo(0, 0)
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <router-link to='/towards-children' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Органы власти субъектов РФ-навстречу детям' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 mb-[60px] text-link-dark-blue' :style="isImpairedVision ? 'color:black':''">
            <h2 class='font-roboto700 max-w-[900px] mt-[20px]'>
                Органы власти навстречу детям
            </h2>
            <p class='mt-[20px]'>
                Руководствуясь задачей поддержки детей и молодежи в контексте создания прочной опоры социально-экономического и
                отраслевого развития Российской Федерации, обозначенной Президентом Российской Федерации в Послании Федеральному
                Собранию 1 декабря 2016 года, ОИА «Новости России» и редакция журнала «Экономическая политика России» формируют
                Всероссийскую интернет-площадку для расширения взаимодействия органов исполнительной власти субъектов РФ с подрастающим
                поколением в регионах России «ОРГАНЫ ВЛАСТИ СУБЪЕКТОВ РФ - НАВСТРЕЧУ ДЕТЯМ!»
                <a href="http://www.kremlinrus.ru/news/165/65721/" target="_blank" class="underline text-purpl-blue" :style="isImpairedVision ? 'color:black':''"> http://www.kremlinrus.ru/news/165/65721/</a>
            </p>
            <p class='mt-[20px]'>
                Целями данного бесплатного ресурса являются:
            </p>
            <p>
                - Активизация интереса подрастающего поколения регионов России к деятельности отраслевых региональных и муниципальных
                государственных органов управления в вопросах социально-экономического и инвестиционного развития ерриторий, обеспечения
                финансовой стабильности и выработки стратегий ценообразования, развития предпринимательства и потребительского рынка,
                жилищного строительства и градостроительства, обновления промышленности и транспортной инфраструктуры, совершенствования
                системы АПК, ЖКХ, ТЭК и экологической безопасности, осуществления ветеринарной деятельности и лицензионного контроля,
                регулирования контрактной системы в сфере закупок и тарифного регулирования, занятости и трудовых отношений, укрепления
                продовольственной безопасности, природного, культурного, спортивно-туристского, научно- образовательного потенциала,
                повышения доступности и качества услуг информатизации и связи, органов ЗАГС и нотариата, медицинской помощи, гражданской,
                правовой и социальной защиты населения Российской Федерации;
            </p>
            <p class='mt-[20px]'>
                - Широкое вовлечение молодежи в конструктивное взаимодействие с отраслевыми органами исполнительной власти субъектов РФ
                с использованием разнообразных каналов связи: средств массовой информации, социальных сетей и современных технологических
                разработок. В свою очередь, сами дети из регионов России могут написать о запланированных или уже реализуемых отраслевых
                проектах, связанных с развитием собственного региона и страны в целом. Упрощенная форма регистрации находится здесь
                <a href="http://www.kremlinrus.ru/news/165/#reg" target="_blank" class="underline text-purpl-blue" :style="isImpairedVision ? 'color:black':''"> http://www.kremlinrus.ru/news/165/#reg</a>
            </p>
            <p class='mt-[20px]'>
                Региональные организации, учреждения и предприятия имеют бесплатную возможность рассказать ребятам о профильных направлениях
                деятельности и тем самым подсказать молодому поколению какую профессию и в какой отрасли выбрать. С примерами размещения
                информации органами исполнительной власти субъектов РФ можно ознакомиться в разделе о «России и регионах»
                <a href="http://www.kremlinrus.ru/news/165/" target="_blank" class="underline text-purpl-blue" :style="isImpairedVision ? 'color:black':''">http://www.kremlinrus.ru/news/165/</a>
                В итоге подобного информационного обмена отраслевых органов исполнительной власти
                субъектов РФ, подростков и их родителей должно сложиться сообщество одинаково стратегически мыслящих людей системы
                государственного управления - взрослых и детей, которое будет из поколения в поколение отстаивать и защищать национальные
                интересы, суверенитет и независимый курс Российской Федерации
            </p>
        </div>
    </ContentContainer>
</template>

<style scoped>
div {
    @media only screen and (max-width: 750px) {
        font-size: 14px;
    }
}
</style>
