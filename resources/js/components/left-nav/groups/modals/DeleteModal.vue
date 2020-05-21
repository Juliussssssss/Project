<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content py-2 px-3">
                    <div class="modal-body">
                        <div class="font-18px textActive">Вы действительно хотите удалить группу?</div>
                        <br><br><br><br>
                        <div class="row py-3 px-3">
                            <button type="button"
                                    class="btn btn-primary px-3 py-2 text-uppercase font-12px" data-dismiss="modal"
                                    @click="deleteClick">
                                Удалить
                            </button>
                            <button type="button" class="btn px-3 py-2 ml-4 modalText bthCancel font-12px"
                                    data-dismiss="modal">Отмена
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "DeleteModal",
        methods: {
            deleteClick() {
                //console.log('current group has been deleted ' + this.getCurrentGroup)
                this.deleteGroup(this.$route.name)
                if (this.$route.name === 'groups') this.$router.push('contacts')
            },
            ...mapActions(["getContactGroups", "deleteGroup"])
        },
        computed: {
            ...mapGetters(["getCurrentGroup"])
        }
    }
</script>

<style>

</style>
