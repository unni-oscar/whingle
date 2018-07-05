<template>
    <div id="app">
        <notifications />
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

body {
  padding-top: 54px;
}

@media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
}

.carousel-item {
  height: 65vh;
  min-height: 300px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.portfolio-item {
  margin-bottom: 30px;
}
</style>
