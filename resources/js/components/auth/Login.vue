<template>
    <div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0 mt-4 logi-vue">

                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <form @submit.prevent="login">





         

                           
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account.</div>

                        <div class="intro-x mt-8">
                            <input id="email" type="email" class="intro-x login__input form-control py-3 px-4 block " 
                            placeholder="Email" name="email" required autocomplete="email" autofocus v-model="email">
                            
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 " 
                            placeholder="Password" name="password"  required autocomplete="current-password" v-model="password">
                           
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
                            <button type="submit" class="btn btn-outline-primary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">login</button>
                            <router-link :to="{ name:'company.index'}" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
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
</template>


<script>
import store from '../store';
export default {

    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        login() {
            axios.post('api/login', {
                email: this.email,
                password: this.password
            })
               

                    .then(response => {
                    
                       

                  store.state.user.token = res.data.token;
                    console.log(store.state.user.token);
                    this.$router.push('/home');
                })
                .catch(err => console.log(err));
                console.log('not work');
        }
    }
    
}
</script>
<style>
.logi-vue{

    margin-top: 118px !important;
}
</style>