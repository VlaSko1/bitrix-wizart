<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Form");
?>

<?php
\Bitrix\Main\UI\Extension::load("ui.forms"); 
\Bitrix\Main\UI\Extension::load("ui.buttons");
\Bitrix\Main\UI\Extension::load("ui.alerts");
?>

<div class="wrapper">
    <section class="wrapper__form">
        <h1 class="form__title">Форма обратной связи</h1>
        <form class="form" action="#" name="form" id="form" method="POST">
            <div class="form__block">
                <p class="block__text">
                    Имя
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="text" name="name" id="name" class="ui-ctl-element ui-ctl-element_mod">
                </div>
                <div class="ui-alert ui-alert-danger ui-alert-div_mod" id="name-error">
                    <span class="ui-alert-message ui-alert-span_mod" id="name-error-span">
                        Поле "Имя" должно содержать от 2 до 20 символов кирилицы, может содержать подчёркивание или дефис.
                    </span>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Фамилия
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="text" name="surname" id="surname" class="ui-ctl-element ui-ctl-element_mod">
                </div>
                <div class="ui-alert ui-alert-danger ui-alert-div_mod" id="surname-error">
                    <span class="ui-alert-message ui-alert-span_mod" id="surname-error-span">
                        Поле "Фамилия" должно содержать от 2 до 30 символов кирилицы, может содержать подчёркивание или дефис.
                    </span>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Email
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="email" name="email" id="email" class="ui-ctl-element ui-ctl-element_mod">
                </div>
                <div class="ui-alert ui-alert-danger ui-alert-div_mod" id="email-error">
                    <span class="ui-alert-message ui-alert-span_mod" id="email-error-span">
                        Поле "Email" должно содержать адрес электронной почты.
                    </span>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Дата рождения
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="date" name="birthday" id="birthday" class="ui-ctl-element ui-ctl-element_mod">
                </div>
                <div class="ui-alert ui-alert-danger ui-alert-div_mod" id="birthday-error">
                    <span class="ui-alert-message ui-alert-span_mod" id="birthday-error-span">
                        Поле "Дата рождения" должно содержать дату рождения в формате "дд.мм.гггг", регистрирующимуся 
                        человеку должно быть не меньше 10 и не больше 90 лет.
                    </span>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Номер телефона
                </p>
                <div class="ui-ctl ui-ctl-textbox">
                    <input type="tel" name="tel" id="tel" class="ui-ctl-element ui-ctl-element_mod" placeholder="+7 (___)___-__-__">
                </div>
                <div class="ui-alert ui-alert-danger ui-alert-div_mod" id="tel-error">
                    <span class="ui-alert-message ui-alert-span_mod" id="tel-error-span">
                        В поле "Номер телефона" нужно ввести 10 цифр номера телефона российского сотового оператора, 
                        +7 или 8 вводить не требуется.
                    </span>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Город
                </p>
                <div class="ui-ctl ui-ctl-textbox">
                    <input type="text" name="city" id="city" class="ui-ctl-element ui-ctl-element_mod"value="Белгород">
                </div>
                <div class="ui-alert ui-alert-danger ui-alert-div_mod" id="city-error">
                    <span class="ui-alert-message ui-alert-span_mod" id="city-error-span">
                        В названии города могут содержаться от 2 до 35 буква кирилицы, знак подчёркивания или дефиса.
                    </span>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Портфолио
                </p>
                <label class="ui-ctl ui-ctl-file-link ui-ctl-file-link_block">
                    <input type="file" name="file" id="file" class="ui-ctl-element ui-ctl-element_mod">
                    <div class="ui-ctl-label-text ui-ctl-label-text_mod">Выберите файл</div>
                </label>
                <div class="ui-alert ui-alert-danger ui-alert-div_mod" id="file-error">
                    <span class="ui-alert-message ui-alert-span_mod" id="file-error-span">
                        Файл портфолио должен иметь расширение "jpg", "png" или "bmp".
                    </span>
                </div>
            </div>
            <button class="ui-btn ui-btn-md crm-btn-save" type="submit" id="sbm">Отправить заявку</button>
        </form>
    </section>
</div>

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>