
<template>
    <div class="container">
<h1>Login</h1>
<form @submit.prevent="validateBeforeSubmit" autocomplete="off" >
     <p class="text-danger" v-if="isAuthError">{{ isAuthError }}</p>
     <p v-if="$route.query.redirect">
      You need to login first.
    </p>
  <!-- <div class="form-group">
    <label for="Name-label">Name</label>
    <input type="name" class="form-control" id="Name-label" placeholder="Name">
  </div> -->
  <div class="form-group">
    <label for="Email1-label">Email</label>
    <input type="email" class="form-control"  v-model="loginForm.email" name="email" placeholder="Email" v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }">
    <p v-show="errors.has('email')" class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ errors.first('email') }}</p>
  </div> 
  <div class="form-group">
    <label for="Password-label">Password</label>
    <input type="password" class="form-control" v-model="loginForm.password" v-validate="'required|min:5'" name="password" placeholder="Password" :class="{'input': true, 'is-danger': errors.has('password') }">
   
    <p v-show="errors.has('password')" class="text-danger"> <i class="fas fa-exclamation-circle"></i> {{ errors.first('password') }}</p>
  </div>
  <button type="submit" class="btn btn-info">Login</button>
</form>
</div>
</template>
<script>
export default {
    beforeCreate () {
        this.$store.commit('setLayout', 'default')
    },
    
}
</script>
