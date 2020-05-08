<template>
    <div class="row">
        <div class="col-12 customBorderBottom ">
            <div class="row fixPanel">
                <actions></actions>
                <search
                    :contacts="contacts"
                    @searchResult="searchResultT"
                    @searchWord="searchWordT"
                ></search>
                <pagination
                    :pages="getPages"
                    :currentPage="getCurrentPage"
                    :length="getLength"
                    @atPage="atPageT"
                    @selectedSortType="selectedSortTypeT"
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
        props: ["contacts"],
        methods: {
            atPageT(int) {
                this.changePage(int);
            },
            selectedSortTypeT(int) {
                this.selectedSortType(int)
            },
            searchResultT(array) {
                this.searchResult(array)
            },
            searchWordT(string) {
                this.searchWord(string)
            },
            ...mapActions([
                "changePage",
                "searchResult",
                "selectedSortType",
                "searchWord"
            ])
        },
        computed: {
            ...mapGetters([
                "getPages",
                "getCurrentPage",
                "getLength"
            ])
        },
    }
</script>

<style>

</style>
