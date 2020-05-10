<template>
    <div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="customBorderBottom add-contact p-3">
                    <router-link
                        class="w-100 py-3 btn-primary btn text-uppercase font-12px btnText text-white addContact"
                        active-class="d-none"
                        to="/create-contact">
                        Добавить контакт
                    </router-link>
                </div>
            </div>
            <div class="col-12" @click="getAllContacts()">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder textActive"
                        to="/contacts"
                        exact>
                        Контакты
                    </router-link>
                </div>
            </div>
            <div class="col-12">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="/show-contact">
                        Частые контакты
                    </router-link>
                </div>
            </div>
            <groups></groups>
            <div class="col-12">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="/favorites">
                        Избранные
                        <!-- реализовать метод рендера избранных -->
                    </router-link>
                </div>
            </div>
            <div class="col-12">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="#3">
                        Написать
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import groups from "./groups/Groups";
    import {mapActions} from "vuex";

    export default {
        name: "LeftNav",
        components: {
            groups
        },
        methods: {
            ...mapActions(["getAllContacts"])
        }
    }
</script>

<style scoped>
    .add-contact {
        min-height: 92px;
    }
</style>
