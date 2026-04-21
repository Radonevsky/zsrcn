<script setup>

import ContentContainer from '../layouts/ContentContainer.vue'
import PageTitle from '../components/PageTitle.vue'
import useCommon from '../use/common.js'

window.scrollTo(0, 0)
const {
    isImpairedVision,
} = useCommon()
</script>

<template>
    <router-link to='/contacts' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Контакты' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue' :style="isImpairedVision ? 'color: black':''">
            <h2 class='font-roboto700 max-w-[900px] mt-[20px]'>
                Государственное бюджетное учреждение социального обслуживания <br>
                Заиграевский социально-реабилитационный центр для несовершеннолетних
            </h2>
            <p class="mt-[20px] font-roboto700">
                Юридический адрес
            </p>
            <p class="mt-[8px]">
                671325, Республика Бурятия, Заиграевский район, с.&nbsp;Новая Брянь, пер.&nbsp;Верховской, д.&nbsp;1
            </p>
            <p class="mt-[20px] font-roboto700">
                Фактический адрес
            </p>
            <p class="mt-[8px]">
                671325, Республика Бурятия, Заиграевский район, с.&nbsp;Новая Брянь, пер.&nbsp;Верховской, д.&nbsp;1
            </p>
            <p class="mt-[20px] font-roboto700">
                Почтовый адрес
            </p>
            <p class="mt-[8px]">
                671325
            </p>
            <p class="mt-[20px]">
                факс 8–(30136) 53-6-66<br>
                тел.: 8–(30136) 53-9-72<br>
                E-mail: <a href="mailto:zaigraevo_srcn@govrb.ru">zaigraevo_srcn@govrb.ru</a>
            </p>
            <p class="mt-[20px]">
                График работы:<br>
                Учреждение работает в круглосуточном режиме.<br>
                Администрация центра работает в будние дни с 8.00 до 16.15, перерыв на обед с 12:00 до 13:00.
            </p>
            <p class="mt-[20px]">
                Кочетова Галина Ивановна (директор) — тел.: 8 (30136) 53-6-66
            </p>
            <p class="mt-[20px]">
                Москвитина Алла Александровна (заведующая реабилитационным отделением) — тел.: 8 (30136) 53-9-32
            </p>
            <p class="my-[20px]">
                Учредитель: Министерство социальной защиты населения Российской Федерации<br>
                Адрес: 670034, Республика Бурятия, г.&nbsp;Улан-Удэ, ул.&nbsp;Гагарина, 10<br>
                Email: <a href="mailto:mszn@govrb.ru">mszn@govrb.ru</a>
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
