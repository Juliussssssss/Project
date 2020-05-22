<template>
    <div class="col-12 col-md-3 col-xl-4 w-100 py-1 py-md-4 align-items-center d-flex toolButtons">
        <div class="w-100 row-cols-2 row-cols-md-1 row-cols-xl-2 d-flex justify-content-center text-center justify-content-xl-around flex-wrap">
            <div class="w-50 d-flex justify-content-around">
                <edit-btn></edit-btn>
                <!-- меню -->
                <groups-dropdown-menu></groups-dropdown-menu>
                <!-- меню -->
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

    export default {
        name: "Actions",
        components: {
            PrintBtn,
            ExportBtn,
            ImportBtn,
            EditBtn,
            DeleteBtn,
            GroupsDropdownMenu
        },
        methods: {
            openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("mySidenav").style.borderWidth = "2px 2px 2px 2px";
            },
        }
    }
</script>

<style>
    .toolButtons {
        border: solid #F5F5F5;
        border-width: 0 2px 0 0;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        color: #818181;
        display: block;
        transition: 0.3s;
        font-size: 0.9rem !important;
        font-weight: 400 !important;
    }

    @media screen and (max-width: 767px) {
        .toolButtons {
            border-width: 0 0 2px 0;
        }
    }
</style>
