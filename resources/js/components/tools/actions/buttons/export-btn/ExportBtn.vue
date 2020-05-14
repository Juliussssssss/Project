<template>
    <div>
        <svg id="exportBtn" width="30" height="30" viewBox="0 0 30 30" fill="none"
             xmlns="http://www.w3.org/2000/svg"
             data-toggle="modal"
             data-target="#exportModal"
             @click="selectedGroup = 'allContacts'">
            <mask id="mask3" mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="7" width="24"
                  height="16">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M22.35 13.04C21.67 9.59 18.64 7 15 7C12.11 7 9.6 8.64 8.35 11.04C5.34 11.36 3 13.91 3 17C3 20.31 5.69 23 9 23H22C24.76 23 27 20.76 27 18C27 15.36 24.95 13.22 22.35 13.04ZM17 16V20H13V16H10L15 11L20 16H17Z"
                      fill="white"/>
            </mask>
            <g mask="url(#mask3)">
                <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
            </g>
        </svg>

        <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content py-4 px-3">
                    <div class="modal-body d-block modalText pt-0">
                        <div class="modal-title font-18px textActive pb-3">Экспорт контактов</div>

                        <div>
                            <input v-model="selectedGroup" type="radio" id="allContactsExport" name="radio-group"
                                   value="allContacts">
                            <label class="font-14px" for="allContactsExport">Контакты ({{ getContacts.length }})</label>
                        </div>
                        <div>
                            <input v-model="selectedGroup" type="radio" id="frequentContactsExport" name="radio-group"
                                   value="frequentContacts">
                            <label class="font-14px" for="frequentContactsExport">Частые контакты</label>
                        </div>

                        <div class="modal-title py-2 font-14px modalText">Группы</div>
                        <div v-for="group in getGroups">
                            <input v-model="selectedGroup" type="radio" :id="group.name" name="radio-group"
                                   :value="group.id">
                            <label class="font-14px" :for="group.name">
                                {{ group.name }} ({{ group.contacts_count }})
                            </label>
                        </div>
                        <br>
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-primary px-3 py-2 text-uppercase font-12px"
                               @click="exportClick()"
                               :href="href">
                                Экспортировать
                            </a>
                            <button type="button"
                                    class="btn px-3 py-2 ml-4 modalText bthCancel font-12px text-uppercase"
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
    import {mapGetters} from "vuex";

    export default {
        name: "ExportBtn",
        data() {
            return {
                selectedGroup: "",
                href: "/contacts/export/all"
            }
        },
        computed: {
            ...mapGetters(["getGroups", "getContacts"])
        },
        methods: {
            exportClick() {

                $('#exportModal').modal('hide')
            }
        },
        watch: {
            selectedGroup() {
                if (this.selectedGroup !== "") {
                    if (this.selectedGroup === "allContacts") {
                        this.href = "/contacts/export/all"
                    } else if (this.selectedGroup === "frequentContacts") {
                        this.href = "/contacts/export/frequent"
                    } else {
                        this.href = "/contacts/export/group/" + this.selectedGroup
                    }

                }
            }
        }
    }
</script>

<style>

</style>
