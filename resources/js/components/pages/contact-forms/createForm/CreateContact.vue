<template>
    <div>
        <form onsubmit = "return false" id = "contact" ref='conta'>
            <create-form ref="form" :query="createContact"></create-form>
        </form>
    </div>
</template>

<script>
    import CreateForm from './blocks/CreateForm'

    export default {
        name: "CreateContact",
        components:{
            CreateForm,
        },
        methods: {
            createContact()
            {
                const data = new FormData(this.$refs.conta);
                data.append('favorites', 0);
                axios.post('/api/contact', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        console.log(response.data)
                        if (response.data === 'created') {
                            this.$store.commit('setBreakRoute',true);
                            this.$router.push('/contacts')
                        }
                    })
                    .catch(error => {
                        if (error.response.data==='duplicated') {
                            this.$refs.form.duplicated();
                        }
                    });
            },
            checking() {
                this.$refs.form.checking();
            }
        },
        computed:{
            breakroute() {

                return this.$store.getters.getBreakRoute;
            }
        },
        created()
        {
            this.$store.commit('setBreakRoute',false);
            this.$store.commit('setLastRoute','');
        },
        beforeRouteLeave (to, from, next)
        {
            this.$store.commit('setLastRoute',to.path);
            console.log(to.path)
            if (this.breakroute) {
                next();
            }
            else {
                next(false);
                this.$refs.form.openModal();
            }
        }

    }
</script>

<style scoped>
</style>

