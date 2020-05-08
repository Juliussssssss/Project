<template>
    <div class = "w-100">
        <header-show-form :src="contact?contact.avatar:''">
            <header-show-tools ref="header" :contact="contact"></header-show-tools>
        </header-show-form>
        <show-form-fields :contact="contact"></show-form-fields>
    </div>
</template>

<script>
    import HeaderShowForm from './header/HeaderShowForm'
    import HeaderShowTools from './header/HeaderShowTools'
    import ShowFormFields from './ShowFormFields'
    export default {
        name: "ShowForm",
        props:['contact'],
        components:{
            HeaderShowForm,
            ShowFormFields,
            HeaderShowTools
        }
    }
</script>

<style scoped>

</style>

