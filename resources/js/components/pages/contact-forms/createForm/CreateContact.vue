<template>
    <form onsubmit = "return false" id = "contact" ref='conta'>
        <create-form ref="form" :query="createContact"></create-form>
    </form>
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

