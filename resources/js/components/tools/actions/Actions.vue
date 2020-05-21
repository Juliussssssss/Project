<template>
    <div class="col-3 col-xl-4 py-4 align-items-center d-flex customBorderRight">
        <div class="">
            <div class="position-absolute">
                <div id="mySidenav" style="width: 0px" class="sidenav">
                    <left-nav></left-nav>
                </div>
            </div>
            <div class="w-100 row-cols-1 row-cols-xl-2 d-flex justify-content-center text-center justify-content-xl-around flex-wrap">
                <span class="secondLeftNavBtn" @click="openNav">&#9776;</span>
                <!--                <div class="w-50 d-flex justify-content-around">-->
                <!--                    <edit-btn></edit-btn>-->
                <!--                    &lt;!&ndash; меню &ndash;&gt;-->
                <!--                    <groups-dropdown-menu></groups-dropdown-menu>-->
                <!--                    &lt;!&ndash; меню &ndash;&gt;-->
                <!--                    <import-btn></import-btn>-->
                <!--                </div>-->
                <!--                <div class="w-50 d-flex justify-content-around">-->
                <!--                    <export-btn></export-btn>-->
                <!--                    <print-btn></print-btn>-->
                <!--                    <delete-btn></delete-btn>-->
                <!--                </div>-->
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
    .secondLeftNavBtn:hover {
        color: #666666;
    }
    .secondLeftNavBtn {
        font-size:30px;
        cursor:pointer;
        color: #D8D8D8;
    }
    .sidenav {
        left: -17px;
        top: 83px;
        height: auto;
        position: absolute;
        z-index: 1;
        background-color: #ffffff;
        border: 0px solid #F5F5F5;
        overflow-x: hidden;
        transition: 0.5s;
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

</style>
