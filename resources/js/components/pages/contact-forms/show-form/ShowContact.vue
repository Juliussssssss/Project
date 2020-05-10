<template>
    <form onsubmit = "return false" id = "currentContact" ref='contact'>
        <show-form :contact="currentContact"></show-form>
    </form>
</template>

<script>
    import ShowForm from './blocks/ShowForm'
    export default {
        name: "ShowContact",
        props: ['user_id'],
        components:{
            ShowForm,
        },
        computed:{
            currentContact() {

                return this.$store.getters.getContact;
            }
        },
        created() {
             this.$store.dispatch('getContact',461);
        }
    }
</script>

<style scoped>
</style>

