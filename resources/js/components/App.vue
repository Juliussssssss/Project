<template>
    <div>
        <Header></Header>
        <div class="container mt-5" v-if="(this.$route.name != 'Test')">
            <div class="row">
                <div class="col-12 bg-white">
                    <div class="row">
                        <div class="col-3 customBorderRight customBorderTop customBorderLeft p-0">
                            <!-- left nav here -->
                            <left-nav></left-nav>
                        </div>
                        <div class="col-9 customBorderBottom customBorderRight customBorderTop">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <router-view v-else></router-view>
    </div>
</template>

<script>
    import Header from "./header/header";
    export default {
        name: "App",
        components: {Header}
    }
</script>

<style>

</style>

