<template>
    <div>
        <div class="row textGrey">
            <div class="col-12 text-center">
                <div class="customBorderBottom p-3">
                    <a class="w-100 py-3 btn-primary btn text-uppercase font-12px btnText text-white addContact">Добавить
                                                                                                                 контакт</a>
                </div>
            </div>
            <div class="col-12">
                <div class="customBorderBottom">
                    <div class="pl-5 py-3 activeBorder textActive">Контакты</div>
                </div>
            </div>
            <div class="col-12">
                <div class="customBorderBottom">
                    <div class="pl-5 py-3">Частые контакты</div>
                </div>
            </div>
            <groups></groups>
            <div class="col-12">
                <div class="customBorderBottom">
                    <div class="pl-5 py-3">Избранные</div>
                </div>
            </div>
            <div class="col-12">
                <div class="customBorderBottom pl-5 py-3">Написать</div>
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
</style>
