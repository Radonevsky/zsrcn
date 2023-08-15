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
