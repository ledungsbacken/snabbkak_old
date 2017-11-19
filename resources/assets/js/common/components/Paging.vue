<template lang="html">
<nav>
    <ul class="pagination" v-if="total">
        <li>
            <a href="" @click.prevent="changePage(1)" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li :class="page == value ? 'active' : ''" v-for="page in pages">
            <a href="" @click.prevent="changePage(page)" :aria-label="page">
                {{page}}
                <span class="sr-only"></span>
            </a>
        </li>
        <li>
            <a  href=""  @click.prevent="changePage(total)" aria-label="Next">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    </ul>
</nav>
</template>

<script>
export default {
    props : {
        total : {
            type : Number,
            required : true,
            default : 0,
        },
        value : {
            type : Number,
            required : true,
            default : 0,
        },
        shown : {
            type : Number,
            default : 7
        },
    },
    methods : {
        changePage(page){
            this.$emit('input', page);
            this.$emit('change', page);
        }
    },
    computed : {
        pages() {
            let halfShown = Math.floor(this.shown / 2);
            let first = this.value - halfShown <= 1 ? 1 : this.value - halfShown;
            let last = this.value + halfShown >= this.total ? this.total : this.value + halfShown;
            let result = [];
            for (let i = first; last >= i; i++) {
                result.push(i);
            }
            return result;
        }
    }
}
</script>

<style scoped >
    .pagination {
        margin : 0;
    }
</style>
