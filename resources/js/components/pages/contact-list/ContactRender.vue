<template>
    <div>
        <tools
            :pages="pages"
            :currentPage="currentPage"
            :length="length"
            :sortType="sortType"
            @changePage="changePage"
            @selectedSortType="selectedSortType"
        ></tools>
        <contact-list
            :contacts="contacts"
            :currentPage="currentPage"
            :selectAllControl="selectAllControl"
            @ChangeSelectAllControl="ChangeSelectAllControl"
        ></contact-list>
    </div>
</template>

<script>
    import ContactList from "./ContactList";
    export default {
        name: "Contacts",
        components: {
            'contact-list': ContactList,
        },
        data() {
            return {
                contacts: [],
                pages: 0,
                currentPage: 1,
                length: 0,
                sortType: 1,
                selected: [],
                selectAllControl: false,
            }
        },
        created() {
            axios.get('/contacts/get-all')
                .then(response => {
                    this.contacts = response.data;
                    this.pages = (Math.ceil(this.contacts.length/100));
                    this.length = this.contacts.length;
                    this.sortByName();
                })
                .catch(function (error) {
                    console.log(error)
                });
        },
        methods: {
            ChangeSelectAllControl(bool) {
                this.selectAllControl = bool;
            },
            selectAll() {
                let selectList = this.contacts.slice((this.currentPage-1)*100, this.currentPage*100);
                if (this.selected.length == selectList.length && this.selectAllControl == true) {
                    this.selected = [];
                } else {
                    this.selected = selectList.map(a => a.id);
                }
            },
            checkSelectAll() {
                setTimeout(this.checked,10);
            },
            checked() {
                let selectList = this.contacts.slice((this.currentPage-1)*100, this.currentPage*100);
                if (this.selected.length != selectList.length) {
                    this.selectAllControl = false;
                } else {
                    this.selectAllControl = true;
                }
            },
            changePage(int) {
                setTimeout(this.selectAllControl = false, 10);
                this.currentPage = int;
                this.selected = []
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
        }
    }
</script>

<style scoped>

</style>
