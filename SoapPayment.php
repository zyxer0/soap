<?php

class SoapPayment
{
    public function GetPayment($order)
    {
        $rawPost  = "Input:\r\n";
        $rawPost .= file_get_contents('php://input');
        $rawPost .= "\r\n---\r\nmessageData:\r\n";
        $rawPost .= serialize($order);
        file_put_contents("log.txt",$rawPost);
        return array("status" => "true");
    }
}