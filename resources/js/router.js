import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import News from "./views/Articles.vue";
import Gallery from "./views/Gallery.vue";
import MemoryDates from "./views/MemoryDates.vue";
import ChildSupportFund from "./views/ChildSupportFund.vue";
import Feedback from "./views/Feedback.vue";
import FAQ from "./views/FAQ.vue";
import SatisfactionQuestionnaire from "./views/SatisfactionQuestionnaire.vue";
import Ask from "./views/Ask.vue";

const routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/news',
        component: News,
        name: 'news'
    },
    {
        path: '/gallery',
        component: Gallery,
        name: 'gallery'
    },
    {
        path: '/memory-dates',
        component: MemoryDates,
        name: 'memory-dates'
    },
    {
        path: '/child-support-fund',
        component: ChildSupportFund,
        name: 'child-support-fund'
    },
    {
        path: '/feedback',
        component: Feedback,
        name: 'feedback',
        children: [
            { path: 'faq', component: FAQ, name: 'faq' },
            { path: 'satisfaction-questionnaire', component: SatisfactionQuestionnaire, name: 'satisfaction-questionnaire' },
            { path: 'ask', component: Ask, name: 'ask' },
            { path: '', redirect: '/feedback/faq' },
        ],
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
