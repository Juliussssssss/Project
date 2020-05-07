<template>
    <div class="pl-4">
        <div class="col-12 textGrey font-12px">
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="Email">Email:</label>
                <input
                    v-validate="'required|email|max:255'"
                    :class="{'error':errors.has('email')||((duplicatedEmail==email)&&duplicatedEmail!='')}"
                    type="text"
                    name = 'email'
                    class="form-control"
                    id="Email" placeholder="Добавить Email"
                    v-model="email"
                >
                <div v-if="((errors.has('email'))||((duplicatedEmail==email)&&duplicatedEmail!=''))" class="err-message position-absolute">
                    {{(duplicatedEmail==email)&&duplicatedEmail!=''?'Контакт с данным email уже существует':errors.first('email')}}
                </div>
            </div>
            <div class="form-group position-relative">
                <label
                    class="pl-1 pb-2 textActive" for="Phone">Телефон:</label>
                <input
                    v-validate="'digits:10'"
                    :class="{'error':errors.has('number')}"
                    type="text"
                    name = 'number'
                    class="form-control"
                    id="Phone"
                    placeholder="123 (456) 789 12 34"
                >
                <div v-if="errors.has('number')" class="err-message position-absolute">
                    {{errors.first('number')}}
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="website">Сайт:</label>
                <input
                    v-validate="'max:255'"
                    :class="{'error':errors.has('site')}"
                    type="text"
                    name="site"
                    class="form-control"
                    id="website"
                    placeholder="Добавить сайт"
                >
                <div v-if="errors.has('site')" class="err-message position-absolute">
                    {{errors.first('site')}}
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="hbDate">Дата рождения:</label>
                <input
                    type="date"
                    name="birthday"
                    class="form-control birthday"
                    id="hbDate"
                    placeholder="Добавить дату"
                >
                <!--<div v-if="errors.has('birthday')" class="err-message position-absolute">-->
                <!--{{errors.first('birthday')}}-->
                <!--</div>-->
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="city">Город:</label>
                <input
                    v-validate="'alpha|max:255'"
                    :class="{'error':errors.has('city')}"
                    type="text"
                    name="city"
                    class="form-control"
                    id="city"
                    placeholder="Добавить город"
                >
                <div v-if="errors.has('city')" class="err-message position-absolute">
                    {{errors.first('city')}}
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="job">Место работы:</label>
                <input
                    v-validate="'alpha|max:255'"
                    :class="{'error':errors.has('work')}"
                    name="work"
                    type="text"
                    class="form-control"
                    id="job"
                    placeholder="Добавить место работы"
                >
                <div v-if="errors.has('work')" class="err-message position-absolute">
                    {{errors.first('work')}}
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="position">Должность:</label>
                <input
                    v-validate="'max:255'"
                    :class="{'error':errors.has('position')}"
                    name="position"
                    type="text"
                    class="form-control"
                    id="position"
                    placeholder="Добавить должность"
                >
                <div v-if="errors.has('position')" class="err-message position-absolute">
                    {{errors.first('position')}}
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="workEmail">Email рабочий:</label>
                <input
                    v-validate="'email|max:255'"
                    :class="{'error':errors.has('work_email')}"
                    name="work_email"
                    type="text"
                    class="form-control"
                    id="workEmail"
                    placeholder="Добавить Email"
                >
                <div v-if="errors.has('work_email')" class="err-message position-absolute">
                    {{errors.first('work_email')}}
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="group_id">Группа:</label>
                <select
                    id="group_id"
                    class="form-control groups"
                    name = "group_id"
                >
                    <option value="" selected>Добавить группу</option>
                    <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                </select>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="comment">Комментарий:</label>
                <input
                    v-validate="'max:255'"
                    :class="{'error':errors.has('comment')}"
                    name="comment position-relative"
                    type="text"
                    class="form-control"
                    id="comment"
                    placeholder="Добавить комментарий"
                >
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
        top: 26px;
        right: 11px;
        padding: 0 2px;
    }
</style>
