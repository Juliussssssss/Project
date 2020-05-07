<template>
    <form onsubmit = "return false" id = "contact" ref='contact'>
        <contact-form ref="form" :query="updateContact"></contact-form>
    </form>
</template>

<script>
    import ContactForm from './ContactForm'
    export default {
        name: "CreateContact",
        props: ['id'],
        components:{
            ContactForm,
        },
        methods: {
            updateContact()
            {
                const data = new FormData(this.$refs.contact);
                axios.post('/api/contact/', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        console.log(response.data)
                        if (response.data === 'created') {

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
            console.log(this.id)
        }
    }
</script>

<style scoped>
</style>

