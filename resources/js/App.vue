<script setup>

import MainLayout from "./layouts/MainLayout.vue";
import useCommon from "./use/common.js";
import CommonButton from "./components/CommonButton.vue";
import ScrollUpButton from "./components/ScrollUpButton.vue";
import {onMounted, onUnmounted, ref} from "vue";

const {checkAdmin, logout, isAdmin} = useCommon()
const isShowScrollUpButton = ref(false)

checkAdmin()

onMounted(() => {
    window.addEventListener("scroll", handleScroll)
})
onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll)
})

onMounted(async () => {
    const script = document.createElement('script');
    script.src = 'https://pos.gosuslugi.ru/bin/script.min.js';
    document.body.appendChild(script);

    script.onload = () => {
        (function(){ "use strict";function ownKeys(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);if(t)r=r.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable});n.push.apply(n,r)}return n}function _objectSpread(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};if(t%2)ownKeys(Object(n),true).forEach(function(t){_defineProperty(e,t,n[t])});else if(Object.getOwnPropertyDescriptors)Object.defineProperties(e,Object.getOwnPropertyDescriptors(n));else ownKeys(Object(n)).forEach(function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))})}return e}function _defineProperty(e,t,n){if(t in e)Object.defineProperty(e,t,{value:n,enumerable:true,configurable:true,writable:true});else e[t]=n;return e}var POS_PREFIX_6="--pos-banner-fluid-6__",posOptionsInitialBanner6={background:"#b5d43c","grid-template-columns":"100%","grid-template-rows":"292px auto","max-width":"100%","text-font-size":"20px","text-margin":"0 3px 24px 0","button-wrap-max-width":"100%","bg-url":"url('https://pos.gosuslugi.ru/bin/banner-fluid/5/banner-fluid-bg-5.svg')","bg-url-position":"center bottom","bg-size":"contain","content-padding":"24px","content-grid-row":"0","logo-width":"65px","logo-wrap-top":"16px","logo-wrap-right":"13px","slogan-font-size":"12px"},setStyles=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:POS_PREFIX_6;Object.keys(e).forEach(function(r){t.style.setProperty(n+r,e[r])})},removeStyles=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:POS_PREFIX_6;Object.keys(e).forEach(function(e){t.style.removeProperty(n+e)})};function changePosBannerOnResize(){var e=document.documentElement,t=_objectSpread({},posOptionsInitialBanner6),n=document.getElementById("js-show-iframe-wrapper"),r=n?n.offsetWidth:document.body.offsetWidth;if(r>340)t["grid-template-rows"]="236px auto",t["bg-url"]="url('https://pos.gosuslugi.ru/bin/banner-fluid/5/banner-fluid-bg-5-2.svg')",t["bg-url-position"]="center bottom calc(100% - 30px)",t["button-wrap-max-width"]="209px",t["content-padding"]="24px 32px",t["text-margin"]="0 0 24px 0";if(r>568)t["grid-template-columns"]="1fr 308px",t["grid-template-rows"]="100%",t["content-grid-row"]="1",t["content-padding"]="32px 24px",t["bg-url"]="url('https://pos.gosuslugi.ru/bin/banner-fluid/5/banner-fluid-bg-5.svg')",t["bg-url-position"]="6px bottom",t["logo-width"]="78px",t["logo-wrap-top"]="20px",t["logo-wrap-right"]="17px",t["slogan-font-size"]="15px";if(r>694)t["bg-url-position"]="12px 40px";if(r>783)t["grid-template-columns"]="1fr 400px",t["text-font-size"]="24px";if(r>855)t["bg-url-position"]="center bottom calc(100% - 30px)";if(r>1098)t["bg-url"]="url('https://pos.gosuslugi.ru/bin/banner-fluid/5/banner-fluid-bg-5-2.svg')",t["grid-template-columns"]="1fr 557px",t["text-font-size"]="26px",t["content-padding"]="32px 32px 32px 50px";if(r>1422)t["max-width"]="1422px",t["grid-template-columns"]="1fr 720px",t["content-padding"]="32px 40px 32px 160px",t.background="linear-gradient(90deg, #b5d43c 50%, #fffaf6 50%)";setStyles(t,e)}changePosBannerOnResize(),window.addEventListener("resize",changePosBannerOnResize),window.onunload=function(){var e=document.documentElement,t=_objectSpread({},posOptionsInitialBanner6);window.removeEventListener("resize",changePosBannerOnResize),removeStyles(t,e)}; })()
        Widget("https://pos.gosuslugi.ru/form", 237502)
    };
});

const handleScroll = () => {
    if (window.scrollY >= 1200) {
        isShowScrollUpButton.value = true
    }
    if (window.scrollY < 1200) {
        isShowScrollUpButton.value = false
    }
}

const scrollUp = () => {
    window.scrollTo(0, 0)
}
</script>

<template>
    <MainLayout class="overflow-x-hidden">
    </MainLayout>
    <common-button
        v-if="isAdmin"
        @click="logout"
        text="Выйти из режима администратора"
        class="fixed top-10 right-10 opacity-50 hover:opacity-100">
    </common-button>
    <scroll-up-button
        v-if="isShowScrollUpButton"
        @click="scrollUp"
        class="fixed bottom-20 left-10 opacity-30 hover:opacity-100">
        Наверх
    </scroll-up-button>
    <div id='js-show-iframe-wrapper'> <div class='pos-banner-fluid bf-6'> <div class='bf-6__decor'> <div class='bf-6__logo-wrap'> <img class='bf-6__logo' src='https://pos.gosuslugi.ru/bin/banner-fluid/gosuslugi-logo-blue.svg' alt='Госуслуги' /> <div class='bf-6__slogan'>Решаем вместе</div > </div > </div > <div class='bf-6__content'> <div class='bf-6__text'> Знаете, какая помощь от государства необходима, чтобы реализовать свой потенциал на максимум? </div > <div class='bf-6__bottom-wrap'> <div class='bf-6__btn-wrap'> <!-- pos-banner-btn_2 не удалять; другие классы не добавлять --> <button class='pos-banner-btn_2' type='button' >Написать о проблеме </button > </div > </div> </div > </div > </div >
    <div class="flex max-h-[500px] justify-around banners">
        <a href="https://bus.gov.ru/qrcode/rate/23025" target="_blank" title="Оцените нашу работу">
            <img src="http://zsrcn.zaigraevo.ru/images/banners/ocenka1.jpg" class="max-h-[500px]" alt="Оцените нашу работу">
        </a>
        <a href="https://vk.com/public217439187" target="_blank" title="Вконтакте">
            <img src="http://zsrcn.zaigraevo.ru/images/banners/qr.png" class="max-h-[500px]" alt="Вконтакте">
        </a>
    </div>

</template>

<style>
html {
    scroll-behavior: smooth;
}
@media only screen and (max-width: 550px) {
    .banners {
        flex-wrap: wrap;
    }
}
</style>
