<template lang="html">
    <div class="btn-group" role="group" >
      <button type="button"
            class="btn btn-default"
            :class="count == value ? 'active' : ''"
            v-for="count in counts"
            @click="changeCount(count)"
            >{{count}}</button>
    </div>
</template>

<script>
export default {
    props : {
        counts : {
            type : Array,
            required : true,
        },
        value : {
            type : Number,
            required : true
        }
    },
    methods : {
        changeCount(count){
            this.$emit('input', count);
            this.$emit('change', count);
        }
    }
}
</script>

<style lang="css">
</style>
