<template>
    <div class = "w-100">
        <form @submit.prevent = "addContact" id = "contact" ref='contact'>
            <div class="col-12 customBorderBottom py-3 d-flex align-items-center p-relative mb-3">
                <avatar-load></avatar-load>
                <div class="d-flex font-12px text-center font-16px pl-4 align-items-center">
                    <span>Куличенко Юлия</span>
                    <span class="mr-2 ml-5">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                            <mask id="nonFavorite" mask-type="alpha" maskUnits="userSpaceOnUse" x="20" y="20" width="20" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40 27.24L32.81 26.62L30 20L27.19 26.63L20 27.24L25.46 31.97L23.82 39L30 35.27L36.18 39L34.55 31.97L40 27.24ZM30 33.4L26.24 35.67L27.24 31.39L23.92 28.51L28.3 28.13L30 24.1L31.71 28.14L36.09 28.52L32.77 31.4L33.77 35.68L30 33.4Z" fill="white"/>
                            </mask>
                            <g mask="url(#nonFavorite)">
                            <rect x="17" y="17" width="26" height="26" fill="#D8D8D8"/>
                            </g>
                        </svg>
                    </span>
                    <span class="mx-2">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                            <mask id="delete" mask-type="alpha" maskUnits="userSpaceOnUse" x="23" y="21" width="14" height="18">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 37C24 38.1 24.9 39 26 39H34C35.1 39 36 38.1 36 37V25H24V37ZM37 22H33.5L32.5 21H27.5L26.5 22H23V24H37V22Z" fill="white"/>
                            </mask>
                            <g mask="url(#delete)">
                                <rect x="17" y="17" width="26" height="26" fill="#D8D8D8"/>
                            </g>
                        </svg>
                    </span>
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
                            id="Email"
                            placeholder="Добавить Email"
                            v-model="contact.email"
                        >
                        <div v-if="(errors.has('email')||((lastEmail==contact.email)&&lastEmail!=''))" class="err-message position-absolute">
                            {{(lastEmail==contact.email)&&lastEmail!=''?'Контакт с данным email уже существует':errors.first('email')}}
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
                            v-model="contact.number"
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
                            v-model="contact.site"
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
                            v-model="contact.birthday"
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
                            v-model="contact.city"
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
                            v-model="contact.work"
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
                            v-model="contact.position"
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
                            v-model="contact.work_email"
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
                            v-model="contact.group_id"
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
                            v-model="contact.comment"
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
        name: "EditContact",
        components: {
            AvatarLoad
        },
        data() {
            return {
                groups:[],
                lastEmail:'',
                email:'',
                contact:{}
            }
        },
        methods: {
            addContact() {
                this.$validator.validateAll().then((result) => {
                    if (result&&this.lastEmail!=this.contact.email) {
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

                                this.lastEmail=this.contact.email;
                                console.log(this.email);
                                console.log(error);
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
