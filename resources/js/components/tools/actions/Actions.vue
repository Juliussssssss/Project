<template>
    <div class="col-4 py-4 align-items-center d-flex customBorderRight pl-4">
        <div class="w-100 d-flex justify-content-between">
            <edit-btn></edit-btn>
            <!-- меню -->
            <groups-dropdown-menu></groups-dropdown-menu>
            <!-- меню -->
            <svg id="import" width="30" height="30" viewBox="0 0 30 30" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <mask id="mask3" mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="7" width="24"
                      height="16">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M22.35 13.04C21.67 9.59 18.64 7 15 7C12.11 7 9.6 8.64 8.35 11.04C5.34 11.36 3 13.91 3 17C3 20.31 5.69 23 9 23H22C24.76 23 27 20.76 27 18C27 15.36 24.95 13.22 22.35 13.04ZM17 16V20H13V16H10L15 11L20 16H17Z"
                          fill="white"/>
                </mask>
                <g mask="url(#mask3)">
                    <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                </g>
            </svg>
            <svg id="export" width="30" height="30" viewBox="0 0 30 30" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <mask id="mask4" mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="7" width="24"
                      height="16">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M22.35 13.04C21.67 9.59 18.64 7 15 7C12.11 7 9.6 8.64 8.35 11.04C5.34 11.36 3 13.91 3 17C3 20.31 5.69 23 9 23H22C24.76 23 27 20.76 27 18C27 15.36 24.95 13.22 22.35 13.04ZM20 16L15 21L10 16H13V12H17V16H20Z"
                          fill="white"/>
                </mask>
                <g mask="url(#mask4)">
                    <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                </g>
            </svg>
            <svg id="print" width="30" height="30" viewBox="0 0 30 30" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <mask id="mask5" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="6" width="20"
                      height="18">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M22 11H8C6.34 11 5 12.34 5 14V20H9V24H21V20H25V14C25 12.34 23.66 11 22 11ZM19 22H11V17H19V22ZM22 15C21.45 15 21 14.55 21 14C21 13.45 21.45 13 22 13C22.55 13 23 13.45 23 14C23 14.55 22.55 15 22 15ZM21 6H9V10H21V6Z"
                          fill="white"/>
                </mask>
                <g mask="url(#mask5)">
                    <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                </g>
            </svg>
            <delete-btn></delete-btn>
        </div>
    </div>
</template>

<script>
    import GroupsDropdownMenu from "./groups-dropdown-menu/GroupsDropdownMenu";
    import DeleteBtn from "./delete-btn/DeleteBtn";
    import EditBtn from "./edit-btn/EditBtn";

    export default {
        name: "Actions",
        components: {
            EditBtn,
            DeleteBtn,
            GroupsDropdownMenu
        }
    }
</script>

<style>

</style>
