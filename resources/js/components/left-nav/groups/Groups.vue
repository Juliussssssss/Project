<template>
    <div :class="this.$route.name == 'groups' ? 'activeBorder' : ''">
        <div class="customBorderBottom textGrey">
            <div class="dropright">
                <div class="pl-3 pl-xl-5 py-3 w-100 d-flex justify-content-between dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Групы</span>
                    <div class="pr-4"><span class="customArrow"></span></div>
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
        },
        computed: {
        }
    }
</script>

<style>
    .dropright .dropdown-toggle::after {
        display: none;
    }
    .customArrow {
        width: 9px;
        text-align: right;
        height: 9px;
        display: inline-block;
        border: solid #D8D8D8;
        border-width: 0 2px 2px 0;
        transform: rotate(-45deg);
        content: "";
    }
</style>
