<template>
    <div class="row">
        <div class="col-12 customBorderBottom ">
            <div class="row fixPanel">
                <actions></actions>
                <search></search>
                <pagination :pages="pages" :currentPage="currentPage" :length="length" :sortType="sortType" @atPage="atPage" @selectedSortType="selectedSortType"></pagination>
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
        props: ["pages", "currentPage", "length", "sortType"],
        methods: {
            atPage(int) {
                this.$emit("changePage", int);
            },
            selectedSortType(int) {
                this.$emit("selectedSortType", int)
            }
        }
    }
</script>

<style>

</style>
