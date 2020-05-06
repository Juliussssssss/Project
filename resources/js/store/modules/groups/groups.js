import axios from 'axios';


export default {
    state: {
        currentGroup: 0,
        groups: {}
    },
    getters: {
        getCurrentGroup(state) {
            return state.currentGroup;
        },
        getGroups(state) {
            return state.groups;
        }
    },
    mutations: {
        setCurrentGroup(state, payload) {
            state.currentGroup = payload;
        },
        fillGroups(state, groups) {
            state.groups = groups
        }
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
