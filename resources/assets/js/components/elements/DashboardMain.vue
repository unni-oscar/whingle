<template>
    <!-- Content Column -->
    <div class="col-lg-9 mb-4">
        <router-view name="mainarea"> </router-view>
    </div>
</template>
<script>
export default {
    props: ['bc-name']
}
</script>
