<template>
    <div class="col-3 col-xl-4 py-4 align-items-center d-flex customBorderRight">
        <div class="w-100 row-cols-1 row-cols-xl-2 d-flex justify-content-center text-center justify-content-xl-around flex-wrap">
            <div class="w-50 d-flex justify-content-around">
                <edit-btn></edit-btn>
                <!-- меню -->
                <groups-dropdown-menu></groups-dropdown-menu>
                <!-- меню -->
                <search-duplicate-btn></search-duplicate-btn>
                <import-btn></import-btn>
            </div>
            <div class="w-50 d-flex justify-content-around">
                <export-btn></export-btn>
                <print-btn></print-btn>
                <delete-btn></delete-btn>
            </div>
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
    import SearchDuplicateBtn from "./buttons/search-duplicate/SearchDuplicate";

    export default {
        name: "Actions",
        components: {
            PrintBtn,
            ExportBtn,
            ImportBtn,
            EditBtn,
            DeleteBtn,
            GroupsDropdownMenu,
            SearchDuplicateBtn
        }
    }
</script>

<style>

</style>
