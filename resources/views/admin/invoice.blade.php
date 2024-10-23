<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /*
  Common invoice styles. These styles will work in a browser or using the HTML
  to PDF anvil endpoint.
*/

        body {
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr td {
            padding: 0;
        }

        table tr td:last-child {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .right {
            text-align: right;
        }

        .large {
            font-size: 1.75em;
        }

        .total {
            font-weight: bold;
            color: #fb7578;
        }

        .logo-container {
            margin: 20px 0 70px 0;
        }

        .invoice-info-container {
            font-size: 0.875em;
        }

        .invoice-info-container td {
            padding: 4px 0;
        }

        .client-name {
            font-size: 1.5em;
            vertical-align: top;
        }

        .line-items-container {
            margin: 70px 0;
            font-size: 0.875em;
        }

        .line-items-container th {
            text-align: left;
            color: #999;
            border-bottom: 2px solid #ddd;
            padding: 10px 0 15px 0;
            font-size: 0.75em;
            text-transform: uppercase;
        }

        .line-items-container th:last-child {
            text-align: right;
        }

        .line-items-container td {
            padding: 15px 0;
        }

        .line-items-container tbody tr:first-child td {
            padding-top: 25px;
        }

        .line-items-container.has-bottom-border tbody tr:last-child td {
            padding-bottom: 25px;
            border-bottom: 2px solid #ddd;
        }

        .line-items-container.has-bottom-border {
            margin-bottom: 0;
        }

        .line-items-container th.heading-quantity {
            width: 50px;
        }

        .line-items-container th.heading-price {
            text-align: right;
            width: 100px;
        }

        .line-items-container th.heading-subtotal {
            width: 100px;
        }

        .payment-info {
            width: 38%;
            font-size: 0.75em;
            line-height: 1.5;
        }

        .footer {
            margin-top: 100px;
        }

        .footer-thanks {
            font-size: 1.125em;
        }

        .footer-thanks img {
            display: inline-block;
            position: relative;
            top: 1px;
            width: 16px;
            margin-right: 4px;
        }

        .footer-info {
            float: right;
            margin-top: 5px;
            font-size: 0.75em;
            color: #ccc;
        }

        .footer-info span {
            padding: 0 5px;
            color: black;
        }

        .footer-info span:last-child {
            padding-right: 0;
        }

        .page-container {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="page-container">
            Page
            <span class="page"></span>
            of
            <span class="pages"></span>
        </div>

        <div class="logo-container">
          <h1>New shop</h1>
        </div>

        <table class="invoice-info-container">
            <tr>
                <td rowspan="2" class="client-name">
                    {{$orders->name}}
                </td>
                <td>
                    New shop
                </td>
            </tr>
            <tr>
                <td>
                    Sector# 12
                </td>
            </tr>
            <tr>
                <td>
                    Invoice Date: <strong>{{ \Carbon\Carbon::now()->format('F j, Y') }}
                    </strong>
                </td>
                <td>
                    Road# 18, House# 38
                </td>
            </tr>
            <tr>
                <td>
                    Invoice No: <strong>12345</strong>
                </td>
                <td>
                    newshop@mail.com
                </td>
            </tr>
        </table>


        <table class="line-items-container">
            <thead>
                <tr>
                    <th class="heading-quantity">Qty</th>
                    <th class="heading-description">Title</th>
                    <th class="heading-price">Price</th>
                    <th class="heading-subtotal">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2</td>
                    <td>{{ $orders->product->title }}</td>
                    <td class="right">{{ $orders->product->price}}</td>
                    <td class="bold">{{ $orders->product->price}}</td>
                </tr>
            </tbody>
        </table>


        <table class="line-items-container has-bottom-border">
            <thead>
                <tr>
                    <th>Payment Info</th>
                    <th>Due By</th>
                    <th>Total Due</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="payment-info">
                        <div>
                            Account No: <strong>123567744</strong>
                        </div>
                        <div>
                            Routing No: <strong>120000547</strong>
                        </div>
                    </td>
                    <td class="large">{{ \Carbon\Carbon::now()->format('F j, Y') }}</td>
                    <td class="large total">{{ $orders->product->price}}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <div class="footer-info">
                <span>newshop@mail.com</span> |
                <span>01721747219</span> |
                <span>newshop.com</span>
            </div>
            <div class="footer-thanks">
                <span>Thank you!</span>
            </div>
        </div>
    </div>
</body>

</html>
