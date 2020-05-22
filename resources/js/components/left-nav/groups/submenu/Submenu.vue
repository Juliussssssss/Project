<template>
    <div class="dropdown-menu m-3 m-lg-0 p-0">
        <div class="dropdown-item customBorderBottom flex-nowrap d-flex justify-content-between align-items-center row textGrey m-0 p-3"
             v-for="group in getGroups">
            <div>
                <object type="image/svg+xml" data="/storage/logos/groups.svg"></object>
            </div>
            <div class="pl-3 w-100 text-nowrap text-left" @click="editClick(group.id)">{{ group.name }}</div>
            <div class="pl-3">
                <a href="">
                    <object type="image/svg+xml" data="/storage/logos/edit.svg"></object>
                </a>
                <!--                click -->
                <a href="" data-toggle="modal" data-target="#deleteModal" @click="deleteClick(group.id)">
                    <object type="image/svg+xml" data="/storage/logos/delete.svg"></object>
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
                //console.log('delete ' + id);
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
    .dropdown-item:last-child {
        border: 0px;
    }
    .dropdown-menu {
        top: -2px !important;
        left: -1px !important;
        border: 2px solid #F5F5F5;
    }
</style>
