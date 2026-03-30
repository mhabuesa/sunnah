<!DOCTYPE html>
<html>

<head>
    <title>Print Barcodes</title>
    <style>
    #barcodeArea {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px; /* barcode এর মধ্যে spacing */
    }

    .barCodeWrapper {
        width: 250px; /* barcode wrapper বড় করা হলো */
        padding: 15px;
        border: 1px dashed #ccc;
        text-align: center;
        background: #fff;
        break-inside: avoid;
        page-break-inside: avoid;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    .product-name {
        font-size: 14px;
        font-weight: bold;
        margin-top: 5px;
        line-height: 1.2;
    }

    .price {
        font-size: 13px;
        margin-top: 2px;
    }

    .sku-text {
        font-size: 12px;
        margin-top: 3px;
    }

    .barcode-img img {
        width: 200px; /* barcode image বড় করা */
        height: 80px; /* height বাড়ানো */
        margin: 10px auto;
        display: block;
    }

    @media print {
        body * { visibility: hidden; }
        #barcodeArea, #barcodeArea * { visibility: visible; }
        #barcodeArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .barCodeWrapper { page-break-inside: avoid; break-inside: avoid; }
    }
</style>
</head>

<body>
    <div id="barcodeArea">
        @foreach ($barcodes as $barcode)
            @for ($i = 0; $i < $qty; $i++)
                <div class="barCodeWrapper">
                    <div class="product-name">{{setting()->name}}</div>
                    <div class="product-name">{{ $barcode['productName'] }}</div>
                    <div class="price">৳ {{ $barcode['price'] }}</div>
                    <div class="barcode-img">
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($barcode['sku'], 'C128', 2, 50) }}"
                            alt="barcode">
                    </div>
                    <div class="sku-text">Code: {{ $barcode['sku'] }}</div>
                    @if ($barcode['variation'])
                        <div class="sku-text">{{ $barcode['variation'] }}</div>
                    @endif
                </div>
            @endfor
        @endforeach
    </div>
</body>

</html>