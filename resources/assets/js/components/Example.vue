<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Example</div>

                    <div class="panel-body">
                        <router-link to="/home">Home</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');

            $http.get('/user')
                .then(response => {
                    console.log(response.data);
                });
        }
    }
</script>
