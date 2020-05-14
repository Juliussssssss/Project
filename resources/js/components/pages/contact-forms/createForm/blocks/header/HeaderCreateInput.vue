<template>
    <div class="d-flex font-12px text-center justify-content-between w-100 ml-3">
        <div class="position-relative">
            <input
                v-validate="'required|alpha_spaces|max:255'"
                :class="{'error':errors.has('first_name')}"
                class="form-control input"
                name="first_name"
                type="text"
                placeholder="Добавить Фамилию"
                @change="fieldChange('first_name',first_name)"
                v-model="first_name"
            >
            <div v-if="errors.has('first_name')" class="err-message-head position-absolute">{{errors.first('first_name')}}</div>
        </div>
        <div class="position-relative">
            <input
                v-validate="'required|alpha_spaces|max:255'"
                :class="{'error':errors.has('middle_name')}"
                class="form-control input"
                name = "middle_name"
                type="text"
                placeholder="Добавить Имя"
                @change="fieldChange('middle_name',middle_name)"
                v-model="middle_name"
            >
            <div v-if="errors.has('middle_name')" class="err-message-head position-absolute">{{errors.first('middle_name')}}</div>
        </div>
        <div class="position-relative">
            <input
                v-validate="'alpha_spaces|max:255'"
                :class="{'error':errors.has('last_name')}"
                class="form-control input"
                name="last_name"
                type="text"
                placeholder="Добавить Отчество"
                @change="fieldChange('last_name',last_name)"
                v-model="last_name"
            >
            <div v-if="errors.has('last_name')" class="err-message-head position-absolute">{{errors.first('last_name')}}</div>
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
    .input {
        max-width: 180px;
        padding: 20px;
    }
    .err-message-head {
        color:#ff4418;
        background: #fff;
        top: -9px;
        right: 11px;
        padding: 0 2px;
    }
    .error {
        border:1px solid #ff4418;
    }
</style>
