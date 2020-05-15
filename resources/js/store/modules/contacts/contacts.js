import axios from 'axios';


export default {
    state: {
        contact:'',
    },
    getters: {
        getContact(state){

            return state.contact;
        }
    },
    mutations: {
        setContact(state,contact){
            contact.birthday= contact.birthday?contact.birthday.split(' ')[0]:'';
            state.contact = contact;
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
        }
    }
}
