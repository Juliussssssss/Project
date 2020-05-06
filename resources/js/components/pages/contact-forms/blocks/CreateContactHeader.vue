<template>
    <div class="col-12 customBorderBottom py-3 d-flex align-items-center p-relative">
        <avatar-load></avatar-load>
        <div class="d-flex font-12px text-center justify-content-betw">
            <div class="p-relative">
                <input
                    class="mx-4 form-control input error"
                    name="first_name"
                    type="text"
                    placeholder="Добавить Фамилию"
                >
                <div class="err-message">Обязательное поле</div>
            </div>
            <div class="p-relative">
                <input
                    class="form-control input"
                    name = "middle_name"
                    type="text"
                    placeholder="Добавить Имя"
                >
            </div>
            <div class="p-relative">
                <input
                    class="ml-4 form-control input"
                    name="last_name"
                    type="text"
                    placeholder="Добавить Отчество"
                >
            </div>
        </div>


    </div>
</template>

<script>
    Vue.component('avatar-load', require('../blocks/AvatarLoad').default);
    export default {
        name: "CreateContactHeader"
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
    .error {
        border:1px solid #ff4418;
    }
    .err-message {
        position:absolute;
        color:#ff4418;
        background: #fff;
        top: 29px;
        right: 497px;
        padding: 0 2px;
    }
</style>
