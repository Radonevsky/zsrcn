import Home from './views/Home.vue'
import { createRouter, createWebHistory } from 'vue-router'
import MainLayout from "./layouts/MainLayout.vue"

const routes = [
    {
        path: '/',
        component: Home,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
