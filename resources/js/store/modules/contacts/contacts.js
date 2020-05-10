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
            state.contact = contact;
        }
    },
    actions: {
        getContact(context,id){
            axios.get('/api/contact/'+id)
                .then(response => {
                    context.commit('setContact',response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
