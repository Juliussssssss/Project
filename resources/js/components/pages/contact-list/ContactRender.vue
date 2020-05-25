<template>
    <div>
        <tools></tools>
        <contact-list></contact-list>
        <div class="addContact align-items-center justify-content-center d-lg-none"
            :class="">
            <router-link
                active-class="d-none"
                to="/create-contact">
                <svg width="50" height="50" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="8" width="14" height="14">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 16H16V22H14V16H8V14H14V8H16V14H22V16Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask0)">
                        <rect x="2" y="2" width="26" height="26" fill="#fff"/>
                    </g>
                </svg>
            </router-link>
        </div>
    </div>
</template>

<script>
    import ContactList from "./ContactList";
    import {mapActions, mapGetters} from "vuex";
    export default {
        name: "Contacts",
        components: {
            'contact-list': ContactList,
        },
        methods: {
            ...mapActions([
                "clearSelectedFromGroups",
                "getFrequentContacts",
                "getAllContacts",
                "getFavorites"
            ]),
        },
        mounted() {
            if (this.$route.name=='FrequentContacts')
            {
                this.getFrequentContacts()
            }
            else  if (this.$route.name=='favorites')
            {
                this.getFavorites()
            }
            else {
                this.getAllContacts();
            }
        },
        created() {
            this.clearSelectedFromGroups();
        }
    }
</script>

<style scoped>
    .addContact {
        height: 50px; width: 50px;
        background: #1875F0;
        border-radius: 100px;
        color: #fff;
        position: fixed;
        right: 50px;
        bottom: 50px;
    }
</style>
