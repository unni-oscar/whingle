<template>
    <!-- Sidebar Column -->
    <div class="col-lg-3 mb-4">
        <div class="list-group">
        <router-link class="list-group-item" v-bind:to="'/user/profile'">Profile</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/search'">Search</router-link></router-link> 

        <router-link class="list-group-item" v-bind:to="'/user/profile'">Messages</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/change-password'">Favourites</router-link>
        <router-link class="list-group-item" v-bind:to="'/user/search'">Interests</router-link></router-link> 

        <router-link class="list-group-item" v-bind:to="'/user/profile'">Photos</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/change-password'"> Preference</router-link>
        <router-link class="list-group-item" v-bind:to="'/user/search'">Profile Visits</router-link></router-link> 
        
        <router-link class="list-group-item" v-bind:to="'/user/profile'">Payment History</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/change-password'">Subscription</router-link>
        <router-link class="list-group-item" v-bind:to="'/user/search'">Blacklist</router-link></router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/change-password'">Change Password</router-link>
      
        <router-link class="list-group-item" v-bind:to="'/user/search'">Security Settings</router-link></router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/search'">Logout</router-link></router-link> 
        </div>
    </div>
</template>
<script>
export default {
    props: ['bc-name']
}
</script>
