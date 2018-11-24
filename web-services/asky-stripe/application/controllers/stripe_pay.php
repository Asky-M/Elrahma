<?php

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class stripe_pay extends CI_Controller{
    public function index(){

    }
    public function checkout(){
        
        $token = $_POST['stripeToken'];
        try{
            require_once('vendor/autoload.php');
            \Stripe\Stripe::setApiKey('sk_test_9gh4BIVvU43fWXghlaEZitzK');
            
            $charge = Charge::create(
                array(
                    'amount' => 1000,
                    'currency' => 'usd',
                    'description' => 'Example charge',
                    'source' => $token,   
                )
                );
                echo "<h3>thanks for payment</h3>";
        }catch(\Stripe\Error\Card $e){
            $error = $e->getMessage();
            echo $error;
                }
    }
}