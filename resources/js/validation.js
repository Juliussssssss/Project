import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';

window.Vue.use(VeeValidate, {
    fieldsBagName: 'veeFields',
    locale: 'ru',
    dictionary: {
        ru: {
            messages:{
                required: 'Обязательное поле',
                alpha: 'Неверный формат',
                email: 'Неверный email',
                digits: 'Номер должен состоять из 10 цифр',
                alpha_spaces: 'Неверный формат'
            },
            attributes:{

            }
        }
    }
});


