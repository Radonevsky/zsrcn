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
import DocumentSection from "./components/DocumentSection.vue";
import StatementsRoutes from "./views/StatementsRoutes.vue";
import PlanningRoutes from "./views/PlanningRoutes.vue";
import SupportFosterRoutes from "./views/SupportFosterRoutes.vue";
import CitizenAppealsRoutes from "./views/CitizenAppealsRoutes.vue";
import CitizenAppealsSchedule from "./views/CitizenAppealsSchedule.vue";
import CitizenAppealsLegalBasis from "./views/CitizenAppealsLegalBasis.vue";
import CitizenAppealsRules from "./views/CitizenAppealsRules.vue";
import MethodicalRoutes from "./views/MethodicalRoutes.vue";
import SocialTechnologies from "./views/SocialTechnologies.vue";
import AntiCorruptionRoutes from "./views/AntiCorruptionRoutes.vue";
import AntiCorruptionDays from "./views/AntiCorruptionDays.vue";
import QualityAssessmentRoutes from "./views/QualityAssessmentRoutes.vue";
import TowardsChildren from "./views/TowardsChildren.vue";
import InformationSecurity from "./views/InformationSecurity.vue";
import HeyParents from "./views/HeyParents.vue";
import Contacts from "./views/Contacts.vue";
import SocialAddView from "./views/SocialAddView.vue";
import Login from "./views/Login.vue";

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home',
        meta: { title: 'Главная' }
    },
    {
        path: '/news',
        component: News,
        name: 'news',
        meta: { title: 'Новости' }
    },
    {
        path: '/gallery',
        component: Gallery,
        name: 'gallery',
        meta: { title: 'Галерея' }
    },
    {
        path: '/memory-dates',
        component: MemoryDates,
        name: 'memory-dates',
        meta: { title: 'Памятные даты' }
    },
    {
        path: '/child-support-fund',
        component: ChildSupportFund,
        name: 'child-support-fund',
        meta: { title: 'Информационные материалы фонда поддержки детей' }
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
        meta: { title: 'Обратная связь' }
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
        meta: { title: 'О нас' }
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
            { path: 'assessment', component: InspectionReports, name: 'social-assessment-docs' },
            { path: 'assessment/:uuid', component: DocumentSection, name: 'social-assessment-doc' },
            { path: 'internal-rules', component: DocumentView, name: 'center-internal-rules' },
            { path: 'material-technical', component: DocumentView, name: 'center-material-technical' },
            { path: 'board-trustees', component: DocumentView, name: 'center-board-trustees' },
            {
                path: 'inspection-reports',
                component: InspectionReports,
                name: 'reports',
            },
            {
                path: 'inspection-reports/:uuid',
                component: DocumentSection,
                name: 'center-inspection-reports',
            },
            { path: '', redirect: '/documents/charter', name: 'documents-default' },
        ],
        meta: { title: 'Документы' }
    },
    {
        path: '/statements',
        component: StatementsRoutes,
        name: 'statements',
        children: [
            {
                path: '2019',
                component: InspectionReports,
                name: 'statements2019',
            },
            {
                path: '2019/:uuid',
                component: DocumentSection,
                name: 'statement2019',
            },
            {
                path: '2020',
                component: InspectionReports,
                name: 'statements2020',
            },
            {
                path: '2020/:uuid',
                component: DocumentSection,
                name: 'statement2020',
            },
            {
                path: '2021',
                component: InspectionReports,
                name: 'statements2021',
            },
            {
                path: '2021/:uuid',
                component: DocumentSection,
                name: 'statement2021',
            },
            {
                path: '2022',
                component: InspectionReports,
                name: 'statements2022',
            },
            {
                path: '2022/:uuid',
                component: DocumentSection,
                name: 'statement2022',
            },
            {
                path: '2023',
                component: InspectionReports,
                name: 'statements2023',
            },
            {
                path: '2023/:uuid',
                component: DocumentSection,
                name: 'statement2023',
            },
            {
                path: '2024',
                component: InspectionReports,
                name: 'statements2024',
            },
            {
                path: '2024/:uuid',
                component: DocumentSection,
                name: 'statement2024',
            },
            { path: '', redirect: '/statements/2023', name: 'statements-default' },
        ],
        meta: { title: 'Отчетные документы' }
    },
    {
        path: '/planning',
        component: PlanningRoutes,
        name: 'planning',
        children: [
            {
                path: '2019',
                component: InspectionReports,
                name: 'plannings2019',
            },
            {
                path: '2019/:uuid',
                component: DocumentSection,
                name: 'planning2019',
            },
            {
                path: '2020',
                component: InspectionReports,
                name: 'plannings2020',
            },
            {
                path: '2020/:uuid',
                component: DocumentSection,
                name: 'planning2020',
            },
            {
                path: '2021',
                component: InspectionReports,
                name: 'plannings2021',
            },
            {
                path: '2021/:uuid',
                component: DocumentSection,
                name: 'planning2021',
            },
            {
                path: '2022',
                component: InspectionReports,
                name: 'plannings2022',
            },
            {
                path: '2022/:uuid',
                component: DocumentSection,
                name: 'planning2022',
            },
            {
                path: '2023',
                component: InspectionReports,
                name: 'plannings2023',
            },
            {
                path: '2023/:uuid',
                component: DocumentSection,
                name: 'planning2023',
            },
            {
                path: '2024',
                component: InspectionReports,
                name: 'plannings2024',
            },
            {
                path: '2024/:uuid',
                component: DocumentSection,
                name: 'planning2024',
            },
            {path: '', redirect: '/planning/2023', name: 'planning-default'},
        ],
        meta: { title: 'Планирование финансово-хозяйственной деятельности' }
    },
    {
        path: '/support-foster',
        component: SupportFosterRoutes,
        name: 'support-foster',
        children: [
            {
                path: 'foster-common',
                component: InspectionReports,
                name: 'foster-common-docs',
            },
            {
                path: 'foster-common/:uuid',
                component: DocumentSection,
                name: 'foster-common-doc',
            },
            {
                path: 'foster-school',
                component: InspectionReports,
                name: 'foster-school-docs',
            },
            {
                path: 'foster-school/:uuid',
                component: DocumentSection,
                name: 'foster-school-doc',
            },
            {
                path: 'foster-club',
                component: InspectionReports,
                name: 'foster-club-docs',
            },
            {
                path: 'foster-club/:uuid',
                component: DocumentSection,
                name: 'foster-club-doc',
            },
            {
                path: 'foster-service',
                component: InspectionReports,
                name: 'foster-service-docs',
            },
            {
                path: 'foster-service/:uuid',
                component: DocumentSection,
                name: 'foster-service-doc',
            },
            {path: '', redirect: '/support-foster/foster-common', name: 'support-foster-default'},
        ],
        meta: { title: 'Служба сопровождения замещающих семей' }
    },
    {
        path: '/citizen-appeals',
        component: CitizenAppealsRoutes,
        name: 'citizen-appeals',
        children: [
            { path: '', component: CitizenAppealsSchedule, name: 'citizen-schedule' },
            {
                path: 'analysis',
                component: InspectionReports,
                name: 'citizen-appeals-analysis-docs',
            },
            {
                path: 'analysis/:uuid',
                component: DocumentSection,
                name: 'citizen-appeals-analysis-doc',
            },
            { path: 'legal-basis', component: CitizenAppealsLegalBasis, name: 'citizen-appeals-basis' },
            { path: 'rules', component: CitizenAppealsRules, name: 'citizen-appeals-rules' },
        ],
        meta: { title: 'Обращения граждан' }
    },
    {
        path: '/methodical',
        component: MethodicalRoutes,
        name: 'methodical',
        children: [
            { path: 'programm', component: InspectionReports, name: 'methodical-programm-summer-docs' },
            { path: 'programm/:uuid', component: DocumentSection, name: 'methodical-programm-summer-doc' },
            { path: 'social-technologies', component: SocialTechnologies, name: 'methodical-social-technologies' },
            { path: 'work', component: InspectionReports, name: 'methodical-work-docs' },
            { path: 'work/:uuid', component: DocumentSection, name: 'methodical-work-doc' },
            {path: '', redirect: '/methodical/programm', name: 'methodical-default'},
        ],
        meta: { title: 'Методическая работа' }
    },
    {
        path: '/anti-corruption',
        component: AntiCorruptionRoutes,
        name: 'anti-corruption',
        children: [
            {
                path: 'memo',
                component: InspectionReports,
                name: 'anti-corruption-memo-docs',
            },
            {
                path: 'memo/:uuid',
                component: DocumentSection,
                name: 'anti-corruption-memo-doc',
            },
            {
                path: 'day',
                component: AntiCorruptionDays,
                name: 'anti-corruption-days',
            },
            {
                path: 'booklets',
                component: InspectionReports,
                name: 'anti-corruption-booklets-docs',
            },
            {
                path: 'booklets/:uuid',
                component: DocumentSection,
                name: 'anti-corruption-booklets-doc',
            },
            {path: '', redirect: '/anti-corruption/memo', name: 'anti-corruption-default'},
        ],
        meta: { title: 'Противодействие коррупции' }
    },
    {
        path: '/quality-assessment',
        component: QualityAssessmentRoutes,
        name: 'quality-assessment',
        children: [
            {
                path: 'results-2021',
                component: InspectionReports,
                name: 'results-2021-docs',
            },
            {
                path: 'results-2021/:uuid',
                component: DocumentSection,
                name: 'results-2021-doc',
            },
            {
                path: 'plan-2021',
                component: InspectionReports,
                name: 'plan-2021-docs',
            },
            {
                path: 'plan-2021/:uuid',
                component: DocumentSection,
                name: 'plan-2021-doc',
            },
            {
                path: 'workplace-quality',
                component: InspectionReports,
                name: 'workplace-quality-docs',
            },
            {
                path: 'workplace-quality/:uuid',
                component: DocumentSection,
                name: 'workplace-quality-doc',
            },
            {
                path: 'workplace-improvements',
                component: InspectionReports,
                name: 'workplace-improvements-docs',
            },
            {
                path: 'workplace-improvements/:uuid',
                component: DocumentSection,
                name: 'workplace-improvements-doc',
            },
            {
                path: 'nok-report',
                component: InspectionReports,
                name: 'nok-report-docs',
            },
            {
                path: 'nok-report/:uuid',
                component: DocumentSection,
                name: 'nok-report-doc',
            },
            {
                path: 'memos',
                component: InspectionReports,
                name: 'memos-docs',
            },
            {
                path: 'memos/:uuid',
                component: DocumentSection,
                name: 'memos-doc',
            },
            {path: '', redirect: '/quality-assessment/results-2021', name: 'quality-assessment-default'},
        ],
        meta: { title: 'Независимая оценка качества условий оказания услуг' }
    },
    {
        path: '/towards-children',
        component: TowardsChildren,
        name: 'towards-children',
        meta: { title: 'Органы власти субъектов РФ — навстречу детям' }
    },
    {
        path: '/information-security',
        component: InformationSecurity,
        name: 'information-security',
        meta: { title: 'Информационная безопасность' }
    },
    {
        path: '/hey-parents',
        component: HeyParents,
        name: 'hey-parents',
        meta: { title: 'Ау, Родители' }
    },
    {
        path: '/contacts',
        component: Contacts,
        name: 'contacts',
        meta: { title: 'Контакты' }
    },
    {
        path: '/social-add',
        component: SocialAddView,
        name: 'social-add',
        meta: { title: 'Социальная реклама' }
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta: { title: 'Вход' }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
