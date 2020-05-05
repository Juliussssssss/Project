<template>
    <div class="row">
        <contactHeader></contactHeader>
        <fields></fields>
    </div>
</template>

<script>
    import fields from "./fields/Fields";
    import contactHeader from "./contact-header/ContactHeader"

    export default {
        name: "Edit",
        components: {
            fields,
            contactHeader
        }
    }
</script>

<style>
    .imageUpload > img {
        border-radius: 50%;
    }
</style>
