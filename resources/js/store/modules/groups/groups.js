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
        }
    }
}
