<template>
    <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog"
         aria-labelledby="createGroupModalLabel"
         aria-hidden="true"
         @keydown="setFocus">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-2 px-3">
                <div class="modal-body mt-3 ml-2">
                    <div class="font-18px textActive">Создать группу</div>
                    <div class="form-group position-relative mt-3">
                        <input
                            name="group"
                            type="text"
                            class="form-control"
                            id="groupNameInput"
                            ref="groupNameInput"
                            placeholder="Название группы"
                            v-model="groupName"
                            autofocus
                        />
                    </div>
                    <br><br><br><br>
                    <div class="row py-3 px-3">
                        <button type="button"
                                class="btn btn-primary px-3 py-2 text-uppercase font-12px" data-dismiss="modal"
                                @click="saveGroup">
                            Сохранить
                        </button>
                        <button type="button" class="btn px-3 py-2 ml-4 modalText bthCancel font-12px"
                                data-dismiss="modal">
                            Отмена
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "AddGroup",
        data() {
            return {
                groupName: ""
            }
        },
        methods: {
            saveGroup() {
                axios.post('/api/groups', {name: this.groupName})
                .then(response => {
                    this.getContactGroups()
                    alert('Группа "' + this.groupName + '" была успешно добавлена')
                    this.groupName = ""
                })
                .catch(error => {

                    alert('Ошибка при добавлении группы')
                })
            },
            ...mapActions(["getContactGroups"]),
            setFocus() {
                this.$refs.groupNameInput.focus()   //работает
            }
        },
        // computed: {
        //     ...mapGetters(["getAddGroupInputFocus"])
        // },
        mounted() {
            //console.log(this.$refs)
        },
        // watch: {
        //     getAddGroupInputFocus() {
        //         console.log('watcher eeee')
        //         this.setFocus()
        //     }
        // }
    }
</script>

<style scoped>
#groupNameInput {
    color: #495057;
    background-color: #fff;
    border-color: #a1cbef;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
}
</style>
