
<template>
    <div class="container-fluid">  
         
        <!-- <div class="card">
            <div class="card-body">
                <button class="btn btn-info btn-sm pull-right"><i class="fas fa-user-plus"></i> Create User</button>
                <button class="btn btn-info btn-sm pull-right m-r-5"><i class="fas fa-filter"></i> Filter</button>
                <h4 class="card-title">User List</h4>
                <h6 class="card-subtitle">Total 2 result found.</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th> <th>Email</th> 
                                <th>Role</th> <th>Status</th> 
                                <th>Created at</th> 
                                <th class="table-option">Action</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <tr>
                                <td>John Doe</td> 
                                <td>john.doe@example.com</td> 
                                <td><ul style="list-style: none; padding: 0px;"><li>admin</li></ul></td> 
                                <td><span class="label label-success m-r-5">Activated</span></td> 
                                <td>03-05-2018</td> 
                                <td class="table-option"><div class="btn-group"><a href="/user/1" class="btn btn-info btn-sm has-tooltip"><i class="fas fa-arrow-circle-right"></i></a> <button class="btn btn-danger btn-sm has-tooltip"><i class="fas fa-trash"></i></button></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div> -->

        <div class="row mt-5">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">
                            Edit Profile
                        </h4>
                        <p class="card-category">
                            Complete your profile
                        </p>
                    </div>
                    <div class="card-body">
                       <form @submit.prevent="validateBeforeSubmit" autocomplete="off" >
                            
                            <div class="form-group row">
                                <label for="created_by" class="col-md-3" >Created by</label>
                                <div class="col-sm-9"> 
                                    <dropdown cl="col-md-6 form-control" :options="whData.created_by" name='created_by' v-model="profileForm.created_by" validation="required|min_value:1|max_value:6" ></dropdown>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-3" >Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="col-sm-6" v-model="profileForm.name" v-validate="'required|alpha_spaces|max:40'" />
                                    <p v-show="errors.has('name')" class="text-danger"> {{ errors.first('name') }}</p>

                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="dob" class="col-md-3" >Date of Birth/Age</label>
                                <div class="col-sm-9"> 
                                    <!-- <input type="text" name="dob" class="col-sm-6" v-model="profileForm.dob" v-validate="'required|mature'" /> -->
                                    <datepicker format="dd/MM/yyyy" :openDate="openDate"   name="dob" :disabledDates="disabledDates"  placeholder="Select Date"  v-model="profileForm.dob" v-validate="'required|mature'"></datepicker> {{age}}

                                    <p v-show="errors.has('dob')" class="text-danger"> {{ errors.first('dob') }}</p>

                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-3" >Gender</label>
                                <div class="col-sm-9"> 
                                    <radiobutton v-for="channel in whData.gender" name="gender" :rLabel="channel.name" v-validate="'required|included:1,2'" :key="channel.id"  :rIndex="channel.id" :value="profileForm.gender" @change="setValue"></radiobutton>
                                    <p v-show="errors.has('gender')" class="text-danger"> {{ errors.first('gender') }}</p>

                                </div>
                                
                            </div>
                             <div class="form-group row">
                                <label for="name" class="col-md-3" >Marital Status</label>
                                <div class="col-sm-9"> 
                                    <radiobutton v-for="channel in whData.marital" name="marital_status" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" v-validate="'required|included:1,2,3'" :value="profileForm.marital_status" @change="setValue"></radiobutton>
                                   <p v-show="errors.has('marital_status')" class="text-danger"> {{ errors.first('marital_status') }}</p>
                                 </div>
                                
                            </div>
                             <div class="form-group row">
                                <label for="name" class="col-md-3" >Has Children</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.yesNo" name="has_children" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.has_children" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <hr/>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="email" >Living Country</label>
                                    <dropdown  cl="col-md-10 form-control" :options="countries" name="country_living" v-model="selectedCountry" ></dropdown>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" >Living State</label>
                                    <dropdown cl="col-md-10 form-control" :options="states" name="state_living" v-model="selectedState" ></dropdown>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" >Living City</label>
                                    <dropdown cl="col-md-10 form-control" :options="cities" name="city_living" v-model="profileForm.city_living" ></dropdown>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <label for="mother_tongue" class="col-md-3" >Mother Tongue</label>
                                <div class="col-sm-9">
                                    <dropdown cl="col-md-6 form-control" :options="motherTongues" name="mother_tongue" v-model="profileForm.mother_tongue_id" ></dropdown>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="religion" class="col-md-3" >Religion</label>
                                <div class="col-sm-9"> 
                                    <dropdown  cl="col-md-6 form-control" :options="religions" name="religion"  v-model="selectedReligion" ></dropdown>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="caste" class="col-md-3" >Caste</label>
                                <div class="col-sm-9">
                                    <dropdown cl="col-md-6 form-control" :options="castes" name="caste" v-model="profileForm.caste" ></dropdown>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="star" class="col-md-3" >Star</label>
                                <div class="col-md-9">
                                    <dropdown  cl="col-md-6 form-control" :options="whData.star" name="star" v-model="profileForm.star" ></dropdown>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="moon_sign" class="col-md-3" >Moon Sign</label>
                                <div class="col-sm-9">
                                    <dropdown cl="col-md-6 form-control"  :options="whData.moon_sign" name="moon_sign" v-model="profileForm.moon_sign" ></dropdown>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="manglik" class="col-md-3" >Manglik</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.manglik" name="manglik" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.manglik" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="horoscope" class="col-md-3" >Horoscope match required</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.horoscope" name="horoscope" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.horoscope" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <label for="horoscope" class="col-md-3" >Education</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="whData.education_category" name="education"  v-model="profileForm.education" ></dropdown>
                                </div>
                                
                            </div>
                             <div class="form-group row">
                                <label for="horoscope" class="col-md-3" >Education field</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="educations" name="education_in"  v-model="profileForm.education_in" ></dropdown>

                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="horoscope" class="col-md-3" >Job</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="whData.job_category" name="job"  v-model="profileForm.job" ></dropdown>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="horoscope" class="col-md-3" >Working as</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="jobs" name="job_as"  v-model="profileForm.job_as" ></dropdown>

                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="income" class="col-md-3" >Yearly income</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="whData.income" name="income"  v-model="profileForm.income" ></dropdown>

                                </div>
                                
                            </div>

                            <hr/>
                            <div class="form-group row">
                                <label for="height" class="col-md-3" >Height</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="whData.height" name="height"  v-model="profileForm.height" ></dropdown>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="weight" class="col-md-3" >Weight</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="whData.weight" name="weight"  v-model="profileForm.weight" ></dropdown>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="build" class="col-md-3" >Build</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.build" name="build" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.build" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                             <div class="form-group row">
                                <label for="complexion" class="col-md-3" >Complexion</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.complexion" name="complexion" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.complexion" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                             <div class="form-group row">
                                <label for="blood_group" class="col-md-3" >Blood Group</label>
                                <div class="col-sm-9">
                                  <dropdown  cl="col-md-6 form-control" :options="whData.blood_group" name="blood_group"  v-model="profileForm.blood_group" ></dropdown>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="disability" class="col-md-3" >Any disability?</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.yesNo" name="disability" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.disability" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label for="diet" class="col-md-3" >Diet</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.diet" name="diet" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.diet" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="smoke" class="col-md-3" >Smoke</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.smoke" name="smoke" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.smoke" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="drink" class="col-md-3" >Drink</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.drink" name="drink" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.drink" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <label for="Father" class="col-md-3" >Father</label>
                                <div class="col-sm-9"> 
                                        <dropdown  cl="col-md-6 form-control" :options="whData.father" name="father"  v-model="profileForm.father" ></dropdown>
                                </div>
                                
                            </div>
                             <div class="form-group row">
                                <label for="Mother" class="col-md-3" >Mother</label>
                                <div class="col-sm-9"> 
                                        <dropdown  cl="col-md-6 form-control" :options="whData.mother" name="mother"  v-model="profileForm.mother" ></dropdown>
                                </div>
                                
                            </div>
                           
                           <div class="form-group row">
                                <label class="col-sm-3">Siblings</label>
                                <div class="col-sm-4"> 
                                    <div class="col-sm-12"> Brothers
                                        <dropdown  cl="col-md-6 form-control" :options="whData.bro_sis" name="brothers"  v-model="profileForm.brothers" ></dropdown>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-12"> Brothers Married
                                        <dropdown  cl="col-md-6 form-control" :options="whData.bro_sis" name="brothers_married"  v-model="profileForm.brothers_married" ></dropdown>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-4"> 
                                    <div class="col-sm-12"> Sisters
                                        <dropdown  cl="col-md-6 form-control" :options="whData.bro_sis" name="sisters"  v-model="profileForm.sisters" ></dropdown>
                                    </div>
                                </div>
                                <div class="col-sm-4"> 
                                    <div class="col-sm-12"> Sisters Married
                                        <dropdown  cl="col-md-6 form-control" :options="whData.bro_sis" name="sisters_married"   v-model="profileForm.sisters_married"></dropdown>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="smoke" class="col-md-3" >Family Status</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.family_status" name="family_status" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.family_status" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="smoke" class="col-md-3" >Family Type</label>
                                <div class="col-sm-9">
                                    <radiobutton v-for="channel in whData.family_type" name="family_type" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.family_type" @change="setValue"></radiobutton>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="smoke" class="col-md-3" >Family Values</label>
                                <div class="col-sm-9"> 
                                    <radiobutton v-for="channel in whData.family_values" name="family_values" :rLabel="channel.name" :key="channel.id"  :rIndex="channel.id" :value="profileForm.family_values" @change="setValue"></radiobutton>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <label for="about" class="col-md-3" >Few words about this profile </label>
                                <div class="col-sm-9">
                                    <textarea name="about" rows="4" cols="50" v-model="profileForm.about" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact_number" class="col-md-3" >Contact number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_number" class="col-sm-6" v-model="profileForm.contact_number" v-validate="'required|numeric|max:15'" />
                                    <p v-show="errors.has('contact_number')" class="text-danger"> {{ errors.first('contact_number') }}</p>

                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-3" >Address </label>
                                <div class="col-sm-9">
                                    <textarea rows="3" cols="33" name="address" v-model="profileForm.address" ></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Update profile</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
               

        <!-- {{profileForm}} -->
        <!-- <form @submit.prevent="validateBeforeSubmit" autocomplete="off" > -->
            
       <!-- <table>
           <tr> 
               <td>Created by </td>
               <td><dropdown  :options="whData.created_by" name='created_by' v-model="profileForm.created_by" validation="required|min:1" ></dropdown>
</td>
            </tr>
           <tr><td>Name</td>
           <td><input type="text" name="name" v-model="profileForm.name"/></td>
           </tr>
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
            <tr><td>About</td><td>
                <textarea v-model="profileForm.about"> </textarea></td></tr>
            <tr>
                <td>Country Living{{ profileForm.country_living }} {{selectedCountry}}</td>
                <td><dropdown  :options="countries" name="country_living" v-model="selectedCountry" ></dropdown></td>
               
            </tr>
            <tr>
                <td>State living {{ profileForm.state_living }}</td>
                <td><dropdown :options="states" name="state_living" v-model="selectedState" ></dropdown></td>
            </tr>
            <tr>
                <td>City living{{ profileForm.city_living }}</td>
                <td><dropdown :options="cities" name="city_living" v-model="profileForm.city_living" ></dropdown></td>
            </tr>
            <tr>
                <td>Mother Tongue</td>
                <td><dropdown  :options="motherTongues" name="mother_tongue" v-model="profileForm.mother_tongue_id" ></dropdown></td>
               
            </tr>
             <tr>
                <td>Religion</td>
                <td><dropdown  :options="religions" name="religion"  v-model="selectedReligion" ></dropdown></td>
               
            </tr>
            <tr>
                <td>Castes</td>
                <td><dropdown :options="castes" name="caste" v-model="profileForm.caste" ></dropdown></td>
            </tr>
            <tr>
                <td>Star</td>
                <td><dropdown  :options="whData.star" name="star" v-model="profileForm.star" ></dropdown>
            </td>
            </tr>
             <tr>
                <td>Moon sign</td>
                <td><dropdown  :options="whData.moon_sign" name="moon_sign" v-model="profileForm.moon_sign" ></dropdown>
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
            <tr>
                <td>Sisters</td>
                <td><dropdown  :options="whData.bro_sis" name="sisters" v-model="profileForm.sisters" ></dropdown>
            </td>
            <tr>
                <td>Sisters married</td>
                <td><dropdown  :options="whData.bro_sis" name="sisters_married" v-model="profileForm.sisters_married" ></dropdown>
            </td>
            <tr>
                <td>Brothers</td>
                <td><dropdown  :options="whData.bro_sis" name="brothers" v-model="profileForm.brothers" ></dropdown>
            </td>
            <tr>
                <td>Brothers married</td>
                <td><dropdown  :options="whData.bro_sis" name="brothers_married" v-model="profileForm.brothers_married" ></dropdown>
            </td>
            
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
        <button type="submit" class="btn btn-info">Update profile</button> -->
        <!-- </form> -->
    </div>
</template>
<script>
var oldY = moment().subtract(18,  'year').format('YYYY')
var showY = moment().subtract(22,  'year').format('YYYY')
// subtracting 1 as the index start from 0
var oldM = moment().subtract(18,  'year').format('MM') - 1
var oldD = moment().subtract(18,  'year').format('DD')
import Dropdown from '../elements/html/Dropdown'
import Radiobutton from '../elements/html/RadioButton'
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'

export default {
    components: {
        'dropdown': Dropdown,
        'radiobutton': Radiobutton,
         Datepicker
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

        // this.$validator.extend('greater_than_equal_field',  (value, [otherValue]) =>{
        //     console.log(value + ' ' + otherValue)
        //     console.log(otherValue >= value)
        //     return otherValue >= value
        // },{
        //     hasTarget: true
        // })

    },
    data: function() {
        return {
             disabledDates: {
                from: new Date(oldY, oldM, oldD)
            },
            age: '',
            openDate: new Date(showY , oldM),
            email: {},
            res: {},
            countries: {},
            states:{},
            cities:{},
            motherTongues:{},
            religions: {},
            educations:{},
            jobs:{},
            castes:{},
            selectedCountry: {},
            selectedState: {},
            selectedReligion: {},
            whData:{},
            profileForm: {
                name : '',
                address: '',
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
                mother_tongue_id : '',
                religion  : '',
                sisters  : '',
                sisters_married  : '',
                smoke : '',
                star : '',
                state_living  : '',
                weight  : ''
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
            this.educations = response.educations;
            this.jobs = response.jobs;
            this.religions = response.religions;
            this.motherTongues = response.motherTongues
            this.selectedCountry = this.res.country_living || ''
            this.selectedState = this.res.state_living || ''
            this.selectedCity = this.res.city_living || ''
            this.selectedReligion = this.res.religion || ''
            this.profileForm.name = this.res.name;
            this.profileForm.dob = this.res.dob;
            this.profileForm.gender = this.res.gender;
            this.profileForm.address = this.res.address;
            this.profileForm.about = this.res.about;
            this.profileForm.blood_group = this.res.blood_group;
            this.profileForm.brothers = this.res.brothers || ''
            this.profileForm.brothers_married = this.res.brothers_married || ''
            this.profileForm.build = this.res.build;
            this.profileForm.caste = this.res.caste || ''
            this.profileForm.city_living = this.res.city_living;
            this.profileForm.complexion = this.res.complexion;
            this.profileForm.contact_number = this.res.contact_number || '' ;
            this.profileForm.country_living = this.res.country_living;
            this.profileForm.created_by = this.res.created_by;
            this.profileForm.diet = this.res.diet;
            this.profileForm.disability = this.res.disability;
            this.profileForm.drink = this.res.drink;
            this.profileForm.education = this.res.education || ''
            this.profileForm.education_in = this.res.education_in || ''
            this.profileForm.family_status = this.res.family_status;
            this.profileForm.family_type = this.res.family_type;
            this.profileForm.family_values = this.res.family_values;
            this.profileForm.father = this.res.father || '' 
            this.profileForm.gender = this.res.gender;
            this.profileForm.has_children = this.res.has_children;
            this.profileForm.height = this.res.height;
            this.profileForm.horoscope = this.res.horoscope;
            this.profileForm.income = this.res.income || ''
            this.profileForm.interests = this.res.interests;
            this.profileForm.job = this.res.job || '';
            this.profileForm.job_as = this.res.job_as || '';
            this.profileForm.manglik = this.res.manglik;
            this.profileForm.marital_status = this.res.marital_status;
            this.profileForm.moon_sign = this.res.moon_sign || ''
            this.profileForm.mother = this.res.mother || ''
            this.profileForm.mother_tongue_id = this.res.mother_tongue_id || ''
            this.profileForm.religion = this.res.religion || ''
            this.profileForm.sisters = this.res.sisters || ''
            this.profileForm.sisters_married = this.res.sisters_married || ''
            this.profileForm.smoke = this.res.smoke;
            this.profileForm.star = this.res.star || ''
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
        getCities() {
            var self = this
            if (self.selectedState > 0) {
                axios.get('/api/cities/' + self.selectedState)
                .then(function (response) {
                    self.cities = response.data
                })
                .catch(function (error) {
                    console.log(error); 
                });
            }
        },
        getCastes() {
            var self = this
            if (self.selectedReligion > 0) {
                axios.get('/api/castes/' + self.selectedReligion)
                .then(function (response) {
                    self.castes = response.data
                })
                .catch(function (error) {
                    console.log(error); 
                });
            }
        },
        setValue: function (obj) {      
            this.profileForm[obj.name] = obj.value
        },
         validateBeforeSubmit () {
            var vm = this
            this.$validator.validateAll().then((result) => {                
                if(result) {
                    axios.post('/api/user/profile', this.profileForm).then(response =>  {
                        //this.$router.push('/user/profile') 
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
                        // this.$notify({
                        //     type: 'error',
                        //     title: 'Error',
                        //     text: error.response.data.message
                        // });
                    });
                } else {
                }
            })
        }
    },
    watch: {
        selectedCountry: function( ) {
            // this.$notify({
            //     type: 'success',
            //     title: 'Important message',
            //     text: 'Hello user! This is a notification!'
            // });
            this.getStates()
            this.profileForm.country_living = this.selectedCountry
            this.selectedState = this.res.state_living || ''
            this.cities = {} 
        },
        selectedState: function( ) {
            this.getCities()
            this.profileForm.city_living = this.res.city_living || ''
            this.profileForm.state_living = this.selectedState
            // this.selectedCity = this.res.city_living | ''
        },
        selectedReligion: function( ) {
            this.getCastes()
            this.profileForm.religion = this.selectedReligion
            this.profileForm.caste = this.res.caste || ''
        },
    }
    // beforeCreate () {
    //     this.$store.commit('setLayout', 'user')
    // },
}
</script>
