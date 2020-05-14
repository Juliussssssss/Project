<template>
    <div class="pl-4 pt-2">
        <div class="col-12 textGrey font-12px">
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'required|email|max:255'"
                    :class="{'error':errors.has('email')||((duplicatedEmail==email)&&duplicatedEmail!='')}"
                    type="text"
                    name = 'email'
                    class="form-control"
                    id="Email"
                    @change="fieldChange('email',email)"
                    v-model="email"
                >
                <span class="bar"></span>
                <label class="textActive" :class="{'label-top':email}" for="Email">Email</label>
                <div v-if="((errors.has('email'))||((duplicatedEmail==email)&&duplicatedEmail!=''))" class="err-message position-absolute">
                    {{(duplicatedEmail==email)&&duplicatedEmail!=''?'Контакт с данным email уже существует':errors.first('email')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'digits:10'"
                    :class="{'error':errors.has('number')}"
                    type="text"
                    name = 'number'
                    class="form-control"
                    id="Phone"
                    @change="fieldChange('number',number)"
                    v-model="number"
                >
                <label class="textActive" :class="{'label-top':number}" for="Phone">Телефон</label>
                <div v-if="errors.has('number')" class="err-message position-absolute">
                    {{errors.first('number')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'max:255'"
                    :class="{'error':errors.has('site')}"
                    type="text"
                    name="site"
                    class="form-control"
                    @change="fieldChange('site',site)"
                    id="website"
                    v-model="site"
                >
                <label class="textActive" :class="{'label-top':site}" for="website">Сайт</label>
                <div v-if="errors.has('site')" class="err-message position-absolute">
                    {{errors.first('site')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    type="date"
                    name="birthday"
                    class="form-control birthday"
                    id="hbDate"
                    @change="fieldChange('birthday',birthday)"
                    v-model="birthday"
                >
                <label class="textActive" :class="{'label-top':birthday}" for="hbDate">Дата рождения</label>
                <!--<div v-if="errors.has('birthday')" class="err-message position-absolute">-->
                <!--{{errors.first('birthday')}}-->
                <!--</div>-->
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'alpha_spaces|max:255'"
                    :class="{'error':errors.has('city')}"
                    type="text"
                    name="city"
                    class="form-control"
                    id="city"
                    @change="fieldChange('city',city)"
                    v-model="city"
                >
                <label class="textActive" :class="{'label-top':city}" for="city">Город</label>
                <div v-if="errors.has('city')" class="err-message position-absolute">
                    {{errors.first('city')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'alpha_spaces|max:255'"
                    :class="{'error':errors.has('work')}"
                    name="work"
                    type="text"
                    class="form-control"
                    id="job"
                    @change="fieldChange('work',work)"
                    v-model="work"
                >
                <label class="textActive" :class="{'label-top':work}" for="job">Место работы</label>
                <div v-if="errors.has('work')" class="err-message position-absolute">
                    {{errors.first('work')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'max:255'"
                    :class="{'error':errors.has('position')}"
                    name="position"
                    type="text"
                    class="form-control"
                    id="position"
                    @change="fieldChange('position',position)"
                    v-model="position"
                >
                <label class="textActive" :class="{'label-top':position}" for="position">Должность</label>
                <div v-if="errors.has('position')" class="err-message position-absolute">
                    {{errors.first('position')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'email|max:255'"
                    :class="{'error':errors.has('work_email')}"
                    name="work_email"
                    type="email"
                    class="form-control"
                    id="workEmail"
                    @change="fieldChange('work_email',work_email)"
                    v-model="work_email"
                >
                <label class="textActive" :class="{'label-top':work_email}" for="workEmail">Email рабочий</label>
                <div v-if="errors.has('work_email')" class="err-message position-absolute">
                    {{errors.first('work_email')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <select
                    id="group_id"
                    class="form-control groups"
                    name = "group_id"
                    @change="fieldChange('group_id',group_id)"
                    v-model="group_id"
                >
                    <option value="" selected>Без группы</option>
                    <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                </select>
                <label class="textActive" :class="{'label-top':group_id}" for="group_id">Группа</label>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'max:255'"
                    :class="{'error':errors.has('comment')}"
                    name="comment"
                    type="text"
                    class="form-control"
                    id="comment"
                    @change="fieldChange('comment',comment)"
                    v-model="comment"
                >
                <label class="textActive" :class="{'label-top':comment}" for="comment">Комментарий</label>
                <div v-if="errors.has('comment')" class="err-message position-absolute">
                    {{errors.first('comment')}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateFormFields",
        data(){
            return {
                email:'',
                number:'',
                site:'',
                birthday:'',
                city:'',
                work:'',
                work_email:'',
                position:'',
                group_id:'',
                comment:'',
                duplicatedEmail:''
            }
        },
        computed:{
            groups()
            {

                return this.$store.getters.getGroups;
            }
        },
        methods: {
            validation()
            {
                this.$validator.validateAll().then((result) => {
                    result = result && (this.duplicatedEmail!==this.email);
                    this.$store.commit('setFieldsValidation',result);
                })
            },
            duplicated()
            {
                this.duplicatedEmail=this.email;
            },
            fieldChange(fieldName,fieldValue)
            {
                if(fieldValue){
                    this.$store.commit('changeForm',{fieldName:fieldName,value:true});
                }
                else {
                    this.$store.commit('changeForm',{fieldName:fieldName,value:false});
                }
            }
        }
    }
</script>

<style scoped>
    .groups,.birthday {
        color: #808080;
    }
    .error {
        border:1px solid #ff4418;
    }
    .err-message {
        color:#ff4418;
        background: #fff;
        top: 7px;
        right: 11px;
        padding: 0 2px;
    }
    label {
        font-family: Roboto;
        width: 100%;
        max-width: 300px;
        background-color: #fff;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 30px;
        color: #666666;
        position: absolute;
        pointer-events: none;
        left: 10px;
        top: 20px;
        transition: 0.2s ease all;
        -moz-transition: 0.2s ease all;
        -webkit-transition: 0.2s ease all;
    }
    .label-top {
        top: -15px;
        background: none;
    }
    input:focus ~ label{
        background: none;
        top: -15px;
    }
    select:focus ~ label{
        background: none;
        top: -15px;
    }
</style>
