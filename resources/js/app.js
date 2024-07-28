
import './bootstrap';
import { createApp } from 'vue';

import Department from './components/Department.vue';
import Form from 'vform';
window.Form = Form;
const app = createApp({});

app.component('department', Department);

window.url = '/';
app.mount('#app');

