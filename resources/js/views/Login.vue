<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import SaveButton from "../components/SaveButton.vue";
import {ref} from "vue";

const username = ref('')
const password = ref('')

function login() {

}
</script>

<template>
    <ContentContainer>
        <div class='text-link-dark-blue text-[20px] pb-[40px]'>
            <div class='text-[18px] flex flex-col max-w-[604px] mвx-auto'>
                <input
                    v-model="username"
                    type='text'
                    maxlength="20"
                    class='mt-[25px] py-[16px] px-[50px] w-full border outline-none rounded focus:border-2 focus:border-bluebg'
                    placeholder='Логин'>
                <input
                    v-model="password"
                    type='password'
                    maxlength="20"
                    class='mt-[25px] py-[16px] px-[50px] w-full border outline-none rounded focus:border-2 focus:border-bluebg'
                    placeholder='Пароль'>
            </div>
            <SaveButton @click="login" text='Войти' class='mt-[50px] mx-auto'></SaveButton>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
