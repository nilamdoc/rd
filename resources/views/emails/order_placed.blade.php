<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You for Your Order</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
                margin: 0;
                padding: 0;
            }

            .container {
                background-color: #ffffff;
                max-width: 600px;
                margin: 50px auto;
                padding: 30px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                text-align: center;
            }

            h1 {
                color: #28a745;
                font-size: 36px;
                margin-bottom: 20px;
            }

            p {
                color: #555;
                font-size: 18px;
                line-height: 1.5;
            }

            .order-info {
                margin-top: 30px;
                padding: 15px;
                background-color: #f1f3f5;
                border-radius: 6px;
                border: 1px solid #ddd;
                text-align: left;
            }

            .order-info p {
                margin: 10px 0;
            }

            .button {
                display: inline-block;
                margin-top: 20px;
                padding: 12px 25px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                font-size: 16px;
            }

            .button:hover {
                background-color: #0056b3;
            }

            footer {
                margin-top: 50px;
                text-align: center;
                font-size: 14px;
                color: #6c757d;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <h1>Thank you for your order, {{ $order['name'] }}!</h1>
            <p>We have received your order and will process it shortly. You will receive a confirmation email once your order has been shipped.</p>
            
            <div class="order-info">
                <h3>Order Details:</h3>
                <p><strong>Order Number:</strong> {{ $order['order_number'] }}</p>
                <p><strong>Order Date:</strong> {{ $order['order_date'] }}</p>
            </div>
        </div>

        <footer>
            <p>© <span>Copyright</span> {{ date('Y') }} <strong class="px-1 sitename">Ruchi Doctor</strong>. 
            <span>All Rights Reserved.</span></p>
        </footer>

    </body>
</html>
