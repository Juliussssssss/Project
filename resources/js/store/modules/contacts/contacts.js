import axios from 'axios';


export default {
    state: {
        contactFormValidation:{
            header:true,
            fields:true
        }
    },
    getters: {
        getContactFormValidation(state) {

            return state.contactFormValidation
        }
    },
    mutations: {
        setHeaderValidation(state,validation) {

            return state.contactFormValidation.header = validation;
        },
        setFieldsValidation(state,validation) {

            return state.contactFormValidation.fields = validation;
        }
    },
    actions: {

    }
}
