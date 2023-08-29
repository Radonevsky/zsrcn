import Home from './views/Home.vue'
import { createRouter, createWebHistory } from 'vue-router'
import News from "./views/News.vue";

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
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
