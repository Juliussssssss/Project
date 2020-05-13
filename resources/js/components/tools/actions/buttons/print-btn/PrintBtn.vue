<template>
    <div>
        <div data-toggle="modal" data-target="#exampleModalPrint">
            <svg id="print" width="30" height="30" viewBox="0 0 30 30" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <mask id="mask5" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="6" width="20"
                      height="18">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M22 11H8C6.34 11 5 12.34 5 14V20H9V24H21V20H25V14C25 12.34 23.66 11 22 11ZM19 22H11V17H19V22ZM22 15C21.45 15 21 14.55 21 14C21 13.45 21.45 13 22 13C22.55 13 23 13.45 23 14C23 14.55 22.55 15 22 15ZM21 6H9V10H21V6Z"
                          fill="white"/>
                </mask>
                <g mask="url(#mask5)">
                    <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                </g>
            </svg>
        </div>
        <print-modal :contactsInGroups="contactsInGroups" :contacts="contacts"></print-modal>
    </div>
</template>

<script>
    import printModal from '../../../../modal/Print'
    import axios from "axios";
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "PrintBtn",
        data() {
            return {
                contacts: [],
                contactsInGroups :[],
            }
        },
        components: {
            printModal
        },
        created() {
            this.getGoupsWithContacts();
            this.setContact();
        },
        watch: {
            getContacts: function () {
                this.setContact();
                this.getGoupsWithContacts();
            }
        },
        computed: {
            ...mapGetters([
                "getContacts"
            ])
        },
        methods: {
            getGoupsWithContacts() {
                this.contactsInGroups = [];
                axios.get('/testPrint/test')
                    .then(response => {
                        let a = response.data;
                        a.forEach(element => {
                            var group = new Object();
                            group.id = element.group.id;
                            group.name = element.group.name;
                            group.contacts = element.total;
                            this.contactsInGroups.push(group);
                        });
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },
            setContact() {
                this.contacts = [];
                var allContacts = new Object();
                allContacts.name = "Контакты";
                allContacts.contacts = this.getContacts.length;
                this.contacts.push(allContacts);
            }
        },
    }
</script>

<style scoped>

</style>
