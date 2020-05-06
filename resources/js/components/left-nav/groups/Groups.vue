<template>
    <div class="col-12">
        <div class="customBorderBottom topmenu textGrey">
            <div class="pl-5 py-3">Групы
                <submenu></submenu>
            </div>
        </div>
        <edit-modal></edit-modal>
        <delete-modal></delete-modal>
    </div>
</template>

<script>
    import submenu from "./submenu/Submenu";
    import editModal from "./modals/EditModal";
    import deleteModal from "./modals/DeleteModal";

    export default {
        name: "Groups",
        components: {
            submenu,
            editModal,
            deleteModal
        }
    }
</script>

<style>

</style>
