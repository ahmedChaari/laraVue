<template>
    <div>
        <div class="login">
            <div class="container sm:px-10">
                <div class="block xl:grid grid-cols-2 gap-4">
                    <admin-login></admin-login>

                        <!-- BEGIN: Login Form -->
                    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0 mt-4 logi-vue">
                        <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

                            <h1>change heeer</h1>
                        </div>
                    </div>
                        <!-- END: Login Form -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import adminLogin from '../template/AdminLogin.vue'

export default {
    components: {
        adminLogin,

  },
}
</script>
