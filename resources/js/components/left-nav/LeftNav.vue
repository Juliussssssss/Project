<template>
    <div :class="(this.getLength > 5 || (this.$route.name == 'create-contact' && this.$route.name == 'show-contact')) ? 'customBorderBottom w-100' : 'w-100'">
        <div class="w-100">
            <div class="w-100 text-center d-none d-lg-block">
                <div class="customBorderBottom p-3">
                    <router-link
                        class="w-100 py-3 btn-primary btn text-uppercase font-12px btnText text-white addContact"
                        active-class="d-none"
                        to="/create-contact">
                        <span class="d-block d-xl-inline">Добавить</span> <span>контакт</span>
                    </router-link>
                </div>
            </div>
            <div class="" @click="getAllContacts()">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-3 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder textActive"
                        to="/contacts"
                        exact>
                        Контакты
                    </router-link>
                </div>
            </div>
            <div class="" @click="getFrequentContacts()">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-3 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="/frequent-contacts">
                        Частые контакты
                    </router-link>
                </div>
            </div>
            <groups></groups>
            <div class="" @click="getFavorites()">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-3 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="/favorites">
                        Избранные
                    </router-link>
                </div>
            </div>
            <div class="">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-3 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="write">
                        Написать
                    </router-link>
                </div>
            </div>
            <div class="">
                <div class="customBorderBottom">
                    <div
                        class="pl-3 pl-xl-5 py-3 repeat textGrey text-decoration-none"
                        data-toggle="modal"
                        data-target="#searchDuplicate"
                        @click="openModal">
                        Поиск дубликатов
                    </div>
                </div>
            </div>

        </div>
        <search-duplicate ref="modal"></search-duplicate>
    </div>
</template>

<script>
    import groups from "./groups/Groups";
    import SearchDuplicate from "../modal/search-duplicate/SearchDuplicate"
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "LeftNav",
        components: {
            groups,
            SearchDuplicate
        },
        methods: {
            ...mapActions([
                "getAllContacts",
                "getFrequentContacts",
                "getFavorites"
            ]),
            openModal()
            {
                this.$refs.modal.open();
            }
        },
        computed: {
            ...mapGetters([
                "getLength"
            ])
        }
    }
</script>

<style scoped>
    .addContact {
        font-weight: bold;
        margin: 2px 0 3px 0;
    }
    .repeat {
        cursor: pointer;
    }
    .repeat:hover {
        color: #1d68a7;
    }
    @media screen and (max-width: 1199px) {
        .addContact {
            margin: 2px 0 1.5px 0;
        }
    }
</style>
