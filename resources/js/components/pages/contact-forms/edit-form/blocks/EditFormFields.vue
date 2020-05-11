<template>
    <div class="pl-4 pt-2">
        <div class="col-12 textGrey font-12px">
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'required|email|max:255'"
                    :class="{'error':errors.has('email')||((duplicatedEmail==contact.email)&&duplicatedEmail!='')}"
                    type="text"
                    name = 'email'
                    class="form-control"
                    id="Email"
                    v-model="contact.email"
                >
                <span class="bar"></span>
                <label class="textActive" :class="{'label-top':contact.email}" for="Email">Email</label>
                <div v-if="((errors.has('email'))||((duplicatedEmail==contact.email)&&duplicatedEmail!=''))" class="err-message position-absolute">
                    {{(duplicatedEmail==contact.email)&&duplicatedEmail!=''?'Контакт с данным email уже существует':errors.first('email')}}
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
                    v-model="contact.number"
                >
                <label class="textActive" :class="{'label-top':contact.number}" for="Phone">Телефон</label>
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
                    id="website"
                    v-model="contact.site"
                >
                <label class="textActive" :class="{'label-top':contact.site}" for="website">Сайт</label>
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
                    :value="contact.birthday?contact.birthday.split(' ')[0]:contact.birthday"
                >
                <label class="textActive" :class="{'label-top':contact.birthday}" for="hbDate">Дата рождения</label>
                <!--<div v-if="errors.has('birthday')" class="err-message position-absolute">-->
                <!--{{errors.first('birthday')}}-->
                <!--</div>-->
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'alpha|max:255'"
                    :class="{'error':errors.has('city')}"
                    type="text"
                    name="city"
                    class="form-control"
                    id="city"
                    v-model="contact.city"
                >
                <label class="textActive" :class="{'label-top':contact.city}" for="city">Город</label>
                <div v-if="errors.has('city')" class="err-message position-absolute">
                    {{errors.first('city')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'alpha|max:255'"
                    :class="{'error':errors.has('work')}"
                    name="work"
                    type="text"
                    class="form-control"
                    id="job"
                    v-model="contact.work"
                >
                <label class="textActive" :class="{'label-top':contact.work}" for="job">Место работы</label>
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
                    v-model="contact.position"
                >
                <label class="textActive" :class="{'label-top':contact.position}" for="position">Должность</label>
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
                    v-model="contact.work_email"
                >
                <label class="textActive" :class="{'label-top':contact.work_email}" for="workEmail">Email рабочий</label>
                <div v-if="errors.has('work_email')" class="err-message position-absolute">
                    {{errors.first('work_email')}}
                </div>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <select
                    id="group_id"
                    class="form-control groups"
                    name = "group_id"
                    v-model="contact.group_id"
                >
                    <option value="" selected>Без группы</option>
                    <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                </select>
                <label class="textActive" :class="{'label-top':contact.group_id}" for="group_id">Группа</label>
            </div>
            <div class="form-group position-relative pt-3 pb-1">
                <input
                    v-validate="'max:255'"
                    :class="{'error':errors.has('comment')}"
                    name="comment"
                    type="text"
                    class="form-control"
                    id="comment"
                    v-model="contact.comment"
                >
                <label class="textActive" :class="{'label-top':contact.comment}" for="comment">Комментарий</label>
                <div v-if="errors.has('comment')" class="err-message position-absolute">
                    {{errors.first('comment')}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditFormFields",
        props:['contact'],
        data(){
            return {
                email:'',
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
                    result = result && (this.duplicatedEmail!==this.contact.email);
                    this.$store.commit('setFieldsValidation',result);
                })
            },
            duplicated()
            {
                this.duplicatedEmail=this.contact.email;
            },
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
        top: -15px;
        background: none;
    }
    select:focus ~ label{
        top: -15px;
        background: none;
    }
</style>
