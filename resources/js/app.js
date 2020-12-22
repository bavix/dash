import { createApp } from 'vue'
import store from './store'
import Hero from './components/Hero'
import Services from './components/Services'

const app = createApp({
    components: {
        Hero,
        Services,
    }
});

app.use(store);
app.mount('#app');
