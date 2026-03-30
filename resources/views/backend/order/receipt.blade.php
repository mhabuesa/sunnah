<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <title>Receipt - #INV-2024-001</title>
    <style>
        /* ১. পেজ সেটিংস এবং রিসেট */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 13px;
            line-height: 1.2;
            background: #fff;
            color: #000;
        }

        /* ২. মেইন কন্টেইনার (৮০মিমি প্রিন্টারের জন্য) */
        .receipt-container {
            width: 80mm;
            margin: 0 auto;
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        /* ৩. হেডার ডিজাইন */
        .header {
            margin-bottom: 10px;
        }

        .header h2 {
            font-size: 18px;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .header p {
            font-size: 11px;
            margin: 1px 0;
        }

        /* ৪. টেবিল ডিজাইন */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        th {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 5px 0;
            text-align: left;
            font-size: 12px;
        }

        td {
            padding: 4px 0;
            vertical-align: top;
            font-size: 12px;
        }

        /* ৫. ডিভাইডার */
        .divider {
            border-top: 1px dashed #000;
            margin: 8px 0;
        }

        /* ৬. টোটাল সেকশন */
        .total-section table td {
            padding: 2px 0;
        }

        .grand-total {
            font-size: 14px;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 3px 0;
        }

        /* ৭. প্রিন্ট মিডিয়া কোয়েরি */
        @media print {
            @page {
                size: 80mm auto;
                margin: 0;
            }

            body {
                margin: 0;
                width: 80mm;
            }

            .receipt-container {
                width: 100%;
                padding: 10px;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print();">

    <div class="receipt-container">
        <div class="header text-center">
            <h2>{{ setting()->name }}</h2>
            <p>{{ setting()->address }}</p>
            @if (setting()->phone)
                <p>Phone: {{ setting()->phone }}</p>
            @endif
            @if (setting()->email)
                <p>Email: {{ setting()->email }}</p>
            @endif
        </div>

        <div class="divider"></div>

        <div style="font-size: 11px;">
            <p><strong>Invoice:</strong> #{{ $order->invoice_no }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y h:i A') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="50%">Item</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $item)
                    <tr>
                        <td>{{ Str::limit($item->product->name, 10, '...') }}
                            {{ optional($item->variation?->attributeValue)->value ? '(' . $item->variation->attributeValue->value . ')' : '' }}
                        </td>
                        <td class="text-center">{{ $item->qty }}</td>
                        <td class="text-right">{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <table style="width: 100%;">
                <tr>
                    <td class="text-right">Sub Total:</td>
                    <td class="text-right bold" style="width: 40%;">{{ $order->subtotal }}</td>
                </tr>
                <tr>
                    <td class="text-right">Discount:</td>
                    <td class="text-right">(-) {{ $order->discount_amount + $order->extra_discount }}</td>
                </tr>
                <tr class="grand-total">
                    <td class="text-right bold">Total:</td>
                    <td class="text-right bold">৳ {{ $order->total }}</td>
                </tr>
            </table>
        </div>
        @if ($order->delivery_cons_id)
            <p class="bold">Consignment ID: {{ $order->delivery_cons_id }}</p>
            <div class="divider"></div>
        @endif

        <div class="text-center" style="margin-top: 10px;">
            <p style="font-weight: 600; margin: 0;">Thank You for Shopping with Us!</p>
            <p style="font-weight: 600; font-size: 13px; color: #000000; margin: 2px 0 0 0;">Developed by Abu Esa</p>
        </div>
    </div>

</body>

</html>
