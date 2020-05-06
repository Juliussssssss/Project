<template>
    <div class = "w-100">
        <form @submit.prevent = "addContact" id = "contact" ref='contact'>
            <create-contact-header></create-contact-header>
            <contact-form-fields></contact-form-fields>
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
    import CreateContactHeader from '../contact-forms/blocks/CreateContactHeader'
    import ContactFormFields from '../contact-forms/blocks/СontactFormFields'
    export default {
        name: "CreateContact",
        components:{
            CreateContactHeader,
            ContactFormFields
        },
        methods: {
            addContact() {
                const data = new FormData(this.$refs.contact);
                data.append('favorites', 0);
                axios.post('/contact/add', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    if(response.data == 'created') {
                        console.log('redirect')
                    }
                })
                .catch(error => {
                        console.log(error);
                    }
                );
            },
        }
    }
</script>

<style scoped>
    .cancel {

    }
    .save {
        max-width: 120px;
        background-color: #1875F0;
    }
    .save:hover {
        background-color: #1875E0;
    }
</style>
