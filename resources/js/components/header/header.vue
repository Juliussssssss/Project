<template>
    <div>
        <nav class="navbar navbar-light bg-light header">
            <a class="navbar-brand" href="#">
                <img src="storage/logos/logo.svg" width="85" height="37.25" alt="IT2.0">
            </a>
            <div class="nav-item dropdown">
                <div class="nav-link dropdown-toggle user-profile-dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex justify-content-between">
                        <span class="user-fullname">Иван Иванов</span>
                        <div>
                            <img src="storage/logos/avatar.png" width="40" height="41.38" alt="avatar">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="11" width="12" height="8">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.41 11L15 15.58L19.59 11L21 12.41L15 18.41L9 12.41L10.41 11Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <rect x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                                </g>
                            </svg>
                        </div>
                    </div>

                </div>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "header"
    }
</script>

<style scoped>
    .header {
        height: 90px;
        background: #FFFFFF;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.05);
        border-radius: 6px;
    }

    .header .navbar-brand {
        margin-left: 35px;
    }

    .header .dropdown-toggle::after {
        border: none;
        content: none;
    }

    .user-profile-dropdown {
        width: 197px;
        padding: 0;
        line-height: 41px;
        margin-right: 8px;
    }

    .user-fullname {
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        color: #999999;

    }
</style>
