<template>
    <div class = "w-100">
        <div class="col-12 customBorderBottom py-3 d-flex align-items-center p-relative">
            <div class="imageUpload p-relative mx-4">
                <label class="file mt-2" for="file">
                    <svg width="70" height="70" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="60" height="60" rx="30" fill="url(#pattern0)"/>
                        <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                        <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="20" y="20" width="20" height="20">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M30 20C24.48 20 20 24.48 20 30C20 35.52 24.48 40 30 40C35.52 40 40 35.52 40 30C40 24.48 35.52 20 30 20ZM30 23C31.66 23 33 24.34 33 26C33 27.66 31.66 29 30 29C28.34 29 27 27.66 27 26C27 24.34 28.34 23 30 23ZM30 37.2C27.5 37.2 25.29 35.92 24 33.98C24.03 31.99 28 30.9 30 30.9C31.99 30.9 35.97 31.99 36 33.98C34.71 35.92 32.5 37.2 30 37.2Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0)">
                            <rect x="17" y="17" width="26" height="26" fill="#D8D8D8"/>
                        </g>
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0" transform="scale(0.002)"/>
                            </pattern>
                        </defs>
                    </svg>
                </label>
                <div class="d-none">
                    <input class = "file" name="photo" id="file" type="file">
                </div>
            </div>
            <div class="d-flex font-12px text-center justify-content-betw">
                <input class="mx-4 form-control input" type="text" placeholder="Добавить Фамилию">
                <input class="form-control input" type="text" placeholder="Добавить Имя">
                <input
                    v-validate="'required|max:50'"
                    :class="{'input': true, 'alert-danger':errors.has('last_name')}"
                    class="ml-4 form-control input"
                    name="last_name"
                    type="text"
                    placeholder="Добавить Отчество"
                >
                <span v-show="errors.has('last_name')" class="help is-danger">{{errors.first('last_name')}}</span>
            </div>
        </div>
        <div class="pl-4">
            <div class="col-12 textGrey font-12px">
            <div class="form-group pt-3">
                <label class="pl-1 pb-2 textActive" for="Email">Email:</label>
                <input
                    type="text"
                    class="form-control"
                    id="Email" placeholder="Добавить Email"
                >
            </div>
            <div class="form-group">
                <label
                    class="pl-1 pb-2 textActive" for="Phone">Телефон:</label>
                <input
                    type="text"
                    class="form-control"
                    id="Phone"
                    placeholder="123 (456) 789 12 34"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="website">Сайт:</label>
                <input
                    type="text"
                    class="form-control"
                    id="website"
                    placeholder="Добавить сайт"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="hbDate">Дата рождения:</label>
                <input
                    type="text"
                    class="form-control"
                    id="hbDate"
                    placeholder="Добавить дату"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="city">Город:</label>
                <input
                    type="text"
                    class="form-control"
                    id="city"
                    placeholder="Добавить город"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="job">Город:</label>
                <input
                    type="text"
                    class="form-control"
                    id="job"
                    placeholder="Добавить место работы"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="position">Должность:</label>
                <input
                    type="text"
                    class="form-control"
                    id="position"
                    placeholder="Добавить должность"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="workEmail">Email рабочий:</label>
                <input
                    type="text"
                    class="form-control"
                    id="workEmail"
                    placeholder="Добавить Email"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="group">Грппа:</label>
                <select class="form-control groups">
                    <option value="" selected>Добавить группу</option>
                    <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="comment">Комментарий:</label>
                <input
                    type="text"
                    class="form-control"
                    id="comment"
                    placeholder="Добавить комментарий"
                >
            </div>
            <div class="form-group d-flex justify-content-end mr-4 mt-4 mb-4">
                <a class="py-3 btn text-uppercase font-12px btnText text-white save d-inline-block mr-3 w-100">Сохранить</a>
                <a class="py-3 btn-light btn text-uppercase font-12px btnText cancel">Отмена</a>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactAdd",
        data() {
            return {
                groups:[],
                contact:{
                    first_name:'*',
                    middle_name:'*',
                    last_name:'',
                    email:'*',
                    number:'',
                    site:'',
                    birthday:'',
                    city:'',
                    work:'',
                    position:'',
                    favorites:'',
                    work_email:'',
                    group_id:'',
                    comment:'',
                }
            }
        },
        methods: {
           getGroups() {
               axios.get('/get-groups').then((response) => {
                   if (response.data) {
                       this.groups = response.data;
                   }
               }).catch(e => {
                   console.log('err');
               });
           }
        },
        created() {
            this.getGroups();
        }
    }
</script>

<style scoped>
    .input {
        max-width: 180px;
        padding: 20px;
    }
    .file:hover {
        cursor:pointer;
        opacity: 0.9;
    }
    .groups {
        color: #808080;
    }
    .cancel {

    }
    .save {
        max-width: 120px;
        background-color: #1875F0;
    }
    .save:hover {
        background-color: #1875E0;
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
</style>
