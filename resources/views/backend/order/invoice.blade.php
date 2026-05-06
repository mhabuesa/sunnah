<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice - #{{ $order->invoice_no }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .invoice-card {
            background-color: #fff;
            width: 148mm;
            min-height: 210mm;
            padding: 40px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
            color: #333;
        }

        .invoice-title-bar {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .yellow-line-left {
            height: 25px;
            background-color: #ffc107;
            flex-grow: 1;
        }

        .invoice-text {
            font-size: 28px;
            font-weight: 700;
            padding: 0 15px;
        }

        .yellow-line-right {
            width: 30px;
            height: 25px;
            background-color: #ffc107;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .invoice-to h3 {
            font-size: 14px;
        }

        .invoice-to p {
            font-size: 13px;
            font-weight: 500;
            margin-top: 5px
        }

        .consignment_id p {
            font-size: 13px;
            font-weight: 600;
            margin-top: 5px
        }

        .invoice-to span {
            font-size: 11px;
            color: #666;
            display: block;
            margin-top: 5px
        }

        .invoice-details td {
            font-size: 12px;
            padding: 3px 6px;
            font-weight: 700;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .items-table th {
            background-color: #333;
            color: #fff;
            padding: 8px;
            font-size: 11px;
        }

        .items-table td {
            padding: 8px;
            font-size: 11px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }

        .bottom-section {
            display: flex;
            justify-content: space-between;
        }

        .summary-table {
            width: 40%;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
            font-size: 12px;
            font-weight: 700;
        }

        .total-row {
            background: #ffc107;
            padding: 8px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 800;
            display: flex;
            justify-content: space-between;
        }

        .footer-bar {
            margin-top: 30px;
            border-top: 2px solid #ffc107;
            padding-top: 10px;
            text-align: center;
            font-size: 11px;
            font-weight: 700;
        }

        @media print {
            body {
                background: #fff;
                padding: 0;
            }

            @page {
                size: A5;
                margin: 0;
            }
        }
    </style>
</head>

<body @if ($print) onload="window.print();" @endif>

    <div class="invoice-card">

        <!-- HEADER -->
        <div class="header">
            <div class="brand-name">
                {{ setting()->name }}
            </div>
        </div>

        <!-- TITLE -->
        <div class="invoice-title-bar">
            <div class="yellow-line-left"></div>
            <div class="invoice-text">INVOICE</div>
            <div class="yellow-line-right"></div>
        </div>

        <!-- INFO -->
        <div class="info-section">

            <div class="invoice-to">
                <h3>Invoice To:</h3>
                <p>{{ $order->customer->name }}</p>
                <span>{{ $order->customer->address }}</span>
                <span>{{ $order->customer->phone }}</span>
            </div>

            <div class="invoice-details">
                <table>
                    <tr>
                        <td>Invoice#</td>
                        <td>#{{ $order->invoice_no }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
            </div>

        </div>

        <!-- ITEMS -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @if ($order->order_type == 'landing')
                    @foreach ($order->orderDetails as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>
                                {{ $item->landingProduct->name }}
                                 @if ($item->landingProduct->size)
                                    ({{ $item->landingProduct->size }})
                                @endif
                            </td>

                            <td>৳ {{ $item->price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>৳ {{ $item->price * $item->qty }}</td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($order->orderDetails as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>
                                {{ $item->product->name }}
                                @if ($item->variation)
                                    ({{ $item->variation?->attributeValue->value }})
                                @endif
                            </td>

                            <td>৳ {{ $item->price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>৳ {{ $item->price * $item->qty }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- SUMMARY -->
        <div class="bottom-section">

            <div></div>

            <div class="summary-table">
                <div class="summary-row">
                    <span>Sub Total:</span>
                    <span>৳ {{ $order->subtotal }}</span>
                </div>

                <div class="summary-row">
                    <span>Discount:</span>
                    <span>৳ {{ $order->discount_amount + $order->extra_discount }}</span>
                </div>

                <div class="summary-row">
                    <span>Shipping:</span>
                    <span>৳ {{ $order->shipping_cost }}</span>
                </div>

                <div class="total-row">
                    <span>Total:</span>
                    <span>৳ {{ $order->total }}</span>
                </div>
            </div>

        </div>

        @if ($order->delivery_cons_id)
            <div class="consignment_id">
                <p>Consignment ID: {{ $order->delivery_cons_id }}</p>
            </div>
        @endif

        <!-- FOOTER -->
        <div class="footer-bar">
            {{ setting()->phone }} | {{ setting()->address }} | {{ setting()->email }}
        </div>

    </div>

</body>

</html>
