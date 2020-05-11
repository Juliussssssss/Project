import axios from 'axios';


export default {
    state: {
        currentGroup: 0,
        groups: {},
        //addGroupInputFocus: false
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
                console.log(response.data)
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
                //context.commit("setCurrentPage", 1)
                context.commit("fillContacts", response.data)
                context.commit("fillContactsFromDb", response.data)
                //context.commit("setLength", response.data.length)
                //context.commit("setPages", (Math.ceil(response.data.length/100)))
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
