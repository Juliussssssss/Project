<template>
        <show-form v-if="currentContact" :contact="currentContact"></show-form>
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
        created()
        {
            if(!this.user_id) {
                this.$router.push('/contacts');
            }
            this.$store.dispatch('getContact',this.user_id);
        }
    }
</script>

<style scoped>
</style>

