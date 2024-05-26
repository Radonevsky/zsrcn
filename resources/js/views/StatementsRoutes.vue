<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import TabButton from "../components/TabButton.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([
    {
        id: 6,
        name: '2024',
        link: '/statements/2024',
    },
    {
        id: 1,
        name: '2023',
        link: '/statements/2023',
    },
    {
        id: 2,
        name: '2022',
        link: '/statements/2022',
    },
    {
        id: 3,
        name: '2021',
        link: '/statements/2021',
    },
    {
        id: 4,
        name: '2020',
        link: '/statements/2020',
    },
    {
        id: 5,
        name: '2019',
        link: '/statements/2019',
    },
])
</script>

<template>
    <router-link to='/statements' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Отчетные документы' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='mt-[60px] gap-[40px] mb-[30px] text-[20px] documents-container font-roboto700 flex justify-between'>
            <div class="flex-column w-full max-w-[400px] tabs">
                <tab-button v-for="tab in tabs" :key="tab.id" :link="tab.link">
                    {{ tab.name }}
                </tab-button>
            </div>
            <div class="flex-column w-full grow document-view">
                <router-view></router-view>
            </div>
        </div>
    </ContentContainer>
</template>

<style scoped>
@media only screen and (max-width: 750px) {
    .tabs {
        max-width: 121px;
    }
    .documents-container {
        gap: 20px;
    }
}

@media only screen and (max-width: 550px) {
    .documents-container {
        flex-direction: column;
        margin-top: 20px;
    }
    .tabs {
        display: flex;
        max-width: none;
        width: 100%;
        gap: 10px;
        flex-wrap: wrap;
    }
}
.document-view {
    @media only screen and (max-width: 1024px) {
        min-width: 550px;
    }
}
.tabs {
    @media only screen and (max-width: 902px) {
        font-size: 14px;
    }
}
.document-view {
    @media only screen and (max-width: 750px) {
        min-width: auto;
        width: auto;
    }
}
</style>
