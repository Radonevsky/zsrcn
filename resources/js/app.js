import './bootstrap'
import './router.js'
import router from './router.js'

import { createApp } from 'vue'
import App from './App.vue';

const app = createApp({
    components: {
        App,
    }
})
app.use(router)
app.mount('#app')
router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'ЗСРЦН';
    next();
});
