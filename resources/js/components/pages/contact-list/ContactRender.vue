<template>
    <div>
        <tools
            :pages="pages"
            :currentPage="currentPage"
            :contacts="contactsFromDb"
            :length="length"
            @changePage="changePage"
            @searchResult="searchResult"
            @selectedSortType="selectedSortType"
            @searchWord="searchWord"
        ></tools>
        <contact-list
            :highlightedWord="highlightedWord"
            :newSortType="sort"
            :contacts="contacts"
            :currentPage="currentPage"
            @selectedContact="selectedContact"
        ></contact-list>
    </div>
</template>

<script>
    import ContactList from "./ContactList";
    export default {
        name: "Contacts",
        components: {
            'contact-list': ContactList,
        },
        data() {
            return {
                contacts: [],
                contactsFromDb: [],
                pages: 0,
                currentPage: 1,
                length: 0,
                selected: [],
                sort: 1,
                highlightedWord: "",
            }
        },
        created() {
            axios.get('/contacts/get-all')
                .then(response => {
                    this.contacts = response.data;
                    this.contactsFromDb = this.contacts;
                    this.pages = (Math.ceil(this.contacts.length/100));
                    this.length = this.contacts.length;
                })
                .catch(function (error) {
                    console.log(error)
                });
        },
        methods: {
            selectedContact(array) {
                this.selected = array;
            },
            changePage(int) {
                this.currentPage = int;
                this.selected = []
            },
            selectedSortType(int) {
                this.sort = int
            },
            searchResult(array) {
                this.contacts = array;
                this.currentPage = 1;
                this.length = array.length;
                this.pages = (Math.ceil(array.length/100));
            },
            searchWord(string) {
                this.highlightedWord = string;
            }
        }
    }
</script>

<style scoped>

</style>
