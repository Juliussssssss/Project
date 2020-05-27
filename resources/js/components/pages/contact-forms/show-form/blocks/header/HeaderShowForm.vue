<template>
    <div class="col-12 customBorderBottom py-3 p-relative mb-3">
        <div class="row">
            <div class="col-sm-3 d-flex align-items-center justify-content-center d-sm-block">
                <div class="d-flex align-items-center">
                    <back></back>
                    <avatar-load :src="src" blocked="true" :show="true"></avatar-load>
                </div>
            </div>
            <div class="col-sm-9 d-flex align-items-center">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import AvatarLoad from '../../../../contact-forms/AvatarLoad';
    import Back from '../../../../contact-forms/Back'
    export default {
        name: "HeaderShowForm",
        props:['src'],
        components: {
            AvatarLoad,
            Back
        }
    }
</script>

<style scoped>
</style>
