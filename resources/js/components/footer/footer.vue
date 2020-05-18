<template>
    <div>
        <div class="wrapper">
            <nav id="sidebar" :class="sidebarOpen ? 'sidebar-open' : ''">
                <div class="navbar-brand">
                    <img src="/storage/navbar_logo.png"  alt="navbar_logo">
                </div>
                <div @click="sidebarOpen = !sidebarOpen"><div class="toggle_sidebar" :class="sidebarOpen ? 'toggled' : ''"></div></div>
                <ul id="side_menu" class="list-unstyled components">
                    <li>
                        <router-link to="/home" exact>
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_home.svg"></object>
                            <span>Главная страница</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/disk">
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_cloud_download.svg"></object>
                            <span>Диск</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/mail">
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_email.svg"></object>
                            <span>Почта</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/calendar">
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_today.svg"></object>
                            <span>Календарь</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/photos">
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_camera_alt.svg"></object>
                            <span>Фотографии</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/">
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_people.svg"></object>
                            <span>Контакты</span>
                        </router-link>
                    </li>
                    <li class="second_level-wrapper">
                        <router-link to="/control">
                            <object type="image/svg+xml" data="/storage/sidebar_icons/ic_business_center.svg"></object>
                            <span @click.>Управление</span>
                        </router-link>
                    </li>
                </ul>
            </nav>
            <div class="main_content">
                <nav class="navbar navbar-light">
                    <div @click="sidebarOpen = !sidebarOpen" id="sidebar-phone_toggle" :class="sidebarOpen ? 'open' : ''">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="user_block">
                        <div class="user_menu-wrapper"
                             :class="userMenuOpen ? 'user_menu-opened' : ''">
                            <div></div>
                            <ul  class="user_menu">
                                <li>
                                    <router-link to="/user/profile/" exact>Мой профиль</router-link>
                                </li>
                                <li>
                                    <router-link to="/user/profile/security/settings" exact>Настройки безопасности</router-link>
                                </li>
                                <li>
                                    <a href="/logout" @click="logout">Выход из системы</a>
                                </li>
                            </ul>
                        </div>
                        <router-link to="/user/profile">
                            {{ name }}
                            <img src="/storage/avatars/avatar.png">
                        </router-link>
                        <div @click.stop="userMenuOpen = !userMenuOpen" class="toggle_user-menu"></div>
                    </div>
                </nav>
                <main>
<!--                    <router-view></router-view>-->
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

