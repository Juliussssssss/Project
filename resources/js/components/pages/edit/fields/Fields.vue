<template>
    <div class="col-12 textGrey font-12px pl-4">
        <div class="form-group pt-3">
            <label class="pl-1 pb-2 textActive" for="Email">Email:</label>
            <input type="text" class="form-control" id="Email" placeholder="Добавить Email">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="Phone">Телефон:</label>
            <input type="text" class="form-control" id="Phone" placeholder="123 (456) 789 12 34">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="website">Сайт:</label>
            <input type="text" class="form-control" id="website" placeholder="Добавить сайт">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="hbDate">Дата рождения:</label>
            <input type="text" class="form-control" id="hbDate" placeholder="Добавить дату">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="city">Город:</label>
            <input type="text" class="form-control" id="city" placeholder="Добавить город">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="job">Город:</label>
            <input type="text" class="form-control" id="job" placeholder="Добавить место работы">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="position">Должность:</label>
            <input type="text" class="form-control" id="position" placeholder="Добавить должность">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="workEmail">Email рабочий:</label>
            <input type="text" class="form-control" id="workEmail" placeholder="Добавить Email">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="group">Грппа:</label>
            <input type="text" class="form-control" id="group" placeholder="Добавить группу">
        </div>
        <div class="form-group">
            <label class="pl-1 pb-2 textActive" for="comment">Комментарий:</label>
            <input type="text" class="form-control" id="comment" placeholder="Добавить комментарий">
        </div>
        <div class="form-group d-flex justify-content-end mr-4">
            <a class="py-3 btn-primary btn text-uppercase font-12px btnText text-white mr-3">Сохранить</a>
            <a class="py-3 btn-light btn text-uppercase font-12px btnText">Отмена</a>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Fields"
    }
</script>

<style>

</style>
