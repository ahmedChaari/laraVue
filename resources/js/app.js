
require('./bootstrap')
import { createApp } from 'vue';
import router from './router';

import App from './App.vue';
import TopBarComponent from './components/template/TopBarComponent.vue';
import SideBarComponent from './components/template/SideBarComponent.vue';
import RightBarComponent from './components/template/RightBarComponent.vue';

import Login from './components/auth/Login.vue'
import AdminLogin from './components/template/AdminLogin.vue'
import Home from './components/Home.vue'




const app = createApp(App);

app.component('top-bare', TopBarComponent);
app.component('side-bare', SideBarComponent);
app.component('right-bare', RightBarComponent);
app.component('admin-login', AdminLogin);


app.component(
    
    'login', Login
    
    );

app.use(router).mount("#app");