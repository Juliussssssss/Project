<template>
    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 bg-white">
                    <div class="row">
                        <div class="col-3 customBorderRight customBorderTop customBorderLeft p-0">
                            <!-- left nav here -->
                            <left-nav></left-nav>
                        </div>
                        <div class="col-9 customBorderBottom customBorderRight customBorderTop">
                            <div class="row">
                                <div class="col-12 p-0 customBorderBottom">
                                    <!-- tools here -->
                                    <tools></tools>
                                </div>
                                <router-view></router-view>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style>

</style>

