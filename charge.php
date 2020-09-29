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

/*
// Creates a class and checks if the user exists. And if it does exist, return the information about the user
$userClass = new User();
$userInfo = $userClass->userExist($_SESSION['user'], true);
$userInfo = $userClass[0];

// Sets the database values to the appropriate values
$name_first = $userInfo['fname'];
$name_last = $userInfo['lname'];
$address = $userInfo['address'];
$city = $userInfo['city'];
$zip = $userInfo['zip'];
$country = $userInfo['country'];
$phone = $userInfo['phone'];

// Sets the user values to the correct array value
$user_info = [
    'First Name' => $name_first,
    'Last Name' => $name_last,
    'Address' => $address,
    'City' => $city,
    'Zip Code' => $zip,
    'Country' => $country,
    'Phone' => $phone
];

// Checks if the user already is a customer and have used stripe before. If so, set the customer_id to the customer_id fetched from the database
if (!is_null($userInfo['id'])) {
    $customer_id = $userInfo['iid'];
}

if (isset($customer_id)) {
    try {
        // Use Stripe's library to make requests...
        $customer = \Stripe\Customer::retrieve($customer_id);
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];

        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
} else {
    try {
        // Use Stripe's library to make requests...
        $customer = \Stripe\Customer::create(array(
            'email' => $userInfo['email'],
            'source' => $token,
            'metadata' => $user_info,
        ));
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];

        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
        header('Location: error_page.php');
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
}

if (isset($customer)) {
    print_r($customer);

    $charge_customer = true;

    // Save the customer id in your own database!
    // Charge the Customer instead of the card
    try {
        // Use Stripe's library to make requests...
        $charge = \Stripe\Charge::create(array(
            'amount' => 2000,
            'description' => 'Payment for posts',
            'currency' => 'sek',
            'customer' => $customer->id,
            'metadata' => $user_info
        ));
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];

        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");

        $charge_customer = false;
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }

    if ($charge_customer) {
        if (is_null($userInfo['id'])) {
            $success = $userClass->setId($customer->id);
            if ($success) {
                Header('Location: reciept.php');
            }
        } else {
            Header('Location: reciept.php');
        }
    }
}

// You can charge the customer later by using the customer id.

//Making a Subscription Charge
// Get the token from the JS script
//$token = $_POST['stripeToken'];
// Create a Customer
//$customer = \Stripe\Customer::create(array(
//    "email" => "paying.user@example.com",
//    "source" => $token,
//));

// or you can fetch customer id from the database too.
// Creates a subscription plan. This can also be done through the Stripe dashboard.
// You only need to create the plan once.

//$subscription = \Stripe\Plan::create(array(
//    "amount" => 2000,
//    "interval" => "month",
//    "name" => "Gold large",
//    "currency" => "cad",
//    "id" => "gold"
//));

// Subscribe the customer to the plan
//$subscription = \Stripe\Subscription::create(array(
//    "customer" => $customer->id,
//    "plan" => "gold"
//));

//print_r($subscription);
*/