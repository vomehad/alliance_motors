import './assets/main.css';
import '@splidejs/splide/dist/css/splide.min.css';

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import globalComponents from './components/global'
import VueSplide from '@splidejs/vue-splide';

const app = createApp(App)

export const API_URL = import.meta.env.VITE_API_URL

app.use(router)
app.use(globalComponents);
app.use( VueSplide );
app.mount('#app')
