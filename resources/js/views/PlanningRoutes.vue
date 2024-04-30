<script setup>

import ContentContainer from "../layouts/ContentContainer.vue";
import PageTitle from "../components/PageTitle.vue";
import TabButton from "../components/TabButton.vue";
import {ref} from "vue";

window.scrollTo(0, 0)

const tabs = ref([
    {
        id: 1,
        name: '2023',
        link: '/planning/2023',
    },
    {
        id: 2,
        name: '2022',
        link: '/planning/2022',
    },
    {
        id: 3,
        name: '2021',
        link: '/planning/2021',
    },
    {
        id: 4,
        name: '2020',
        link: '/planning/2020',
    },
    {
        id: 5,
        name: '2019',
        link: '/planning/2019',
    },
    {
        id: 6,
        name: '2018',
        link: '/planning/2018',
    },
    {
        id: 7,
        name: '2017',
        link: '/planning/2017',
    },
])
</script>

<template>
    <router-link to='/statements' class="hover:underline hover:cursor-pointer underline-offset-[4px] decoration-white">
        <PageTitle title='Планирование финансово-хозяйственной деятельности' bg-class='bg-purpl-blue' text-color-class='text-white' :router-link='true'/>
    </router-link>
    <ContentContainer>
        <div class='mt-[60px] gap-[40px] mb-[30px] text-[20px] font-roboto700 flex justify-between documents-container'>
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
