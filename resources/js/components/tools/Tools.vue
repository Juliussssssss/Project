<template>
    <div class="row">
        <div class="col-12 customBorderBottom fixPanel">
            <div class="row">
                <actions></actions>
                <search></search>
                <pagination></pagination>
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
        }
    }
</script>

<style>

</style>
