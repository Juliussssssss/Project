<template>
    <div class="col-12">
        <div class="customBorderBottom topmenu textGrey">
            <div class="pl-5 py-3">Групы
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
