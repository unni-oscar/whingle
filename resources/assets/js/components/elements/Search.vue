<template>
    <!-- Content Column -->
    <div class="container">
      <form  autocomplete="off" @submit.prevent="validateBeforeSubmit" >
       
        <div class="col-md-11 mt-5 mb-5">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">
                        Search
                    </h4>
                </div>
                <div class="card-body">
                    <div class="form-group row"> 
                        <label for="smoke" class="col-md-3" >Looking for</label>
                        <div class="col-sm-9">
                        <input type="radio" name='gender' value="2" v-model="searchForm.gender"  v-validate="'required|included:1,2'"/>
                        <label for="created_by">Bride</label>
                        <input type="radio" name="gender" value="1" v-model="searchForm.gender" v-validate="'required|included:1,2'" />
                        <label for="created_by" >Groom</label>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="smoke" class="col-md-3" >Age</label>
                        <div class="col-sm-9"> 
                            <dropdown  cl="col-md-2 form-control" :options="whData.age" name="age_from"  v-model.number="age_from" ></dropdown>
                            <label for="created_by" >to</label>
                            <dropdown  cl="col-md-2 form-control" :options="whData.age" name="age_to"  v-model.number="age_to" ></dropdown>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-info">Search</button>
                </div>
            </div>
        </div>
      </form>
        <div v-if="!searchResult">No profiles matching your searh criteria</div>
        <div class="col-md-11 mt-5" v-for="profile in profiles">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4>{{ profile.name }} </h4> 
                    Lives in : Cochin, Kerala, India
                    <p>Last Online: {{ lastLogin(profile.user['updated_At']) }}</p> 
                    <!-- Need to change this to last_login field, to be added to table -->
                    <h6 class="card-title">
                        Created by: {{getKeyVal(profile.created_by,whDataCollection.created_by)}} <br>
                        {{getKeyVal(profile.marital_status,whDataCollection.marital)}} | {{ getAge(profile.dob) }} | {{getKeyVal(profile.height,whDataCollection.height)}} <br>
                        Religion: Hindu | Caste : Ezhava <br>
                        Education: MSc Computer Science<br>
                        Job : Software Engineer, Private Sector<br>
                        Yearly Income: 4 Lakhs
                    </h6>
                    <p>
                    <router-link :to="{ name: 'ShowProfile', params: { id: profile.id }}" target="_blank">View complete profile</router-link>                    
                    </p>
                    <p>
           <small> Send message | Express interest | Add to favourites | Request Contact | Request horoscope | Print | Report </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Dropdown from '../elements/html/Dropdown'
import api from '../services/api'
import helper   from '../services/helper'

export default {
    data: function() {
        return {
            searchResult: true,
            whData:{},
            whDataCollection:{},
            profiles: {},
            age_from: 22,
            age_to: 25,
            searchForm: new Form({
                dob_from: helper.getBackDate(22),
                dob_to: helper.getBackDate(26),
                gender: ''
            }, false)
        }
    },
    components: {
        'dropdown': Dropdown
    },
    props: ['bc-name'],
    watch: {
        'age_from' : function(obj) {
            this.searchForm.dob_from =  helper.getBackDate(obj) 
        },
        'age_to' : function(obj) {
            let to = obj + 1
            this.searchForm.dob_to =  helper.getBackDate(obj+1)
        }
    },
    mounted(){
        
        // console.log(this.searchForm.dob_from.diff(moment(new Date()), 'year'))
        // console.log(moment().subtract(18, 'year'))
        axios.get('/api/user/search').then(response => response.data).then(response => {
            this.res = response.profile
            this.whData = response.data;
            this.whDataCollection = response.whData
            // console.log(this.getValueByKey (150,this.whDataCollection.height ))
            // this.searchForm.dob_to = JSON.parse(this.whDataCollection)
        });
    },
    methods:{
        lastLogin(lastLogin) {
           return helper.getLastLogin(lastLogin)
        }, 
        getKeyVal(key, data) {
            return helper.getValueByKey(key, data)
        },
        getAge(dob) {
            return helper.getAge(dob)
        },
        validateBeforeSubmit () {
            var vm = this

            this.$validator.validateAll().then((result) => {                
                if(result) {
                    this.searchForm.post('/api/user/search').then(response => {
                        this.profiles = response.profiles
                        this.searchResult = response.profiles.length
                    }).catch(response => {
                        console.log('error')
                    })
                    // return axios.post(api.posts)
                    // axios.post('/api/user/search', this.searchForm).then(response =>  {
                    //     this.$notify({
                    //         type: 'success',
                    //         title: 'Success',
                    //         text: response.data.message
                    //     });
                        
                    // }).catch(error => {
                    //     $.each(error.response.data.message, function(key, message) {
                    //         var field = vm.$validator.fields.find({ name: field});
                    //         vm.$validator.errors.add({
                    //         id: field.id,
                    //         field: key,
                    //         msg: message[0],
                    //         });
                    //     })
                    // });
                } else {
                }
            })
        }
    }
}
</script>