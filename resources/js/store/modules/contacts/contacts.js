import axios from 'axios';


export default {
    state: {
        contact:'',
        duplicatedContacts:''
    },
    getters: {
        getContact(state){

            return state.contact;
        },
        getDuplicatedContacts(state){

            return state.duplicatedContacts;
        }
    },
    mutations: {
        setContact(state,contact){
            contact.birthday= contact.birthday?contact.birthday.split(' ')[0]:'';
            state.contact = contact;
        },
        setDuplicatedContacts(state,contacts){
            state.duplicatedContacts = contacts;
        }
    },
    actions: {
        getContact(context,id){
            axios.get('/api/contact/'+id)
                .then(response => {
                    context.commit('setContact',response.data);
                    context.dispatch('setContactValue');
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getDuplicate(context){
            axios.get('/api/duplicate')
                .then(response => {
                    context.commit('setDuplicatedContacts',response.data);
                })
                .catch(error => {
                    console.log(error);
                });

        }
    }
}
