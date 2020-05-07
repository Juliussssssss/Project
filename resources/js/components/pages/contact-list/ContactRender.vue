<template>
    <div>
        <router-link :to="{ name: 'Test', params: {placeName: 1 } }">View more</router-link>
        <tools
            :pages="pages"
            :currentPage="currentPage"
            :length="length"
            @changePage="changePage"
            @selectedSortType="selectedSortType"
        ></tools>
        <contact-list
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
                pages: 0,
                currentPage: 1,
                length: 0,
                selected: [],
                sort: 1,
            }
        },
        created() {
            axios.get('/contacts/get-all')
                .then(response => {
                    this.contacts = response.data;
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
        }
    }
</script>

<style scoped>

</style>
