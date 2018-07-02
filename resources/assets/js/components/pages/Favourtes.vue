
<template>
    <div class="test">Change password</div>
</template>
<script>
export default {
    beforeCreate () {
        this.$store.commit('setLayout', 'user')
    },
    // beforeCreate () {
    //     this.$store.commit('setLayout', 'user')
    // },
}
</script>
