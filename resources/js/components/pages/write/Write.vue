<template>
    <div>
        <tools></tools>
        <div class="col-12 p-0">
            <div class="container mt-2">
                <form>
                    <div class="row write-row my-2">
                        <div class="write-field-name px-3 textGrey">
                            <small>Кому</small>
                        </div>
                        <div class="write-field-value">
                            <span v-for="contact in getContacts" v-if="getSelectedContacts.includes(contact.id)">
                                {{ contact.first_name ? contact.first_name : '' }}
                                {{ contact.middle_name ? contact.middle_name : '' }}
                                <small>&lt;{{ contact.email }}&gt;</small>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <label class="sr-only" for="inlineFormInputGroup">Тема</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text textGrey text-decoration-none px-3"><small>Тема</small>
                                </div>
                            </div>
                            <input type="text" class="form-control pl-5" id="inlineFormInputGroup" ref="subject"
                                   placeholder="Тема" v-model="form.subject">
                        </div>
                    </div>

                    <div class="row">
                        <textarea class="form-control" id="writeFormMessage" rows="4"
                                  v-model="form.message">
                        </textarea>
                    </div>

                    <div class="row my-2 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-lg mx-2" @click="send">Отправить</button>
                        <router-link
                            class="py-3 px-4 btn-light btn text-uppercase font-12px btnText cancel"
                            to="/contacts">
                            Отмена
                        </router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "Write",
        data() {
            return {
                form: {
                    subject: "",
                    message: ""
                }
            }
        },
        computed: {
            ...mapGetters(["getSelectedContacts", "getContacts"])
        },
        methods: {
            ...mapActions(["write"]),
            send() {
                this.write(this.form)
                this.$router.push('/contacts')
            }
        },
        mounted() {
            //this.$refs.subject.focus()
            if (this.getSelectedContacts.length === 0) {
                this.$router.push('/contacts')
            }
        }
    }
</script>

<style>
    .input-group-text {
        background-color: #fff;
    }

    .write-row {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        border: 1px solid rgba(0, 0, 0, 0.15);
        align-items: center;
        border-radius: 3px;
        flex-wrap: nowrap;
    }

    .write-row > .write-field-name {
        flex: 0 0 50px;
        text-align: center;

        padding: 3px 0;
        height: 100%;
    }

    .write-row > .write-field-value {
        flex: auto;
        text-align: left;
        padding: 5px 0px 5px 50px;
        border-left: 1px solid rgba(0, 0, 0, 0.2);
    }

    .write-row > .write-field-value > span {
        color: gray;
    }

    .write-row > .write-field-value > span:after {
        content: ', ';
    }

    .write-row > .write-field-value > span:last-child:after {
        content: '';
    }
</style>
