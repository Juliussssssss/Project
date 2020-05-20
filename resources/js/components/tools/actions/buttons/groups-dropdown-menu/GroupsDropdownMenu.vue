<template>
    <div>
        <svg id="groups" width="30" height="30" viewBox="0 0 30 30" fill="none"
             xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" data-toggle="dropdown"
             @click="setCurrentGroup(0)">
            <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="8" width="22"
                  height="14">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M19 14C20.66 14 21.99 12.66 21.99 11C21.99 9.34 20.66 8 19 8C17.34 8 16 9.34 16 11C16 12.66 17.34 14 19 14ZM11 14C12.66 14 13.99 12.66 13.99 11C13.99 9.34 12.66 8 11 8C9.34 8 8 9.34 8 11C8 12.66 9.34 14 11 14ZM11 16C8.67 16 4 17.17 4 19.5V22H18V19.5C18 17.17 13.33 16 11 16ZM19 16C18.71 16 18.38 16.02 18.03 16.05C19.19 16.89 20 18.02 20 19.5V22H26V19.5C26 17.17 21.33 16 19 16Z"
                      fill="white"/>
            </mask>
            <g mask="url(#mask1)">
                <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
            </g>
        </svg>
        <!-- dropdown menu        -->
        <div class="dropdown-menu p-0 mt-4 textGrey text-nowrap" role="menu" aria-labelledby="dropdownMenu">
            <div :class="getSelectedContacts.length > 0 ? 'customBorderBottom p-3 addGroup' : 'customBorderBottom p-3'"
                 v-for="group in getGroups"
                 @click="groupClick($event, group.id)">
                <div class="d-flex flex-nowrap justify-content-start align-items-center">
                    <div class="">
                        <svg id="groups" width="30" height="30" viewBox="0 0 30 30" fill="none"
                             xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" data-toggle="dropdown">
                            <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="8" width="22"
                                  height="14">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M19 14C20.66 14 21.99 12.66 21.99 11C21.99 9.34 20.66 8 19 8C17.34 8 16 9.34 16 11C16 12.66 17.34 14 19 14ZM11 14C12.66 14 13.99 12.66 13.99 11C13.99 9.34 12.66 8 11 8C9.34 8 8 9.34 8 11C8 12.66 9.34 14 11 14ZM11 16C8.67 16 4 17.17 4 19.5V22H18V19.5C18 17.17 13.33 16 11 16ZM19 16C18.71 16 18.38 16.02 18.03 16.05C19.19 16.89 20 18.02 20 19.5V22H26V19.5C26 17.17 21.33 16 19 16Z"
                                      fill="white"/>
                            </mask>
                            <g mask="url(#mask1)">
                                <rect
                                    :class="(getCurrentGroup === group.id && getSelectedContacts.length > 0)
                                    ? 'currentGroup'
                                    : 'itemActionButtons'"
                                    x="2"
                                    y="2" width="26" height="26" fill="#D8D8D8"/>
                            </g>
                        </svg>
                    </div>
                    <div :class="(getCurrentGroup === group.id && getSelectedContacts.length > 0)
                        ? 'font-weight-bold pl-3'
                        : 'pl-3'">
                        {{ group.name }}
                    </div>
                </div>
            </div>
            <!-- groupAddBtn -->
            <div class="p-3 addGroup"
                 data-toggle="modal"
                 data-target="#createGroupModal"
                 @click="setFocus()"
                 v-if="getSelectedContacts.length == 0">
                <div class="flex-nowrap d-flex justify-content-start align-items-center">
                    <div>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="groupAddBtn" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="8" width="14"
                                  height="14">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M22 16H16V22H14V16H8V14H14V8H16V14H22V16Z"
                                      fill="white"/>
                            </mask>
                            <g mask="url(#groupAddBtn)">
                                <rect x="2" y="2" width="26" height="26" fill="#999999"/>
                            </g>
                        </svg>
                    </div>
                    <!-- выпрыгивает модалка -->
                    <div class="pl-3">Создать группу</div>
                </div>
            </div>
            <!-- сюда блок принять            -->
            <div class="customBorderBottom p-3 addGroup"
                 v-if="(getCurrentGroup !== 0 && getSelectedContacts.length > 0)">
                <div class="row d-flex justify-content-start align-items-center">
                    <div class="col-lg-2">

                    </div>
                    <!-- выпрыгивает модалка -->
                    <div class="col-lg-10 font-weight-bold" @click="apply()">Применить</div>
                </div>
            </div>
        </div>
        <add-group-modal></add-group-modal>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";
    import addGroupModal from "./modals/AddGroupModal";

    export default {
        name: "GroupsDropdownMenu",
        data() {
            return {
                groupState: false
            }
        },
        computed: {
            ...mapGetters([
                "getGroups",
                "getSelectedContacts",
                "getCurrentGroup"
            ])
        },
        methods: {
            setFocus() {
                //this.setAddGroupInputFocus()
            },
            groupClick(event, id) {
                event.stopPropagation()
                this.setCurrentGroup(id)
                console.log('Current group ' + id)

            },
            ...mapMutations(["setCurrentGroup"]),
            ...mapActions(["addContactsAtGroup", "getFavorites", "getFrequentContacts", "getAllContacts"]),
            apply() {
                this.addContactsAtGroup(this.$route.name);

                // if (this.$route.name === 'favorites') {
                //     this.getFavorites()
                // } else if (this.$route.name === 'FrequentContacts') {
                //     this.getFrequentContacts()
                // } else {
                //     this.getAllContacts()
                // }
            }
        },
        components: {
            addGroupModal
        }
    }
</script>

<style scoped>
    .addGroup {
        cursor: pointer;
    }
    .currentGroup {
        fill: #666666;
    }
</style>

