<?php 

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class stripe_pay extends CI_Controller{

    public function index(){

    }
    public function Customer(){
        $token = $_POST['stripeToken'];

try{
    require_once('vendor/autoload.php');
    \Stripe\Stripe::setApiKey("sk_test_9gh4BIVvU43fWXghlaEZitzK");
    $customer = \Stripe\Customer::create([
    'email' => $_POST['stripeEmail'],
    'source'  => $_POST['stripeToken'],
  ]);

  $subscription = \Stripe\Subscription::create([
    'customer' => $customer->id,
    'items' => [['plan' => 'weekly_box']],
  ]);

  header('Location: thankyou.html');
  exit;
}
catch(Exception $e)
{
  header('Location:oops.html');
  error_log("unable to sign up customer:" . $_POST['stripeEmail'].
    ", error:" . $e->getMessage());
}
}
}