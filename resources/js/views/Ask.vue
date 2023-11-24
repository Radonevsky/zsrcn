<script setup>

import SaveButton from "../components/SaveButton.vue";
</script>

<template>
    <div class='text-link-dark-blue text-[20px] pb-[40px]'>
        Здесь вы можете задать вопрос сотрудникам ГБУСО “Заиграевский реабилитационный центр для несовершеннолетних” или же оставить свой отзыв.
        Пожалуйста, заполните необходимые поля формы обратной связи и нажмите «Отправить»
        <div class='text-[18px] flex flex-col max-w-[604px]'>
            <input
                type='text'
                class='mt-[25px] py-[16px] px-[50px] border outline-none border-light-border rounded focus:border-2 focus:border-bluebg'
                placeholder='Имя'>
            <input
                type='text'
                class='mt-[25px] py-[16px] px-[50px] border outline-none border-light-border rounded focus:border-2 focus:border-bluebg'
                placeholder='Фамилия'>
            <input
                type='text'
                class='mt-[25px] py-[16px] px-[50px] border outline-none border-light-border rounded focus:border-2 focus:border-bluebg'
                placeholder='Ваш e-mail для обратной связи '>
            <input
                type='text'
                class='mt-[25px] py-[16px] px-[50px] border outline-none border-light-border rounded focus:border-2 focus:border-bluebg'
                placeholder='Номер телефона'>
            <input
                type='text'
                class='mt-[25px] py-[16px] px-[50px] border outline-none border-light-border rounded focus:border-2 focus:border-bluebg'
                placeholder='Другие способы связи с Вами'>
            <input
                type='text'
                class='mt-[25px] py-[16px] px-[50px] border outline-none border-light-border rounded focus:border-2 focus:border-bluebg'
                placeholder='Тема сообщения'>
            <textarea
                class='mt-[25px] py-[16px] px-[50px] border outline-none border-light-border rounded focus:border-2 focus:border-bluebg'
                placeholder='Сообщение'>
            </textarea>
        </div>
        <SaveButton text='Отправить' class='mt-[50px] mx-auto'></SaveButton>
    </div>

</template>

<style scoped>

</style>
