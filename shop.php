<?php

class Purchase
{
    public $name;
    public $price;
    public $currency;
    public $amount;
}

class PurchasesList
{
    public $purchase;
}

class Order
{
    public $name;
    public $lastName;
    public $email;
    public $totalPrice;
    public $currency;
    public $purchaseList;
}

ini_set('display_errors', 1);

$order = new Order();
$order->name = 'Vasya';
$order->lastName = 'Pupkin';
$order->email = 'vasya@gmail.com';
$order->totalPrice = 100;
$order->currency = 'USD';

$purchase = new Purchase();
$purchase->name = 'Some product';
$purchase->price = 50;
$purchase->amount = 2;
$purchase->currendy = 'USD';

$order->purchaseList = new PurchasesList();
$order->purchaseList->purchase[] = $purchase;

$client = new SoapClient(   "http://{$_SERVER['HTTP_HOST']}/owox/soap/payment.wsdl.php",
    array( 'soap_version' => SOAP_1_2));
var_dump($client->GetPayment($order));