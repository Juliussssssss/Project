<template>
    <div class="d-flex font-12px text-center font-16px pl-4 align-items-center">
        <span>Куличенко Юлия</span>
        <span class="mr-2 ml-5">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                <mask id="nonFavorite" mask-type="alpha" maskUnits="userSpaceOnUse" x="20" y="20" width="20" height="19">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M40 27.24L32.81 26.62L30 20L27.19 26.63L20 27.24L25.46 31.97L23.82 39L30 35.27L36.18 39L34.55 31.97L40 27.24ZM30 33.4L26.24 35.67L27.24 31.39L23.92 28.51L28.3 28.13L30 24.1L31.71 28.14L36.09 28.52L32.77 31.4L33.77 35.68L30 33.4Z" fill="white"/>
                </mask>
                <g mask="url(#nonFavorite)">
                <rect x="17" y="17" width="26" height="26" fill="#D8D8D8"/>
                </g>
            </svg>
        </span>
        <span class="mx-2">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                <mask id="Update" mask-type="alpha" maskUnits="userSpaceOnUse" x="21" y="21" width="19" height="19">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 35.2525V39.0025H24.75L35.81 27.9425L32.06 24.1925L21 35.2525ZM38.71 25.0425C39.1 24.6525 39.1 24.0225 38.71 23.6325L36.37 21.2925C35.98 20.9025 35.35 20.9025 34.96 21.2925L33.13 23.1225L36.88 26.8725L38.71 25.0425Z" fill="white"/>
                </mask>
                <g mask="url(#Update)">
                  <rect x="17" y="17" width="26" height="26" fill="#D8D8D8"/>
                </g>
            </svg>
        </span>
        <span class="mx-2">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                <mask id="del" mask-type="alpha" maskUnits="userSpaceOnUse" x="23" y="21" width="14" height="18">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 37C24 38.1 24.9 39 26 39H34C35.1 39 36 38.1 36 37V25H24V37ZM37 22H33.5L32.5 21H27.5L26.5 22H23V24H37V22Z" fill="white"/>
                </mask>
                <g mask="url(#del)">
                    <rect x="17" y="17" width="26" height="26" fill="#D8D8D8"/>
                </g>
            </svg>
        </span>
    </div>
</template>

<script>
    export default {
        name: "HeaderShowTools",
        props: ['id','contact'],
    }
</script>

<style scoped>

</style>
