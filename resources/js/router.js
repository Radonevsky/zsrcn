import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import News from "./views/Articles.vue";
import Gallery from "./views/Gallery.vue";

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
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
