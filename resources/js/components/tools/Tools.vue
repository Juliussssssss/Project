<template>
    <div class="row">
        <div class="col-12 customBorderBottom ">
            <div class="row fixPanel">
                <actions></actions>
                <search
                    :contacts="contacts"
                    @searchResult="searchResult"
                    @searchWord="searchWord"
                ></search>
                <pagination
                    :pages="pages"
                    :currentPage="currentPage"
                    :length="length"
                    @atPage="atPage"
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

    export default {
        name: "Tools",
        components: {
            actions,
            search,
            pagination
        },
        props: ["pages", "currentPage", "length", "contacts"],
        methods: {
            atPage(int) {
                this.$emit("changePage", int);
            },
            selectedSortType(int) {
                this.$emit("selectedSortType", int)
            },
            searchResult(array) {
                this.$emit("searchResult", array)
            },
            searchWord(string) {
                this.$emit("searchWord", string)
            }
        },
    }
</script>

<style>

</style>
