<script setup>
import VkIcon from "./icons/vkIcon.vue";
import MailIcon from "./icons/mailIcon.vue";
import PhoneIcon from "./icons/phoneIcon.vue";
const contacts = [
    {
        icon: VkIcon,
        href: 'https://vk.com/public217439187',
    },
    {
        icon: MailIcon,
        href: 'mailto:zaigraevo_srcn@govrb.ru',
    },
    {
        icon: PhoneIcon,
        href: 'tel:83013653972',
    },
]

function handleClick(href) {
    window.location.href = href
}
</script>

<template>
<div class='w-93'>
    <div class='max-h-[19px] flex gap-[20px] items-center'>
        <a
            v-for='item in contacts'
            :href="item.href"
            target="_blank"
            @click="handleClick(item.href)"
            class='hover:scale-[1.25] cursor-pointer transition-all ease-out'>
            <component :is="item.icon"></component>
        </a>
    </div>
</div>
</template>

<style scoped>

</style>
