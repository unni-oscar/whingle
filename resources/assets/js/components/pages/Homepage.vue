<template>
<div>
    <main-component></main-component>
    <content-component></content-component>
</div>
</template>
<script>
export default {
    beforeCreate () {
        this.$store.commit('setLayout', 'default')
    },
    components:{
        'main-component' : require('../elements/Main.vue'),
        'content-component' : require('../elements/Content.vue'),
    }
}
</script>
