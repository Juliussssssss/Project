<template>
    <div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="customBorderBottom add-contact p-3">
                    <router-link
                        class="w-100 py-3 btn-primary btn text-uppercase font-12px btnText text-white addContact"
                        active-class="d-none"
                        to="/create-contact">
                        <span class="d-block d-xl-inline">Добавить</span> <span>контакт</span>
                    </router-link>
                </div>
            </div>
            <div class="col-12" @click="getAllContacts()">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-2 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder textActive"
                        to="/contacts"
                        exact>
                        Контакты
                    </router-link>
                </div>
            </div>
            <div class="col-12" @click="getFrequentContacts()">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-2 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="/frequent-contacts">
                        Частые контакты
                    </router-link>
                </div>
            </div>
            <groups></groups>
            <div class="col-12" @click="getFavorites()">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-2 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="/favorites">
                        Избранные
                    </router-link>
                </div>
            </div>
            <div class="col-12">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-2 pl-xl-5 py-3 textGrey text-decoration-none"
                        active-class="activeBorder"
                        to="write">
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
            ...mapActions([
                "getAllContacts",
                "getFrequentContacts",
                "getFavorites"
            ])
        }
    }
</script>

<style scoped>
    .add-contact {
        min-height: 92px;
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
    .sidenav a:hover {
        color: #f1f1f1;
    }
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>
