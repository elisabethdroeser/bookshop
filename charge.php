<pre>
<?php

require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('class/customer.php');
require_once('class/transaction.php');


\Stripe\Stripe::setApiKey('sk_test_IzXuEMKRVWn5ZAJIeVG1EemK00VDz2iFR3'); //YOUR_STRIPE_SECRET_KEY

 // Sanitize array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];

 //echo $token;

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
    "amount" => 2000,
    "currency" => "sek",
    "description" => "Nedladdning posts",
    "customer" => $customer->id
));

//print_r($charge);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

// Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];

// Instantiate customer
$customer = new Customer();

// Add Customer to db
$customer->addCustomer($customerData);

// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add transaction To db
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

?>