<template>
    <div class="row">
        <div class="col-12 customBorderBottom ">
            <div class="row fixPanel">
                <actions
                    :selectedContacts="getSelectedContacts">
                </actions>
                <search
                    :contacts="getContactsFromDb"
                    @searchResult="searchResult"
                    @searchWord="searchWord"
                ></search>
                <pagination
                    :pages="getPages"
                    :currentPage="getCurrentPage"
                    :length="getLength"
                    @changePage="changePage"
                    @selectedSortType="selectedSortType"
                ></pagination>
            </div>
        </div>
        <!-- разделитель -->
    </div>
</template>

<script>
    import actions from "./actions/Actions";
    import search from "./search/Search";
    import pagination from "./pagination/Pagination";
    import {mapActions, mapGetters} from "vuex";
    export default {
        name: "Tools",
        components: {
            actions,
            search,
            pagination
        },
        computed: {
            ...mapGetters([
                "getPages",
                "getCurrentPage",
                "getLength",
                "getContacts",
                "getContactsFromDb",
                "getSelectedContacts",
            ])
        },
        methods: {
            ...mapActions([
                "searchWord",
                "searchResult",
                "changePage",
                "selectedSortType",
            ])
        },
    }
</script>

<style>

</style>
