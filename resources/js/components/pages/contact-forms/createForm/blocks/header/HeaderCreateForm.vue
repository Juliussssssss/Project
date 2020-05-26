<template>
    <div class="row">
        <div class="col-12 customBorderBottom py-3 ">
            <div class="row">
                <div class="col-sm-4 col-xl-3 d-flex align-items-center justify-content-center p-relative">
                    <back class="pl-0 pl-sm-4"></back>
                    <avatar-load class="ml-3 ml-sm-0"></avatar-load>
                </div>
                <div class="col-sm-8 col-xl-9 d-flex align-items-center p-relative">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AvatarLoad from '../../../../contact-forms/AvatarLoad';
    import Back from '../../../../contact-forms/Back'
    export default {
        name: "HeaderCreateForm",
        components: {
            AvatarLoad,
            Back
        }
    }
</script>

<style scoped>
    .customBorderBottom {
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
