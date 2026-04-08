<script setup>
import { ref, watch, nextTick } from 'vue'

const props = defineProps({
    modelValue: { type: String, default: '' },
    editMode: { type: Boolean, default: false },
})

const emit = defineEmits(['update:modelValue'])

const editorRef = ref(null)

watch(
    () => props.editMode,
    async (editing) => {
        if (editing) {
            await nextTick()
            if (editorRef.value) {
                editorRef.value.innerHTML = props.modelValue || ''
            }
        }
    },
    { flush: 'post' },
)

function syncFromEditor() {
    if (editorRef.value) {
        emit('update:modelValue', editorRef.value.innerHTML)
    }
}

function applyBold(event) {
    event.preventDefault()
    editorRef.value?.focus()
    document.execCommand('bold', false)
    syncFromEditor()
}
</script>

<template>
    <div>
        <div v-if="editMode" class="mb-[10px] flex items-center gap-2">
            <span class="text-[16px] text-link-dark-blue">Оформление:</span>
            <button
                type="button"
                class="min-w-[36px] rounded-[6px] border border-light-purple px-2 py-1 font-roboto700 hover:border-orange"
                title="Жирный"
                @mousedown.prevent
                @click="applyBold"
            >
                B
            </button>
        </div>
        <div v-if="!editMode" class="rich-html-display" v-html="modelValue"></div>
        <div
            v-else
            ref="editorRef"
            class="rich-html-editor min-h-[280px] w-full max-w-full rounded-[10px] border border-light-purple border-[1px] p-[15px] text-[20px] font-roboto400 text-link-dark-blue outline-none focus:border-orange focus:shadow-around"
            contenteditable="true"
            @input="syncFromEditor"
        ></div>
    </div>
</template>
