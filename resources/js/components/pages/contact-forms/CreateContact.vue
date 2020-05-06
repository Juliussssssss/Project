<template>
    <div class = "w-100">
        <form @submit.prevent = "addContact" id = "contact" ref='contact'>
            <div class="col-12 customBorderBottom py-3 d-flex align-items-center p-relative mb-3">
                <avatar-load></avatar-load>
                <div class="d-flex font-12px text-center justify-content-between w-100 ml-3">
                    <div class="position-relative">
                        <input
                            v-validate="'required|alpha|max:255'"
                            :class="{'error':errors.has('first_name')}"
                            class="form-control input"
                            name="first_name"
                            type="text"
                            placeholder="Добавить Фамилию"
                        >
                        <div v-if="errors.has('first_name')" class="err-message-head position-absolute">{{errors.first('first_name')}}</div>
                    </div>
                    <div class="position-relative">
                        <input
                            v-validate="'required|alpha|max:255'"
                            :class="{'error':errors.has('middle_name')}"
                            class="form-control input"
                            name = "middle_name"
                            type="text"
                            placeholder="Добавить Имя"
                        >
                        <div v-if="errors.has('middle_name')" class="err-message-head position-absolute">{{errors.first('middle_name')}}</div>
                    </div>
                    <div class="position-relative">
                        <input
                            v-validate="'alpha|max:255'"
                            :class="{'error':errors.has('last_name')}"
                            class="form-control input"
                            name="last_name"
                            type="text"
                            placeholder="Добавить Отчество"
                        >
                        <div v-if="errors.has('last_name')" class="err-message-head position-absolute">{{errors.first('last_name')}}</div>
                    </div>
                </div>
            </div>
            <div class="pl-4">
                <div class="col-12 textGrey font-12px">
                    <div class="form-group position-relative">
                        <label class="pl-1 pb-2 textActive" for="Email">Email:</label>
                        <input
                            v-validate="'required|email|max:255'"
                            :class="{'error':errors.has('email')||((lastEmail==email)&&lastEmail!='')}"
                            type="text"
                            name = 'email'
                            class="form-control"
                            id="Email" placeholder="Добавить Email"
                            v-model="email"
                        >
                        <div v-if="((errors.has('email'))||((lastEmail==email)&&lastEmail!=''))" class="err-message position-absolute">
                            {{(lastEmail==email)&&lastEmail!=''?'Контакт с данным email уже существует':errors.first('email')}}
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
            <div class="form-group d-flex justify-content-end mr-4 mt-4 mb-4">
                <button class="py-3 btn text-uppercase font-12px btnText text-white save d-inline-block mr-3 w-100">
                    Сохранить
                </button>
                <router-link
                    class="py-3 btn-light btn text-uppercase font-12px btnText cancel"
                    to="/contacts">
                    Отмена
                </router-link>
            </div>
        </form>
    </div>
</template>

<script>
    import AvatarLoad from '../contact-forms/blocks/AvatarLoad';
    export default {
        name: "CreateContact",
        components: {
            AvatarLoad
        },
        data() {
            return {
                groups:[],
                lastEmail:'',
                email:''
            }
        },
        methods: {
            addContact() {
                this.$validator.validateAll().then((result) => {
                    if (result&&this.lastEmail!=this.email) {
                        const data = new FormData(this.$refs.contact);
                        data.append('favorites', 0);
                        axios.post('/contact/add', data, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(response => {
                            if (response.data == 'created') {
                                console.log('redirect')
                            }
                        })
                        .catch(error => {
                                this.lastEmail=this.email;
                            }
                        );
                    }
                })
            },
            getGroups() {
                axios.get('/groups')
                    .then((response) => {
                        if (response.data) {
                            this.groups = response.data;
                        }
                    }).catch(e => {
                    console.log('err');
                });
            },
        },
        created(){
            this.getGroups();
        }
    }
</script>

<style scoped>
    .cancel {

    }
    .save {
        max-width: 120px;
        background-color: #1875F0;
    }
    .save:hover {
        background-color: #1875E0;
    }
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
    .input {
        max-width: 180px;
        padding: 20px;
    }
    .customBorderBottom::after,.customBorderBottom::before {
        content: '';
        top: 118px;
        width: 15px;
        height: 2px;
        position: absolute;
        background-color: #F5F5F5;
    }
    .customBorderBottom::before {
        left: -15px;
    }
    .customBorderBottom::after {
        right: -15px;
    }
    .err-message-head {
        color:#ff4418;
        background: #fff;
        top: -9px;
        right: 11px;
        padding: 0 2px;
    }
</style>
