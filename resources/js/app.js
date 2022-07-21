import './bootstrap';

import { createApp } from 'vue';

import CredentialComponent from './components/credential/CredentialComponent.vue';
import ClientComponent from './components/client/ClientComponent.vue';
import CompanyComponent from './components/company/CompanyComponent.vue';
import bulma from 'bulma/css/bulma.css';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';



const app = createApp({});

app.component('credential', CredentialComponent);
app.component('client', ClientComponent);
app.component('company', CompanyComponent);



app.mount('#app');
app.use(bulma);
app.use(VueSweetalert2);
app.use(axios);









