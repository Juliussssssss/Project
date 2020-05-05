import VeeValidate from 'vee-validate';

window.Vue.use(VeeValidate, {
    fieldsBagName: 'veeFields',
    dictionary: {
        ru: {
            messages:{
                required: 'Заполните поле'
            },
            attributes:{

            }
        }
    }
});
