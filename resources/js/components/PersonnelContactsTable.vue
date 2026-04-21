<script setup>

const props = defineProps({
    rows: { type: Array, default: () => [] },
    editable: { type: Boolean, default: false },
    loaded: { type: Boolean, default: true },
})

const emit = defineEmits(['update:rows'])

function displayEmail(row) {
    const e = (row.email || '').trim()

    return e || 'gusonat@mail.ru'
}

function roleLines(text) {
    return String(text || '').split('\n').filter((line) => line.length > 0)
}

function patchRow(index, field, value) {
    const next = props.rows.map((r, i) => (i === index ? { ...r, [field]: value } : r))
    emit('update:rows', next)
}

function addRow() {
    const next = [
        ...props.rows,
        {
            department: '',
            work_time: '',
            role_info: '',
            phone: '',
            email: 'gusonat@mail.ru',
            sort_order: props.rows.length,
        },
    ]
    emit('update:rows', next)
}

function removeRow(index) {
    emit(
        'update:rows',
        props.rows.filter((_, i) => i !== index),
    )
}

function moveRow(index, delta) {
    const j = index + delta
    if (j < 0 || j >= props.rows.length) {
        return
    }
    const next = [...props.rows]
    const t = next[index]
    next[index] = next[j]
    next[j] = t
    emit('update:rows', next)
}

</script>

<template>
    <div :class="{ 'personnel-root--edit': editable }">
        <div v-if="!loaded" class="mt-[10px]">
            <img src="../../../resources/images/preloader.gif" class="w-[30px] h-[30px] inline" alt="Загрузка">
        </div>
        <template v-else>
            <table class="text-center table-auto mt-[10px] personnel-table large">
                <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>Время работы</th>
                        <th>Должность, ФИО</th>
                        <th>Телефон</th>
                        <th>Эл. почта</th>
                        <th v-if="editable" class="w-[120px]"> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in rows" :key="row.id ?? 'row-' + index">
                        <td>
                            <template v-if="!editable">{{ row.department }}</template>
                            <textarea
                                v-else
                                :value="row.department"
                                class="w-full min-h-[80px] p-[8px] border border-light-purple rounded-[8px] text-left text-[16px] resize-y"
                                @input="patchRow(index, 'department', $event.target.value)"
                            ></textarea>
                        </td>
                        <td>
                            <template v-if="!editable">{{ row.work_time }}</template>
                            <input
                                v-else
                                :value="row.work_time"
                                class="w-full p-[8px] border border-light-purple rounded-[8px]"
                                @input="patchRow(index, 'work_time', $event.target.value)"
                            >
                        </td>
                        <td class="text-left">
                            <template v-if="!editable">
                                <p v-for="(line, li) in roleLines(row.role_info)" :key="li">{{ line }}</p>
                            </template>
                            <textarea
                                v-else
                                :value="row.role_info"
                                rows="5"
                                class="w-full p-[8px] border border-light-purple rounded-[8px] text-[16px] resize-y"
                                @input="patchRow(index, 'role_info', $event.target.value)"
                            ></textarea>
                        </td>
                        <td>
                            <template v-if="!editable">{{ row.phone }}</template>
                            <input
                                v-else
                                :value="row.phone"
                                class="w-full p-[8px] border border-light-purple rounded-[8px]"
                                @input="patchRow(index, 'phone', $event.target.value)"
                            >
                        </td>
                        <td>
                            <template v-if="!editable">
                                <a :href="'mailto:' + displayEmail(row)">{{ displayEmail(row) }}</a>
                            </template>
                            <input
                                v-else
                                :value="displayEmail(row)"
                                class="w-full p-[8px] border border-light-purple rounded-[8px]"
                                @input="patchRow(index, 'email', $event.target.value)"
                            >
                        </td>
                        <td v-if="editable" class="text-left align-top">
                            <button
                                type="button"
                                class="block text-link-dark-blue underline mb-[6px]"
                                @click="moveRow(index, -1)"
                            >
                                Вверх
                            </button>
                            <button
                                type="button"
                                class="block text-link-dark-blue underline mb-[6px]"
                                @click="moveRow(index, 1)"
                            >
                                Вниз
                            </button>
                            <button
                                type="button"
                                class="block text-red-700 underline"
                                @click="removeRow(index)"
                            >
                                Удалить
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mobile flex-col mt-[10px]">
                <template v-for="(row, index) in rows" :key="'m-' + (row.id ?? index)">
                    <div class="bg-light-bg border font-bold">{{ row.department || '—' }}</div>
                    <div class="border">
                        <p v-for="(line, li) in roleLines(row.role_info)" :key="li">{{ line }}</p>
                        <p>{{ row.work_time }}</p>
                        <p>{{ row.phone }}</p>
                        <p>
                            <a :href="'mailto:' + displayEmail(row)">{{ displayEmail(row) }}</a>
                        </p>
                    </div>
                </template>
            </div>

            <button
                v-if="editable"
                type="button"
                class="mt-[12px] text-link-dark-blue underline font-roboto400"
                @click="addRow"
            >
                Добавить строку
            </button>
        </template>
    </div>
</template>

<style scoped>
table {
    text-align: center;
    width: 100%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
    padding: 6px 8px;
    vertical-align: top;
}

.mobile {
    display: none;
}

.mobile div {
    padding: 6px 8px;
}

@media only screen and (max-width: 750px) {
    .personnel-table {
        font-size: 14px;
    }
}

@media only screen and (max-width: 550px) {
    .large {
        display: none;
    }

    .mobile {
        display: flex;
    }

    .personnel-root--edit .large {
        display: table;
        font-size: 12px;
    }

    .personnel-root--edit .mobile {
        display: none;
    }
}
</style>
