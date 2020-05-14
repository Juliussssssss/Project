<template>
    <div>
        <div class="text-center"><h1>Контакты</h1><h2>{{name}}</h2></div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчесвто</th>
                <th scope="col">Телефон</th>
                <th scope="col">Почта</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="contact in contacts">
                    <td>{{contact.first_name}}</td>
                    <td>{{contact.middle_name}}</td>
                    <td>{{contact.last_name}}</td>
                    <td>{{contact.number}}</td>
                    <td>{{contact.email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import axios from "axios";

    export default {
        name: "test",
        data() {
            return {
                name: '',
                contacts: [],
            }
        },
        created() {
            let url = "";
            if (this.$route.path.slice(6, 14) == "Контакты") {
                url = '/contacts/get-all';
                this.name = '';
            } else {
                url = '/api/groups/' + this.$route.path.slice(this.$route.path.slice(6).lastIndexOf('/') + 7)
                this.name = 'группы "' + this.$route.path.slice(6, this.$route.path.slice(6).lastIndexOf('/') + 6).split('-').join(' ') + '"';
            }
        axios.get(url)
            .then(response => {
                this.contacts = response.data;
            })
            .catch(function (error) {
                console.log(error)
            });
            this.contcts = this.getContacts;
        },
    }
</script>

<style scoped>

</style>
