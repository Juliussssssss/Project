<template>
    <form onsubmit = "return false" id = "currentContact" ref='contact'>
        <edit-form v-if="currentContact" ref="form" :contact="currentContact" :query="updateContact"></edit-form>
        <div v-else>Ошибка...</div>
    </form>
</template>

<script>
    import EditForm from './blocks/EditForm'
    export default {
        name: "CreateContact",
        props: ['user_id'],
        components:{
            EditForm,
        },
        computed:{
            currentContact() {

                return this.$store.getters.getContact;
            },
            breakroute() {

                return this.$store.getters.getBreakRoute;
            }
        },
        methods: {
            updateContact()
            {
                const data = new FormData(this.$refs.contact);
                data.append('id',this.user_id);
                data.append('path',this.currentContact.avatar);
                axios.post('/api/contact/update', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        if (response.data === 'updated') {

                        }
                    })
                    .catch(error => {
                        if (error.response.data.errors.email) {
                            this.$refs.form.duplicated();
                        }
                    });
            }
        },
        created() {
            this.$store.dispatch('getContact',this.user_id )
            this.$store.commit('setBreakRoute',false);
            this.$store.commit('setLastRoute','');
        },
        beforeRouteLeave (to, from, next)
        {
            this.$store.commit('setLastRoute',to.path);
            console.log(to.path);
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

