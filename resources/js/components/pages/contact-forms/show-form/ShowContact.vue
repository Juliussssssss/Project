<template>
    <form onsubmit = "return false" id = "currentContact" ref='contact'>
        <show-form :contact="currentContact"></show-form>
    </form>
</template>

<script>
    import ShowForm from './blocks/ShowForm'
    export default {
        name: "ShowContact",
        props: ['id'],
        components:{
            ShowForm,
        },
        computed:{
            currentContact() {

                return this.$store.getters.getContact;
            }
        },
        created() {
            this.$store.dispatch('getContact',2361)
        }
    }
</script>

<style scoped>
</style>

