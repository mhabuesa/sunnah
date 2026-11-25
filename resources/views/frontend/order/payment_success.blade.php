@extends('frontend.layouts.app')

@section('title', 'Payment Successful')

@push('header_script')
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/custom/style.css">

    <style>
        .order-success-section {
            padding: 65px 0;
            background: #f8faf9;
            min-height: 65vh;
        }

        .order-success-card {
            max-width: 680px;
            margin: auto;
            background: #fff;
            border-radius: 18px;
            padding: 45px 35px;
            text-align: center;
            box-shadow: 0 8px 35px rgba(0, 0, 0, 0.06);
        }

        .order-success-icon {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            background: #e8f8ef;
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            margin: 0 auto 22px;
            animation: successPulse 1.5s ease-in-out infinite;
        }

        .order-success-card h2 {
            color: #1f2937;
            font-size: 29px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .order-success-card > p {
            color: #6b7280;
            font-size: 15px;
            line-height: 1.8;
        }

        .invoice-box {
            background: #f8fafc;
            border: 1px dashed #198754;
            border-radius: 12px;
            padding: 22px 15px;
            margin: 28px 0;
        }

        .invoice-label {
            display: block;
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .invoice-number {
            font-size: 23px;
            font-weight: 700;
            color: #198754;
            letter-spacing: 1px;
            word-break: break-word;
        }

        .invoice-copy-btn {
            display: inline-block;
            border: none;
            background: #e8f8ef;
            color: #198754;
            padding: 7px 13px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 12px;
            cursor: pointer;
        }

        .invoice-copy-btn:hover {
            background: #d1fae5;
        }

        .order-info-note {
            background: #eff6ff;
            color: #1e40af;
            border-radius: 8px;
            padding: 14px;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .order-track-btn {
            display: inline-block;
            background: #198754;
            color: #fff !important;
            padding: 13px 28px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.3s ease;
        }

        .order-track-btn:hover {
            background: #146c43;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.2);
        }

        .order-home-btn {
            display: inline-block;
            color: #555 !important;
            border: 1px solid #ddd;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none !important;
            margin-left: 8px;
            transition: all 0.3s ease;
        }

        .order-home-btn:hover {
            background: #f8f9fa;
        }

        .order-success-footer {
            color: #9ca3af !important;
            font-size: 13px !important;
            margin-top: 25px;
            margin-bottom: 0;
        }

        @keyframes successPulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.06);
            }
        }

        @media (max-width: 576px) {
            .order-success-section {
                padding: 35px 12px;
            }

            .order-success-card {
                padding: 35px 18px;
            }

            .order-success-card h2 {
                font-size: 24px;
            }

            .invoice-number {
                font-size: 19px;
            }

            .order-track-btn,
            .order-home-btn {
                display: block;
                margin: 10px 0 0;
            }
        }
    </style>
@endpush

@section('content')

    {{-- =========================
         SUCCESS HEADER
    ========================== --}}
    <section class="tracking-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="tracking-label">
                        <span>•</span> PAYMENT COMPLETED
                    </div>

                    <h1>Order Confirmed!</h1>

                    <p>Your payment was successful. Thank you for shopping with us!</p>
                </div>
            </div>
        </div>
    </section>


    {{-- =========================
         ORDER SUCCESS BODY
    ========================== --}}
    <section class="order-success-section">
        <div class="container">

            <div class="order-success-card">

                {{-- Success Icon --}}
                <div class="order-success-icon">
                    <i class="fa fa-check"></i>
                </div>

                <h2>Payment Successful!</h2>

                <p>
                    Alhamdulillah! Your order has been placed successfully.
                    We are excited to serve you. Our team will process your
                    order as soon as possible.
                </p>


                {{-- Invoice ID --}}
                <div class="invoice-box">

                    <span class="invoice-label">Your Invoice Number</span>

                    <div class="invoice-number" id="invoiceNumber">
                        {{ $order->invoice_no }}
                    </div>

                    <button type="button" class="invoice-copy-btn"
                        onclick="copyInvoice()">
                        <i class="fa fa-copy"></i> Copy Invoice ID
                    </button>

                </div>


                {{-- Tracking Information --}}
                <div class="order-info-note">
                    <i class="fa fa-info-circle"></i>
                    Please save your Invoice Number. You can use it anytime
                    to track your order and check the latest delivery updates.
                </div>


                {{-- Action Buttons --}}
                <a href="{{ route('order.tracking', ['order_number' => $order->invoice_no]) }}"
                    class="order-track-btn">
                    <i class="fa fa-truck mr-2"></i>
                    Track Your Order
                </a>

                <a href="{{ route('index') }}" class="order-home-btn">
                    <i class="fa fa-home mr-1"></i>
                    Continue Shopping
                </a>


                <p class="order-success-footer">
                    Thank you for choosing Sunnah Shopping.
                    May Allah bless your purchase!
                </p>

            </div>

        </div>
    </section>


    {{-- =========================
         COPY INVOICE SCRIPT
    ========================== --}}
    <script>
        function copyInvoice() {
            const invoice = document.getElementById('invoiceNumber').innerText.trim();

            navigator.clipboard.writeText(invoice).then(function () {
                alert('Invoice ID copied successfully!');
            }).catch(function () {
                alert('Unable to copy Invoice ID. Please copy it manually.');
            });
        }
    </script>

@endsection
