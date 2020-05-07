<template>
    <div>
        <div class="col-12 p-0">
            <div class="customBorderBottom row py-3 textGrey">
                <div class="col-2 pr-0">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <input v-model="selectAllControlProp" @click="selectAll" id="all" type="checkbox"/>
                            <label class="pl-2 customLabel m-0" for="all"></label>
                        </div>
                        <div class="col-3 pr-0">
                            <a href="">
                                <svg class="margingY" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="favorites" mask-type="alpha"
                                          maskUnits="userSpaceOnUse" x="5" y="5" width="20"
                                          height="19">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M15 20.27L21.18 24L19.54 16.97L25 12.24L17.81 11.63L15 5L12.19 11.63L5 12.24L10.46 16.97L8.82 24L15 20.27Z"
                                              fill="white"/>
                                    </mask>
                                    <g mask="url(#favorites)">
                                        <rect x="2" y="2" width="26" height="26"
                                              fill="#FEF40A"/>
                                    </g>
                                </svg>
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
                 v-for="(contact) in contacts.slice((currentPage-1)*100,currentPage*100)"
                 v-bind:key="contact.id">
                <div class="col-2 pr-0">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <input @click="checkSelectAll" v-model="selected" :id="contact.id" :value="contact.id" type="checkbox"/>
                            <label class="pl-2 customLabel m-0" :for="contact.id"></label>
                        </div>
                        <div class="col-3 pr-0">
                            <a class="favorites" @click="setFavorites(contact.favorites, contact.id)">
                                <svg class="margingY" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="nonFavorites" mask-type="alpha"
                                          maskUnits="userSpaceOnUse" x="5" y="5" width="20"
                                          height="19">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M25 12.24L17.81 11.62L15 5L12.19 11.63L5 12.24L10.46 16.97L8.82 24L15 20.27L21.18 24L19.55 16.97L25 12.24ZM15 18.4L11.24 20.67L12.24 16.39L8.92 13.51L13.3 13.13L15 9.1L16.71 13.14L21.09 13.52L17.77 16.4L18.77 20.68L15 18.4Z"
                                              fill="white"/>
                                    </mask>
                                    <g :mask="contact.favorites==0 ? 'url(#nonFavorites)' : 'url(#favorites)'">
                                        <rect x="2" y="2" width="26" height="26"
                                              :fill="contact.favorites==0 ? '#D8D8D8' : '#FEF40A'"/>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="col-6 pr-0">
                            <router-link class="row pl-2" :to="{ name: 'Test', params: {user_id: contact.id } }">
                                <img class="contactPhoto ml-1" :src="contact.avatar" alt="фото">
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <router-link class="row routerLink linkDisabled textGrey" :to="{ name: 'Test', params: {user_id: contact.id } }">
                        <div class="col-3 pl-0 contactPhoto align-items-center d-flex"><span
                            class="font-12px">{{ contact.first_name }} {{contact.middle_name}} {{ contact.last_name }}</span></div>
                        <div class="col-3 pl-0 d-flex"><span
                            class="font-12px text-truncate">{{ contact.email }}</span></div>
                        <div class="col-3 pl-0"><span class="font-12px">{{ contact.number }}</span>
                        </div>
                        <div class="col-3 pl-0"><span class="font-12px">{{ contact.group ? contact.group['name'] : '' }}</span></div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Contacts",
        props: ["contacts", "currentPage", "newSortType"],
        data() {
            return {
                selected: [],
                sortType: 1,
                selectAllControlProp: false
            }
        },
        watch: {
            newSortType: function (id) {
                this.selectedSortType(id);
            }
        },
        methods: {
            selectAll() {
                let selectList = this.contacts.slice((this.currentPage-1)*100, this.currentPage*100);
                    if (this.selected.length == selectList.length && this.selectAllControlProp == true) {
                        this.selected = [];
                    } else {
                        this.selected = selectList.map(a => a.id);
                    }
                    this.$emit("selectedContact", this.selected)
                },
                checkSelectAll() {
                    setTimeout(this.checked, 10);
                },
                checked() {
                    let selectList = this.contacts.slice((this.currentPage-1)*100, this.currentPage*100);
                    if (this.selected.length != selectList.length) {
                        this.selectAllControlProp = false;
                    } else {
                        this.selectAllControlProp = true;
                    }
                    this.$emit("selectedContact", this.selected)
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
                    this.contacts.sort((prev, next) => {
                        if ( prev.first_name < next.first_name ) return -1;
                        if ( prev.first_name < next.first_name ) return 1;
                    });
                },
                sortBySecondName() {
                    this.contacts.sort((prev, next) => {
                        if ( prev.middle_name < next.middle_name ) return -1;
                        if ( prev.middle_name < next.middle_name ) return 1;
                    });
                },
                sortByFavorites() {
                    this.contacts.sort((prev, next) => {
                        if ( prev.favorites > next.favorites ) return -1;
                        if ( prev.favorites > next.favorites ) return 1;
                    });
                },
                setFavorites(int, id) {
                if (int == 1) {
                    int = 0;
                } else {
                    int = 1;
                }
                axios.post('/contacts/set-favorites', {id: id, value: int})
                    .then(response => {
                        this.contacts[this.contacts.findIndex(x => x.id == id)].favorites = int;
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
</style>
