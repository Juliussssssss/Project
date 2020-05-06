<template>
    <div>
        <div class="row textGrey">
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
            <div class="col-12">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-5 py-3 textActive"
                        active-class="activeBorder"
                        to="/contacts">
                        Контакты
                    </router-link>
                </div>
            </div>
            <div class="col-12">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-5 py-3 textActive"
                        active-class="activeBorder"
                        to="#1">
                        Частые контакты
                    </router-link>
                </div>
            </div>
            <groups></groups>
            <div class="col-12">
                <div class="customBorderBottom">
                    <router-link
                        class="d-block pl-5 py-3 textActive"
                        active-class="activeBorder"
                        to="#2">
                        Избранные
                    </router-link>
                </div>
            </div>
            <div class="col-12">
                <router-link
                    class="d-block pl-5 py-3 textActive"
                    active-class="activeBorder"
                    to="#3">
                    Написать
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import groups from "./groups/Groups";

    export default {
        name: "LeftNav",
        components: {
            groups
        }
    }
</script>

<style scoped>
    .add-contact {
        min-height: 92px;
    }
</style>
