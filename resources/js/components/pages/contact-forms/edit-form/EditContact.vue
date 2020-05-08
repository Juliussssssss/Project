<template>
    <form onsubmit = "return false" id = "currentContact" ref='contact'>
        <edit-form ref="form" :contact="currentContact" :query="updateContact"></edit-form>
    </form>
</template>

<script>
    import EditForm from './blocks/EditForm'
    export default {
        name: "CreateContact",
        props: ['id'],
        components:{
            EditForm,
        },
        computed:{
            currentContact() {

                return this.$store.getters.getContact;
            }
        },
        methods: {
            updateContact()
            {

                const data = new FormData(this.$refs.contact);
                data.append('id',2361);
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
            this.$store.dispatch('getContact',2361)
        }
    }
</script>

<style scoped>
</style>

