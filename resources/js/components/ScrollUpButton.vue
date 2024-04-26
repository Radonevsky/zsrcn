<script setup>

</script>

<template>
    <div class="mb-[30px]">
        <button class='bg-btngreen w-full max-w-[392px] px-[20px] py-[20px] btn rounded-[10px] text-link-dark-blue hover:bg-btngreen'>
            <slot>Наверх</slot>
        </button>
    </div>
</template>

<style scoped>
@keyframes btn {
    0% {
        opacity: 0.2;
    }
    50% {
        opacity: 1;
    }
    100% {
        opacity: 0.2;
    }
}

button {
    animation: btn 2s infinite;
}
button:hover {
    animation: none;
}
</style>
