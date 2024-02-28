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
import AboutDescription from "./views/AboutDescription.vue";
import DocumentRoutes from "./views/DocumentRoutes.vue";
import PassportRoutes from "./views/PassportRoutes.vue";
import CharterRoutes from "./views/CharterRoutes.vue";
import Charter from "./views/Charter.vue";
import Passport from "./views/Passport.vue";
import DocumentView from "./views/DocumentView.vue";
import InspectionReports from "./views/InspectionReports.vue";
import InspectionReportView from "./views/InspectionReportView.vue";

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
            { path: 'description', component: AboutDescription, name: 'about-description' },
            { path: '', redirect: '/about/description', name: 'about-default' },
        ],
    },
    {
        path: '/documents',
        component: DocumentRoutes,
        name: 'documents',
        children: [
            {
                path: 'charter',
                component: CharterRoutes,
                name: 'center-charter',
                children: [
                    { path: 'charter-changes', component: Charter, name: 'center-charter-changes' },
                    { path: 'ogrn', component: Charter, name: 'center-ogrn' },
                    { path: 'center-charter-doc', component: Charter, name: 'center-charter-doc' },
                    { path: '', redirect: '/documents/charter/center-charter-doc', name: 'charter-default' },
                ],
            },
            {
                path: 'passport',
                component: PassportRoutes,
                name: 'center-passport',
                children: [
                    { path: 'passport-2023', component: Passport, name: 'center-passport-2023' },
                    { path: 'passport-2021', component: Passport, name: 'center-passport-2021' },
                    { path: 'passport-2020', component: Passport, name: 'center-passport-2020' },
                    { path: '', redirect: '/documents/passport/passport-2023', name: 'passport-default' },
                ],
            },
            { path: 'convention', component: DocumentView, name: 'rights-convention' },
            { path: 'strategy', component: DocumentView, name: 'nation-strategy' },
            { path: 'protection', component: DocumentView, name: 'protection-regulation' },
            { path: 'assessment', component: DocumentView, name: 'social-assessment' },
            { path: 'internal-rules', component: DocumentView, name: 'center-internal-rules' },
            { path: 'material-technical', component: DocumentView, name: 'center-material-technical' },
            { path: 'board-trustees', component: DocumentView, name: 'center-board-trustees' },
            {
                path: 'inspection-reports/:type',
                component: InspectionReportView,
                name: 'center-inspection-reports',
            },
            {
                path: 'inspection-reports',
                component: InspectionReports,
                name: 'center-inspection-report',
            },
            { path: '', redirect: '/documents/charter', name: 'documents-default' },
        ],
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
