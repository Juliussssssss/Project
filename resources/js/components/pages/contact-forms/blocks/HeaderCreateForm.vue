<template>
    <div class="col-12 customBorderBottom py-3 d-flex align-items-center p-relative mb-3">
        <avatar-load :blocked = "blocked"></avatar-load>
        <div class="d-flex font-12px text-center justify-content-between w-100 ml-3">
            <div class="position-relative">
                <input
                    v-validate="'required|alpha|max:255'"
                    :class="{'error':errors.has('first_name')}"
                    class="form-control input"
                    name="first_name"
                    type="text"
                    placeholder="Добавить Фамилию"
                    :disabled="blocked"
                >
                <div v-if="errors.has('first_name')" class="err-message-head position-absolute">{{errors.first('first_name')}}</div>
            </div>
            <div class="position-relative">
                <input
                    v-validate="'required|alpha|max:255'"
                    :class="{'error':errors.has('middle_name')}"
                    class="form-control input"
                    name = "middle_name"
                    type="text"
                    placeholder="Добавить Имя"
                    :disabled="blocked"
                >
                <div v-if="errors.has('middle_name')" class="err-message-head position-absolute">{{errors.first('middle_name')}}</div>
            </div>
            <div class="position-relative">
                <input
                    v-validate="'alpha|max:255'"
                    :class="{'error':errors.has('last_name')}"
                    class="form-control input"
                    name="last_name"
                    type="text"
                    placeholder="Добавить Отчество"
                    :disabled="blocked"
                >
                <div v-if="errors.has('last_name')" class="err-message-head position-absolute">{{errors.first('last_name')}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import AvatarLoad from '../blocks/AvatarLoad';
    export default {
        name: "HeaderCreateForm",
        props:['blocked'],
        components: {
            AvatarLoad
        },
        methods:{
            validation(){
                this.$validator.validateAll().then((result) => {
                    this.$store.commit('setHeaderValidation',result);
                })
            }
        }
    }
</script>

<style scoped>
    .input {
        max-width: 180px;
        padding: 20px;
    }
    .customBorderBottom::after,.customBorderBottom::before {
        content: '';
        top: 118px;
        width: 15px;
        height: 2px;
        position: absolute;
        background-color: #F5F5F5;
    }
    .customBorderBottom::before {
        left: -15px;
    }
    .customBorderBottom::after {
        right: -15px;
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
