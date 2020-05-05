<template>
<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-4 px-3">
                <div class="modal-header pb-0 d-block">
                    <div class="modal-title font-18px textActive">Настройки</div>
                    <div class="modal-title py-2 font-14px modalText">Сортировать</div>
                </div>
                <div class="modal-body d-block modalText pt-0">
                    <form action="#">
                        <div>
                            <input type="radio" id="test1" name="radio-group" checked>
                            <label class="font-14px" for="test1">Имя</label>
                        </div>
                        <div>
                            <input type="radio" id="test2" name="radio-group">
                            <label class="font-14px" for="test2">Фамилия</label>
                        </div>
                        <div>
                            <input type="radio" id="test3" name="radio-group">
                            <label class="font-14px" for="test3">Сначала избрнные</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-3 py-2 text-uppercase font-12px">Сохранить</button>
                    <button type="button" class="btn px-3 py-2 ml-4 modalText bthCancel font-12px" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "setting"
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
