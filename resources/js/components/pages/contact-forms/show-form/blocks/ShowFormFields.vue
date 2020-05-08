<template>
    <div class="pl-4">
        <div class="col-12 textGrey font-12px">
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="Email">Email:</label>
                <input
                    type="text"
                    name = 'email'
                    class="form-control"
                    id="Email"
                    placeholder="Добавить Email"
                    :value="contact.email"
                >
            </div>
            <div class="form-group position-relative">
                <label
                    class="pl-1 pb-2 textActive" for="Phone">Телефон:</label>
                <input
                    type="text"
                    name = 'number'
                    class="form-control"
                    id="Phone"
                    placeholder="123 (456) 789 12 34"
                    :value="contact.number"
                >
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="website">Сайт:</label>
                <input
                    type="text"
                    name="site"
                    class="form-control"
                    id="website"
                    placeholder="Добавить сайт"
                    :value="contact.site"
                >
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="hbDate">Дата рождения:</label>
                <input
                    type="date"
                    name="birthday"
                    class="form-control birthday"
                    id="hbDate"
                    placeholder="Добавить дату"
                    value="2020-05-03"
                    :value="contact.birthday?contact.birthday.split(' ')[0]:contact.birthday"
                >
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="city">Город:</label>
                <input
                    type="text"
                    name="city"
                    class="form-control"
                    id="city"
                    placeholder="Добавить город"
                    :value="contact.city"
                >
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="job">Место работы:</label>
                <input
                    name="work"
                    type="text"
                    class="form-control"
                    id="job"
                    placeholder="Добавить место работы"
                    :value="contact.work"
                >
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="position">Должность:</label>
                <input
                    name="position"
                    type="text"
                    class="form-control"
                    id="position"
                    placeholder="Добавить должность"
                    :value="contact.position"
                >
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="workEmail">Email рабочий:</label>
                <input
                    name="work_email"
                    type="text"
                    class="form-control"
                    id="workEmail"
                    placeholder="Добавить Email"
                    :value="contact.work_email"
                >
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="group_id">Группа:</label>
                <select
                    id="group_id"
                    class="form-control groups"
                    name = "group_id"
                    :value="contact.group_id"
                >
                    <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                </select>
            </div>
            <div class="form-group position-relative">
                <label class="pl-1 pb-2 textActive" for="comment">Комментарий:</label>
                <input
                    name="created_at"
                    type="text"
                    class="form-control"
                    id="comment"
                    placeholder="Добавить комментарий"
                    :value="contact.comment"
                >
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
    .groups,.birthday {
        color: #808080;
    }
</style>
