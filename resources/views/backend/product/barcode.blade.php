@extends('backend.layouts.app')
@section('title', 'Add Product')
@push('style')
    <style>
        #barcodeArea {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: flex-start;
        }

        .barCodeWrapper {
            width: 200px;
            /* নির্দিষ্ট উইডথ দিলে দেখতে এক সমান লাগবে */
            padding: 10px;
            border: 1px dashed #ccc;
            text-align: center;
            background: #fff;

            /* এই অংশটি স্টিকার কেটে যাওয়া রোধ করবে */
            break-inside: avoid;
            page-break-inside: avoid;
            margin-bottom: 10px;            
        }

        .barcode-img {
            margin: 0 auto 5px auto;
            display: block;
        }
         .barcode-img > div:first-child{
            margin-left: auto;
            margin-right: auto;
         }

        .product-name {
            font-size: 12px;
            margin-top: 2px;
            line-height: 1.2;
        }

        .sku-text {
            font-size: 11px;
            color: #333;
        }

        /* প্রিন্ট এর জন্য বিশেষ সেটিংস */
        @media print {
            .barCodeWrapper {
                width: 280px;   
            }

            /* বারকোড ইমেজ এবং ব্যাকগ্রাউন্ড দেখানোর জন্য */
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            body * {
                visibility: hidden;
            }

            #barcodeArea,
            #barcodeArea * {
                visibility: visible;
            }

            #barcodeArea {
                position: absolute;
                left: 10;
                top: 0;
                width: 100%;
                display: flex !important;
                flex-wrap: wrap !important;
                justify-content: center !important;
            }

            /* সাইডবার বা মেনু যেন প্রিন্টে না আসে */
            .sidebar,
            .navbar,
            .btn,
            .block-header,
            .png_icon {
                display: none !important;
            }
        }
    </style>
@endpush
@section('content')
    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                <img class="png_icon" src="{{ asset('assets/icon/png/barcode.png') }}" alt=""> Generate Barcode
            </h1>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @php
                $firstVariantSku = $product->variations->count() ? $product->variations->first()->sku : $product->sku;
            @endphp
            <div class="col-lg-12 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title text-capitalize">Barcode Generator</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-vcenter ">
                            <tr>
                                <th>Name</th>
                                @if ($product->variations->count())
                                    <th>Select Variant</th>
                                @endif
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>{{ $product->name }}</td>
                                @if ($product->variations->count())
                                    <td>
                                        <select name="variant" class="form-control" id="variantSelect">
                                            <option value="">Select Variant</option>

                                            @foreach ($product->variations as $key => $variant)
                                                <option {{ $key == 0 ? 'selected' : '' }} value="{{ $variant->sku }}">
                                                    {{ $variant->attributeValue->value }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </td>
                                @endif
                                <td>
                                    <input type="number" name="quantity" class="form-control" value="4">
                                    <span>Maximum quantity {{ $stock }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Generate</button>
                                    <button class="btn btn-warning btn-sm">Reset</button>
                                    <button class="btn btn-info btn-sm">Print</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title text-capitalize">Barcode</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto d-flex justify-content-center">
                        <div class="row mt-4" id="barcodeArea"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')
    <script>
        $(document).ready(function() {

            // ১. পেজ লোড হলে প্রথম ভেরিয়েন্ট এর বারকোড অটো লোড হবে
            let initialSku = "{{ $firstVariantSku }}";
            let initialQty = 4;
            if (initialSku) {
                generateBarcode(initialSku, initialQty);
            }

            // ২. জেনারেট বাটন ক্লিক করলে
            $('.btn-primary').on('click', function() {
                let variantSku = $('#variantSelect').val();
                let productSku = "{{ $product->sku }}";
                let sku = variantSku ? variantSku : productSku;
                let qty = $('input[name="quantity"]').val();

                if (!qty || qty < 1) {
                    alert('দয়া করে সঠিক পরিমাণ দিন।');
                    return;
                }

                generateBarcode(sku, qty);
            });

            // ৩. রিসেট বাটন ক্লিক করলে
            $('.btn-warning').on('click', function() {
                $('input[name="quantity"]').val('4');
                $('#variantSelect').prop('selectedIndex', 0);
                $('#barcodeArea').html('');
            });

            // ৪. প্রিন্ট বাটন (সংশোধিত ও ক্লিন কোড)
            $('.btn-info').on('click', function() {
                // আমরা যেহেতু CSS-এ @media print ব্যবহার করেছি, 
                // তাই বডি রিপ্লেস করার দরকার নেই। সরাসরি প্রিন্ট কল করলেই হবে।
                window.print();
            });

        });

        // বারকোড জেনারেট করার ফাংশন
        function generateBarcode(sku, qty) {
            $.ajax({
                url: "{{ route('admin.product.generate.barcode') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sku: sku,
                    qty: qty
                },
                beforeSend: function() {
                    // লোডিং এর জন্য কিছু চাইলে এখানে দিতে পারেন
                    $('.btn-primary').prop('disabled', true).text('Generating...');
                },
                success: function(res) {
                    $('#barcodeArea').html(res.html);
                },
                complete: function() {
                    $('.btn-primary').prop('disabled', false).text('Generate');
                },
                error: function() {
                    alert('বারকোড জেনারেট করতে সমস্যা হয়েছে।');
                }
            });
        }
    </script>
@endpush
