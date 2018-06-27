<template>
    <!-- Content Row -->
    <div class="row">
        <user-sidebar></user-sidebar>
        <user-main></user-main>
    </div>
</template>

<script>
export default {
    beforeCreate () {
        this.$store.commit('setLayout', 'user')
    },
    components:{
        'user-sidebar' :require('../elements/Sidebar'),
        'user-main' :require('../elements/DashboardMain')
    },
}
</script>
