<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Receipt - #INV-2024-001</title>
    <style>
        /* ১. পেজ সেটিংস এবং রিসেট */
        * { margin: 0; padding: 0; box-sizing: border-box; }
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

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .bold { font-weight: bold; }

        /* ৩. হেডার ডিজাইন */
        .header { margin-bottom: 10px; }
        .header h2 { font-size: 18px; text-transform: uppercase; margin-bottom: 2px; }
        .header p { font-size: 11px; margin: 1px 0; }

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
        td { padding: 4px 0; vertical-align: top; font-size: 12px; }

        /* ৫. ডিভাইডার */
        .divider { border-top: 1px dashed #000; margin: 8px 0; }

        /* ৬. টোটাল সেকশন */
        .total-section table td { padding: 2px 0; }
        .grand-total { font-size: 14px; border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 0; }

        /* ৭. প্রিন্ট মিডিয়া কোয়েরি */
        @media print {
            @page { 
                size: 80mm auto; 
                margin: 0; 
            }
            body { margin: 0; width: 80mm; }
            .receipt-container { width: 100%; padding: 10px; }
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print();">

    <div class="receipt-container">
        <div class="header text-center">
            <h2>CHISHTI AGRO</h2>
            <p>পুরান বাজার, গাইবান্ধা সদর, গাইবান্ধা</p>
            <p>মোবাইল: ০১৭০০-০০০০০০</p>
            <p>ইমেইল: info@chishtiagro.com</p>
        </div>

        <div class="divider"></div>

        <div style="font-size: 11px;">
            <p><strong>ইনভয়েস:</strong> #INV-2024-001</p>
            <p><strong>তারিখ:</strong> ২৬/০৩/২০২৬ ০৮:৩০ PM</p>
            <p><strong>বিক্রেতা:</strong> ক্যাশিয়ার-০১</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="50%">আইটেম</th>
                    <th class="text-center">পরিমাণ</th>
                    <th class="text-right">মূল্য</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Organic Fertilizer (25kg)</td>
                    <td class="text-center">২</td>
                    <td class="text-right">১,২০০.০০</td>
                </tr>
                <tr>
                    <td>Pesticide Liquid 500ml</td>
                    <td class="text-center">১</td>
                    <td class="text-right">৪৫০.০০</td>
                </tr>
                <tr>
                    <td>Seed Packet - Tomato</td>
                    <td class="text-center">৫</td>
                    <td class="text-right">২৫০.০০</td>
                </tr>
            </tbody>
        </table>

        <div class="total-section">
            <table style="width: 100%;">
                <tr>
                    <td class="text-right">মোট বিল:</td>
                    <td class="text-right bold" style="width: 40%;">১,৯০০.০০</td>
                </tr>
                <tr>
                    <td class="text-right">ডিসকাউন্ট:</td>
                    <td class="text-right">(-) ১০০.০০</td>
                </tr>
                <tr class="grand-total">
                    <td class="text-right bold">সর্বমোট:</td>
                    <td class="text-right bold">৳ ১,৮০০.০০</td>
                </tr>
                <tr>
                    <td class="text-right">নগদ প্রদান:</td>
                    <td class="text-right">২,০০০.০০</td>
                </tr>
                <tr>
                    <td class="text-right">ফেরত:</td>
                    <td class="text-right bold">২০০.০০</td>
                </tr>
            </table>
        </div>

        <div class="divider"></div>

        <div class="text-center" style="margin-top: 10px;">
            <p class="bold">ধন্যবাদ, আবার আসবেন!</p>
            <p style="font-size: 10px; margin-top: 5px;">সফটওয়্যার সৌজন্যে: Abu Esa</p>
            <p style="font-size: 9px; color: #444;">www.mhabuesa.me</p>
        </div>
    </div>

</body>
</html>