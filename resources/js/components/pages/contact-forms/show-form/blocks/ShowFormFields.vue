<template>
    <div class="pl-0 pl-sm-4 pt-4">
            <div class="col-12 textGrey font-12px">
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        type="text"
                        name = 'email'
                        class="form-control"
                        id="Email"
                        required
                        :value="contact.email"
                        disabled
                    >
                    <label class="textActive" :class="{'label-top':contact.email}" for="Email">Email</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        type="text"
                        name = 'number'
                        class="form-control"
                        id="Phone"
                        required
                        disabled
                        :value="contact.number"
                    >
                    <label class="textActive" :class="{'label-top':contact.number}" for="Phone">Телефон</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        type="text"
                        name="site"
                        class="form-control"
                        id="website"
                        required
                        disabled
                        :value="contact.site"
                    >
                    <label class="textActive" :class="{'label-top':contact.site}" for="website">Сайт</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        type="date"
                        name="birthday"
                        class="form-control birthday"
                        id="hbDate"
                        required
                        disabled
                        :value="contact.birthday?contact.birthday.split(' ')[0]:contact.birthday"
                    >
                    <label class="textActive" :class="{'label-top':contact.birthday}" for="hbDate">Дата рождения</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        type="text"
                        name="city"
                        class="form-control"
                        id="city"
                        required
                        disabled
                        :value="contact.city"
                    >
                    <label class="textActive" :class="{'label-top':contact.city}" for="city">Город</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        name="work"
                        type="text"
                        class="form-control"
                        id="job"
                        required
                        disabled
                        :value="contact.work"
                    >
                    <label class="textActive" :class="{'label-top':contact.work}" for="job">Место работы</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        name="position"
                        type="text"
                        class="form-control"
                        id="position"
                        required
                        disabled
                        :value="contact.position"
                    >
                    <label class="textActive" :class="{'label-top':contact.position}" for="position">Должность</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        name="work_email"
                        type="email"
                        class="form-control"
                        id="workEmail"
                        required
                        disabled
                        :value="contact.work_email"
                    >
                    <label class="textActive" :class="{'label-top':contact.work_email}" for="workEmail">Email рабочий</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <select
                        id="group_id"
                        class="form-control groups"
                        name = "group_id"
                        required
                        disabled
                        :value="contact.group_id"
                    >
                        <option value="" selected>Без группы</option>
                        <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                    </select>
                    <label class="textActive" :class="{'label-top':contact.group_id}" for="group_id">Группа</label>
                </div>
                <div class="form-group position-relative pt-3 pb-1">
                    <input
                        name="comment"
                        type="text"
                        class="form-control"
                        id="comment"
                        required
                        disabled
                        :value="contact.comment"
                    >
                    <label class="textActive" :class="{'label-top':contact.comment}"  for="comment">Комментарий</label>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "ShowFormFields",
        props:['contact'],
        computed:{
            groups()
            {
                return this.$store.getters.getGroups;
            }
        }
    }
</script>

<style scoped>
    *:disabled {
        background-color: #fff;
    }
    label {
        font-family: Roboto;
        width: 100%;
        max-width: 300px;
        margin-right: 10px;
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
        font-size: 12px;
    }
</style>
