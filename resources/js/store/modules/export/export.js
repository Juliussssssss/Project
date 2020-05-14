import axios from 'axios';


export default {
    state: {
        countContacts: 0,
        countFrequentContacts: 0,
    },
    getters: {
        getCountContacts(state) {
            return state.countContacts;
        },
        getCountFrequentContacts(state) {
            return state.countFrequentContacts;
        }
    },
    mutations: {
        setCountContacts (state, payload) {
            state.countContacts = payload
        },
        setCountFrequentContacts (state, payload) {
            state.countFrequentContacts = payload
        },
    },
    actions: {
        getCountContactsFromDB(context) {
            axios.get('/api/contacts/count')
            .then(response => {
                context.commit("setCountContacts", response.data)
            })
            .catch(error => {
                console.log(error);
            });
        },
        getCountFrequentContactsFromDB(context) {
            axios.get('/api/contacts/frequent')
            .then(response => {
                context.commit("setCountFrequentContacts", response.data)
            })
            .catch(error => {
                console.log(error);
            });
        },
    }
}
