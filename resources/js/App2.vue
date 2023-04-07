<template>
    <div>
        <top-bare></top-bare>
        <div class="flex overflow-hidden">
            <side-bare></side-bare>
            <!-- BEGIN: Content -->
            <div class="content">
                <router-view></router-view>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    
}
</script>