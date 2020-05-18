<template>
<div>
    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-4 px-3">
                <div class="modal-header pb-0 d-block">
                    <div class="modal-title font-18px textActive">Настройки</div>
                    <div class="modal-title py-2 font-14px modalText">Сортировать</div>
                </div>
                <div class="modal-body d-block modalText pt-0">
                    <div>
                        <input type="radio" id="test1" name="radio-group" value="1" v-model="selectSortType">
                        <label class="font-14px" for="test1">Имя</label>
                    </div>
                    <div>
                        <input type="radio" id="test2" name="radio-group" value="2" v-model="selectSortType">
                        <label class="font-14px" for="test2">Фамилия</label>
                    </div>
                    <div>
                        <input type="radio" id="test3" name="radio-group" value="3" v-model="selectSortType">
                        <label class="font-14px" for="test3">Сначала избрнные</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click="confirmed" type="button" class="btn btn-primary px-3 py-2 text-uppercase font-12px" data-dismiss="modal">Сохранить</button>
                    <button @click="cancel" type="button" class="btn px-3 py-2 ml-4 modalText bthCancel font-12px text-uppercase" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    export default {
        name: "setting",
        props: ["sortType"],
        data() {
            return {
                selectSortType: 1,
                confirmedSortType: 1,
            }
        },
        computed: {
            ...mapGetters([
                "getSort"
            ])
        },
        watch: {
            getSort: function() {
                this.selectSortType = this.getSort;
            }
        },
        methods: {
            ...mapActions([
                "selectedSortType",
            ]),
            confirmed() {
                this.confirmedSortType = this.selectSortType;
                this.selectedSortType(+this.confirmedSortType);
            },
            cancel() {
               this.selectSortType = this.confirmedSortType;
            }
        }
    }
</script>

<style scoped>
    .modal-footer {
        justify-content: start;
    }
    .modal-header, .modal-footer {
        border: 0px;
    }
</style>
