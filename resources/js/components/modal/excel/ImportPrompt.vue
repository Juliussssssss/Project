<template>
    <div class="prompt-container position-relative">
        <div>Чтобы импортировать контакт, выберите файл с расширением .xls,.xlsx</div>
        <div>Файл состоит из 13 столбцов: фамилия*, имя*, отчество, email*, телефон,сайт ,дата рождения, город, место работы, должность, email
            рабочий, группа, комментарий
        </div>
        <div>Размер файла не должен превышать 100КБ
        </div>
    </div>
</template>

<script>
    export default {
        name: "ImportPrompt"
    }
</script>

<style scoped>
    .prompt-container {
        padding: 5px 15px;
        max-width: 500px;
        font-size: 11px;
        line-height: 30px;
        font-weight: 500;
        color:#999;
        background-color: #fff;
        border: 1px solid #DADADA;
        border-radius: 6px;
    }
    .prompt-container::before {
        left: 210px;
        top: -23px;
        position: absolute;
        content: '';
        border: 10px solid transparent;
        border-bottom: 11px solid #fff;
    }
</style>
