
<template>
    <div class="container">
      <form @submit.prevent="validateBeforeSubmit" autocomplete="off" >
        <div class="col-md-11 mt-5 mb-5">
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
                      <label for="created_by" class="col-md-3 col-offset-2" >Created by</label>
                      <div class="col-md-9">
                          <dropdown cl="col-md-4 form-control" :options="whData.created_by" name='created_by' v-model="profileForm.created_by" validation="required" ></dropdown>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-3" >Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="col-sm-6" v-model="profileForm.name" v-validate="'required'" />
                            <p v-show="errors.has('name')" class="text-danger"> {{ errors.first('name') }}</p>
                            
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-md-3" >Date of Birth</label>
                        <div class="col-sm-9">
                          <datepicker format="dd/MM/yyyy"  name="dob" v-model="profileForm.dob" v-validate="'required'"></datepicker>
                          <p v-show="errors.has('dob')" class="text-danger"> {{ errors.first('dob') }}</p>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-3" >Gender</label>
                        <div class="col-sm-9">
                            <radiobutton v-for="channel in whData.gender" name="gender" :rLabel="channel.name" :key="channel.id" v-model="profileForm.gender"   :rIndex="channel.id"  v-validate="'required'" @change="setValue" ></radiobutton>
                            <p v-show="errors.has('gender')" class="text-danger"> {{ errors.first('gender') }}</p>
                          
                        </div>
                        
                    </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-3" >Marital Status</label>
                        <div class="col-sm-9">
                            <radiobutton v-for="channel in whData.marital" name="marital_status" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" v-model="profileForm.marital_status"   v-validate="'required'" @change="setValue"></radiobutton>
                            <p v-show="errors.has('marital_status')" class="text-danger"> {{ errors.first('marital_status') }}</p>
                        </div>
                        
                    </div>
                    <h5>Login Details</h5> <hr/>
                    <div class="form-group row">
                        <label for="username" class="col-md-3" >Username</label>
                        <div class="col-md-9">
                            <input type="text" name="email" class="col-sm-6" v-model="profileForm.email" v-validate="'required'" @change="setValue" />
                            <p v-show="errors.has('email')" class="text-danger"> {{ errors.first('email') }}</p>
                            
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-3" >Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="col-sm-6" v-model="profileForm.password" v-validate="'required'"  @change="setValue" />
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
import Datepicker from 'vuejs-datepicker'
import Dropdown from '../elements/html/Dropdown'
import Radiobutton from '../elements/html/RadioButton'
export default {
  components: {
      'dropdown': Dropdown,
      'radiobutton': Radiobutton,
      Datepicker
  },
  beforeCreate () {
      this.$store.commit('setLayout', 'default')
  },
  data: function() {
    return {
      whData:{},
      profileForm: {
          created_by : '',
          name: '',
          dob:'',
          gender: '',
          marital_status: '',
          email: '',
          password: ''
      }
    }
  },
  methods: {
    setValue: function (obj) {    
      this.profileForm[obj.name] = obj.value
    },
    validateBeforeSubmit () {
      var vm = this
      this.$validator.validateAll().then((result) => {                        
        if(result) {
          axios.post('/api/register', this.profileForm).then(response =>  {
              this.$notify({
                  type: 'success',
                  title: 'Success',
                  text: 'Registration completed successfully'
              });
              //this.$router.push('/login') 
          }).catch(error => {
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
