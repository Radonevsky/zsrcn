<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
window.scrollTo(0, 0)
</script>

<template>
    <router-link to='/social-add' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Социальная реклама' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue my-[20px]'>
            <div>
                <h2 class='font-roboto700'>
                    Проект "Демография"
                </h2>
                <p>
                    Министерство социальной защиты населения Республики Бурятия в рамках национального проекта «Демография» в
                    текущем году подготовило серию видеороликов о действующих мерах социальной поддержки в целях обеспечения
                    информирования граждан республики.
                </p>
                <p>
                    Материалы для скачивания размещены по
                    <a href="https://cloud.mail.ru/public/zQ6n/p99uVvfw1" target="_blank" class="underline text-purpl-blue">ссылке</a>
                </p>
            </div>
            <div class="mt-[20px]">
                <h2 class='font-roboto700'>
                    «Семья – мой главный жизненный проект»
                </h2>
                <p class="mb-[10px]">
                    Фондом поддержки детей, находящихся в трудной жизненной ситуации, создана серия рекламно-информационных
                    материалов (далее – РИМ) под названием «Семья – мой главный жизненный проект».
                </p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/-IzBfCA0QQQ?si=5aWPyVbyhzqAE7BZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="mt-[20px]">
                <h2 class='font-roboto700'>
                    Перечень видеороликов социальной рекламы
                </h2>
                <p>
                    Во исполнение Плана мероприятий Стратегии развития воспитания в РФ на период до 2025 года, утвержденной
                    распоряжением правительства РФ от 29.05.2015 г. № 996-р созданы видеоролики социальной рекламы ЧОУ ДПО
                    «Национальный институт защиты детства».
                </p>
                <p class="mt-10px">
                    Серия видеороликов направлена на продвижение ценностей ненасильственного воспитания и доверительных отношений
                    с детьми, профилактику не только крайних форм жестокого обращения с детьми, но и «обыденных», привычных видов
                    физических наказаний и эмоционального давления.
                    Видеоролики можно использовать в воспитательной работе с семьей и детьми.
                </p>
                <div class="mt-[20px]">
                    <p class="mb-[7px]">
                        «Оковы». Слоган «Мы думаем о себе голосами наших родителей»
                    </p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/CnydQdlz-gw?si=b9a1Yz8NSDIKtj-q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="mt-[20px]">
                    <p class="mb-[7px]">
                        «Кошка». Слоган «Только взрослый может разорвать круг насилия»
                    </p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/XzUjswwDNCQ?si=kDIIjII9gxQltOF-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="mt-[20px]">
                    <p class="mb-[7px]">
                        «Тарелки». Слоган «А какие следы оставляете вы на своем ребенке?»
                    </p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/aokeR5j5NlQ?si=idmjHj9NAxSXQL7a" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="mt-[20px]">
                    <p class="mb-[7px]">
                        «Рыбка». Слоган «Передавайте детям только добрые традиции»
                    </p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/U4MuWuvFlZU?si=yQJJ2KSAEOYbljQA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="mt-[20px]">
                    <p class="mb-[7px]">
                        «Рисунок». Слоган «Дайте ребенку место в вашей жизни»
                    </p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/r7JrGqad0jQ?si=_wlyMZKONPJOup-e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="mt-[20px]">
                    <p class="mb-[7px]">
                        «Пощечина». Слоган «Дети всему учатся у нас»
                    </p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/66frexeysaI?si=p7l-kWd7C6iknUC5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="mt-[20px]">
                    <p class="mb-[7px]">
                        «Ваши дети любят вас». Слоган «Ваши дети любят вас. А вы?»
                    </p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/n-9teKTBMcg?si=G7ofTfFcsxzqL_iJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>
div {
    @media only screen and (max-width: 750px) {
        font-size: 14px;
    }
}
iframe {
    @media only screen and (max-width: 610px) {
        width: 360px;
        height: 215px
    }
    @media only screen and (max-width: 410px) {
        width: 260px;
        height: 200px
    }
}
</style>
