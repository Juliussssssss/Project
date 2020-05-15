<template>
    <div>
        <div class="wrapper">
            <nav id="sidebar" :class="sidebarOpen ? 'sidebar-open' : ''">
                <div class="navbar-brand">
                    <img src="/storage/navbar_logo.png"  alt="navbar_logo">
                </div>
                <div @click="sidebarOpen = !sidebarOpen" ><div class="toggle_sidebar" :class="sidebarOpen ? 'toggled' : ''"></div></div>
                <ul id="side_menu" class="list-unstyled components">
                    <li>
                        <router-link to="/" exact >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_home.svg"></object>
                            <span>Главная страница</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/disk" >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_cloud_download.svg"></object>
                            <span>Диск</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/mail" >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_email.svg"></object>
                            <span>Почта</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/calendar" >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_today.svg"></object>
                            <span>Календарь</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/photos" >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_camera_alt.svg"></object>
                            <span>Фотографии</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/contacts" >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_people.svg"></object>
                            <span>Контакты</span>
                        </router-link>
                    </li>
                    <li class="second_level-wrapper">
                        <a @click="openSecondLevel($event)" class="second_level-toggle" >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_business_center.svg"></object>
                            <span @click.>Управление</span>
                        </a>
                        <router-link to="/dashboard/" exact >
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_location_city.svg"></object>
                            <span>Отделы</span>
                        </router-link>
                        <router-link to="/dashboard/users" exact>
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_people.svg"></object>
                            <span>Пользователи</span>
                        </router-link>
                    </li>

                </ul>
            </nav>
            <div class="main_content">
                <nav class="navbar navbar-light">
                    <div class="user_block">
                        <div class="user_menu-wrapper"
                             v-click-outside="closeMenu"
                             :class="userMenuOpen ? 'user_menu-opened' : ''">
                            <div></div>
                            <ul  class="user_menu">
                                <li>
                                    <a href="#">Мой профиль</a>
                                </li>
                                <li>
                                    <a href="#">Настройки безопасности</a>
                                </li>
                                <li>
                                    <a href="/logout" @click="logout">Выход из системы</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#">
                            {{ name }}
                            <img :src="'/storage/avatars/' + avatar">
                            <a href="#">
                                <div @click.stop="userMenuOpen = !userMenuOpen" class="toggle_user-menu"></div>

                    </div>
                </nav>
                <main>
                    <router-view></router-view>
                </main>
            </div>
        </div>
        <div class="footer_wrapper">
            <footer class="container">
                <ul class="row">
                    <li class="col-lg-4 col-md-6 col-sm-12 pl-sm-3">
                        <ul>
                            <li>
                                <img src="/storage/navbar_logo.png"  alt="navbar_logo">
                            </li>
                            <li>Все права защищены</li>
                            <li>© OOO «IT 2.0»</li>
                        </ul>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-12 pl-sm-3">
                        <h4 class="text">Инструменты</h4>
                        <ul>
                            <li><router-link to="/disk">Диск</router-link></li>
                            <li><router-link to="/calendar">Календарь</router-link></li>
                            <li><router-link to="/contacts">Контакты</router-link></li>
                            <li><router-link to="/mail">Почта</router-link></li>
                            <li><router-link to="/photos">Фото</router-link></li>
                        </ul>
                    </li>
                    <li class="col-lg-4 offset-md-6 offset-sm-0 offset-lg-0 col-md-6 col-sm-12 pl-sm-3">
                        <h4 class="text">Контакты</h4>
                        <ul>
                            <li>+38095 900 38 00 </li>
                            <li>mail@aiti20.com</li>
                        </ul>

                        <ul class="social_block">
                            <li>
                                <a href="google.com">
                                    <object type="image/svg+xml" data="/storage/social_ic/ic_facebook.svg"></object>
                                </a>
                            </li>
                            <li>
                                <a href="google.com">
                                    <object type="image/svg+xml" data="/storage/social_ic/ic_twitter.svg"></object>
                                </a>
                            </li>
                            <li>
                                <a href="google.com">
                                    <object type="image/svg+xml" data="/storage/social_ic/ic_instagram.svg"></object>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </footer>
        </div>
    </div>
</template>

<script >
    export default {
        data: function () {
            return {
                name : 'Анна Кононенко',
                avatar : 'test_avatar.png',
                userMenuOpen : false,
                sidebarOpen : false,
            }
        },
        // created() {
        //     let self = this;
        //     axios.get('/api/user')
        //         .then( function (response) {
        //             self.name = response.data.name + ' ' + response.data.surname;
        //             self.avatar = response.data.avatar
        //         })
        //         .catch(function (error) {
        //             if(error.response.status)
        //                 self.$router.push({name : 'authorization'});
        //         })
        // },
        methods: {
            // logout() {
            //     axios.post('/logout')
            //         .then(function (response) {
            //             location.href = response.data;
            //         })
            // },
            // closeMenu() {
            //     this.userMenuOpen = false;
            // },
            // openSecondLevel(event) {
            //     event.target.parentNode.classList.toggle('second_level-open');
            //     event.target.classList.toggle('second_level-toggled');
            // }
        }
    }
</script>

<style scoped>
    nav {
        background-color: #fff;
    }

    #sidebar {
        top: 0;
        left: 0;
        height: 100vh;
        max-height: 100%;
        z-index: 999;
        background: #fff;
        color: #fff;
        transition: all 0.3s;
        box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.05);
        border-radius: 6px;
        max-width: 160px;
        width: 100%;
        flex-grow: 5;
    }
    .sidebar-open {
        max-width: 255px!important;
    }
    #side_menu a, .second_level-toggle {
        display: flex;
        align-items: center;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        text-decoration: none;
        color: #999999;
        height: 100%;
    }
    #side_menu a span,
    .second_level-toggle a span{
        width: 150px;
        text-align: center;
        z-index: -3;
    }
    .sidebar-open a span,
    .sidebar-open .second_level-toggle a span
    {
        text-align: left!important;
        margin-left: 22px;
    }
    .sidebar-open li {
        border-bottom: 2px solid #F5F5F5;
    }
    #side_menu .router-link-active {
        color: #666666;
    }
    #side_menu .router-link-active object {
        filter: brightness(0) saturate(100%) invert(35%) sepia(60%) saturate(3842%) hue-rotate(203deg) brightness(97%) contrast(94%);
    }
    #side_menu object{
        margin-top: 12px;
        margin-bottom: 7px;
        z-index: -1;
    }
    #side_menu li{
        height: 60px;
    }
    #side_menu li{
        margin-bottom: 14px;
        transition: margin-bottom .3s;
    }
    .sidebar-open li{
        min-height: 0px!important;
        margin-bottom: 0px!important;
    }
    #side_menu .router-link-active {
        border-left: 3px solid #1875F0;
    }
    .wrapper {
        display: flex;
        flex-wrap: nowrap;
        position: relative;
    }
    .main_content {
        flex-grow: 1;
        max-width: 100%;
    }
    #sidebar .navbar-brand {
        padding: 19px 0;
        margin-right: 0;
        width: 100%;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.05);
        position: relative;
    }
    #sidebar .navbar-brand img {
        max-width: 160px;
    }

    #sidebar .toggle_sidebar {
        cursor: pointer;
        display: block;
        position: absolute;
        width: 10px;
        height: 10px;
        top: 40px;
        transform: translate(50%) rotate(-45deg);
        left: 214px;
        border-right: 2px solid #D8D8D8;;
        border-bottom: 2px solid #D8D8D8;;
        padding: 4px;
        transition: transform .3s ;
    }

    .user_block {
        position: relative;
        margin-left: auto;
        display: flex;
        align-items: center;
    }
    .user_block > a{
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 75px;
        text-align: right;
        color: #999999;
        position: relative;

    }
    .user_block img{
        margin-left: 20px;
    }
    .user_menu-wrapper {
        max-height: 0px;
        overflow: hidden;
        transition: max-height .7s ease-in-out;
        position: absolute;
        left: -20%;
        transform: translateY(100%);
        bottom: -8px;
        z-index: 9;
    }
    .user_menu {
        background: #fff;
        border-radius: 6px;
        list-style: none;
        padding: 0;
    }
    .user_menu li {
        border-bottom: 2px solid #F5F5F5;
        justify-content: center;
        height:60px;
        display:flex;
        align-items: center;
        width: 100%;
        padding: 0 50px;
    }
    .user_menu li:last-child {
        border-bottom: none;
    }

    .user_block a:hover {
        color: #1875F0;
        text-decoration: none;
    }
    .user_menu a {
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        text-align: center;
        color: #808080;
    }
    .user_menu .router-link-active {
        color: #1875F0;
    }
    .user_menu-wrapper > div {
        display: block;
        position: relative;
        width: 0;
        height: 0;
        margin-left: auto;
        right: 30px;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 9px solid #fff;
    }
    .toggle_user-menu {
        width: 26px;
        height: 26px;
        margin-left: 7px;
        position: relative;
        cursor: pointer;
    }
    .toggle_user-menu:after {
        content: '';
        display: block;
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        top: 50%;
        transform: translate(50%,-50%) rotate(45deg);
        right: 50%;
        border-right: 2px solid #D8D8D8;;
        border-bottom: 2px solid #D8D8D8;;
        padding: 4px;
    }
    .user_menu-opened {
        max-height: 251px;
    }
    .toggled {
        transform: rotate(-220deg)!important;
    }
    footer {
        background: #fff;
        width: 100%;
        display: flex;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 30px;
        color: #B3B3B3;

    }
    footer ul {
        list-style: none;
        width:100%;
        padding: 0;
    }
    body * {
        font-family: 'Roboto', sans-serif;
    }
    footer h4 {
        color: #666666;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 30px;
        padding-bottom: 29px;
    }
    footer ul li:not(:first-of-type) ul:not(.social_block) {
        columns: 2;
        -webkit-columns: 2;
        -moz-columns: 2;
    }
    .social_block {
        display: flex;
    }
    .social_block a {
        display: block;
        margin-right: 19px;
    }
    .social_block object{
        z-index: -1000;
    }
    footer li{
        margin-bottom: 20px;
    }
    footer a{
        text-decoration: none;
        color: inherit;
    }
    footer a:hover{
        text-decoration: none;
        color: #1875F0;
    }
    .social_block li:hover object{
        filter: brightness(0) saturate(100%) invert(35%) sepia(60%) saturate(3842%) hue-rotate(203deg) brightness(97%) contrast(94%);
    }
    #side_menu li:not(.second_level-wrapper):hover a:not(.router-link-active) object {
        filter: brightness(0) saturate(100%) invert(35%) sepia(60%) saturate(3842%) hue-rotate(203deg) brightness(97%) contrast(94%);
        opacity: .6;
    }
    .footer_wrapper {
        width: 100%;
        background: #fff;
        padding-top: 48px;
    }
    .second_level-wrapper {
        max-height: 68px;
        margin-bottom: 0!important;
        overflow: hidden;
        transition: all .3s!important;
        height: fit-content!important;
    }
    .second_level-wrapper a {
        cursor: pointer;
        max-height: 60px;
        margin-bottom: 14px;
    }

    .second_level-open {
        max-height: 250px;
    }
    .second_level-toggled object{
        filter: brightness(0) saturate(100%) invert(61%) sepia(26%) saturate(0%) hue-rotate(228deg) brightness(94%) contrast(93%);
    }
    #side_menu .second_level-wrapper:hover > a:first-of-type:not(.second_level-toggled) object {
        filter: brightness(0) saturate(100%) invert(61%) sepia(26%) saturate(0%) hue-rotate(228deg) brightness(94%) contrast(93%);
        opacity: .6;
    }
    #side_menu .second_level-wrapper a:not(:first-of-type):not(.router-link-active):hover object {
        filter: brightness(0) saturate(100%) invert(35%) sepia(60%) saturate(3842%) hue-rotate(203deg) brightness(97%) contrast(94%);
        opacity: .6;
    }
    .sidebar-open .second_level-wrapper {
        max-height: 60px;
    }
    .sidebar-open .second_level-wrapper a {
        margin-bottom: 0px;
        min-height: 60px;
    }
    .sidebar-open .second_level-open {
        max-height: 180px;
    }
</style>
