import axios from 'axios';


export default {
    state: {

    },
    getters: {

    },
    mutations: {
        setFavorites(state,contact)
        {
            state.contacts[contact.index].favorites = contact.favorites;
        }
    },
    actions: {
        updateFavorites(context, contact) {
            if (contact.int == 1) {
                contact.int = 0;
            } else {
                contact.int = 1;
            }
            axios.post('/contacts/set-favorites', {id: contact.id, value: contact.int})
                .then(response => {
                    let index = context.getContacts.findIndex(x => x.id == contact.id);
                    context.commit('setFavorites',{index,favorites:contact.int});
                })
                .catch(function (error) {
                    console.log(error)
                });
        },
        getFavorites(context) {
            axios.get('/api/contacts/favorites')
            .then(response => {
                context.commit("fillContacts", response.data)
                context.commit("fillContactsFromDb", response.data)
                //console.log(response.data)
            })
            .catch(function (error) {
                console.log(error)
            });
        }
    }
}
