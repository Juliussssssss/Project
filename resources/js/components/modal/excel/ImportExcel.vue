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
                        <div>
                            <label for="file" v-if="!filename"
                                   class="import ml-3 mt-4 pl-3 pr-5 py-2">
                                Выбрать файл
                            </label>
                            <span v-else :class="{'error':error}"
                                  class="file-load import d-inline-block position-relative ml-3 mt-4 pl-3 pr-5 py-2">
                                 {{filename}}
                                <span class="delete" v-if="filename" @click="deleteFile()"></span>
                            </span>
                        </div>
                        <div>
                           <a href="/api/template" class="file-load import d-inline-block ml-3 mt-3 pl-3 pr-5 py-2">
                                Шаблон файла
                           </a>
                            <span class="details ml-2" :class="{'details-active':details}" @click="details=!details">
                                Подробнее
                            </span>
                        </div>
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
                <div class="modal-footer mt-2">
                    <button @click="importContacts" :disabled="!filename" type="button"
                            class="btn px-2 py-3 text-uppercase confirm font-12px">Импортировать
                    </button>
                    <button type="button" class="btn px-3 py-2 ml-4 modalText bthCancel font-12px text-uppercase"
                            data-dismiss="modal">Отмена
                    </button>
                </div>
                <prompt class="prompt prompt-d-none position-absolute"
                        :class="{'d-block':details}"
                ></prompt>
            </div>
        </div>
    </div>
</template>

<script>
    import prompt from './ImportPrompt'
    export default {
        name: "ImportExcel",
        components:{prompt},
        data() {
            return {
                filename: '',
                error: '',
                success:'',
                details:false
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
        border: 2px solid #F5F5F5;
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
        border: 2px solid #e6e6e6;
        text-decoration:none;
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
    .modal-content:hover .prompt{
        display: block;
    }
    .prompt-d-none {
        display: none;
    }
    .prompt {
        top: 345px;
        right: 0;
    }
    .details {
        font-size:12px;
        color:#B3B3B3;
        cursor:pointer;
    }
    .details:hover {
        color:#B3B3F8;
    }
    .details-active {
        color:#B3B3F8;
    }
</style>

