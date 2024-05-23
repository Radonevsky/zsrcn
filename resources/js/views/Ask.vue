<script setup>

import SaveButton from "../components/SaveButton.vue";
import {ref} from "vue";
import useCommon from "../use/common.js";

const feedbackData = ref({
    name: {
        valid: true,
        value: '',
        label: 'Имя',
        type: 'text',
        maxlength: 50,
        required: true,
    },
    lastname: {
        valid: true,
        value: '',
        label: 'Фамилия',
        type: 'text',
        maxlength: 50,
    },
    email: {
        valid: true,
        value: '',
        label: 'Email',
        type: 'email',
        maxlength: 225,
        required: true,
    },
    tel: {
        valid: true,
        value: '',
        label: 'Телефон',
        type: 'phone',
        maxlength: 50,
        required: true,
    },
    otherContacts: {
        valid: true,
        value: '',
        label: 'Другие способы связи с вами',
        type: 'email',
        maxlength: 225,
    },
    subject: {
        valid: true,
        value: '',
        label: 'Тема обращения',
        type: 'text',
        maxlength: 100,
    },
    text: {
        valid: true,
        value: '',
        label: 'Текст обращения',
        type: 'textarea',
        maxlength: 3000,
        required: true,
    }
})
const preloader = ref(false)
const {
    sendFeedback,
    isImpairedVision,
} = useCommon()

const isValidEmail = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const validateField = (field) => {
    if (field === 'email') {
        return feedbackData.value[field].valid = feedbackData.value[field].value.length <= feedbackData.value[field].maxlength && isValidEmail(feedbackData.value[field].value)
    } else if (field === 'tel') {
        return feedbackData.value[field].valid = feedbackData.value[field].value.length <= feedbackData.value[field].maxlength
            && /^\+?[0-9]{1,15}$/.test(feedbackData.value[field].value)
    } else {
        if (feedbackData.value[field].required && feedbackData.value[field].value.length < 1) {
            return feedbackData.value[field].valid = false
        }
        return feedbackData.value[field].valid = feedbackData.value[field].value.length <= feedbackData.value[field].maxlength
    }
};

const validateForm = () => {
    let notValid = false
    Object.keys(feedbackData.value).forEach(item => {
        const valid = validateField(item)
        if (!valid) {
            notValid = true
        }
    })

    return !notValid;
}

async function sendForm() {
    preloader.value = true
    if (!validateForm()) {
        return
    }

    const payload = {}
    for (let key in feedbackData.value) {
        payload[key] = feedbackData.value[key].value;
    }

    await sendFeedback(payload)
    preloader.value = false
}
</script>

<template>
    <div class='text-link-dark-blue text-[20px] pb-[40px]' :style="isImpairedVision ? 'color: black':''">
        Здесь вы можете задать вопрос сотрудникам ГБУСО “Заиграевский реабилитационный центр для несовершеннолетних” или же оставить свой отзыв.
        Пожалуйста, заполните необходимые поля формы обратной связи и нажмите «Отправить»
        <div v-if="preloader" class="w-[100px] mx-auto">
            <img src="../../../resources/images/preloader.gif" class="w-[100px] h-[100px]" alt="Loading">
        </div>
        <div class='text-[18px] flex flex-col max-w-[604px]'>
            <div v-for="(item, idx) in feedbackData" class="w-full relative">
                <input
                    v-if="feedbackData[idx].type !== 'textarea'"
                    v-model="feedbackData[idx].value"
                    :type='item.type'
                    :maxlength="feedbackData[idx].maxlength"
                    class='mt-[25px] py-[16px] px-[50px] w-full border outline-none rounded focus:border-2 focus:border-bluebg'
                    :class="item.valid ? 'border-light-border' : 'border-pink'"
                    :style="isImpairedVision ? 'border: 1px solid #000':''"
                    :placeholder='item.label'
                    :disabled="preloader">
                <textarea
                    v-else
                    v-model="feedbackData[idx].value"
                    class='mt-[25px] py-[16px] px-[50px] w-full min-h-[200px] border outline-none resize-none rounded focus:border-2 focus:border-bluebg'
                    :class="item.valid ? 'border-light-border' : 'border-pink'"
                    :style="isImpairedVision ? 'border: 1px solid #000':''"
                    :placeholder='feedbackData[idx].label'
                    :maxlength="feedbackData[idx].maxlength"
                    :disabled="preloader">
                </textarea>
                <p v-if="feedbackData[idx].required" class="text-pink absolute top-5 -right-3">*</p>
                <p v-if="!feedbackData[idx].valid" class="text-pink">Корректно заполните {{feedbackData[idx].label}}</p>
            </div>
        </div>
        <SaveButton :disabled="preloader" @click="sendForm" text='Отправить' class='mt-[50px] mx-auto'></SaveButton>
    </div>

</template>

<style scoped>

</style>
