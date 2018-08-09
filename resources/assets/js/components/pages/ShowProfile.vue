<template>
    <div class="container">
        
              <table>
           <tr><td>Created by</td><td>{{ getKeyVal(profileForm.created_by, whDataCollection.created_by) }}</td></tr>
            <tr><td>Name</td><td>{{profileForm.name}}</td></tr>
             <tr><td>Age</td><td>{{ getAge(profileForm.dob) }}</td></tr>
            <tr><td>Sex</td><td>{{ getKeyVal(profileForm.gender,whDataCollection.gender) }}</td></tr>
            <tr><td>Marital Status</td><td>{{ getKeyVal(profileForm.marital_status,whDataCollection.marital) }}</td></tr>
            <tr><td>Has Children?</td><td>{{ getKeyVal(profileForm.has_children,whDataCollection.yesNo) }}</td></tr>
            <tr><td>About</td><td>{{profileForm.about}}</td></tr>

            <tr><td>Country Living</td><td>{{profileForm.country_living}}</td></tr>
            <tr><td>State living</td><td>{{profileForm.state_living}}</td></tr>
            <tr><td>City Living</td><td>{{profileForm.city_living}}</td></tr>
            
          <!--  <tr><td>Mother Tongue</td><td>{{profileForm.mother_tongue_id}}</td></tr>
            <tr><td>Religion</td><td>{{profileForm.religion}}</td></tr>
            <tr><td>Caste</td><td>{{profileForm.caste}}</td></tr> -->
            <tr><td>Star</td><td>{{ getKeyVal(profileForm.star,whDataCollection.star) }}</td></tr>
            <tr><td>Moon Sign</td><td>{{ getKeyVal(profileForm.moon_sign,whDataCollection.moon_sign) }}</td></tr>
            <tr><td>Manglik?</td><td>{{ getKeyVal(profileForm.manglik,whDataCollection.manglik) }}</td></tr>
            <tr><td>Horoscope</td><td>{{ getKeyVal(profileForm.horoscope,whDataCollection.horoscope) }}</td></tr> 

            <!-- <tr><td>Education</td><td>{{profileForm.education}}</td></tr>
            <tr><td>Education in detail</td><td>{{profileForm.education_in}}</td></tr>
            <tr><td>Job</td><td>{{profileForm.job}}</td></tr>
            <tr><td>Job in detail</td><td>{{profileForm.job_as}}</td></tr>
            <tr><td>Income</td><td>{{profileForm.income}}</td></tr>-->

            <tr><td>Height</td><td>{{ getKeyVal(profileForm.height,whDataCollection.height) }}</td></tr>
            <tr><td>Weight</td><td>{{ getKeyVal(profileForm.weight,whDataCollection.weight) }}</td></tr>
            <tr><td>Build</td><td>{{ getKeyVal(profileForm.build,whDataCollection.build) }}</td></tr>
            <tr><td>Complexion</td><td>{{ getKeyVal(profileForm.complexion,whDataCollection.complexion) }}</td></tr>
            <tr><td>Blood Group</td><td>{{ getKeyVal(profileForm.blood_group,whDataCollection.blood_group) }}</td></tr>
            <tr><td>Disability</td><td>{{ getKeyVal(profileForm.disability,whDataCollection.disability) }}</td></tr> 

            <tr><td>Diet</td><td>{{ getKeyVal(profileForm.diet,whDataCollection.diet) }}</td></tr>
             <tr><td>Smoke</td><td>{{ getKeyVal(profileForm.smoke,whDataCollection.smoke) }}</td></tr>
            <tr><td>Drink</td><td>{{ getKeyVal(profileForm.drink,whDataCollection.drink) }}</td></tr>

            <tr><td>Father</td><td>{{ getKeyVal(profileForm.father,whDataCollection.father) }}</td></tr>
            <tr><td>Mother</td><td>{{ getKeyVal(profileForm.mother,whDataCollection.mother) }}</td></tr>
            <tr><td>Sisters</td><td>{{ getKeyVal(profileForm.sisters,whDataCollection.bro_sis) }}</td></tr>
            <tr><td>Sisters married</td><td>{{ getKeyVal(profileForm.sisters_married,whDataCollection.bro_sis) }}</td></tr>
            <tr><td>Brothers</td><td>{{ getKeyVal(profileForm.brothers,whDataCollection.bro_sis) }}</td></tr>
            <tr><td>Brothers married</td><td>{{ getKeyVal(profileForm.sisters_married,whDataCollection.bro_sis) }}</td></tr>
            <tr><td>Family Type</td><td>{{ getKeyVal(profileForm.family_type,whDataCollection.family_type) }}</td></tr>
            <tr><td>Family Status</td><td>{{ getKeyVal(profileForm.family_status,whDataCollection.family_status) }}</td></tr>
            <tr><td>Family Values</td><td>{{ getKeyVal(profileForm.family_values,whDataCollection.family_values) }}</td></tr>

            <tr><td>Hobbies</td><td>{{profileForm.hobbies}}</td></tr>
            <tr><td>Interests</td><td>{{profileForm.intererts}}</td></tr>

            <tr><td>Address</td><td>{{profileForm.address}}</td></tr>
            <tr><td>Contact Number</td><td>{{profileForm.contact_number}}</td></tr>
        </table>
    </div>
</template>
<script>
import Dropdown from '../elements/html/Dropdown'
import helper   from '../services/helper'

let PropArr = [
        { toConvert : [
            "created_by", "diet", "height", "weight", "build", "complexion", "blood_group", "disability",
            "smoke", "drink", "father", "mother", "bro_sis", "family_type", "family_status", "family_values",
            "gender", "marital", "yesNo", "star", "moon_sign", "manglik", "horoscope"
            ]
        }, 
        { normal: [
            "name", "dob", "hobbies", "interests", "address", "contact_number", "about", "country_living",
            "state_living", "city_living"
            ]
        },
        { extra: [
            "sisters", "sisters_married", "brothers", "brothers_married", "has_children", "marital_status"
            ]
        }
    ];

export default {
    components: {
        'dropdown': Dropdown
    },
    data: function() {
        return {
            whDataCollection: {},
            id: 0,
            profileForm: {}
        }
    },
    created() {
        this.id = this.$route.params.id;
        this.initializeCollection(true)
    },
    beforeCreate () {
        this.$store.commit('setLayout', 'default')
    },
    computed: {
        layout() {
            return this.$store.getters.layout
        }
    },
    methods: {
        getKeyVal(key, data) {
            return helper.getValueByKey(key, data)
        },
        getAge(dob) {
            return helper.getAge(dob)
        },
        initializeCollection(initialize, data) {
            var self = this

            for (var items in PropArr) {
                
                for (let [key, value] of Object.entries(PropArr[items])) {  
                    
                    for (var i in value) {
                        
                        if(true == initialize) {
                            
                            //generated the list from which actual name is displayed
                            if('toConvert' == key) {
                                this.$set(this.whDataCollection, value[i] , '')
                            }
                        } else {
                            // Assigning field value to data 
                            this.profileForm[value[i]] = data[value[i]]
                        }
                    }
                }
            }
        }
    },
    mounted(){
        let self = this
        axios.get('/api/profile/' +  this.id,  ).then(response => response.data).then(response => {
            self.whDataCollection = response.whData;
            self.initializeCollection(false, response.profile)
        })        
    }
}
</script>
