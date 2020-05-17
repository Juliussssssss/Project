<template>
    <div class="col-12">
        <div class="customBorderBottom textGrey">
            <div class="dropright">
                <div class="pl-3 pl-lg-5 py-3 w-100 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Групы
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

</style>
