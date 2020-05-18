<template>
    <div class="col-4 py-4 align-items-center d-flex customBorderRight">
        <div class="w-100 d-flex justify-content-around flex-wrap">
            <edit-btn></edit-btn>
            <!-- меню -->
            <groups-dropdown-menu></groups-dropdown-menu>
            <!-- меню -->
            <import-btn></import-btn>
            <export-btn></export-btn>
            <print-btn></print-btn>
            <delete-btn></delete-btn>
        </div>
    </div>
</template>

<script>
    import GroupsDropdownMenu from "./buttons/groups-dropdown-menu/GroupsDropdownMenu";
    import DeleteBtn from "./buttons/delete-btn/DeleteBtn";
    import EditBtn from "./buttons/edit-btn/EditBtn";
    import ImportBtn from "./buttons/impot-btn/ImportBtn";
    import ExportBtn from "./buttons/export-btn/ExportBtn";
    import PrintBtn from "./buttons/print-btn/PrintBtn";

    export default {
        name: "Actions",
        components: {
            PrintBtn,
            ExportBtn,
            ImportBtn,
            EditBtn,
            DeleteBtn,
            GroupsDropdownMenu
        }
    }
</script>

<style>

</style>
