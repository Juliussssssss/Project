import axios from 'axios';


export default {
    state: {
        currentGroup: 0,
        groups: {},
    },
    getters: {
        getCurrentGroup(state) {
            return state.currentGroup;
        },
        getGroups(state) {
            return state.groups;
        },
        // getAddGroupInputFocus(state) {
        //     return state.addGroupInputFocus
        // }
    },
    mutations: {
        setCurrentGroup(state, payload) {
            state.currentGroup = payload;
        },
        fillGroups(state, payload) {
            state.groups = payload
        },
        // setAddGroupInputFocus(state) {
        //     state.addGroupInputFocus = !state.addGroupInputFocus
        //     console.log('setAddGroupInputFocus')
        // }
    },
    actions: {
        getContactGroups(context) {
            axios.get('/api/groups/')
            .then(response => {
                //console.log(response.data)
                context.commit("fillGroups", response.data)
            })
            .catch(error => {
                console.log(error);
            });
        },
        getContactsWithGroup(context, payload) {
            axios.get('/api/groups/' + payload)
            .then(response => {
                console.log(response.data)
                context.commit("fillContacts", response.data)
                context.commit("fillContactsFromDb", response.data)
            })
            .catch(error => {
                console.log(error);
            });
        },
        deleteContactsAtGroup(context) {
            if (context.getters.getSelectedContacts.length > 0) {
                axios.delete('/api/groups/' + context.getters.getCurrentGroup + '/contacts/', {
                    params: {
                        contacts: context.getters.getSelectedContacts
                    }
                })
                .then(response => {
                    context.commit("fillContacts", response.data)
                    context.commit("fillContactsFromDb", response.data)
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },
        addContactsAtGroup(context) {
            console.log('addGroupAtContacts')
            if (context.getters.getSelectedContacts.length > 0) {
                axios.put('/api/groups/' + context.getters.getCurrentGroup + '/contacts/', {
                        contacts: context.getters.getSelectedContacts
                })
                .then(response => {
                    context.commit("fillContacts", response.data)
                    context.commit("fillContactsFromDb", response.data)
                    context.dispatch("getContactGroups")
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },
        deleteGroup(context) {
            axios.post('/api/groups/' + context.getters.getCurrentGroup, {
                params: {
                    _method: 'delete'
                }
            })
            .then(response => {
                context.commit("fillGroups", response.data)
                console.log(response.data)
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
