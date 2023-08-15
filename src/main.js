import './assets/main.css';
import '@splidejs/splide/dist/css/splide.min.css';

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import globalComponents from './components/global'
import Splide from '@splidejs/vue-splide';

const app = createApp(App)

app.use(router)
app.use(globalComponents);
app.use(Splide);
app.mount('#app')