
import './bootstrap';
import { createApp } from 'vue';
import {store} from './store/store';
import Department from './components/Department.vue';
import Form from 'vform';
window.Form = Form;
const app = createApp({});

app.component('department', Department);

window.url = '/';
app.use(store);
app.mount('#app');

