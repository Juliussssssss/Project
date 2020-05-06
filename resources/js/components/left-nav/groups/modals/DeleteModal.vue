<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content py-4 px-3">
                    <div class="modal-header pb-0 d-block">
                        <div class="modal-title font-18px textActive">Настройки</div>
                        <div class="modal-title py-2 font-14px modalText">Сортировать</div>
                    </div>
                    <div class="modal-body d-block modalText pt-0">
                        <h1>delete</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-primary px-3 py-2 text-uppercase font-12px" data-dismiss="modal">
                            Сохранить
                        </button>
                        <button type="button" class="btn px-3 py-2 ml-4 modalText bthCancel font-12px"
                                data-dismiss="modal">Отмена
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DeleteModal"
    }
</script>

<style>

</style>
