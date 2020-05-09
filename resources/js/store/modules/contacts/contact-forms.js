import axios from 'axios';


export default {
    state: {
        contactValid:{
            header:false,
            fields:false
        },
        breakRoute:false,
        lastRoute:''
    },
    getters: {
        getContactFormValidation(state) {

            return state.contactValid.header&&state.contactValid.fields;
        },
        getBreakRoute(state) {

            return state.breakRoute;
        },
        getLastRoute(state) {

            return state.lastRoute;
        }
    },
    mutations: {
        setHeaderValidation(state,validation) {

            return state.contactValid.header = validation;
        },
        setFieldsValidation(state,validation) {

            return state.contactValid.fields = validation;
        },
        setBreakRoute(state,breakRoute) {

            return state.breakRoute = breakRoute;
        },
        setLastRoute(state,route) {

            state.lastRoute = route;
        }
    },
    actions: {

    }
}
