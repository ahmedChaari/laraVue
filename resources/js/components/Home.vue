<template>
    <div>
        <div class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <admin-login></admin-login>

                    <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0 mt-4 logi-vue">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>


                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <router-link :to="{ name:'Login'}" class="btn btn-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                                Login
                            </router-link>
                            </div>
                        <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                            By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> &
                            <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a> </div>


                    </div>

                </div>
                    <!-- END: Login Form -->
            </div>

                </div>
            </div>
        </div>
</template>


<script>
import adminLogin from './template/AdminLogin.vue'


export default {
    components: {
        adminLogin,

  },



}
</script>
<style>
.logi-vue{

    margin-top: 118px !important;
}
</style>
