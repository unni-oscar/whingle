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
                            <dropdown  cl="col-md-2 form-control" :options="whData.age" name="age_from"  v-model="searchForm.age_from" ></dropdown>
                            <label for="created_by" >to</label>
                            <dropdown  cl="col-md-2 form-control" :options="whData.age" name="age_to"  v-model="searchForm.age_to" ></dropdown>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-info">Search</button>
                </div>
            </div>
        </div>
      </form>
    </div>
</template>
<script>
import Dropdown from '../elements/html/Dropdown'

export default {
    data: function() {
        return {
            whData:{},
            searchForm:{
                age_from: 22,
                age_to: 25,
                gender: ''
            }
        }
    },
    components: {
        'dropdown': Dropdown
    },
    props: ['bc-name'],
    mounted(){
        axios.get('/api/user/search').then(response => response.data).then(response => {
            this.res = response.profile
            this.whData = response.whData;
        });
    },
    methods:{
        validateBeforeSubmit () {
            var vm = this

            this.$validator.validateAll().then((result) => {                
                if(result) {
                    axios.post('/api/user/search', this.searchForm).then(response =>  {
                        this.$notify({
                            type: 'success',
                            title: 'Success',
                            text: response.data.message
                        });
                        
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
                } else {
                }
            })
        }
    }
}
</script>