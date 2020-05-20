<template>
    <div class="col-12 group-menu">
        <div class="customBorderBottom textGrey">
            <div class="dropright">
                <div class="pl-2 pl-xl-5 py-3 w-100 d-flex justify-content-between" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Групы
                    <div class="mx-4 font-weight-bold">&gt;</div>
                </div>
                <submenu></submenu>
            </div>
        </div>
        <delete-modal></delete-modal>
    </div>
</template>

<script>
    import submenu from "./submenu/Submenu";

    import deleteModal from "./modals/DeleteModal";

    export default {
        name: "Groups",
        components: {
            submenu,
            deleteModal
        }
    }
</script>

<style>
    .group-menu {
        cursor: pointer;
    }
</style>
