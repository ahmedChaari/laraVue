import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';
import ListUser from '../components/user/ListUser.vue';
import ListCompany from '../components/company/ListCompany.vue'
import Home from '../components/Home.vue'

import store from "../components/store";

import Login from "../components/auth/Login.vue"

import notFound from '../components/notFound/notFound.vue'



const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login
    },


    {
        path:'/home',
        component: Home,
        name: 'home.index',
       // meta: {requiresAuth: true}

    },
    { path:'/users', component: ListUser,  name: 'user.index',
    // meta: {requiresAuth: true}
     },
    { path:'/companies', component: ListCompany,  name: 'company.index' },
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

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({name: 'Login'});
    } else {
        next();
    }
});

export default router;
