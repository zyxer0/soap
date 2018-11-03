<?php

//ini_set('display_errors', 1);

require_once 'SoapPayment.php';

header("Content-Type: text/xml; charset=utf-8");
header('Cache-Control: no-store, no-cache');
header('Expires: '.date('r'));

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кеширование WSDL-файла для тестирования

//Создаем новый SOAP-сервер
$server = new SoapServer("http://localhost/owox/soap/payment.wsdl.php");
//Регистрируем класс обработчик
$server->setClass("SoapPayment");
//Запускаем сервер
$server->handle();