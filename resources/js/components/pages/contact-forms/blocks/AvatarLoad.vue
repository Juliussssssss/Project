<template>
    <div class="imageUpload p-relative mx-4">
        <label class="file mt-2 preview position-relative" for="file" id="preview">
            <img :src="avatar" id="avatar" class = "avatar-d-none">
            <svg width="70" height="70" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="60" height="60" rx="30" fill="url(#pattern0)"/>
                <path d="M1 30C1 13.9837 13.9837 1 30 1C46.0163 1 59 13.9837 59 30C59 46.0163 46.0163 59 30 59C13.9837 59 1 46.0163 1 30Z" fill="white" stroke="#F5F5F5" stroke-width="2"/>
                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="20" y="20" width="20" height="20">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M30 20C24.48 20 20 24.48 20 30C20 35.52 24.48 40 30 40C35.52 40 40 35.52 40 30C40 24.48 35.52 20 30 20ZM30 23C31.66 23 33 24.34 33 26C33 27.66 31.66 29 30 29C28.34 29 27 27.66 27 26C27 24.34 28.34 23 30 23ZM30 37.2C27.5 37.2 25.29 35.92 24 33.98C24.03 31.99 28 30.9 30 30.9C31.99 30.9 35.97 31.99 36 33.98C34.71 35.92 32.5 37.2 30 37.2Z" fill="white"/>
                </mask>
                <g mask="url(#mask0)">
                    <rect x="17" y="17" width="26" height="26" fill="#D8D8D8"/>
                </g>
                <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0" transform="scale(0.002)"/>
                    </pattern>
                </defs>
            </svg>
        </label>
        <div class="d-none">
            <input
                class = "file"
                name="avatar"
                id="file"
                type="file"
                @change="onFileChange"
                :disabled="blocked"
            >
        </div>
    </div>
</template>

<script>
    export default {
        name: "AvatarLoad",
        props:['avatar','blocked'],
        data(){
            return {
                supportFormat:[]
            }
        },
        methods: {
            onFileChange: function(e) {
                let files = e.target.files || e.dataTransfer.files;
                console.log(files[0].type)
                if (!files.length) {

                    return;
                }

                this.createImage(files[0]);
            },
            createImage: function(file) {
                let reader = new FileReader();
                reader.onload = function(e) {

                    let src = e.target.result;
                    let imgNew = document.getElementById('avatar');
                    imgNew.setAttribute('src', src);
                    imgNew.setAttribute('class', 'avatar');
                };
                reader.readAsDataURL(file);
            },
        }
    }
</script>

<style scoped>
    .avatar-d-none {
        display:none;
    }
    .avatar {
        border:none;
        z-index: 3;
        position: absolute;
        width: 69px;
        height: 69px;
        border-radius: 100px;
        object-fit: cover;
        display: block;
        margin: 0 auto 15px;
        display:block;
    }
    .file:hover {
        cursor:pointer;
        opacity: 0.9;
    }
</style>
