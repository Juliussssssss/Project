<template>
    <form onsubmit = "return false" id = "currentContact" ref='contact'>
        <show-form v-if="currentContact" :contact="currentContact"></show-form>
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
             this.$store.dispatch('getContact',this.user_id);
        }
    }
</script>

<style scoped>
</style>

