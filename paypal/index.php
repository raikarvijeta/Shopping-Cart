<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal Integration Test</title>
 
       <style type="text/css">
        .paypal-btn
        {
            background-color: #ffc507;
            border: none;
            color: white;
            padding: 31px;
            text-align: center;
            text-decoration: none;
            display: block;
            font-size: 24px;
            margin: auto;
            cursor: pointer;
        }
 
        
    </style>
</head>
<body>

    <form class="paypal" action="payment.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

        
        <input type="hidden" name="item_name" value=<?php echo $_SESSION['register_user_email']; ?> />


        <input type="hidden" name="return_url" value="http://cart.sj/paypal/thanks.php" />

        <input type="hidden" name="cancel_return" value="http://cart.sj/paypal/cancel.php" />

        <input type="hidden" name="notify_url" value="http://cart.sj/paypal/payment.php" / >



         <input type="submit"  class="paypal-btn" name="submit" value="Submit Payment"/>

    </form>

</body>
</html>