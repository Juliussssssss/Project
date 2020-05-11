<template>
    <div class = "w-100">
        <header-edit-form :src="contact?contact.avatar:''">
            <header-edit-input ref="header" :contact="contact"></header-edit-input>
        </header-edit-form>
        <edit-form-fields
            ref="fields"
            :contact="contact"
            :blocked="false"
            :type="true"
        >
        </edit-form-fields>
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
        <exit-confirmation ref="modal" @checking="checking()"></exit-confirmation>
    </div>
</template>

<script>
    import HeaderEditForm from './header/HeaderEditForm'
    import HeaderEditInput from './header/HeaderEditInput'
    import EditFormFields from './EditFormFields'
    import ExitConfirmation from '../../../../modal/contact-form/ExitConfirmation'
    export default {
        name: "EditForm",
        props:['query','contact'],
        components:{
            HeaderEditForm,
            EditFormFields,
            HeaderEditInput,
            ExitConfirmation
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
            },
            openModal()
            {
                this.$refs.modal.open();
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

