<template>
    <div>
        <div class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <admin-login></admin-login>

                    <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0 mt-4 logi-vue">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <form @submit.prevent="login">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>
                        <div class="intro-x mt-8">
                            <span class="text-danger" v-if="error">{{ error }}</span>

                            <input id="email" type="email" class="intro-x login__input form-control py-3 px-4 block "
                            placeholder="Email" name="email" required autocomplete="email" autofocus v-model="form.email">

                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 "
                            placeholder="Password" name="password"  required autocomplete="current-password" v-model="form.password">

                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input name="remember" id="remember" type="checkbox" class="form-check-input border mr-2" >
                                <label class="cursor-pointer select-none" for="remember-me">Remember Me</label>
                            </div>
                            <a  href="#">
                                Forgot Your Password?
                            </a>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top mr-4">login</button>
                            <router-link :to="{ name:'company.index'}" class="btn btn-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                                Register
                            </router-link>
                            </div>
                        <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                            By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> &
                            <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a> </div>
                    </form>

                    </div>

                </div>
                    <!-- END: Login Form -->
            </div>

                </div>
            </div>
        </div>
</template>


<script>

import store from '../store/index'
import adminLogin from '../template/AdminLogin.vue'
import { ref } from 'vue'

let error = ref('');

export default {
    components: {
        adminLogin,

  },
    data() {
        return {
            form :{email: '',password: ''},
            errors:{},
            email: '',
            password: '',


        }
    },
    methods: {
      async  handlelogin() {
            try {
               // await axios.get('/sanctum/csrf-cookie');
                await axios.post('api/login',
                this.form
            )
            .then (response =>{
                  store.state.user.token = res.data.token;

                    window.location = '/users';
                })


            } catch (error) {
                this.error = error.response.data.errors
            }
        },


        async   login() {
            axios.get('/sanctum/csrf-cookie').then(response => {

                axios.post('api/login', this.form)
                        .then(response => {
                            if (response.data.success){
                             localStorage.setItem('token',response.data.token);
                             window.location = '/dashboard';
                      }else{
                        error.value = response.data.message;
                      }
                    })
            })


        }
    }

}
</script>
<style>
.logi-vue{

    margin-top: 118px !important;
}
</style>
