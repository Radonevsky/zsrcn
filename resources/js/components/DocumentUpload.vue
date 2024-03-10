<script setup>

import {ref, defineEmits} from "vue";



const emit = defineEmits(['docChange',])
const documentToUpload = ref(null)

function docAttachmentChange(e) {
    documentToUpload.value = e.target.files[0]
    emit('docChange', documentToUpload.value)
}
</script>

<template>
    <div class="mt-[20px] flex flex-col justify-center">
        <div class="mt-[16px] flex justify-center">
            <label for="customFile" class="custom-file-upload text-[16px]">
                <span v-if="!documentToUpload">Выберите файл</span>
                <span v-else>Выбранный файл:</span>
                <span class="ml-[10px]" v-if="documentToUpload">{{documentToUpload.name}}</span>
            </label>
            <input id="customFile" type="file" @change="docAttachmentChange" style="display: none;">
        </div>
    </div>
</template>

<style scoped>
.custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #ACB9E1;
}

.custom-file-upload:hover {
    background-color: #D7E993;
}

.custom-file-upload span {
    display: inline-block;
    vertical-align: middle;
}
</style>
