<template>
    <div id="app">
        <header-component></header-component>
        <component  v-bind:is="layout"></component>
        <footer-component></footer-component> 
        Layout: {{layout}}
    </div>    
</template>
<script>
export default {
    name: 'App',
    computed: {
        layout() {
            return this.$store.getters.layout
        }
    },
    components:{
        'header-component': require('./components/elements/Header.vue') ,
        'footer-component' : require('./components/elements/Footer.vue') ,
        'default': require('./components/layouts/Default'),
        'user': require('./components/layouts/User')
    }
}
</script>
<style>
</style>
