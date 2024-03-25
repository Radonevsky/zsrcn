<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
window.scrollTo(0, 0)
</script>

<template>
    <router-link to='/contacts' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Контакты' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='text-[20px] font-roboto400 text-link-dark-blue p-'>
            <h2 class='font-roboto700 max-w-[900px] mt-[20px]'>
                Государственное бюджетное учреждение социального обслуживания <br>
                Заиграевский социально-реабилитационный центр для несовершеннолетних
            </h2>
            <p class="mt-[20px]">
                671325 Республика Бурятия Заиграевский район<br>
                с.Новая Брянь переулок Верховской 1.<br>
                факс 8– (30136) 53-6-66<br>
                тел: 8–(30136) 53-9-72<br>
                E-mail: <a href="mailto:zaigraevo_srcn@govrb.ru">zaigraevo_srcn@govrb.ru</a> <br>
            </p>
            <p class="mt-[20px]">
                График работы:<br>
                Учреждение  работает в круглосуточном режиме.<br>
                Администрация центра работает в будние дни с 8.00 ч. до 16.15 ч.
            </p>
            <p class="mt-[20px]">
                Директор: Кочетова Галина Ивановна
            </p>
            <p class="mt-[20px]">
                Заведующая реабилитационным отделением: Москвитина Алла Александровна
            </p>
            <p class="my-[20px]">
                Учредитель: Министерство социальной защиты населения Республики Бурятия
            </p>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
