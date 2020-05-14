<template>
    <div ref="modal" class="modal " id="import-excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content position-relative py-4 px-3">
                <div class="modal-header pb-0 d-block mb-2">
                    <div class="modal-title text-left">Импорт контактов</div>
                </div>
                <form ref="fileContacts" id="form">
                    <div class="position-relative">
                        <label for="file" v-if="!filename"
                               class="import ml-3 mt-4 pl-3 pr-5 py-2">
                            Выбрать файл
                        </label>
                        <span v-else :class="{'error':error}"
                              class="file-load import d-inline-block position-relative ml-3 mt-4 pl-3 pr-5 py-2">
                             {{filename}}
                            <span class="delete" v-if="filename" @click="deleteFile()"></span>
                        </span>
                        <div v-if="error" class="err-message position-absolute">Файл должен быть с расширением
                            .xls,xlsx
                        </div>
                    </div>
                    <input
                        type="file"
                        id="file"
                        name="import"
                        @change="onFileChange"
                        class="d-none"
                        accept=".xls,.xlsx"
                    >
                </form>
                <div class="modal-footer mt-5">
                    <button @click="importContacts" :disabled="!filename" type="button"
                            class="btn px-3 py-3 text-uppercase confirm font-12px">Импортировать
                    </button>
                    <button type="button" class="btn px-3 py-2 ml-4 modalText bthCancel font-12px text-uppercase"
                            data-dismiss="modal">Отмена
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ImportExcel",
        data() {
            return {
                filename: '',
                error: '',
                success:''
            }
        },
        methods: {
            onFileChange: function (e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length) {

                    return;
                }
                this.filename = files[0].name;
                console.log(this.filename)
            },
            deleteFile() {
                let file = document.getElementById("file");

                file.value = file.defaultValue;
                this.filename = '';
                this.error='';
            },
            clear() {
                this.deleteFile();
            },
            importContacts() {
                const data = new FormData(this.$refs.fileContacts);

                axios.post('/api/contacts-import', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        this.$emit('success');
                        $("#import-excel").modal("hide");
                    })
                    .catch(error => {
                        this.error=true;
                    });
            },
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
        top: 195px;
    }
    .modal-title {
        font-size: 18px;
        max-width: 320px;
        color: #666;
    }
    .confirm {
        background-color: #1875F0;
        color: #fff;
    }
    .import {
        color: #808080;
        border: 1px solid #F5F5F5;
        font-size: 12px;
        font-weight: 500;
        line-height: 30px;
        cursor: pointer;
        margin-bottom: 0;
    }
    .file-load {
        min-width: 147px;
    }
    .import:hover {
        color: #6e706e;
        border: 1px solid #e6e6e6;
    }
    .delete {
        padding: 10px;
        position: absolute;
        top: 13px;
        right: 6px;
        opacity: 0.5;
        cursor: pointer;
        display: none;
    }
    .delete:hover {
        opacity: 1;
    }
    .delete:before, .delete:after {
        position: absolute;
        top: 0;
        left: 9px;
        content: ' ';
        height: 18px;
        width: 1px;
        background-color: #333;
    }
    .delete:before {
        transform: rotate(45deg);
    }
    .delete:after {
        transform: rotate(-45deg);
    }
    .import:hover .delete {
        display: block;
    }
    .err-message {
        top: 85px;
        left: 14px;
        color: #ff4418
    }
    .error {
        border: 1px solid #ff4418;
    }
</style>

