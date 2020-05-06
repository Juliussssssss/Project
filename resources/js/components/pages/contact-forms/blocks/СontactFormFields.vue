<template>
    <div class="pl-4">
        <div class="col-12 textGrey font-12px">
            <div class="form-group pt-3">
                <label class="pl-1 pb-2 textActive" for="Email">Email:</label>
                <input
                    type="text"
                    name = 'email'
                    class="form-control"
                    id="Email" placeholder="Добавить Email"
                >
            </div>
            <div class="form-group">
                <label
                    class="pl-1 pb-2 textActive" for="Phone">Телефон:</label>
                <input
                    type="text"
                    name = 'number'
                    class="form-control"
                    id="Phone"
                    placeholder="123 (456) 789 12 34"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="website">Сайт:</label>
                <input
                    type="text"
                    name="site"
                    class="form-control"
                    id="website"
                    placeholder="Добавить сайт"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="hbDate">Дата рождения:</label>
                <input
                    type="date"
                    name="birthday"
                    class="form-control birthday"
                    id="hbDate"
                    placeholder="Добавить дату"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="city">Город:</label>
                <input
                    type="text"
                    name="city"
                    class="form-control"
                    id="city"
                    placeholder="Добавить город"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="job">Место работы:</label>
                <input
                    name="work"
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
                    name="work_email"
                    type="text"
                    class="form-control"
                    id="workEmail"
                    placeholder="Добавить Email"
                >
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="group_id">Грппа:</label>
                <select
                    id="group_id"
                    class="form-control groups"
                    name = "group_id"
                >
                    <option value="" selected>Добавить группу</option>
                    <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label class="pl-1 pb-2 textActive" for="comment">Комментарий:</label>
                <input
                    name="comment"
                    type="text"
                    class="form-control"
                    id="comment"
                    placeholder="Добавить комментарий"
                >
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactFormFields",
        data() {
            return {
                groups:[]
            }
        },
        methods: {
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
        created() {
            this.getGroups();
        }
    }
</script>

<style scoped>
    .groups,.birthday {
        color: #808080;
    }
</style>
