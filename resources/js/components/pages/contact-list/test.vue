<template>
    <div>
        ПЕЧАТЬ РАБОТАЕТ
    </div>
</template>

<script>
    export default {
        name: "test",
        props: ['placeName'],
        created() {
            console.log(this.placeName)
        }
    }
</script>

<style scoped>

</style>
