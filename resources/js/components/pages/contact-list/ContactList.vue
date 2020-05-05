<template>
    <div>
        <tools></tools>
        <div class="col-12 p-0">
            <div class="customBorderBottom row py-3 textGrey">
                <div class="col-2 pr-0">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <input id="all" type="checkbox"/>
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
                 v-for="(contact) in contacts"
                 v-bind:key="contact.id">
                <div class="col-2 pr-0">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <input id="id" type="checkbox"/>
                            <label class="pl-2 customLabel m-0" for="id"></label>
                        </div>
                        <div class="col-3 pr-0">
                            <a href="">
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
                            <img class="contactPhoto" :src="contact.avatar" alt="фото">
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 pl-0 contactPhoto align-items-center d-flex"><span
                            class="font-12px">{{ contact.first_name }} {{contact.middle_name}} {{ contact.last_name }}</span></div>
                        <div class="col-3 pl-0 d-flex"><span
                            class="font-12px text-truncate">{{ contact.email }}</span></div>
                        <div class="col-3 pl-0"><span class="font-12px">{{ contact.number }}</span>
                        </div>
                        <div class="col-3 pl-0"><span class="font-12px">{{ contact.group['name'] }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Contacts",
        data() {
            return {
                contacts: []
            }
        },
        created() {
            axios.get('/contacts/get-all')
                .then(response => {
                    this.contacts = response.data;
                })
                .catch(function (error) {
                    console.log(error)
                });
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
