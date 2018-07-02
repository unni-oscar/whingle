<template>
  <div> 
    <select v-model="selectedOption"  @input="event => { $emit('input', event.target.value) }">
        <option disabled selected value="">Select...</option>
        <option v-for="(option) in options" :key="option.id" :value="option.id">{{ option.name }}</option>
    </select>
  </div>
</template>
<script>
export default {
    data () {
        return {
            selectedOption: null
        }
    },
    props: {
        options: {
            type: [Object, Array],
            required: true      
        },
        value : {  }
    },
    mounted () {
        this.selectedOption = this.value
        //console.log(options)
    },
    watch: {
        value: function (newValue) {
            this.selectedOption = newValue
        }
    }
}

</script>