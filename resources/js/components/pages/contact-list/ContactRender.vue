<template>
    <div>
        <tools></tools>
        <contact-list
            :highlightedWord="getHighlightedWord"
            :newSortType="getSort"
            :contacts="getContacts"
            :currentPage="getCurrentPage"
            @selectedContact="selectedContact"
        > </contact-list>
    </div>
</template>

<script>
    import ContactList from "./ContactList";
    import {mapActions, mapGetters} from "vuex";
    export default {
        name: "Contacts",
        components: {
            'contact-list': ContactList,
        },
        data() {
            return {

            }
        },
        computed: {
            ...mapGetters([
                "getCurrentPage",
                "getHighlightedWord",
                "getSort",
                "getContacts"
            ])
        },
        methods: {
            ...mapActions([
                "clearSelectedFromGroups",
                "selectedContact",
                "getFrequentContacts",
                "getAllContacts"
            ])
        },
        mounted() {
            if (this.$route.name=='FrequentContacts')
            {
                this.getFrequentContacts()
            }
            else {
                this.getAllContacts();
            }
        },
        created() {
            this.clearSelectedFromGroups();
        }
    }
</script>

<style scoped>

</style>
