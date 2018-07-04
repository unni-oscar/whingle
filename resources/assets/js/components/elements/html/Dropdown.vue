<template>
  <div> 
    <select v-model="selectedOption" :name="name"   @input="event => { $emit('input', event.target.value) }" v-validate="validation">
        <option  selected value="">Select...</option>
      <option v-for="(option) in options" :key="option.id" :value="option.id">{{ option.name }}</option>
    </select>
     <p v-show="errors.has(name)" class="text-danger"> {{ errors.first(name) }}</p>
  </div>
</template>

<script>

export default {
    data () {
        return {
            selectedOption: null
        }
    },
    inject: ['$validator'], // inject parent validator
    props: {
        options: {},
        value : {},
        validation: {},
        name: {}
    },
    mounted () {
        this.selectedOption = this.value
    },
    watch: {
        value: function (newValue) {
            this.selectedOption = newValue
        }
    }
}
</script>