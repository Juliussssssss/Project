<template>
    <div>
        <tools
            :pages="getPages"
            :currentPage="getCurrentPage"
            :contacts="getContactsFromDb"
            :length="getLength"
            @changePage="changePage"
            @searchResult="searchResult"
            @selectedSortType="selectedSortType"
            @searchWord="searchWord"
        ></tools>
        <contact-list
            :highlightedWord="getHighlightedWord"
            :newSortType="getSort"
            :contacts="getContacts"
            :currentPage="getCurrentPage"
            @selectedContact="selectedContact"
        ></contact-list>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "EditGroup",
        computed: {
            ...mapGetters([
                "getPages",
                "getCurrentPage",
                "getContactsFromDb",
                "getLength",
                "getHighlightedWord",
                "getSort",
                "getContacts"
            ])
        },
        methods: {
            ...mapActions([
                "changePage",
                "searchResult",
                "selectedSortType",
                "searchWord",
                "selectedContact",
                "getAllContacts"
            ])
        },
        mounted() {
            this.getAllContacts()
        }
    }
</script>

<style>

</style>
