<template>
    <div class="w-100">
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
                            @click="openModal"
                        >
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
    import {mapActions} from "vuex";

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
        }
    }
</script>

<style scoped>
    .closebtn {
        position: absolute;
        color: #D8D8D8;
        top: -11px;
        right: 5px;
        font-size: 30px !important;
    }
    .addContact {
        font-weight: bold;
        margin: 2px 0 3px 0;
    }
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }
    .repeat {
        cursor: pointer;
    }
    .sidenav a:hover {
        color: #f1f1f1;
    }
    .repeat:hover {
        color: #1d68a7;
    }
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
    @media screen and (max-width: 1199px) {
        .addContact {
            margin: 2px 0 1.5px 0;
        }
    }
</style>
