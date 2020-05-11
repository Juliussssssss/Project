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
        fillGroups(state, groups) {
            state.groups = groups
        },
        // setAddGroupInputFocus(state) {
        //     state.addGroupInputFocus = !state.addGroupInputFocus
        //     console.log('setAddGroupInputFocus')
        // }
    },
    actions: {
        getContactGroups(context) {
            axios.get('/api/groups')
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
        deleteContactsWithGroup(context) {
            if (context.getters.getSelectedContacts.length > 0) {
                console.log('deleteContactsWithGroup')
                console.log(context.getters.getSelectedContacts)

                axios.delete('/api/groups/' + context.getters.getCurrentGroup + '/contacts', {
                    params: {
                        // id: context.getters.getCurrentGroup,
                        contacts: context.getters.getSelectedContacts
                    }
                })
                .then(response => {
                    console.log(response)
                    //this.getContactGroups()
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
