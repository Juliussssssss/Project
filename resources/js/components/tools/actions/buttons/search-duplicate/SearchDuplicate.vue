<template>
    <div>
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="repeat" mask-type="alpha" maskUnits="userSpaceOnUse" x="6" y="5" width="18" height="20">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10H20V13L24 9L20 5V8H8V14H10V10ZM20 20H10V17L6 21L10 25V22H22V16H20V20Z" fill="white"/>
            </mask>
            <g mask="url(#repeat)">
                <rect x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
            </g>
        </svg>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "SearchDuplicate",
        methods: {
            ...mapActions(["clearSelectedFromGroups"]),
            editContact() {
                if (this.getSelectedContacts.length == 1) {
                    this.$router.push({ name: 'ContactEdit', params: {user_id: this.getSelectedContacts[0]}});
                }
            }
        },
        computed: {
            ...mapGetters(["getSelectedContacts"])
        },
    }
</script>

<style>

</style>
