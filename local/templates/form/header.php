<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();

$asset->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js')
?>
<!doctype html>
<html>
    <head>
        <title><?php $APPLICATION->ShowTitle()?></title>
        <?php $APPLICATION->ShowHead()?>
    </head>
    <body>
        <?php $APPLICATION->ShowPanel()?>
        <main>