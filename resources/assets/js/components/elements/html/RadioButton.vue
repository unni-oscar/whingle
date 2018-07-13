<template>
    <label class="radio">
        <input type="radio" ref="name" :value="rIndex" :name="name" v-model="radioButtonValue"> <span>{{rLabel}}</span>
    </label>
</template>
<script>
export default {
    props: [
        'name', 'rLabel', 'value', 'rIndex'
    ],
    computed: {
        radioButtonValue:{
            get: function() {
                return this.value
            },
            set: function() {
                this.$emit('change', this.$refs['name'])
            }
        }
    }
}
</script>