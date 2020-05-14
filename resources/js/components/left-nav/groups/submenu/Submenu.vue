<template>
    <div class="dropdown-menu">
        <div class="dropdown-item customBorderBottom d-flex justify-content-between align-items-center row textGrey m-0 py-3 pl-0 pr-3"
             v-for="group in getGroups">
            <div class="col-2 pl-3">
                <svg class="margingY" width="30" height="30" viewBox="0 0 30 30" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <mask id="group" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="8" width="22"
                          height="14">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M19 14C20.66 14 21.99 12.66 21.99 11C21.99 9.34 20.66 8 19 8C17.34 8 16 9.34 16 11C16 12.66 17.34 14 19 14ZM11 14C12.66 14 13.99 12.66 13.99 11C13.99 9.34 12.66 8 11 8C9.34 8 8 9.34 8 11C8 12.66 9.34 14 11 14ZM11 16C8.67 16 4 17.17 4 19.5V22H18V19.5C18 17.17 13.33 16 11 16ZM19 16C18.71 16 18.38 16.02 18.03 16.05C19.19 16.89 20 18.02 20 19.5V22H26V19.5C26 17.17 21.33 16 19 16Z"
                              fill="white"/>
                    </mask>
                    <g mask="url(#group)">
                        <rect class="itemActionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
            </div>
            <div class="col-6 group-name">{{ group.name }}</div>
            <div class="col-4">
                <router-link to="groups"></router-link>
                <a data-toggle="modal" data-target="#editModal" @click="editClick(group.id)">
                    <svg class="margingY" width="30" height="30" viewBox="0 0 30 30" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <mask id="edit" mask-type="alpha" maskUnits="userSpaceOnUse" x="6" y="6" width="19" height="19">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M6 20.2525V24.0025H9.75L20.81 12.9425L17.06 9.1925L6 20.2525ZM23.71 10.0425C24.1 9.6525 24.1 9.0225 23.71 8.6325L21.37 6.2925C20.98 5.9025 20.35 5.9025 19.96 6.2925L18.13 8.1225L21.88 11.8725L23.71 10.0425Z"
                                  fill="white"/>
                        </mask>
                        <g mask="url(#edit)">
                            <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                        </g>
                    </svg>
                </a>
                <!--                click -->
                <a href="" data-toggle="modal" data-target="#deleteModal" @click="deleteClick(group.id)">
                    <svg class="margingY" width="30" height="30" viewBox="0 0 30 30" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <mask id="delete" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="6" width="14"
                              height="18">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9 22C9 23.1 9.9 24 11 24H19C20.1 24 21 23.1 21 22V10H9V22ZM22 7H18.5L17.5 6H12.5L11.5 7H8V9H22V7Z"
                                  fill="white"/>
                        </mask>
                        <g mask="url(#delete)">
                            <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    //import editBtn from "./edit/Edit";
    import {mapActions, mapGetters, mapMutations} from "vuex";
    import {router} from "../../../../router/router";
    //

    export default {
        name: "Submenu",
        components: {

        },
        data() {
            return {

            }
        },
        methods: {
            deleteClick (id) {
                console.log('delete ' + id);
                this.setCurrentGroup(id);
            },
            editClick (id) {
                this.setCurrentGroup(id);
                if (this.$route.name !== 'groups') this.$router.push('groups')
                this.getContactsWithGroup(id)
            },
            ...mapMutations(["setCurrentGroup"]),
            ...mapActions(["getContactGroups", "getContactsWithGroup"])
        },
        computed: {
            ...mapGetters(["getGroups", "getCurrentGroup"])
        },
        mounted() {
            this.getContactGroups()
            if (this.getCurrentGroup === 0 && this.$route.name === 'groups') this.$router.push('contacts')
        }
    }
</script>

<style>
    .group-name {
        white-space: normal;
    }
</style>
