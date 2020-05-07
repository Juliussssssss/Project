<template>
    <form onsubmit = "return false" id = "contact" ref='contact'>
        <contact-form ref="form" :query="createContact"></contact-form>
    </form>
</template>

<script>
    import ContactForm from './ContactForm'
    export default {
        name: "CreateContact",
        components:{
            ContactForm,

        },
        methods: {
            createContact()
            {
                let respons;
                const data = new FormData(this.$refs.contact);
                data.append('favorites', 0);
                axios.post('/api/contact', data, {
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
        }
    }
</script>

<style scoped>
</style>

