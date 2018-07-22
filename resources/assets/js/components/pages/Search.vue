<template>
    <!-- Content Row -->
    <div class="row">
        <search-sidebar ></search-sidebar>
        <user-main></user-main>
    </div>
</template>

<script>
export default {
    // data: function() {
    //     searchResult = false;
    // },
    beforeCreate () {
        this.$store.commit('setLayout', 'user')
    },
    components:{
        'search-sidebar' :require('../elements/SearchSidebar'),
        'user-main' :require('../elements/DashboardMain')
    },
}
</script>
