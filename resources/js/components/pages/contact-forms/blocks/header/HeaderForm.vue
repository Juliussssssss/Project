<template>
    <div class="col-12 customBorderBottom py-3 d-flex align-items-center p-relative mb-3">
        <avatar-load :blocked = "blocked"></avatar-load>
        <slot></slot>
    </div>
</template>

<script>
    import AvatarLoad from './AvatarLoad';
    export default {
        name: "HeaderCreateForm",
        props:['blocked'],
        components: {
            AvatarLoad
        }
    }
</script>

<style scoped>
    .customBorderBottom::after,.customBorderBottom::before {
        content: '';
        top: 118px;
        width: 15px;
        height: 2px;
        position: absolute;
        background-color: #F5F5F5;
    }
    .customBorderBottom::before {
        left: -15px;
    }
    .customBorderBottom::after {
        right: -15px;
    }
</style>
