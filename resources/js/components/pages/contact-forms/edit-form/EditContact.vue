<template>
    <form onsubmit = "return false" id = "currentContact" ref='contact'>
        <edit-form v-if="currentContact" ref="form" :contact="currentContact" :query="updateContact"></edit-form>
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
            },
            getEditFormUnchanged(){

                return this.$store.getters.getEditFormUnchanged;
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
                            this.$store.commit('setBreakRoute',true);
                            this.$store.dispatch('getAllContacts');
                            this.$router.push('/contacts')
                        }
                    })
                    .catch(error => {
                        if (error.response.data==='duplicated') {
                            this.$refs.form.duplicated();
                        }
                    });
            }
        },
        created() {
            if(!this.user_id) {
                this.$router.push('/contacts');
            }
            this.$store.dispatch('getContact', this.user_id);
            this.$store.commit('setBreakRoute',false);
            this.$store.commit('setLastRoute','');
        },
        beforeRouteLeave (to, from, next)
        {
            if(this.currentContact) {
                this.$store.commit('setLastRoute', to.path);
                if (this.breakroute||this.getEditFormUnchanged) {
                    next();
                }
                else {
                    next(false);
                    this.$refs.form.openModal();
                }
            }
            else {
                next();
            }
        }
    }
</script>

<style scoped>
</style>

