<?php 
namespace App\Payments;

use App\Models\Order;

interface PaymentGateway{
    function request(array $data):self;
    public function processUrl():String;
    public function message():String;
    public function success():bool;
    function getReferencePayment():?int;
    public function getStatusPayment($idReference):array;
    public function makePayment(Order $order):self;


}