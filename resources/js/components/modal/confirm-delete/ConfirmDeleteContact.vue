<template>
    <div ref="modal" class="modal" id="confirmDeleteContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-4 px-3">
                <div class="modal-header pb-0 d-block">
                    <div class="modal-title text-left">Вы действительно хотите удалить данный контакт?</div>
                </div>
                <div class="modal-footer mt-5">
                    <button @click="confirmed" type="button" class="py-3 btn text-uppercase font-12px btnText text-white save d-inline-block mr-3 w-100" data-dismiss="modal">
                        Удалить
                    </button>
                    <button  type="button" class="py-3 btn-light btn text-uppercase font-12px btnText cancel" data-dismiss="modal">
                        Отмена
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ConfirmDeleteContact",
        methods: {
            confirmed()
            {
                this.$emit('deleteContact');
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
.modal {
    top:195px;
}
.save {
    max-width: 120px;
    background-color: #1875F0;
}
.save:hover {
    background-color: #1875E0;
}
.modal-title {
    font-size:18px;
    max-width: 320px;
    color:#666;
}
</style>
