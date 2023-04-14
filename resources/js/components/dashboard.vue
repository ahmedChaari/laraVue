<template>
    <div>
        <!-- BEGIN: Content -->
        <topBare></topBare>
        <div class="flex overflow-hidden">
            <sideBare></sideBare>
            <div class="content">
            <h1> home commponent gooddd</h1>
            </div>
        <!-- END: Content -->
        </div>
    </div>
</template>
<script>

import topBare from './template/TopBarComponent.vue'
import sideBare from './template/SideBarComponent.vue'



export default{
    components: {
        topBare,
        sideBare,
    },
}

</script>
