<template>
    <div class="col-4 py-4 align-items-center d-flex customBorderRight justify-content-center">
        <div>
            <input @keyup="search" v-model="searchWord" class="search" type="text" placeholder="Поиск">
            <span>
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask9" mask-type="alpha" maskUnits="userSpaceOnUse" x="6" y="6"
                          width="18" height="18">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M18.5 17H17.71L17.43 16.73C18.41 15.59 19 14.11 19 12.5C19 8.91 16.09 6 12.5 6C8.91 6 6 8.91 6 12.5C6 16.09 8.91 19 12.5 19C14.11 19 15.59 18.41 16.73 17.43L17 17.71V18.5L22 23.49L23.49 22L18.5 17ZM12.5 17C10.01 17 8 14.99 8 12.5C8 10.01 10.01 8 12.5 8C14.99 8 17 10.01 17 12.5C17 14.99 14.99 17 12.5 17Z"
                              fill="white"/>
                    </mask>
                    <g mask="url(#mask9)">
                         <rect x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Search",
        props: ["contacts"],
        data() {
            return {
                searchResult: [],
                searchWord: '',
                originalContacts: [],
            }
        },
        methods: {
            search() {
                let arrByID = this.contacts.filter(this.filterSearch);
                this.$emit("searchResult", arrByID);
                this.$emit("searchWord", this.searchWord.toLowerCase());
            },
            filterSearch(item) {
                let searchInFirstName = item.first_name.toLowerCase().indexOf(this.searchWord.toLowerCase()) > -1;
                let searchInMiddleName = item.middle_name.toLowerCase().indexOf(this.searchWord.toLowerCase()) > -1;
                let searchInLastName = item.last_name.toLowerCase().indexOf(this.searchWord.toLowerCase()) > -1;
                let searchInNumber =  item.number.toLowerCase().indexOf(this.searchWord.toLowerCase()) > -1;
                let searchInEmail =  item.email.toLowerCase().indexOf(this.searchWord.toLowerCase()) > -1;

                if (searchInFirstName || searchInMiddleName || searchInLastName || searchInNumber || searchInEmail) {

                    return true;
                }

                return false;
            },
        }
    }
</script>

<style>
</style>
