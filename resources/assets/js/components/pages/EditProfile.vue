
<template>
    <div class="container">   
       <table>
           <tr>
               <td>Created by</td>
               <td><dropdown  :options="whData.created_by" buttonname="created_by" v-model="profileForm.created_by" ></dropdown>
</td>
            </tr>
            <tr><td>Name</td><td>{{profileForm.name}}</td></tr>
            <tr><td>Date of Birth / Age</td><td>{{profileForm.dob}}</td></tr>
            <tr>
                <td>Gender</td>
                <td><radiobutton v-for="channel in whData.gender" name="gender" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.gender" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Marital Status</td>
                <td><radiobutton v-for="channel in whData.marital" name="marital_status" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.marital_status" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Has Childen?</td>
                <td><radiobutton v-for="channel in whData.yesNo" name="has_children" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.has_children" @change="setValue"></radiobutton></td>
            </tr>
            <tr><td>About</td><td>{{profileForm.created_by}}</td></tr>
            <tr>
                <td>Country Living</td>
                <td><dropdown  :options="countries" v-model="selectedCountry" ></dropdown></td>
                {{profileForm.country_living}}
                </tr>
            <tr>
                <td>State living {{selectedState}}</td>
                <td><dropdown :options="states" v-model="selectedState" ></dropdown></td>
            </tr>
            <tr><td>City Living</td><td>{{profileForm.city_living}}</td></tr>
            
            <tr><td>Mother Tongue</td><td>{{profileForm.mother_tongue_id}}</td></tr>
            <tr><td>Religion</td><td>{{profileForm.religion}}</td></tr>
            <tr><td>Caste</td><td>{{profileForm.caste}}</td></tr>
            <tr>
                <td>Star</td>
                <td><dropdown  :options="whData.star" buttonname="star" v-model="profileForm.star" ></dropdown>
</td>
            </tr>
             <tr>
                <td>Moon sign</td>
                <td><dropdown  :options="whData.moon_sign" buttonname="moon_sign" v-model="profileForm.moon_sign" ></dropdown>
</td>
            </tr>
            <tr>
                <td>Manglik</td>
                <td><radiobutton v-for="channel in whData.manglik" name="manglik" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.manglik" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Horoscope</td>
                <td><radiobutton v-for="channel in whData.horoscope" name="horoscope" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.horoscope" @change="setValue"></radiobutton></td>
            </tr>

            <tr><td>Education</td><td>{{profileForm.education}}</td></tr>
            <tr><td>Education in detail</td><td>{{profileForm.education_in}}</td></tr>
            <tr><td>Job</td><td>{{profileForm.job}}</td></tr>
            <tr><td>Job in detail</td><td>{{profileForm.job_as}}</td></tr>
            <tr><td>Income</td><td>{{profileForm.income}}</td></tr>

            <tr><td>Height</td><td>{{profileForm.height}}</td></tr>
            <tr><td>Weight</td><td>{{profileForm.weight}}</td></tr>
            <tr><td>Build</td><td>{{profileForm.build}}</td></tr>
            <tr><td>Complexion</td><td>{{profileForm.complexion}}</td></tr>
            <tr><td>Blood Group</td><td>{{profileForm.glood_group}}</td></tr>
            <tr><td>Disability</td><td>{{profileForm.disability}}</td></tr>

            <tr>
                <td>Diet</td>
                <td><radiobutton v-for="channel in whData.diet" name="diet" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.diet" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Smoke</td>
                <td><radiobutton v-for="channel in whData.smoke" name="smoke" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.smoke" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Drink</td>
                <td><radiobutton v-for="channel in whData.drink" name="drink" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.drink" @change="setValue"></radiobutton></td>
            </tr>

            <tr>
                <td>Father</td>
                <td><radiobutton v-for="channel in whData.father" name="father" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.father" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Mother</td>
                <td><radiobutton v-for="channel in whData.mother" name="mother" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.mother" @change="setValue"></radiobutton></td>
            </tr>
            <tr><td>Sissters</td><td>{{profileForm.sisters}}</td></tr>
            <tr><td>Sisters married</td><td>{{profileForm.sisters_married}}</td></tr>
            <tr><td>Brothers</td><td>{{profileForm.brothers}}</td></tr>
            <tr><td>Brothers married</td><td>{{profileForm.brothers_married}}</td></tr>
            <tr>
                <td>Family Type</td>
                <td><radiobutton v-for="channel in whData.family_type" name="family_type" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.family_type" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Family Status</td>
                <td><radiobutton v-for="channel in whData.family_status" name="family_status" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.family_status" @change="setValue"></radiobutton></td>
            </tr>
            <tr>
                <td>Family Values</td>
                <td><radiobutton v-for="channel in whData.family_values" name="family_values" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.family_values" @change="setValue"></radiobutton></td>
            </tr>

            <tr><td>Hobbies</td><td>{{profileForm.hobbies}}</td></tr>
            <tr><td>Interests</td><td>{{profileForm.intererts}}</td></tr>

            <tr><td>Address</td><td>{{profileForm.address}}</td></tr>
            <tr><td>Contact Number</td><td>{{profileForm.contact_number}}</td></tr>
        </table>
    </div>
</template>
<script>
import Dropdown from '../elements/html/Dropdown'
import Radiobutton from '../elements/html/RadioButton'
export default {
    components: {
        'dropdown': Dropdown,
        'radiobutton': Radiobutton
    },
    data: function() {
        return {
            res: {},
            countries: {},
            states:{},
            selectedCountry: {},
            selectedState: {},
            whData:{},
            profileForm: {
                name : '',
                dob : '',
                gender : '',
                about : '',
                blood_group : '',
                brothers : '',
                brothers_married : '',
                build : '',
                caste : '',
                city_living : '',
                complexion : '',
                contact_number : '',
                country_living : '',
                created_by : '',
                diet : '',
                disability : '',
                drink : '',
                education : '',
                education_in : '',
                family_status : '',
                family_type : '',
                family_values : '',
                father : '',
                gender : '',
                has_children : '',
                height : '',
                horoscope : '',
                income : '',
                interests : '',
                job : '',
                job_as : '',
                manglik : '',
                marital_status : '',
                moon_sign : '',
                mother : '',
                mother_tongue_id : ''
            }
        }
    },
    beforeCreate () {
        this.$store.commit('setLayout', 'user')
    },
    computed: {
        layout() {
            return this.$store.getters.layout
        }
    },
    mounted(){
        axios.get('/api/user/profile/edit').then(response => response.data).then(response => {
            this.res = response.profile
            //console.log(this.res)
            this.whData = response.whData;
            this.createdBy = response.whData.created_by;
            this.gender = response.whData.gender
            this.marital = response.whData.marital
            this.yesNo = response.whData.yesNo
            this.countries = response.countries;
            this.profileForm.name = this.res.name;
            this.profileForm.dob = this.res.dob;
            this.profileForm.gender = this.res.gender;
            this.profileForm.about = this.res.about;
            this.profileForm.blood_group = this.res.blood_group;
            this.profileForm.brothers = this.res.brothers;
            this.profileForm.brothers_married = this.res.brothers_married;
            this.profileForm.build = this.res.build;
            this.profileForm.caste = this.res.caste;
            this.profileForm.city_living = this.res.city_living;
            this.profileForm.complexion = this.res.complexion;
            this.profileForm.contact_number = this.res.contact_number;
            this.selectedCountry = 1;
            this.selectedState = 1;
            this.profileForm.country_living = 1; //this.res.country_living;
            this.profileForm.created_by = this.res.created_by;
            this.profileForm.diet = this.res.diet;
            this.profileForm.disability = this.res.disability;
            this.profileForm.drink = this.res.drink;
            this.profileForm.education = this.res.education;
            this.profileForm.education_in = this.res.education_in;
            this.profileForm.family_status = this.res.family_status;
            this.profileForm.family_type = this.res.family_type;
            this.profileForm.family_values = this.res.family_values;
            this.profileForm.father = this.res.father;
            this.profileForm.gender = this.res.gender;
            this.profileForm.has_children = this.res.has_children;
            this.profileForm.height = this.res.height;
            this.profileForm.horoscope = this.res.horoscope;
            this.profileForm.income = this.res.income;
            this.profileForm.interests = this.res.interests;
            this.profileForm.job = this.res.job;
            this.profileForm.job_as = this.res.job_as;
            this.profileForm.manglik = this.res.manglik;
            this.profileForm.marital_status = this.res.marital_status;
            this.profileForm.moon_sign = this.res.moon_sign;
            this.profileForm.mother = this.res.mother;
            this.profileForm.mother_tongue_id = this.res.mother_tongue_id;
            this.profileForm.religion = this.res.religion;
            this.profileForm.sisters = this.res.sisters;
            this.profileForm.sisters_married = this.res.sisters_married;
            this.profileForm.smoke = this.res.smoke;
            this.profileForm.star = this.res.star;
            this.profileForm.state_living = this.res.state_living;
            this.profileForm.weight = this.res.weight;
        });
    },
    methods: {
        getStates() {
            var self = this
            if (self.selectedCountry > 0) {
                axios.get('/api/states/' + self.selectedCountry)
                .then(function (response) {
                    self.states = response.data
                })
                .catch(function (error) {
                    console.log(error); 
                });
            }
        },
        setValue: function (obj) {      
            this.profileForm[obj.name] = obj.rIndex
        }
    },
    watch: {
        selectedCountry: function( ) {
            this.getStates()
            this.profileForm.country_living = this.selectedCountry
            this.selectedState = this.res.state_living
        },
        selectedState: function( ) {
            this.profileForm.state_living = this.selectedState
        }
    }
    // beforeCreate () {
    //     this.$store.commit('setLayout', 'user')
    // },
}
</script>
