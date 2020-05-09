<template>
<div>
    <!-- Modal -->
    <div ref="modal" class="modal" id="exitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-4 px-3">
                <div class="modal-header pb-0 d-block">
                    <div class="modal-title textActive font">Вы действительно хотите уйти без сохранения?</div>
                </div>
                <div class="modal-footer mt-4">
                    <button @click="confirmed" type="button" class="py-3 btn text-uppercase font-12px btnText text-white save d-inline-block mr-3 w-100" data-dismiss="modal">
                        Сохранить
                    </button>
                    <button @click="cancel" type="button" class="py-3 btn-light btn text-uppercase font-12px btnText cancel" data-dismiss="modal">
                        Уйти
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "ExitConfirmation",
        methods: {
            confirmed()
            {
                this.$emit("checking");
            },
            cancel()
            {
                this.$store.commit('setBreakRoute',true);
                this.$router.push(this.getLastRoute);
            },
            open()
            {
                 $("#exitModal").modal('show');
            },
        },
        computed: {
            getLastRoute() {

                return this.$store.getters.getLastRoute;
            }
        }
    }
</script>

<style scoped>
    .modal-footer {
        justify-content: start;
    }
    .modal-header, .modal-footer {
        border: 0px;
    }
    .modal {
        top:195px;
    }
    .save {
        max-width: 120px;
        background-color: #1875F0;
    }
    .save:hover {
        background-color: #1875E0;
    }
    .font {
        font-size:18px;
    }
</style>
