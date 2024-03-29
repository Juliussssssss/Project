import axios from 'axios';

export default {
    state: {
        currentGroup: 0,
        groups: {},
        // countGroups: 0
    },
    getters: {
        getCurrentGroup(state) {
            return state.currentGroup;
        },
        getGroups(state) {
            return state.groups;
        },
        getCountGroups(state) {
            return state.countGroups;
        }
    },
    mutations: {
        setCurrentGroup(state, payload) {
            state.currentGroup = payload;
        },
        fillGroups(state, payload) {
            state.groups = payload
            state.countGroups = payload.length
        }
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
        addContactsAtGroup(context, payload) {
            console.log('addGroupAtContacts')
            if (context.getters.getSelectedContacts.length > 0) {
                axios.put('/api/groups/' + context.getters.getCurrentGroup + '/contacts/', {
                    contacts: context.getters.getSelectedContacts
                })
                .then(response => {
                    if (payload !== 'contacts')
                        context.dispatch("takeContactsForCurrentPage", payload)
                    else {
                        context.commit("fillContacts", response.data)
                        context.commit("fillContactsFromDb", response.data)
                    }
                    context.dispatch("getContactGroups")
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },
        deleteGroup(context, payload) {
            axios.delete('/api/groups/' + context.getters.getCurrentGroup)
            .then(response => {
                context.commit("fillGroups", response.data)
                //console.log(response.data)
                if (payload !== 'groups')
                    context.dispatch("takeContactsForCurrentPage", payload)
                else {
                    context.dispatch("getAllContacts")
                }
            })
            .catch(error => {
                console.log(error)
            })
        },
        takeContactsForCurrentPage(context, payload) {
            if (payload === 'favorites') {
                context.dispatch("getFavorites")
            } else if (payload === 'FrequentContacts') {
                context.dispatch("getFrequentContacts")
            } else if (payload === 'groups') {
                context.dispatch("getContactsWithGroup", context.getters.getCurrentGroup)
            }
        }
    }
}
