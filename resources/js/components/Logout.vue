<template>
    <div>
        <button @click="logout()">Выйти</button>
    </div>
</template>

<script>
    export default {
        name: "Logout",
        methods:{
            logout(){
                axios.get('/api/frequent-contacts').then((response) => {

                }).catch(e => {

                });
            }
        }
    }
</script>

<style scoped>

</style>
