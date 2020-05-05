<template>
    <div class="col-12">
        <div class="customBorderBottom topmenu textGrey">
            <div class="pl-5 py-3">Групы
                <submenu></submenu>
            </div>
        </div>
    </div>
</template>

<script>
    import submenu from "./submenu/Submenu";

    export default {
        name: "Groups",
        components: {
            submenu
        }
    }
</script>

<style>

</style>
