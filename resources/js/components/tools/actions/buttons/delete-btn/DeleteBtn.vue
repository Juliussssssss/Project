<template>
    <div>
        <div @click="deleteClick($event)" :data-toggle="getSelectedContacts.length >= 1 ? 'modal' : ''" data-target="#confirmDeleteContact">
            <svg id="delete" width="30" height="30" viewBox="0 0 30 30" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <mask id="mask6" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="6" width="14"
                      height="18">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M9 22C9 23.1 9.9 24 11 24H19C20.1 24 21 23.1 21 22V10H9V22ZM22 7H18.5L17.5 6H12.5L11.5 7H8V9H22V7Z"
                          fill="white"/>
                </mask>
                <g mask="url(#mask6)">
                    <rect :class="getSelectedContacts.length >= 1 ? 'actionButtons' : ''" x="2" y="2" width="26"
                          height="26"
                          fill="#D8D8D8"/>
                </g>
            </svg>
        </div>
        <confirm-delete-contacts></confirm-delete-contacts>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import confirmDeleteContacts from "../../../../modal/confirm-delete/ConfirmDeleteContact"

    export default {
        name: "DeleteBtn",
        components: {
            confirmDeleteContacts
        },
        methods: {
            ...mapActions([
                "deleteContactsAtGroup",
                "deleteContacts"
            ]),
            deleteClick(event) {
                if (this.$route.name !== 'groups') {
                } else {
                    event.stopPropagation()
                    this.deleteContactsAtGroup();
                    this.$router.push('/contacts')
                }
            },
        },
        computed: {
            ...mapGetters([
                "getSelectedContacts",
            ])
        }
    }
</script>

<style scoped>

</style>
