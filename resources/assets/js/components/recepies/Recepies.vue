<template lang="html">
    <div class="recepies-list" v-if="recepies && recepies.length">
        <recepie v-for="recepie in recepies" :key="recepie" :recepie="recepie"></recepie>
    </div>
</template>

<script>
export default {

    name: 'Recepies',

    data() {
        return {
            recepies: []
        };
    },
    created() {
        // var recepies = [];
        axios.get('/recepies/all').then(response => {
            this.recepies = response.data;
            console.log(this.recepies);
        });
    }
};
</script>

<style lang="css" scoped>
</style>