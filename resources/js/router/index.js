import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';
import ListUser from '../components/user/ListUser.vue';
import ListCompany from '../components/company/ListCompany.vue'
import Home from '../components/Home.vue'
import Dashboard from '../components/dashboard.vue'

import store from "../components/store";

import Login from "../components/auth/Login.vue"
import EmailChangePassword from '../components/changePassword/ChangePassword.vue'
import notFound from '../components/notFound/notFound.vue'



const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path:'/dashboard',
        component: Dashboard,
        name: 'dashboard.index',
        meta: {requiresAuth: true}

    },
    {
        path:'/email-change-password',
        component: EmailChangePassword,
        name: 'change.password',
       // meta: {requiresAuth: true}

    },

    {
        path:'/',
        component: Home,
        name: 'home.index',
        meta: {requiresAuth: false}

    },
    {   path:'/users', component: ListUser,
        name: 'user.index',
        meta: {requiresAuth: true}
     },
    {   path:'/companies', component: ListCompany,
        name: 'company.index' ,
        meta: {requiresAuth: true}},
    //not found
    {
        path: '/:pathMatch(.*)*',
        component:notFound,
    }

];

const router = createRouter({
    history:createWebHistory(),
    routes
})

router.beforeEach((to, from) => {
    if (to.meta.requiresAuth && !localStorage.getItem('token')) {
       return { name: 'Login'};
    }

    if (to.meta.requiresAuth == false && localStorage.getItem('token')) {
        return { name: '/'}
    }
 });

export default router;
