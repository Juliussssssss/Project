<template>
    <div ref="modal" class="modal fade" id="confirmDeleteContact" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="modal-content py-4 px-3">
                <div class="modal-header pb-0 d-block">
                    <div class="modal-title text-left">Вы действительно хотите удалить {{getSelectedContacts.length > 1 ? getSelectedContacts.length+' контакты' : 'данный контакт'}} </div>
                </div>
                <div class="modal-footer mt-5">
                    <button @click="confirmed" type="button" class="btn btn-primary px-4 py-3 text-uppercase font-12px" data-dismiss="modal">Удалить</button>
                    <button type="button" class="btn px-4 py-3 ml-4 modalText bthCancel font-12px text-uppercase" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    export default {
        name: "ConfirmDeleteContact",
        methods: {
            ...mapActions([
                "deleteContacts"
            ]),
            confirmed()
            {
                if (this.$route.name != 'groups') {
                    this.deleteContacts(this.getSelectedContacts)
                } else {
                    this.$emit('deleteContact');
                }
            }
        },
        computed: {
            ...mapGetters([
                "getSelectedContacts",
            ])
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
.modal-title {
    font-size:18px;
    max-width: 320px;
    color:#666;
}
</style>
