<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ recepie.data.name }}</div>

                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Recepie from '../common/models/Recepie.js';

export default {
    props : {
        id : {
            type : [Number, String]
        }
    },

    data() {
        return {
            recepie : new Recepie({id : this.id}),
        };
    },

    mounted() {
        this.load();
    },

    methods : {
        load() {
            return this.recepie.show().then(recepie => {
                this.recepie = recepie;
            });
        }
    }

}
</script>

<style>
</style>
