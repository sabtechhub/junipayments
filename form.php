<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <button id="btn-pay">Pay Now</button>
    <script src="https://api.junipayments.com/js/inline.js"></script>

    <script>
        $('document').ready(function() {

            // Code snippet to call the default payment form

            $('#btn-pay').click(function() {

                payWithJunipay();

            });

            function payWithJunipay() {

                var client_id = 'CLIENT ID HERE';
                var token =
                    "YOUR TOKEN HERE";

                var cus_email = "EMAIL HERE";
                var handler = JuniPop.setup({
                    key: token, //put your token here
                    clientid: client_id,
                    foreignID: "1254256985789", // 13 digit foreign id here
                    email: cus_email, //put your customer's email here
                    amount: 50, //amount the customer is supposed to pay
                    color: "white",
                    desc: "payment for service",
                    total_amt: 1,
                    // customer_token:'RCP_607ee694abc0sdsee5122d54' ,
                    callbackUrl: 'https://webhook.site/6144b603-2df6-4e07-9331-2fdb5c2ae651',
                    redirectUrl: 'https://yoururl/index.php',
                    onClose: function() {
                        alert('Transaction cancelled');
                    }
                });
            }

            // Default way of using the default payment form from Junipayments. your Button must have onclick function payWithJuni. example onclick="payWithJunipay();"


        });
    </script>



</body>

</html>