
<template>
    <div class="container">
       
        <router-link class="nav-link" v-bind:to="'/user/profile/edit'">Edit</router-link>
       <table>
           <tr><td>Created by</td><td>{{profileForm.created_by}}</td></tr>
            <tr><td>Name</td><td>{{profileForm.name}}</td></tr>
            <tr><td>Date of Birth / Age</td><td>{{profileForm.dob}}</td></tr>
            <tr><td>Sex</td><td>{{profileForm.gender}}</td></tr>
            <tr><td>Marital Status</td><td>{{profileForm.marital_status}}</td></tr>
            <tr><td>Has Children?</td><td>{{profileForm.has_children}}</td></tr>
            <tr><td>About</td><td>{{profileForm.about}}</td></tr>

            <tr><td>Country Living</td><td>{{profileForm.country_living}}</td></tr>
            <tr><td>State living</td><td>{{profileForm.state_living}}</td></tr>
            <tr><td>City Living</td><td>{{profileForm.city_living}}</td></tr>
            
            <tr><td>Mother Tongue</td><td>{{profileForm.mother_tongue_id}}</td></tr>
            <tr><td>Religion</td><td>{{profileForm.religion}}</td></tr>
            <tr><td>Caste</td><td>{{profileForm.caste}}</td></tr>
            <tr><td>Star</td><td>{{profileForm.star}}</td></tr>
            <tr><td>Moon Sign</td><td>{{profileForm.moon_sign}}</td></tr>
            <tr><td>Manglik?</td><td>{{profileForm.manglik}}</td></tr>
            <tr><td>Horoscope</td><td>{{profileForm.horoscope}}</td></tr>

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

            <tr><td>Diet</td><td>{{profileForm.diet}}</td></tr>
            <tr><td>Smoke</td><td>{{profileForm.smoke}}</td></tr>
            <tr><td>Drink</td><td>{{profileForm.drink}}</td></tr>

            <tr><td>Father</td><td>{{profileForm.father}}</td></tr>
            <tr><td>Mother</td><td>{{profileForm.mother}}</td></tr>
            <tr><td>Sissters</td><td>{{profileForm.sisters}}</td></tr>
            <tr><td>Sisters married</td><td>{{profileForm.sisters_married}}</td></tr>
            <tr><td>Brothers</td><td>{{profileForm.brothers}}</td></tr>
            <tr><td>Brothers married</td><td>{{profileForm.brothers_married}}</td></tr>
            <tr><td>Family Type</td><td>{{profileForm.family_type}}</td></tr>
            <tr><td>Family Status</td><td>{{profileForm.family_status}}</td></tr>
            <tr><td>Family Values</td><td>{{profileForm.family_values}}</td></tr>

            <tr><td>Hobbies</td><td>{{profileForm.hobbies}}</td></tr>
            <tr><td>Interests</td><td>{{profileForm.intererts}}</td></tr>

            <tr><td>Address</td><td>{{profileForm.address}}</td></tr>
            <tr><td>Contact Number</td><td>{{profileForm.contact_number}}</td></tr>





        </table>
    </div>
</template>
<script>
import Dropdown from '../elements/html/Dropdown'
export default {
    components: {
        'dropdown': Dropdown
    },
    data: function() {
        return {
            selectedFruit: '',
            fruitOptions: {
                '1': 'Apple',
                '2': 'Banana',
                '3': 'Blueberry',
                '4': 'Kiwi',
                '5': 'Pear',
                '6': 'Pineapple',
                '7': 'Watermelon'
            },
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
        axios.get('/api/user/profile').then(response => response.data).then(response => {
            console.log(response.profile)
            this.profileForm.name = response.profile.name;
            this.profileForm.dob = response.profile.dob;
            this.profileForm.gender = response.profile.gender;
            this.profileForm.about = response.profile.about;
            this.profileForm.blood_group = response.profile.blood_group;
            this.profileForm.brothers = response.profile.brothers;
            this.profileForm.brothers_married = response.profile.brothers_married;
            this.profileForm.build = response.profile.build;
            this.profileForm.caste = response.profile.caste;
            this.profileForm.city_living = response.profile.city_living;
            this.profileForm.complexion = response.profile.complexion;
            this.profileForm.contact_number = response.profile.contact_number;
            this.profileForm.country_living = response.profile.country_living;
            this.profileForm.created_by = response.profile.created_by;
            this.profileForm.diet = response.profile.diet;
            this.profileForm.disability = response.profile.disability;
            this.profileForm.drink = response.profile.drink;
            this.profileForm.education = response.profile.education;
            this.profileForm.education_in = response.profile.education_in;
            this.profileForm.family_status = response.profile.family_status;
            this.profileForm.family_type = response.profile.family_type;
            this.profileForm.family_values = response.profile.family_values;
            this.profileForm.father = response.profile.father;
            this.profileForm.gender = response.profile.gender;
            this.profileForm.has_children = response.profile.has_children;
            this.profileForm.height = response.profile.height;
            this.profileForm.horoscope = response.profile.horoscope;
            this.profileForm.income = response.profile.income;
            this.profileForm.interests = response.profile.interests;
            this.profileForm.job = response.profile.job;
            this.profileForm.job_as = response.profile.job_as;
            this.profileForm.manglik = response.profile.manglik;
            this.profileForm.marital_status = response.profile.marital_status;
            this.profileForm.moon_sign = response.profile.moon_sign;
            this.profileForm.mother = response.profile.mother;
            this.profileForm.mother_tongue_id = response.profile.mother_tongue_id;
            this.profileForm.religion = response.profile.religion;
            this.profileForm.sisters = response.profile.sisters;
            this.profileForm.sisters_married = response.profile.sisters_married;
            this.profileForm.smoke = response.profile.smoke;
            this.profileForm.star = response.profile.star;
            this.profileForm.state_living = response.profile.state_living;
            this.profileForm.weight = response.profile.weight;
        });
    }
    // beforeCreate () {
    //     this.$store.commit('setLayout', 'user')
    // },
}
</script>
