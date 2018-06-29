<template>
     <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container"> 
            <router-link class="navbar-brand" v-bind:to="'/'">Site</router-link>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive"> 
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <router-link class="nav-link" v-bind:to="'/about'">About</router-link>                 
                </li>
                <li class="nav-item">
                  <router-link class="nav-link" v-bind:to="'/packages'">Packages</router-link> 
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                  <router-link class="nav-link" v-bind:to="'/user'">Dashboard</router-link> 
                </li>
                <li class="nav-item" v-if="!isLoggedIn">
                  <router-link class="nav-link" v-bind:to="'/user/login'">Login</router-link> 
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                  <a href="#" @click.prevent="logout" class="nav-link"> Logout</a>
                </li>
                <li class="nav-item" v-if="!isLoggedIn">
                  <router-link class="nav-link" v-bind:to="'/user/register'">Register</router-link> 
                </li>
              </ul>
            </div>
          </div>
        </nav>
</template>

<script>
    import helper   from '../services/helper'
    export default {
      computed: {
        isLoggedIn () {
          return this.$store.getters.isLoggedIn
        }
      },
      methods: {
        logout() {
          helper.logout().then(() => {
            this.$store.dispatch('userLogout');
            this.$router.replace('/user/login');
          }).catch((error) => {
          })
        }
      }
    }
</script>
