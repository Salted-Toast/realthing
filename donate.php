<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>
    <!-- Connection -->
    <?php require 'scripts/connect.php'; ?>

   <!-- Donation Buttons -->
    <div class="container-fluid">
        <div class="container">
            <div class="card mt-5">
                <div class="row">
                    <!-- Paypal -->
                    <h1 class="d-flex justify-content-center m-3">Donate</h1>
                    <div id="smart-button-container">
                        <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=GBP" data-sdk-integration-source="button-factory"></script>
                    <script>
                        function initPayPalButton() {
                            paypal.Buttons({
                                style: {
                                shape: 'rect',
                                color: 'gold',
                                layout: 'vertical',
                                label: 'paypal',
                                
                                },

                                createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{"amount":{"currency_code":"GBP","value":0}}]
                                });
                                },

                                onApprove: function(data, actions) {
                                return actions.order.capture().then(function(orderData) {
                                    
                                    // Full available details
                                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                    // Show a success message within this page, e.g.
                                    const element = document.getElementById('paypal-button-container');
                                    element.innerHTML = '';
                                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                    // Or go to another URL:  actions.redirect('thank_you.html');
                                    
                                });
                                },

                                onError: function(err) {
                                console.log(err);
                                }
                        }).render('#paypal-button-container');
                        }
                        initPayPalButton();
                    </script>
                </div>
                <div class="row">
                    <!-- Other Buttons?? -->
                </div>
            </div>
        </div>
    </div>
    

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>