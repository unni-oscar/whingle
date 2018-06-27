
<template>
    <div class="test">Profile page {{layout}}</div>
</template>
<script>
export default {
    beforeCreate () {
        this.$store.commit('setLayout', 'user')
    },
    computed: {
        layout() {
            return this.$store.getters.layout
        }
    },
    // beforeCreate () {
    //     this.$store.commit('setLayout', 'user')
    // },
}
</script>
