    <?php
    session_start();
    // For test payments we want to enable the sandbox mode. If you want to put live
    // payments through then this setting needs changing to `false`.
    $enableSandbox = true;
 
    include '../config.php';

    // PayPal settings. Change these to your account details and the relevant URLs
    // for your site.
    $paypalConfig = [
        'email' =>  'vijeta.raikar-facilitator@sjinnovation.com',
        'return_url' => 'http://cart.sj/paypal/thanks.php',
        'cancel_url' => 'http://cart.sj/paypal/cancel.php',
        'notify_url' => 'http://cart.sj/paypal/payment.php'
    ];

    $paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

  
    $itemName = 'Subscription Paypal Plan';
  

    

    // Check if paypal request or response
    if (!isset($_POST["txn_id"])) {

        // Grab the post data so that we can set up the query string for PayPal.
        // Ideally we'd use a whitelist here to check nothing is being injected into
        // our post data.
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = stripslashes($value);
        }

        // Set the PayPal account.
        $data['business'] = $paypalConfig['email'];

        // Set the PayPal return addresses.
        $data['return'] = stripslashes($paypalConfig['return_url']);
        $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
        $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

        // Set the details about the product being purchased, including the amount
        // and currency so that these aren't overridden by the form data.
        $data['item_name'] =$_SESSION['register_user_email'];
   
        $data['amount'] = $_SESSION['payment_amount'];
       
        $data['currency_code'] = 'USD';

       

        // Build the query string from the data.
        $queryString = http_build_query($data);

        // Redirect to paypal IPN
        header('location:' . $paypalUrl . '?' . $queryString);
        exit();

    } 
    else 
    {
     
    }

    ?>