<template>
    <div class="col-4 py-4 align-items-center d-flex customBorderRight justify-content-center">
        <div class="fixPanel">
            <input @keyup="search" id="search" v-model="searchedWord" class="search textActive" type="text" placeholder="Поиск">
            <span>
                 <img @click="clearSearch" class="margingY actionButtons" :src="searchedWord.length > 0 ? 'storage/logos/deleteSearch.svg' : 'storage/logos/search.svg'" alt="avatar">
            </span>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    export default {
        name: "Search",
        data() {
            return {
                searchedWord: '',
            }
        },
        computed: {
            ...mapGetters([
                "getContactsFromDb",
            ])
        },
        methods: {
            ...mapActions([
                "searchWord",
                "searchResult",
            ]),
            clearSearch() {
                if (this.searchedWord.length > 0) {
                    this.searchedWord = '';
                    this.search()
                } else {
                    document.getElementById("search").focus();
                }
            },
            search() {
                let arrByID = this.getContactsFromDb.filter(this.filterSearch);
                this.searchResult(arrByID);
                this.searchWord(this.searchedWord);
            },
            filterSearch(item) {
                let searchInFirstName = (item.first_name != null) && (item.first_name.toLowerCase().indexOf(this.searchedWord.toLowerCase()) > -1);
                let searchInMiddleName = (item.middle_name != null) && (item.middle_name.toLowerCase().indexOf(this.searchedWord.toLowerCase()) > -1);
                let searchInLastName = (item.last_name != null) && (item.last_name.toLowerCase().indexOf(this.searchedWord.toLowerCase()) > -1);
                let searchInNumber =  (item.number != null) && (item.number.toLowerCase().indexOf(this.searchedWord.toLowerCase()) > -1);
                let searchInEmail =  (item.email != null) && (item.email.toLowerCase().indexOf(this.searchedWord.toLowerCase()) > -1);

                if (searchInFirstName || searchInMiddleName || searchInLastName || searchInNumber || searchInEmail) {

                    return true;
                }

                return false;
            },
        }
    }
</script>

<style>
    .search {
        border: 0px;
        outline: 0 none;
    }
</style>
