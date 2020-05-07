import axios from 'axios';


export default {
    state: {
        contactValid:{
            header:false,
            fields:false
        }
    },
    getters: {
        getContactFormValidation(state) {

            return state.contactValid.header&&state.contactValid.fields;
        }
    },
    mutations: {
        setHeaderValidation(state,validation) {

            return state.contactValid.header = validation;
        },
        setFieldsValidation(state,validation) {

            return state.contactValid.fields = validation;
        }
    },
    actions: {

    }
}
