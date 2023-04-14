require('./bootstrap');

import { createApp } from 'vue';
import router from './router';



import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

import App from './App.vue';
import TopBarComponent from './components/template/TopBarComponent.vue';
import SideBarComponent from './components/template/SideBarComponent.vue';
import RightBarComponent from './components/template/RightBarComponent.vue';

import Login from './components/auth/Login.vue'
import AdminLogin from './components/template/AdminLogin.vue'
import Home from './components/Home.vue'

const options = {
    // You can set your default options here
};




const app = createApp(App);

app.component('top-bare', TopBarComponent);
app.component('side-bare', SideBarComponent);
app.component('right-bare', RightBarComponent);
app.component('admin-login', AdminLogin);


app.component(
    'login', Login
    );


function loggedIn(){
    return localStorage.getItem('token')
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
            path: '/login',
            query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else if(to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
            path: '/',
            query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})
app.use(router).mount("#app");

const $toast = useToast();
let instance = $toast.success('You did it!');
// Force dismiss specific toast
instance.dismiss();

// Dismiss all opened toast immediately
$toast.clear();
