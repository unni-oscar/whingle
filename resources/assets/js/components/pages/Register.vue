
<template>
    <div class="container">
      <form @submit.prevent="validateBeforeSubmit" autocomplete="off" >
        <div class="col-md-11 mt-5"  v-if="isAuthSuccess">
            <div class="alert alert-success" role="alert">
                {{ isAuthSuccess }}
            </div>
        </div>
        <div class="col-md-11 mt-5 mb-5" v-if="!isAuthSuccess">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">
                        Register
                    </h4>
                    <p class="card-category">
                        Complete your registration by filling the form below
                    </p>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                      <label for="created_by" class="col-md-3" >Created by</label>
                      <div class="col-md-9"> 
                          <dropdown cl="col-md-4 form-control" :options="whData.created_by" name='created_by' v-model="profileForm.created_by" validation="required|min_value:1|max_value:6" ></dropdown>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-3" >Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="col-sm-6" v-model="profileForm.name" v-validate="'required|alpha_spaces|max:40'" />
                            <p v-show="errors.has('name')" class="text-danger"> {{ errors.first('name') }}</p>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-md-3" >Date of Birth</label>
                        <div class="col-sm-9">
                          <datepicker format="dd/MM/yyyy" :openDate="openDate" name="dob" :disabledDates="disabledDates"  placeholder="Select Date"  v-model="profileForm.dob" v-validate="'required|mature'"></datepicker> {{age}}
                          <p v-show="errors.has('dob')" class="text-danger"> {{ errors.first('dob') }}</p>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-3" >Gender</label>
                        <div class="col-sm-9">
                            <radiobutton v-for="channel in whData.gender" name="gender" :rLabel="channel.name" :key="channel.id" v-model="profileForm.gender"   :rIndex="channel.id"  v-validate="'required|included:1,2'" @change="setValue" ></radiobutton>
                            <p v-show="errors.has('gender')" class="text-danger"> {{ errors.first('gender') }}</p>
                          
                        </div>
                        
                    </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-3" >Marital Status</label>
                        <div class="col-sm-9">
                            <radiobutton v-for="channel in whData.marital" name="marital_status" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" v-model="profileForm.marital_status"   v-validate="'required|included:1,2,3'" @change="setValue"></radiobutton>
                            <p v-show="errors.has('marital_status')" class="text-danger"> {{ errors.first('marital_status') }}</p>
                        </div>
                        
                    </div>
                    <h5>Login Details</h5> <hr/>
                    <div class="form-group row">
                        <label for="username" class="col-md-3" >Email</label>
                        <div class="col-md-9">
                            <input type="text" name="email" class="col-sm-6" v-model="profileForm.email" v-validate="'required|email'" @change="setValue" />
                            <p v-show="errors.has('email')" class="text-danger"> {{ errors.first('email') }}</p>
                            
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-3" >Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="col-sm-6" v-model="profileForm.password" v-validate="'required|min:5|max:30'"  @change="setValue" />
                            <p v-show="errors.has('password')" class="text-danger"> {{ errors.first('password') }}</p>
                            
                        </div>
                        
                    </div>
                     <button :disabled="errors.any()" type="submit" class="btn btn-info">Register</button>
                </div>
            </div>
        </div>
      </form>
    </div>
</template>
<script>
var oldY = moment().subtract(18,  'year').format('YYYY')
var showY = moment().subtract(22,  'year').format('YYYY')
// subtracting 1 as the index start from 0
var oldM = moment().subtract(18,  'year').format('MM') - 1
var oldD = moment().subtract(18,  'year').format('DD')

import Datepicker from 'vuejs-datepicker'
import Dropdown from '../elements/html/Dropdown'
import Radiobutton from '../elements/html/RadioButton'
import moment from 'moment'
export default {
  components: {
      'dropdown': Dropdown,
      'radiobutton': Radiobutton,
      Datepicker
  },
  beforeCreate () {
      this.$store.commit('setLayout', 'default')
  },
  created() {
      let self = this
      // implementing additional validation
      this.$validator.extend('mature', {
          getMessage(field, val) {
              return "You should be 18 years of age"
          },
          validate(value, field) {
            return  moment(value).isBefore(moment().subtract(18, 'year') )
          }
      })
  },
  data: function() {
    return {
      disabledDates: {
          from: new Date(oldY, oldM, oldD)
      },
      age: '',
      openDate: new Date(showY , oldM),
      isAuthSuccess: '',
      whData:{},
      profileForm: {
          created_by : '',
          name: '',
          dob: '',
          gender: '',
          marital_status: '',
          email: '',
          password: ''
      }
    }
  },
  watch: {
      'profileForm.dob' : function(obj) {
       this.age = moment().diff( moment(obj, "DD/MM/YYYY"), 'years') + ' Yrs'
    }
  },
  methods: {
    
    moment: function() {
        return moment();
    },
    setValue: function (obj) {    
      this.profileForm[obj.name] = obj.value
    },
    validateBeforeSubmit (event) {
      var vm = this
      this.$validator.validateAll().then((result) => {                        
        if(result) {
          axios.post('/api/register', this.profileForm).then(response =>  {
              // TODO: for later use
            //   this.$notify({
            //       type: 'success',
            //       title: 'Success',
            //       text: response.data.message
            //   });
              this.$router.push('/user/register') 
              this.isAuthSuccess = response.data.message
          }).catch(error => {
              // Getting each errors and adding it to vee validate errorBag
              $.each(error.response.data.message, function(key, message) {
                var field = vm.$validator.fields.find({ name: field});
                vm.$validator.errors.add({
                  id: field.id,
                  field: key,
                  msg: message[0],
                });
              })
          });
        } 
      })
    }
  },
  mounted(){
        axios.get('/api/register').then(response => response.data).then(response => {
            this.whData = response.whData;
        });
    },
}
</script>
