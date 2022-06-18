<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Form");
?>

<?php
\Bitrix\Main\UI\Extension::load("ui.forms"); 
\Bitrix\Main\UI\Extension::load("ui.buttons");
?>

<div class="wrapper">
    <section class="wrapper__form">
        <h1 class="form__title">Форма обратной связи</h1>
        <form class="form" action="#" name="form1">
            <div class="form__block">
                <p class="block__text">
                    Имя
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="text" name="name" class="ui-ctl-element ui-ctl-element_mod" required>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Фамилия
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="text" name="surname" class="ui-ctl-element ui-ctl-element_mod" required>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Email
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="email" name="email" class="ui-ctl-element ui-ctl-element_mod" required>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Дата рождения
                </p>
                <div class="ui-ctl ui-ctl-textbox ">
                    <input type="date" name="birthday" class="ui-ctl-element ui-ctl-element_mod" required>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Номер телефона
                </p>
                <div class="ui-ctl ui-ctl-textbox">
                    <input type="tel" name="tel" class="ui-ctl-element ui-ctl-element_mod" required>
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Город
                </p>
                <div class="ui-ctl ui-ctl-textbox">
                    <input type="text" name="city" class="ui-ctl-element ui-ctl-element_mod" required value="Белгород">
                </div>
            </div>
            <div class="form__block">
                <p class="block__text">
                    Портфолио
                </p>
                <label class="ui-ctl ui-ctl-file-link ui-ctl-file-link_block">
                    <input type="file" name="file" class="ui-ctl-element ui-ctl-element_mod" required>
                    <div class="ui-ctl-label-text ui-ctl-label-text_mod">Выберите файл</div>
                </label>
            </div>
            <button class="ui-btn ui-btn-md crm-btn-save" type="submit">Отправить заявку</button>
        </form>
    </section>
</div>

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>