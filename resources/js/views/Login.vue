<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import SaveButton from "../components/SaveButton.vue";
import {ref} from "vue";
import axios from "axios";
import useCommon from "../use/common.js";
import router from "../router.js";

const {
    isAdmin,
} = useCommon()

const username = ref('')
const password = ref('')

if (isAdmin.value) {
    router.push({name: 'home'})
    alert('Вы уже вошли в систему как администратор')
}

async function login() {
    try {
        const user = await axios.post(`/api/auth/login?name=${username.value}&password=${password.value}`)
        localStorage.setItem('access_token', user.data.access_token)
        isAdmin.value = true
        alert('Вы вошли в систему как администратор')
        await router.push({name: 'home'})
    } catch {
        alert('Ошибка')
    }
}

</script>

<template>
    <ContentContainer>
        <div class='text-link-dark-blue text-[20px] pb-[40px]'>
            <div class='text-[18px] flex flex-col max-w-[604px] mx-auto'>
                <input
                    v-model="username"
                    type='text'
                    maxlength="20"
                    class='mt-[25px] py-[16px] px-[50px] w-full border border-bluebg outline-none rounded focus:border-1 focus:border-tblue focus:shadow'
                    placeholder='Логин'>
                <input
                    v-model="password"
                    type='password'
                    maxlength="20"
                    class='mt-[25px] py-[16px] px-[50px] w-full border border-bluebg outline-none rounded focus:border-1 focus:border-tblue focus:shadow'
                    placeholder='Пароль'>
            </div>
            <SaveButton @click="login" text='Войти' class='mt-[50px] mx-auto'></SaveButton>
        </div>
    </ContentContainer>
</template>

<style scoped>

</style>
