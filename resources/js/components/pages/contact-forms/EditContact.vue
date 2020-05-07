<template>
    <form submit = "return false" id = "contact" ref='contact'>
        <contact-form :method="createContact"></contact-form>
    </form>
</template>

<script>
    import ContactForm from './ContactForm'
    export default {
        name: "EditContact",
        components:{
            ContactForm,

        },
        methods: {
            createContact()
            {
                axios.post('/api/contact', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    console.log(response.data)
                    if (response.data === 'created') {
                        console.log('redirect')
                    }
                })
                .catch(error => {
                    if (error.response.data.errors.email) {
                        this.$refs.fields.duplicated();
                    }
                });
            }
        }
    }
</script>

<style scoped>
</style>

