<template>
    <div class="row">
        <div class="col-12 p-0 customBorderBottom ">
            <div>
                <nav class="navbar navbar-expand-lg d-lg-none navbar-light bg-white p-0">
                    <div class="d-flex justify-content-between p-3 w-100 customBorderBottom align-items-center">
                        <a class="textGrey font-18px" href="#">Меню</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <left-nav></left-nav>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="row m-0">
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
        },
    }
</script>

<style>
</style>
