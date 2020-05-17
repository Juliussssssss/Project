<template>
    <div>
        <div class="col-12 p-0">
            <div class="customBorderBottom row py-3 textGrey">
                <div class="col-2 pr-0">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <input v-model="selectAllControlProp" @click="selectAll" hidden id="all" type="checkbox"/>
                            <label class="pl-2 customLabel m-0" for="all"></label>
                        </div>
                        <div class="col-3 pr-0">
                            <a href="">
                                <img class="margingY" src="storage/logos/favoritesStar.svg" alt="avatar">
                            </a>
                        </div>
                        <div class="col-6 pr-0"></div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 pl-0"><span class="font-12px">Имя</span></div>
                        <div class="col-3 pl-0"><span class="font-12px">Почта</span></div>
                        <div class="col-3 pl-0"><span class="font-12px">Телефон</span></div>
                        <div class="col-3 pl-0"><span class="font-12px">Группа</span></div>
                    </div>
                </div>
            </div>
            <div class="customBorderBottom row py-3 textGrey"
                 v-for="(contact) in getContacts.slice((getCurrentPage-1)*100,getCurrentPage*100)"
                 v-bind:key="contact.id">
                <div class="col-2 pr-0">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <input @click="checkSelectAll" v-model="selected" :id="contact.id" hidden :value="contact.id" type="checkbox"/>
                            <label class="pl-2 customLabel m-0" :for="contact.id"></label>
                        </div>
                        <div class="col-3 pr-0">
                            <a class="favorites" @click="setFavorites(contact.favorites, contact.id)">
                                <img class="margingY" :src="contact.favorites == 0 ? 'storage/logos/nonFavoritesStar.svg' : 'storage/logos/favoritesStar.svg'" alt="avatar">
                            </a>
                        </div>
                        <div class="col-6 pr-0">
                            <router-link class="row pl-2" :to="{ name: 'ContactShow', params: {user_id: contact.id } }">
                                <img class="contactPhoto ml-1" :src="contact.avatar" alt="фото">
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <router-link class="row routerLink linkDisabled textGrey" :to="{ name: 'ContactShow', params: {user_id: contact.id} }">
                        <div class="col-3 pl-0 contactPhoto align-items-center d-flex">
                            <span class="font-12px">
                                <span v-html="highlight(contact.first_name)"/>
                                <span v-html="highlight(contact.middle_name)"/>
                                <span v-html="highlight(contact.last_name)"/>
                            </span>
                        </div>
                        <div class="col-3 pl-0 d-flex">
                            <span class="font-12px text-truncate" v-html="highlight(contact.email)"/>
                        </div>
                        <div class="col-3 pl-0">
                            <span class="font-12px" v-html="highlight(contact.number)"/>
                        </div>
                        <div class="col-3 pl-0 d-flex">
                            <span class="font-12px text-truncate">{{ contact.group ? contact.group['name'] : '' }}</span>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    export default {
        name: "Contacts",
        data() {
            return {
                selected: [],
                sortType: 1,
                selectAllControlProp: false
            }
        },
        watch: {
            getCurrentPage: function() {
                this.selected = [];
                this.selectAllControlProp = false;
                this.selectedContact(this.selected);
            },
            getContacts: function() {
                this.selected = [];
                this.selectedContact(this.selected);
                this.selectAllControlProp = false;
            },
            getSort: function (id) {
                this.selectedSortType(id);
            },
        },
        computed: {
            ...mapGetters([
                "getCurrentPage",
                "getHighlightedWord",
                "getSort",
                "getContacts"
            ])
        },
        methods: {
             ...mapActions([
                "selectedContact",
            ]),
            highlight(value) {
                if (value != null) {
                    if ((value.toLowerCase().indexOf(this.getHighlightedWord) > -1) && (this.getHighlightedWord.length > 0)) {
                        let beforeWord = value.toLowerCase().indexOf(this.getHighlightedWord);
                        let wordLength = this.getHighlightedWord.length;
                        return (
                            value.slice(0, beforeWord)
                            + '<span class="bg-warning">' + value.slice(beforeWord, beforeWord + wordLength) + '</span>'
                            + value.slice(beforeWord + wordLength)
                        );
                    }
                }
                return (value);
            },
            selectAll() {
                let selectList = this.getContacts.slice((this.getCurrentPage-1)*100, this.getCurrentPage*100);
                    if (this.selected.length == selectList.length && this.selectAllControlProp == true) {
                        this.selected = [];
                    } else {
                        this.selected = selectList.map(a => a.id);
                    }
                    this.selectedContact(this.selected);
                },
            checkSelectAll() {
                    setTimeout(this.checked, 10);
                },
            checked() {
                    let selectList = this.getContacts.slice((this.getCurrentPage-1)*100, this.getCurrentPage*100);
                    if (this.selected.length != selectList.length) {
                        this.selectAllControlProp = false;
                    } else {
                        this.selectAllControlProp = true;
                    }
                    this.selectedContact(this.selected);
                },
            selectedSortType(int) {
                    if (int !== this.sortType) {
                        this.sortType = int;
                        switch (int) {
                            case 1:
                                this.sortByName();
                                break;
                            case 2:
                                this.sortBySecondName();
                                break;
                            case 3:
                                this.sortByFavorites();
                                break;
                        }
                    }
                },
            sortByName() {
                    this.getContacts.sort((prev, next) => {
                        if ( prev.first_name < next.first_name ) return -1;
                        if ( prev.first_name < next.first_name ) return 1;
                    });
                },
            sortBySecondName() {
                    this.getContacts.sort((prev, next) => {
                        if ( prev.middle_name < next.middle_name ) return -1;
                        if ( prev.middle_name < next.middle_name ) return 1;
                    });
                },
            sortByFavorites() {
                    this.getContacts.sort((prev, next) => {
                        if ( prev.favorites > next.favorites ) return -1;
                        if ( prev.favorites > next.favorites ) return 1;
                    });
                },
            setFavorites(int, id) {
                axios.post('/contacts/set-favorites', {id: id, value: !int})
                    .then(response => {
                        this.getContacts[this.getContacts.findIndex(x => x.id == id)].favorites = !int;
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            }
        }
    }
</script>

<style scoped>
    .favorites {
        cursor: pointer;
    }
    .linkDisabled {
        text-decoration: none;
    }
    .linkDisabled:hover {
        color: inherit;
    }
    .margingY {
        margin-top: -2px;
    }
    /*custom checkbox*/
    .customLabel {
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
        background-color: #ffffff;
        border: 2px solid #e6e6e6;
        box-sizing: border-box;
        border-radius: 4px;
        vertical-align: center;
        position: relative;
    }

    input:checked + .customLabel {
        background-color: #1875F0;
        border: 2px solid #1875F0;
    }

    input:checked + .customLabel:after {
        content: '';
        display: block;
        position: absolute;
        top: 1px;
        left: 5px;
        width: 5px;
        height: 12px;
        border: solid #ffffff;
        border-width: 0 2px 2px 0px;
        transform: rotate(45deg);
    }
</style>
