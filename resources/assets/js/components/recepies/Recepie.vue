<template lang="html">
    <div>
        <p>{{ recepie.name }}</p>
    </div>
</template>

<script>
export default {
    props: ['recepie'],

    name: 'Recepie',

    data () {
        return {

        };
    }
};
</script>

<style lang="css" scoped>
</style>