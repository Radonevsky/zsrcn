<script setup>
import VkIcon from "./icons/vkIcon.vue";
import MailIcon from "./icons/mailIcon.vue";
import PhoneIcon from "./icons/phoneIcon.vue";
const contacts = [
    VkIcon,
    MailIcon,
    PhoneIcon,
]
</script>

<template>
<div class='w-93'>
    <div class='max-h-[19px] flex gap-[20px] items-center'>
        <component
            v-for='item in contacts'
            :is='item'
            class='hover:scale-[1.25] cursor-pointer transition-all ease-out'>
        </component>
    </div>
</div>
</template>

<style scoped>

</style>
