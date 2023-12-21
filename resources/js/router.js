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
import About from "./views/About.vue";
import Structure from "./views/Structure.vue";
import License from "./views/License.vue";
import Staff from "./views/Staff.vue";
import Activities from "./views/Activities.vue";
import Available from "./views/Available.vue";
import Experience from "./views/Experience.vue";
import SocialServices from "./views/SocialServices.vue";

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
            { path: '', redirect: '/feedback/faq', name: 'feedback-default' },
        ],
    },
    {
        path: '/about',
        component: About,
        name: 'about',
        children: [
            { path: 'structure', component: Structure, name: 'center-structure' },
            { path: 'staff', component: Staff, name: 'center-staff' },
            { path: 'activities', component: Activities, name: 'center-activities' },
            { path: 'available', component: Available, name: 'center-available' },
            { path: 'experience', component: Experience, name: 'center-experience' },
            { path: 'social-services', component: SocialServices, name: 'center-social-services' },
            { path: 'license', component: License, name: 'center-license' },
            { path: '', redirect: '/about/structure', name: 'about-default' },
        ],
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
