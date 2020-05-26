<template>
    <div class="d-flex font-12px text-center font-16px align-items-center w-100">
        <div class="container">
            <div class="row">
                <div class="push-lg-12 col-xl-6 d-flex flex-last align-items-center">
                    <span class="name">{{contact.first_name+' '+contact.middle_name+' '+contact.last_name}}</span>
                </div>
                <div class="pull-lg-12 col-xl-6 flex-first">
                    <div class = "d-flex justify-content-start justify-content-xl-end w-100">
                        <span @click="setFavorites()" class="mr-2 tools contactShowSvg align-items-center d-flex justify-content-center">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask11" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="5" width="20" height="19">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          :d="contact.favorites == 0 ? 'M25 12.24L17.81 11.62L15 5L12.19 11.63L5 12.24L10.46 16.97L8.82 24L15 20.27L21.18 24L19.55 16.97L25 12.24ZM15 18.4L11.24 20.67L12.24 16.39L8.92 13.51L13.3 13.13L15 9.1L16.71 13.14L21.09 13.52L17.77 16.4L18.77 20.68L15 18.4Z'
                                                                     : 'M15 20.27L21.18 24L19.54 16.97L25 12.24L17.81 11.63L15 5L12.19 11.63L5 12.24L10.46 16.97L8.82 24L15 20.27Z'"
                                          fill="white"/>
                                </mask>
                                <g mask="url(#mask11)">
                                   <rect x="2" y="2" width="26" height="26"
                                         :fill="contact.favorites == 0 ? '#D8D8D8' : '#FEF40A'"/>
                                </g>
                            </svg>
                        </span>
                        <span @click="editContact" class="mx-2 tools">
                            <svg class="edit" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                                <mask id="Update" mask-type="alpha" maskUnits="userSpaceOnUse" x="21" y="21" width="19" height="19">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 35.2525V39.0025H24.75L35.81 27.9425L32.06 24.1925L21 35.2525ZM38.71 25.0425C39.1 24.6525 39.1 24.0225 38.71 23.6325L36.37 21.2925C35.98 20.9025 35.35 20.9025 34.96 21.2925L33.13 23.1225L36.88 26.8725L38.71 25.0425Z" fill="white"/>
                                </mask>
                                <g mask="url(#Update)">
                                  <rect x="17" y="17" width="26" height="26"/>
                                </g>
                            </svg>
                        </span>
                        <span data-toggle="modal" data-target="#confirmDeleteContact" class="mx-2 tools">
                            <svg class="delete" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                                <mask id="del" mask-type="alpha" maskUnits="userSpaceOnUse" x="23" y="21" width="14" height="18">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 37C24 38.1 24.9 39 26 39H34C35.1 39 36 38.1 36 37V25H24V37ZM37 22H33.5L32.5 21H27.5L26.5 22H23V24H37V22Z" fill="white"/>
                                </mask>
                                <g mask="url(#del)">
                                    <rect x="17" y="17" width="26" height="26"/>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <confirm-delete-contact @deleteContact="deleteContact"></confirm-delete-contact>
    </div>
</template>

<script>
    import ConfirmDeleteContact from '../../../../../modal/confirm-delete/ConfirmDeleteContact'
export default {
    name: "HeaderShowTools",
    props: ['id','contact'],
    components:{
        ConfirmDeleteContact
    },
    methods:{
        setFavorites() {

            this.$store.dispatch('updateFavorites',{id:this.contact.id,int:this.contact.favorites})
            this.$store.dispatch('getContact',this.contact.id);
        },
        editContact()
        {
            this.$router.push({ name: 'ContactEdit', params: {user_id: this.contact.id}});
        },
        deleteContact()
        {
            this.$store.dispatch('deleteContacts',[this.contact.id]);
            setTimeout(()=>{
                this.redirect()
            },100);
        },
        redirect(){
            this.$router.push('/contacts');
        }
    }
}
</script>

<style scoped>

.name {
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    color: #666666;
}
.tools {
    cursor: pointer;
    width: 60px;
    height:60px;
}
.tools:hover{
    opacity: 0.9;
}
.favorites,.edit,.delete {
    fill: #D8D8D8;
}
.contactShowSvg {
    height: 60px;
    width: 60px;
    border-radius: 100px;
    border: solid 2px #F5F5F5;
}
</style>
