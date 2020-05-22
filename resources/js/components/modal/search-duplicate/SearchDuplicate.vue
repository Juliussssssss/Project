<template>
    <div ref="modal" class="modal" id="searchDuplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-4 px-3">
                <div class="pb-0 d-block">
                    <template v-if="getDuplicated.length">
                        <div class="content customBorderBottom row py-3 ml-3 textGrey">
                            <div class="row w-100">
                                <div class="col-12">
                                    <div class="row mb-5 mt-2 w-100">
                                        <div class="col-5">
                                        <span class="position-relative">
                                            <input type="radio" id="test1" name="radio-group" v-model="mainContact" value="1">
                                            <label class="duplicate font-14px" for="test1"></label>
                                        </span>
                                            <img class="contactPhoto mr-2" :src="getDuplicated[0].avatar?'/storage/'+getDuplicated[0].avatar:'/storage/avatars/default.png'"  alt="фото">
                                            {{getDuplicated[0].fio}}
                                        </div>
                                        <div class="col-4">
                                            {{getDuplicated[0].email}}
                                        </div>
                                        <div class="col-3=">
                                            {{getDuplicated[0].number}}
                                        </div>
                                    </div>
                                    <div class="row mb-5 mt-2 w-100">
                                        <div class="col-5">
                                        <span class="position-relative">
                                            <input type="radio" id="test2" name="radio-group" v-model="mainContact" value="0">
                                            <label class="duplicate font-14px" for="test2"></label>
                                        </span>
                                            <img class="contactPhoto mr-2" :src="getDuplicated[1].avatar?'/storage/'+getDuplicated[1].avatar:'/storage/avatars/default.png'"  alt="фото">
                                            {{getDuplicated[1].fio}}
                                        </div>
                                        <div class="d-none d-lg-flex col-lg-4">
                                            {{getDuplicated[1].email}}
                                        </div>
                                        <div class="col-5 col-md-4 col-lg-3 col-xl-3=">
                                            {{getDuplicated[1].number}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex justify-content-end w-100">
                                <button @click="confirmed" type="button" class="btn ok px-3 py-3 text-uppercase font-12px" :disabled="mainContact==''">обьеденить</button>
                                <button type="button" class="btn px-3 py-3 ml-4 modalText bthCancel font-12px text-uppercase" data-dismiss="modal">закрыть</button>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <span>Дубликатов нет</span>
                        <div class="d-flex justify-content-end w-100">
                            <button type="button" class="btn ok px-3 py-3 ml-4 modalText bthCancel font-12px text-uppercase" data-dismiss="modal">ок</button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchDuplicate",
        data(){
            return {
                mainContact:'',
            }
        },
        methods: {
            open(){
                this.$store.dispatch('getDuplicate');
            },
            confirmed()
            {
                let data={
                    main:this.mainContact==1?this.getDuplicated[0]:this.getDuplicated[1],
                    second:this.mainContact==1?this.getDuplicated[1]:this.getDuplicated[0]
                }
                console.log(data,this.mainContact);
                axios.put('/api/merge-duplicate',data)
                    .then(response => {
                        this.$store.dispatch('getDuplicate');
                        this.$store.dispatch('getAllContacts');
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        computed: {
           getDuplicated(){

               return this.$store.getters.getDuplicatedContacts;
           }
        }
    }
</script>

<style scoped>
    .modal-footer {
        justify-content: start;
    }
    .content, .modal-footer {
        border: 0px;
    }
    .modal {
        top:195px;
    }
    .modal-content {
        width: 700px;
    }
    .duplicate {
        top:-7px;
    }
    .ok {
        background-color: #1875F0;
        color:#fff;
    }
    .ok:hover {
        opacity: 0.95;
    }
</style>
