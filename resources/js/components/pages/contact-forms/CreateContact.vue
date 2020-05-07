<template>
    <div class = "w-100">
        <form @submit.prevent = "addContact" id = "contact" ref='contact'>
            <header-create-form ref="header"></header-create-form>
            <fields-contact-form ref="fields"></fields-contact-form>
            <div class="form-group d-flex justify-content-end mr-4 mt-4 mb-4">
                <button class="py-3 btn text-uppercase font-12px btnText text-white save d-inline-block mr-3 w-100">
                    Сохранить
                </button>
                <router-link
                    class="py-3 btn-light btn text-uppercase font-12px btnText cancel"
                    to="/contacts">
                    Отмена
                </router-link>
            </div>
        </form>
    </div>
</template>

<script>
    import HeaderCreateForm from '../contact-forms/blocks/HeaderCreateForm'
    import FieldsContactForm from '../contact-forms/blocks/FieldsContactForm'
    export default {
        name: "CreateContact",
        components:{
            HeaderCreateForm,
            FieldsContactForm
        },
        computed:{
            validation(){

                return this.$store.getters.getContactFormValidation;
            }
        },
        methods: {
            addContact() {
                this.$refs.header.validation();
                this.$refs.fields.validation();
                let rule = this.validation.header&&this.validation.fields;
                if (rule) {
                    const data = new FormData(this.$refs.contact);
                    data.append('favorites', 0);
                    axios.post('/contact/add', data, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        if (response.data == 'created') {
                            console.log('redirect')
                        }
                    })
                    .catch(error => {
                        console.log(error.response.data.errors.email);
                        if (error.response.data.errors.email) {
                            this.$refs.fields.duplicated();
                        }
                    });
                }
            },
        }
    }
</script>

<style scoped>
    .save {
        max-width: 120px;
        background-color: #1875F0;
    }
    .save:hover {
        background-color: #1875E0;
    }

</style>
