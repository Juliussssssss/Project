import axios from 'axios';

export default {
    state: {
        // writeContacts: {}
    },
    getters: {
        // getWriteContacts(state) {
        //     return state.writeContacts;
        // }
    },
    mutations: {
        // setWriteContacts(state, payload) {
        //     state.writeContacts = payload
        // },
        // fillWriteContacts(state, payload) {
        //     state.writeContacts = payload
        // }
    },
    actions: {
        // takeWriteContacts(context) {
        //     axios.post('/api/contacts/write', {
        //         contacts: context.getters.getSelectedContacts
        //     })
        //     .then(response => {
        //         console.log(response)
        //         context.commit("fillWriteContacts", response.data)
        //     })
        //     .catch(error => {
        //         console.log(error)
        //     })
        // console.log('action')
        // console.log(context.getters.getSelectedContacts)
        //
        // let array = context.getters.getSelectedContacts
        //
        // for (let contact in context.getters.getContacts) {
        //     if(array.includes(contact)){
        //         console.log("inc " + contact)
        //     }
        //     console.log(array.includes(contact))
        // }
        // },
        write(context, payload) {
            console.log(payload)
            axios.post('/api/contacts/write', {
                form: payload,
                contacts: context.getters.getSelectedContacts
            })
            .then(response => {
                console.log(response)
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
