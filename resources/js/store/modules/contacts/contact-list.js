import axios from 'axios';

export default {
    state: {
        pages: 0,
        currentPage: 1,
        contactsFromDb: {},
        length: 0,
        selected: [],
        contacts: [],
        sort: 1,
        highlightedWord: "",
    },
    getters: {
        getSelectedContacts(state){
            return state.selected;
        },
        getPages(state) {
            return state.pages;
        },
        getCurrentPage(state) {
            return state.currentPage;
        },
        getContactsFromDb(state) {
            return state.contactsFromDb;
        },
        getLength(state) {
            return state.length;
        },
        getHighlightedWord(state) {
            return state.highlightedWord;
        },
        getSort(state) {
            return state.sort
        },
        getContacts(state) {
            return state.contacts
        }
    },
    mutations: {
        setCurrentPage(state, payload) {
            state.currentPage = payload;
        },
        clearSelected(state) {
            state.selected = [];
        },
        setContacts(state, payload) {
            state.contacts = payload;
        },
        setLength(state, payload) {
            state.length = payload;
        },
        setPages(state, payload) {
            state.pages = payload;
        },
        setSort(state, payload) {
            state.sort = payload
        },
        setHighlightedWord(state, payload) {
            state.highlightedWord = payload;
        },
        setSelected(state, payload) {
            state.selected = payload;
        },
        fillContacts(state, payload) {
            state.contacts = payload;
            state.length = payload.length;
            state.pages = (Math.ceil(payload.length/100));
            state.currentPage = 1;
            state.selected = [];
        },
        fillContactsFromDb(state, payload) {
            state.contactsFromDb = payload
        }
    },
    actions: {
        clearSelectedFromGroups(context) {
            context.commit("clearSelected");
        },
        changePage(context, payload) {
            context.commit("setCurrentPage", payload);
            context.commit("clearSelected");
        },
        searchResult(context, payload) {
            context.commit("setContacts", payload);
            context.commit("setCurrentPage", 1);
            context.commit("setLength", payload.length);
            context.commit("setPages", (Math.ceil(payload.length / 100)));
        },
        selectedSortType(context, payload) {
            context.commit("setSort", payload);
        },
        searchWord(context, payload) {
            context.commit("setHighlightedWord", payload);
        },
        selectedContact(context, payload) {
            context.commit("setSelected", payload);
        },
        getAllContacts(context) {
            axios.get('/contacts/get-all')
            .then(response => {
                context.commit("fillContacts", response.data)
                context.commit("fillContactsFromDb", response.data)
                //context.commit("setLength", response.data.length)
                //context.commit("setPages", (Math.ceil(response.data.length/100)))
                //context.commit("setCurrentPage", 1)
            })
            .catch(function (error) {
                console.log(error)
            });
        },
        getFrequentContacts(context) {
            axios.get('/api/frequent-contacts')
                .then(response => {
                    context.commit("fillContacts", response.data)
                    context.commit("fillContactsFromDb", response.data)
                })
                .catch(function (error) {
                    console.log(error)
                });
        },
        deleteContacts(context,contacts){
            axios.delete('/api/contacts',{data: {
                    contacts:contacts
                }
            })
                .then(response => {
                    this.redirect()
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
