<template>
    <!-- Sidebar Column -->
    <div class="col-lg-3 mb-4">
        <div class="list-group">
        <router-link class="list-group-item" v-bind:to="'/user/profile'">Profile</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/search'">Search</router-link></router-link> 

        <router-link class="list-group-item" v-bind:to="'/user/messages'">Messages</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/favourites'">Favourites</router-link>
        <router-link class="list-group-item" v-bind:to="'/user/interests'">Interests</router-link></router-link> 

        <router-link class="list-group-item" v-bind:to="'/user/photos'">Photos</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/preference'"> Preference</router-link>
        <router-link class="list-group-item" v-bind:to="'/user/profile-visits'">Profile Visits</router-link></router-link> 
        
        <router-link class="list-group-item" v-bind:to="'/user/payments'">Payment History</router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/subscription'">Subscription</router-link>
        <router-link class="list-group-item" v-bind:to="'/user/blacklist'">Blacklist</router-link></router-link> 
        <router-link class="list-group-item" v-bind:to="'/user/change-password'">Change Password</router-link>
      
        <router-link class="list-group-item" v-bind:to="'/user/settings'">Security Settings</router-link></router-link> 
        </div>
    </div>
</template>
<script>
export default {
    props: ['bc-name']
}
</script>
