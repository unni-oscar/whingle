

<template>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <router-link v-bind:to="'/'">Home</router-link>  
        </li>
        <li class="breadcrumb-item active">{{bcName}}</li>
      </ol>
</template>
<script>
export default {
    props: ['bc-name']
}
</script>
