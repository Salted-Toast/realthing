<html lang="en">
<head>
    <!-- Header -->
    <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
    <!-- Content -->
    <div class="card" id="donateCard">
        <div id="smart-button-container">
        <div style="text-align: center;">
            <div style="margin-bottom: 1.25rem;">
            <h1 class="mt-5 mb-5">Please Donate!</h1>
            <select id="item-options"><option value="£5" price="5">£5 - 5 GBP</option><option value="£10" price="10">£10 - 10 GBP</option><option value="£20" price="20">£20 - 20 GBP</option><option value="£30" price="30">£30 - 30 GBP</option><option value="£50" price="50">£50 - 50 GBP</option><option value="£75" price="75">£75 - 75 GBP</option><option value="£100" price="100">£100 - 100 GBP</option><option value="£1,000,000" price="1000000">£1,000,000 - 1000000 GBP</option></select>
            <select style="visibility: hidden" id="quantitySelect"></select>
            </div>
        <div class="mb-5" id="paypal-button-container"></div>
        </div>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=GBP" data-sdk-integration-source="button-factory"></script>
        <script>
        function initPayPalButton() {
            var shipping = 0;
            var itemOptions = document.querySelector("#smart-button-container #item-options");
        var quantity = parseInt();
        var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
        if (!isNaN(quantity)) {
        quantitySelect.style.visibility = "visible";
        }
        var orderDescription = 'Please Donate!';
        if(orderDescription === '') {
        orderDescription = 'Item';
        }
        paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'paypal',
            
        },
        createOrder: function(data, actions) {
            var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
            var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
            var tax = (0 === 0 || false) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
            if(quantitySelect.options.length > 0) {
            quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
            } else {
            quantity = 1;
            }

            tax *= quantity;
            tax = Math.round(tax * 100) / 100;
            var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
            priceTotal = Math.round(priceTotal * 100) / 100;
            var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

            return actions.order.create({
            purchase_units: [{
                description: orderDescription,
                amount: {
                currency_code: 'GBP',
                value: priceTotal,
                breakdown: {
                    item_total: {
                    currency_code: 'GBP',
                    value: itemTotalValue,
                    },
                    shipping: {
                    currency_code: 'GBP',
                    value: shipping,
                    },
                    tax_total: {
                    currency_code: 'GBP',
                    value: tax,
                    }
                }
                },
                items: [{
                name: selectedItemDescription,
                unit_amount: {
                    currency_code: 'GBP',
                    value: selectedItemPrice,
                },
                quantity: quantity
                }]
            }]
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
        },
        }).render('#paypal-button-container');
    }
    initPayPalButton();
        </script>
    </div>


    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>