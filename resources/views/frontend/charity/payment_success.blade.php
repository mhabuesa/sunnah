@extends('frontend.layouts.app')

@section('title', 'Donation Successful')

@push('header_script')
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/custom/style.css">

    <style>
        .donation-success-section {
            padding: 80px 0;
            background: #f8faf9;
            min-height: 65vh;
            display: flex;
            align-items: center;
        }

        .donation-success-card {
            background: #fff;
            border-radius: 18px;
            padding: 50px 30px;
            max-width: 650px;
            margin: auto;
            text-align: center;
            box-shadow: 0 8px 35px rgba(0, 0, 0, 0.06);
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: #e8f8ef;
            color: #16a34a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 48px;
            animation: successPulse 1.5s ease-in-out infinite;
        }

        .donation-success-card h2 {
            color: #1f2937;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .donation-success-card p {
            color: #6b7280;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .donation-thankyou {
            background: #f0fdf4;
            border-left: 4px solid #16a34a;
            padding: 18px;
            border-radius: 8px;
            margin: 25px 0;
            color: #166534;
            font-size: 15px;
            line-height: 1.8;
        }

        .charity-back-btn {
            display: inline-block;
            background: #198754;
            color: #fff !important;
            padding: 13px 30px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.3s ease;
        }

        .charity-back-btn:hover {
            background: #146c43;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.2);
        }

        .donation-footer-text {
            margin-top: 25px;
            font-size: 13px !important;
            color: #9ca3af !important;
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
            .donation-success-section {
                padding: 45px 15px;
            }

            .donation-success-card {
                padding: 35px 20px;
            }

            .donation-success-card h2 {
                font-size: 24px;
            }
        }
    </style>
@endpush

@section('content')

    {{-- =========================
         DONATION SUCCESS HEADER
    ========================== --}}
    <section class="tracking-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="tracking-label">
                        <span>•</span> DONATION COMPLETED
                    </div>

                    <h1>Thank You!</h1>

                    <p>Your kindness makes a difference in someone's life.</p>
                </div>
            </div>
        </div>
    </section>


    {{-- =========================
         DONATION SUCCESS BODY
    ========================== --}}
    <section class="donation-success-section">
        <div class="container">

            <div class="donation-success-card">

                {{-- Success Icon --}}
                <div class="success-icon">
                    <i class="fa fa-check"></i>
                </div>

                <h2>Donation Successful!</h2>

                <p>
                    Alhamdulillah! Your donation has been successfully received.
                    We sincerely appreciate your generosity and support.
                </p>

                <div class="donation-thankyou">
                    <strong>May Allah reward you abundantly!</strong>
                    <br>
                    Your contribution, no matter how big or small,
                    can bring hope, happiness, and positive change
                    to someone's life.
                </div>

                <p>
                    Thank you for being a part of this noble journey.
                    Together, we can make the world a better place.
                </p>

                {{-- Back to Charity --}}
                <a href="{{ route('charity.index') }}" class="charity-back-btn">
                    <i class="fa fa-heart mr-2"></i>
                    Explore More Charity
                </a>

                <p class="donation-footer-text">
                    Your generosity is a blessing. Keep spreading kindness!
                </p>

            </div>

        </div>
    </section>

@endsection