<template>
    <div>
        <div ref="modal" class="modal fade" id="searchDuplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content mx-auto py-4 px-3" :class="{'no-duplicate':!getDuplicated.count}">
                    <div class="pb-0 d-block">
                        <template v-if="getDuplicated.count">
                            <div class="modal-header pb-0 d-block">
                                <div class="modal-title text-center textGrey">Выберите основной контакт</div>
                            </div>
                            <div class="content customBorderBottom textGrey ml-3">
                                <div class="row mb-5 mt-3 w-100" v-for="i in 2">
                                    <div class="col-12 col-sm-9 col-md-5 mt-3">
                                        <div class="d-flex align-items-center">
                                             <span class="position-relative">
                                                <input type="radio" :id="'contact'+i" name="radio-group" v-model="mainContact" :value="i">
                                                <label class="duplicate font-14px" :for="'contact'+i"></label>
                                             </span>
                                            <div class="avatar">
                                                <div v-if="(getDuplicated.coupleDublicate[i-1].avatar==null)" class="contactPhoto text-white justify-content-center align-items-center d-flex" :style="'background:' + randomColor(getDuplicated.coupleDublicate[i-1].id)">{{getDuplicated.coupleDublicate[i-1].first_name.slice(0, 1)}}{{getDuplicated.coupleDublicate[i-1].middle_name.slice(0, 1)}}</div>
                                                <img v-else class="contactPhoto" :src="getDuplicated.coupleDublicate[i-1].avatar?'/storage/'+getDuplicated.coupleDublicate[i-1].avatar:'/storage/avatars/default.png'"  alt="фото">
                                            </div>
                                            <div class="d-flex ml-3">{{getDuplicated.coupleDublicate[i-1].fio|truncate(30, '...')}}</div>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-4 mt-3">
                                        <div class="d-flex align-items-center h-100">{{getDuplicated.coupleDublicate[i-1].email|truncate(18, '...')}}</div>
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 mt-5 mt-sm-3">
                                        <div class="d-flex h-100">
                                            <div class="d-flex d-sm-none align-items-center h-100 w-50">
                                                Номер телефона:
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start justify-content-sm-center h-100 w-50">
                                                {{getDuplicated.coupleDublicate[i-1].number}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="d-flex justify-content-between">-->
                                <div class="textGrey font-18px ml-3">Осталось {{getDuplicated.count}} пар</div>
                                <!--<div class="skip textGrey font-18px mr-4" @click="skipDuplicate">Пропустить</div>-->
                            <!--</div>-->
                            <div class="modal-footer">
                                <button @click="confirmed" type="button" class="btn ok px-3 py-3 text-uppercase font-12px" :disabled="mainContact==''">обьеденить</button>
                                <button type="button" class="btn px-3 py-3 ml-4 modalText bthCancel font-12px text-uppercase" data-dismiss="modal">закрыть</button>
                            </div>
                        </template>
                        <template v-else>
                            <div class="d-flex align-items-center justify-content-center w-100">
                                <div class="no-duplicate text-center font-18px textGrey">Дубликатов нет</div>
                                <button type="button" class="btn ok px-4 py-2 ml-4 mr-2 modalText bthCancel font-12px text-uppercase" data-dismiss="modal">ок</button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {eventBus} from '../../../eventBus'
    export default {
        name: "SearchDuplicate",
        data(){
            return {
                mainContact:'',
                skip:0,
                setColor:true
            }
        },
        methods: {

            open(){
                this.mainContact='';
                this.skip=0;
                this.$store.dispatch('getDuplicate',this.skip);
            },
            confirmed()
            {
                let firstContactId =this.getDuplicated.coupleDublicate[0].id;
                let secondContactId =this.getDuplicated.coupleDublicate[1].id;
                let data={
                    mainContactId:this.mainContact==1?firstContactId:secondContactId,
                    SecondContactId:this.mainContact==1?secondContactId:firstContactId
                }
                this.mainContact='';
                axios.put('/api/merge-duplicate',data)
                    .then(response => {
                        this.$store.dispatch('getDuplicate',this.skip);
                        this.$store.dispatch('getAllContacts');
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            skipDuplicate(){
                this.skip++;
                this.$store.dispatch('getDuplicate',this.skip);
            },
            randomColor(id) {
                let colors = [
                    '#FFD700',
                    '#00FF00',
                    '#00FFFF',
                    '#EE82EE',
                    '#FF69B4',
                    '#A0522D',
                    '#FFA07A',
                    '#0000FF',
                    '#800000',
                    '#708090',
                ];
                return colors[id.toString().substr(-1)];
            },
        },
        computed: {
            getDuplicated(){

                return this.$store.getters.getDuplicatedContacts;
            },

        },
        filters: {
            truncate: function (text, length, suffix) {
                if (text.length > length) {
                    return text.substring(0, length) + suffix;
                } else {
                    return text;
                }
            },
        },
        created () {
            eventBus.$on('duplicateContacts', data => {
                this.open();
            })
        },
        updated(){
            this.setColor=false;
        }
    }
</script>

<style scoped>
    .modal-footer {
        justify-content: start;
    }
    .modal-header,.content, .modal-footer {
        border: 0px;
    }
    .modal-dialog {
        max-width: 700px;
        padding: 0 15px;
    }
    .no-duplicate {
        max-width: 415px;
    }
    .modal-content {

    }
    .duplicate {
        top:-6px;
    }
    .ok {
        background-color: #1875F0;
        color:#fff;
    }
    .ok:hover {
        opacity: 0.95;
    }
    .contactPhoto {
        width:55px;
        height:55px;
        margin-top:-9px;
    }
    .avatar{
        width:55px;
    }
    .skip {
        cursor:pointer;
    }
    .skip:hover {
        opacity: 0.9;
    }
</style>
