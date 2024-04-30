<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";

</script>

<template>
<div class='bg-purpl-blue py-[60px] text-white footer-container'>
    <ContentContainer>
        <div class='flex gap-[30px] footer-content-container'>
            <router-link to="/">
                <h2 class='font-roboto500 text-[30px] leading-[35px] max-w-[604px] hover:underline'>
                    Государственное бюджетное учреждение социального обслуживания
                    “Заиграевский реабилитационный центр для несовершеннолетних”
                </h2>
            </router-link>
            <div class='font-roboto400 text-[20px] flex gap-[26px] justify-center w-[100%] contacts-container'>
                <div class='max-w-[291px]'>
                    <h5 class='uppercase'>
                        Контакты:
                    </h5>
                    <p>
                        671325 Республика Бурятия <br>
                        Заиграевский район <br>
                        с.Новая Брянь переулок <br>
                        Верховской 1. <br>
                        факс 8– (30136) 53-6-66 <br>
                        тел: 8–(30136) 53-9-72 <br>
                        E-mail: zaigraevo_srcn@govrb.ru
                    </p>
                </div>
                <div class='max-w-[210px]'>
                    <h5 class='uppercase'>
                        График работы:
                    </h5>
                    <p>
                        Учреждение работает <br>
                        в круглосуточном <br>
                        режиме. <br>
                        Администрация <br>
                        центра работает в <br>
                        будние дни с 8.00 ч. <br>
                        до 16.15 ч.
                    </p>
                </div>
            </div>
        </div>
    </ContentContainer>
</div>
</template>

<style scoped>
@media only screen and (max-width: 850px) {
    h2 {
        font-size: 20px;
    }
    .footer-content-container {
        flex-wrap: wrap;
    }
    .footer-container {
        padding-top: 20px;
    }
    .contacts-container {
        font-size: 18px;
        justify-content: space-between;
    }
}
@media only screen and (max-width: 550px) {
    .contacts-container {
        flex-wrap: wrap;
    }
}
</style>
