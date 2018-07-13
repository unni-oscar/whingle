import VeeValidate from 'vee-validate'

Vue.use(VeeValidate,{
    fieldsBagName: 'vFields',
    dictionary: {
        en: {
            custom: {
                dob: {
                    required: 'Please select date of birth'
                },
                created_by: {
                    required: 'Please select \'created by\''
                },
                name: {
                    required: 'Please enter name'
                },
                gender: {
                    required: 'Please select gender'
                },
                marital_status: {
                    required: 'Please select marital status'
                },
            }
        }
    }
})
export default {

}