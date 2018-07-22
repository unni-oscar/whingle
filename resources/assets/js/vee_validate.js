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
                    required: 'Please select \'created by\'',
                    min_value: 'Please make a valid selection',
                    max_value: 'Please make a valid selection'
                },
                name: {
                    required: 'Please enter name'
                },
                gender: {
                    required: 'Please select gender',
                    included: 'Please select a valid gender'
                },
                marital_status: {
                    required: 'Please select marital status',
                    included: 'Please select a valid marital status'
                },
                'contact_number': {
                    'required' : 'The contact number field is required.',
                    'numeric' : 'The contact number field may only contain numeric characters.',
                    'max' : 'The contact number field may not be greater than 15 characters.'

                }
            }
        }
    }
})
export default {

}