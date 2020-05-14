<template>
    <div class="ml-3">
        <svg @click="goBack"
            class="back" width="45" height="45" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="mask4" mask-type="alpha" maskUnits="userSpaceOnUse" x="7" y="7" width="26" height="26">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M23 14H10.83L16.42 8.41L15 7L7 15L15 23L16.41 21.59L10.83 16H23V14Z" fill="white"/>
            </mask>
            <g mask="url(#mask4)">
                <rect x="2" y="2" width="30" height="30" fill="#D8D8D8"/>
            </g>
        </svg>
    </div>
</template>

<script>
    export default {
        name: "Back",
        methods: {
            goBack(){
                this.$router.go(-1);
            }
        }
    }
</script>

<style scoped>
    .back {
        cursor: pointer;
    }
    .back:hover {
        opacity: 0.9;
    }
</style>
