import axios from 'axios';


export default {
    state: {
        contactValid:{
            header:false,
            fields:false
        },
        contactFormFields:{
            first_name:'',
            middle_name:'',
            last_name:'',
            email:'',
            number:'',
            site:'',
            birthday:'',
            city:'',
            work:'',
            position:'',
            work_email:'',
            group_id:'',
            comment:'',
            avatar:''
        },
        breakRoute:false,
        lastRoute:'',
        contactBeforeUpdate:{}
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
        },
        getContactFormFields(state){

            return state.contactFormFields;
        },
        getFormUnchanged(state)
        {
            let cond1 = !state.contactFormFields.first_name;
            let cond2 = !state.contactFormFields.middle_name;
            let cond3 = !state.contactFormFields.last_name;
            let cond4 = !state.contactFormFields.email;
            let cond5 = !state.contactFormFields.number;
            let cond6 = !state.contactFormFields.site;
            let cond7 = !state.contactFormFields.birthday;
            let cond8 = !state.contactFormFields.city;
            let cond9 = !state.contactFormFields.work;
            let cond10 = !state.contactFormFields.work_email;
            let cond11 = !state.contactFormFields.group_id;
            let cond12 = !state.contactFormFields.comment;
            let cond13 = !state.contactFormFields.avatar;
            let finalCond = cond1&&cond2&&cond3&&cond4&&cond5&&cond6
                &&cond7&&cond8&&cond9&&cond10&&cond11&&cond12&&cond13;

            return finalCond;
        },
        getEditFormUnchanged(state)
        {
            let cond1 = state.contactFormFields.first_name==state.contactBeforeUpdate.first_name;
            let cond2 = state.contactFormFields.middle_name==state.contactBeforeUpdate.middle_name;
            let cond3 = state.contactFormFields.last_name==state.contactBeforeUpdate.last_name;
            let cond4 = state.contactFormFields.email==state.contactBeforeUpdate.email;
            let cond5 = state.contactFormFields.number==state.contactBeforeUpdate.number;
            let cond6 = state.contactFormFields.site==state.contactBeforeUpdate.site;
            let cond7 = state.contactFormFields.birthday==state.contactBeforeUpdate.birthday;
            let cond8 = state.contactFormFields.city==state.contactBeforeUpdate.city;
            let cond9 = state.contactFormFields.work==state.contactBeforeUpdate.work;
            let cond10 = state.contactFormFields.work_email==state.contactBeforeUpdate.work_email;
            let cond11 = state.contactFormFields.group_id==state.contactBeforeUpdate.group_id;
            let cond12 = state.contactFormFields.comment==state.contactBeforeUpdate.comment;
            let cond13 = state.contactFormFields.avatar==state.contactBeforeUpdate.avatar;

            let finalCond = cond1&&cond2&&cond3&&cond4&&cond5&&cond6
                &&cond7&&cond8&&cond9&&cond10&&cond11&&cond12&&cond13;

            return finalCond;
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
        },
        changeForm(state,change)
        {
           state.contactFormFields[change.fieldName] =change.value;
        },
        setEditContact(state,contact) {
            for(let field in contact){

                state.contactBeforeUpdate[field]=contact[field];
            }
        }
    },
    actions: {
        clearLastChangeForm(context){

            for(let field in context.getters.getContactFormFields){
                context.commit('changeForm',{fieldName:field,value:false});
            }
        },
        setContactValue(context){
            for(let field in context.getters.getContact){
                context.commit('changeForm',{fieldName:field,value:context.getters.getContact[field]});
            }
            context.commit('setEditContact',context.getters.getContact);
        }
    }
}
