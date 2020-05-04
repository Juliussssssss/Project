<template>
    <div>
        <div class="body pageBackground">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 bg-white">
                        <div class="row">
                            <div class="col-3 customBorderRight customBorderTop customBorderLeft p-0">
                                <left-nav></left-nav>
                            </div>
                            <div class="col-9 customBorderBottom customBorderRight customBorderTop">
                                <div class="row">
                                    <router-view></router-view>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>
    .body {
        font-family: 'Roboto';
        font-style: normal;
    }
    .font-12px {
        font-size: 12px;
    }
    .font-13px {
        font-size: 13px;
    }
    .addContact {
        font-weight: bold;
    }
    .pageBackground {
        background: #FAFAFA;
    }
    .actionButtons:hover {
        fill: #666666;
    }
    .search {
        border: 0px;
    }
    .textGrey {
        color: #999999;
    }
    ::placeholder {
        color: #cccccc;
        font-weight: normal;
    }
    .textActive {
        color: #666666;
    }
    .customBorderRight {
        border-right: solid 2px;
        border-color: #F5F5F5;
    }
    .fixPanel {
        margin: 2.8px 0px 2.8px 0px;
    }
    .activeBorder {
        border-left: solid 2px;
        border-color: #1875F0;
    }
    .customBorderTop {
        border-top: solid 2px;
        border-color: #F5F5F5;
    }
    .customBorderBottom {
        border-bottom: solid 2px;
        border-color: #F5F5F5;
    }
    .customBorderLeft {
        border-left: solid 2px;
        border-color: #F5F5F5;
    }
    .margingY {
        margin-top: -4px;
        margin-bottom: -4px;
        top: 3px
    }
    .contactPhoto {
        height: 40px;
        width: 40px;
        border-radius: 100px;
        margin-top: -10px;
        margin-bottom: -10px;
        object-fit: cover;
    }
    /*custom checkbox*/
    input[type="checkbox"] {
        display: none;
    }
    .customLabel::before {
        content: '';
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
        background-color: #FFFFFF;
        border: 2px solid #E6E6E6;
        box-sizing: border-box;
        border-radius: 4px;
        vertical-align: middle;
    }

    @font-face {
        font-family: "Roboto";
        src: url("fonts/Roboto-Medium.ttf") format("truetype");
        font-style: normal;
        font-weight: normal;
    }
    @font-face {
        font-family: "Roboto";
        src: url("fonts/Roboto-bold.ttf") format("truetype");
        font-style: normal;
        font-weight: bold;
    }
    .topmenu > div:after {
        content: "";
        position: absolute;
    }
    .submenu {
        position: absolute;
        left: 300px;
        top: 0px;
        width: 300px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        background: #fff;
        border-radius: 6px;
        z-index: 5;
        visibility: hidden;
        opacity: 0;
        transform: scale(.8);
        transition: .4s ease-in-out;
    }
    .submenu div {
        border-radius: 6px;
    }
    .topmenu > div:hover .submenu {
        visibility: visible;
        opacity: 1;
        transform: scale(1);
    }
</style>

