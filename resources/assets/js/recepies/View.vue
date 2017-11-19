<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Recepies</div>

                    <div class="panel-body">
                        <div class="list-group">
                            <router-link :to="'/recepie/' + recepie.data.id" class="list-group-item" v-for="recepie in recepies" :key="recepie.data.id">
                                {{ recepie.data.name }}
                            </router-link>
                            <paging v-model="listData.current_page" class="paging" style="float:left;" :total="listData.total"></paging>
                            <count :counts="counts" class="paging" style="float:right;" v-model="listData.per_page"></count>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Recepie from '../common/models/Recepie.js';
import Paging from '../common/components/Paging.vue';
import Count from '../common/components/Count.vue';

export default {
    data() {
        return {
            recepies : [],
            counts : [5, 10, 30],
            listData : {
                'total': 0,
                'per_page': 5,
                'current_page': 1,
            }
        };
    },

    mounted() {
        this.load();
    },

    methods : {
        load() {
            new Recepie.index({
                'page' : this.listData.current_page,
                'count' : this.listData.per_page,
                'active' : this.selectedStatus,
            }).then(page => {
                this.recepies = page.data;
                this.listData.total = page.last_page;
            });
        },
    },

    watch : {
        'listData.current_page' : function(value){
            this.load();
        },
        'listData.per_page' : function(value){
            this.load();
        },
    },

    components : {
        paging : Paging,
        count : Count,
    }
}
</script>

<style scoped>
    .paging {
        margin-top: 20px;
    }
</style>
