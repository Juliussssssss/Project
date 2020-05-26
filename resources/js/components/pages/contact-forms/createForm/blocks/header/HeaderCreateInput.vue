<template>
    <div class="row justify-content-between">
        <div class="col-xl-4">
            <div class="position-relative">
                <input
                    v-validate="'required|alpha|max:255'"
                    :class="{'error':errors.has('first_name')}"
                    class="form-control font-16px py-3 mt-3 mt-xl-0"
                    name="first_name"
                    type="text"
                    placeholder="Фамилия"
                    @change="fieldChange('first_name',first_name)"
                    v-model="first_name"
                >
                <div v-if="errors.has('first_name')" class="err-message-head position-absolute">{{errors.first('first_name')}}</div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="position-relative">
                <input
                    v-validate="'required|alpha|max:255'"
                    :class="{'error':errors.has('middle_name')}"
                    class="form-control font-16px py-3 mt-3 mt-xl-0"
                    name = "middle_name"
                    type="text"
                    placeholder="Имя"
                    @change="fieldChange('middle_name',middle_name)"
                    v-model="middle_name"
                >
                <div v-if="errors.has('middle_name')" class="err-message-head position-absolute">{{errors.first('middle_name')}}</div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="position-relative">
                <input
                    v-validate="'alpha|max:255'"
                    :class="{'error':errors.has('last_name')}"
                    class="form-control font-16px py-3 mt-3 mt-xl-0"
                    name="last_name"
                    type="text"
                    placeholder="Отчество"
                    @change="fieldChange('last_name',last_name)"
                    v-model="last_name"
                >
                <div v-if="errors.has('last_name')" class="err-message-head position-absolute">{{errors.first('last_name')}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HeaderInput",
        data(){
            return {
                first_name:'',
                middle_name:'',
                last_name:''
            }
        },
        methods:{
            validation(){
                this.$validator.validateAll().then((result) => {
                    this.$store.commit('setHeaderValidation',result);
                })
            },
            fieldChange(fieldName,fieldValue)
            {
                if(fieldValue){
                    this.$store.commit('changeForm',{fieldName:fieldName,value:true});
                }
                else {
                    this.$store.commit('changeForm',{fieldName:fieldName,value:false});
                }
            }
        }
    }
</script>

<style scoped>
    .err-message-head {
        color:#ff4418;
        background: #fff;
        top: -9px;
        right: 11px;
        padding: 0 2px;
        font-size: 12px;
    }
    .error {
        border:1px solid #ff4418;
    }
</style>
