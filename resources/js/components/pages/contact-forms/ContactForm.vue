<template>
    <div class = "w-100">
        <header-form :blocked="false">
            <header-input ref="header" :blocked="false"></header-input>
        </header-form>
        <fields-contact-form ref="fields" :blocked="false"></fields-contact-form>
        <div class="form-group d-flex justify-content-end mr-4 mt-4 mb-4">
            <button @click="checking()" class="py-3 btn text-uppercase font-12px btnText text-white save d-inline-block mr-3 w-100">
                Сохранить
            </button>
            <router-link
                class="py-3 btn-light btn text-uppercase font-12px btnText cancel"
                to="/contacts">
                Отмена
            </router-link>
        </div>
    </div>
</template>

<script>
    import HeaderForm from './blocks/header/HeaderForm'
    import HeaderInput from './blocks/header/HeaderInput'
    import FieldsContactForm from './blocks/FieldsContactForm'
    export default {
        name: "ContactForm",
        props:['query'],
        components:{
            HeaderForm,
            FieldsContactForm,
            HeaderInput
        },
        computed:{
            validation(){

                return this.$store.getters.getContactFormValidation;
            }
        },
        methods: {
            checking() {
                this.$refs.header.validation();
                this.$refs.fields.validation();
                setTimeout(()=>{
                    this.processing()
                },200);
            },
            processing()
            {
                console.log(this.validation);
                if (this.validation) {
                    this.query();
                }
                else {
                    window.scrollTo(0, 0);
                }
            },
            duplicated(){
                this.$refs.fields.duplicated();
                window.scrollTo(0, 0);
            }
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

