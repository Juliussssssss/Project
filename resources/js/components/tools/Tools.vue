<template>
    <div class="row fixPanel">
        <div class="col-4 py-4 align-items-center d-flex customBorderRight pl-4">
            <div class="w-100 d-flex justify-content-between">
                <svg id="edit" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="6" y="6" width="19" height="19">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 20.2525V24.0025H9.75L20.81 12.9425L17.06 9.1925L6 20.2525ZM23.71 10.0425C24.1 9.6525 24.1 9.0225 23.71 8.6325L21.37 6.2925C20.98 5.9025 20.35 5.9025 19.96 6.2925L18.13 8.1225L21.88 11.8725L23.71 10.0425Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask0)">
                        <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
                <svg id="groups" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="4" y="8" width="22" height="14">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19 14C20.66 14 21.99 12.66 21.99 11C21.99 9.34 20.66 8 19 8C17.34 8 16 9.34 16 11C16 12.66 17.34 14 19 14ZM11 14C12.66 14 13.99 12.66 13.99 11C13.99 9.34 12.66 8 11 8C9.34 8 8 9.34 8 11C8 12.66 9.34 14 11 14ZM11 16C8.67 16 4 17.17 4 19.5V22H18V19.5C18 17.17 13.33 16 11 16ZM19 16C18.71 16 18.38 16.02 18.03 16.05C19.19 16.89 20 18.02 20 19.5V22H26V19.5C26 17.17 21.33 16 19 16Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask1)">
                        <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
                <svg id="import" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask3" mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="7" width="24" height="16">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.35 13.04C21.67 9.59 18.64 7 15 7C12.11 7 9.6 8.64 8.35 11.04C5.34 11.36 3 13.91 3 17C3 20.31 5.69 23 9 23H22C24.76 23 27 20.76 27 18C27 15.36 24.95 13.22 22.35 13.04ZM17 16V20H13V16H10L15 11L20 16H17Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask3)">
                        <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
                <svg id="export" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask4" mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="7" width="24" height="16">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.35 13.04C21.67 9.59 18.64 7 15 7C12.11 7 9.6 8.64 8.35 11.04C5.34 11.36 3 13.91 3 17C3 20.31 5.69 23 9 23H22C24.76 23 27 20.76 27 18C27 15.36 24.95 13.22 22.35 13.04ZM20 16L15 21L10 16H13V12H17V16H20Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask4)">
                        <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
                <svg id="print" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask5" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="6" width="20" height="18">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 11H8C6.34 11 5 12.34 5 14V20H9V24H21V20H25V14C25 12.34 23.66 11 22 11ZM19 22H11V17H19V22ZM22 15C21.45 15 21 14.55 21 14C21 13.45 21.45 13 22 13C22.55 13 23 13.45 23 14C23 14.55 22.55 15 22 15ZM21 6H9V10H21V6Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask5)">
                        <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
                <svg id="delete" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask6" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="6" width="14" height="18">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 22C9 23.1 9.9 24 11 24H19C20.1 24 21 23.1 21 22V10H9V22ZM22 7H18.5L17.5 6H12.5L11.5 7H8V9H22V7Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask6)">
                        <rect class="actionButtons" x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                    </g>
                </svg>
            </div>
        </div>
        <div class="col-4 py-4 align-items-center d-flex customBorderRight justify-content-center">
            <div>
                <input class="search" type="text" placeholder="Поиск">
                <span>
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask9" mask-type="alpha" maskUnits="userSpaceOnUse" x="6" y="6" width="18" height="18">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5 17H17.71L17.43 16.73C18.41 15.59 19 14.11 19 12.5C19 8.91 16.09 6 12.5 6C8.91 6 6 8.91 6 12.5C6 16.09 8.91 19 12.5 19C14.11 19 15.59 18.41 16.73 17.43L17 17.71V18.5L22 23.49L23.49 22L18.5 17ZM12.5 17C10.01 17 8 14.99 8 12.5C8 10.01 10.01 8 12.5 8C14.99 8 17 10.01 17 12.5C17 14.99 14.99 17 12.5 17Z" fill="white"/>
                                            </mask>
                                            <g mask="url(#mask9)">
                                                 <rect x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                                            </g>
                                        </svg>
                                    </span>
            </div>
        </div>
        <div class="col-4 py-4 align-items-center d-flex justify-content-center">
            <div class="d-flex w-100 justify-content-between">
                <div class="textGrey"><span class="font-13px ">1-100 из 348</span></div>
                <div class="px-3">
                                        <span id="before">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <mask id="beforeIcon" mask-type="alpha" maskUnits="userSpaceOnUse" x="7" y="7" width="16" height="16">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23 14H10.83L16.42 8.41L15 7L7 15L15 23L16.41 21.59L10.83 16H23V14Z" fill="white"/>
                                                </mask>
                                                <g mask="url(#beforeIcon)">
                                                   <rect x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                                                </g>
                                            </svg>
                                        </span>
                    <span id="next">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <mask id="nextIcon" mask-type="alpha" maskUnits="userSpaceOnUse" x="7" y="7" width="16" height="16">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 7L13.59 8.41L19.17 14H7V16H19.17L13.59 21.59L15 23L23 15L15 7Z" fill="white"/>
                                                </mask>
                                                <g mask="url(#nextIcon)">
                                                    <rect x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                                                </g>
                                            </svg>
                                        </span>
                </div>
                <div>
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="settings" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="5" width="20" height="20">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.1593 15.98C22.1993 15.66 22.2293 15.34 22.2293 15C22.2293 14.66 22.1993 14.34 22.1593 14.02L24.2693 12.37C24.4593 12.22 24.5093 11.95 24.3893 11.73L22.3893 8.27C22.2693 8.05 21.9993 7.97 21.7793 8.05L19.2893 9.05C18.7693 8.65 18.2093 8.32 17.5993 8.07L17.2193 5.42C17.1893 5.18 16.9793 5 16.7293 5H12.7293C12.4793 5 12.2693 5.18 12.2393 5.42L11.8593 8.07C11.2493 8.32 10.6893 8.66 10.1693 9.05L7.67933 8.05C7.44933 7.96 7.18933 8.05 7.06933 8.27L5.06933 11.73C4.93933 11.95 4.99933 12.22 5.18933 12.37L7.29933 14.02C7.25933 14.34 7.22933 14.67 7.22933 15C7.22933 15.33 7.25933 15.66 7.29933 15.98L5.18933 17.63C4.99933 17.78 4.94933 18.05 5.06933 18.27L7.06933 21.73C7.18933 21.95 7.45933 22.03 7.67933 21.95L10.1693 20.95C10.6893 21.35 11.2493 21.68 11.8593 21.93L12.2393 24.58C12.2693 24.82 12.4793 25 12.7293 25H16.7293C16.9793 25 17.1893 24.82 17.2193 24.58L17.5993 21.93C18.2093 21.68 18.7693 21.34 19.2893 20.95L21.7793 21.95C22.0093 22.04 22.2693 21.95 22.3893 21.73L24.3893 18.27C24.5093 18.05 24.4593 17.78 24.2693 17.63L22.1593 15.98ZM14.7293 18.5C12.7993 18.5 11.2293 16.93 11.2293 15C11.2293 13.07 12.7993 11.5 14.7293 11.5C16.6593 11.5 18.2293 13.07 18.2293 15C18.2293 16.93 16.6593 18.5 14.7293 18.5Z" fill="white"/>
                        </mask>
                        <g mask="url(#settings)">
                            <rect x="2" y="2" width="26" height="26" fill="#D8D8D8"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
  export default {
    name: "Tools"
  }
</script>

<style scoped>

</style>
