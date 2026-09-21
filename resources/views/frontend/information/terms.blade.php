@extends('frontend.layouts.app')

@section('title', 'Terms & Conditions and Return Policy')

@push('header_script')
    <style>
        .page-header {
            min-height: 15rem;
            background-color: #eee;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700 !important;
        }

        @media (max-width: 767px) {
            .page-title {
                font-size: 2rem;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Page Header -->
    <div class="page-header d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <h1 class="page-title mb-2">
                Terms &amp; Conditions and Return Policy
            </h1>

            <p class="text-gray-44 mb-0">
                Please read our terms and return policy carefully before placing an order.
            </p>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="mt-3 mb-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">
                            <a href="{{ route('index') }}">Home</a>
                        </li>

                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active"
                            aria-current="page">
                            Terms &amp; Conditions
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <hr class="mb-10 mt-0">


    <div class="container">
        <div class="mb-10">

            <!-- Introduction -->
            <div class="mb-10">
                <h2 class="font-size-25 mb-4">
                    SUNNAH A to Z — Terms &amp; Conditions and Return Policy
                </h2>

                <p>
                    By accessing, browsing, or using our website or platform, or by placing an
                    order with SUNNAH A to Z, you acknowledge that you have read, understood,
                    and agreed to the following Terms &amp; Conditions and Return Policy.
                </p>

                <p class="mb-0">
                    অনুগ্রহ করে অর্ডার করার আগে নিচের শর্তাবলী ও রিটার্ন পলিসি মনোযোগসহকারে পড়ে নিন।
                </p>
            </div>


            <!-- 1. General Terms -->
            <div class="mb-10">

                <h2 class="font-size-25 mb-4">
                    1. সাধারণ শর্তাবলী
                    <span class="text-primary">(General Terms &amp; Conditions)</span>
                </h2>

                <h3 class="font-size-18 mb-2">
                    ব্যক্তিগত ব্যবহার (Personal Use)
                </h3>

                <p>
                    SUNNAH A to Z-এর ওয়েবসাইট থেকে ক্রয়কৃত সকল পণ্য শুধুমাত্র ব্যক্তিগত ব্যবহারের
                    জন্য। পূর্বানুমতি ছাড়া বাণিজ্যিক উদ্দেশ্যে পণ্য পুনঃবিক্রয় (Resale) করা
                    কঠোরভাবে নিষিদ্ধ।
                </p>

                <h3 class="font-size-18 mb-2">
                    সঠিক তথ্য প্রদান (Accurate Information)
                </h3>

                <p>
                    অর্ডার করার সময় ক্রেতাকে সঠিক নাম, পূর্ণাঙ্গ ঠিকানা এবং সচল মোবাইল নম্বর
                    প্রদান করতে হবে। ভুল বা অসম্পূর্ণ তথ্যের কারণে ডেলিভারিতে বিলম্ব, ব্যর্থতা
                    বা অন্যান্য জটিলতা সৃষ্টি হলে SUNNAH A to Z তার জন্য দায়ী থাকবে না।
                </p>

                <h3 class="font-size-18 mb-2">
                    অর্ডার নিশ্চিতকরণ (Order Confirmation)
                </h3>

                <p>
                    পণ্যের স্টক, ডেলিভারি সক্ষমতা এবং অন্যান্য প্রাসঙ্গিক বিষয়ের ওপর ভিত্তি করে
                    অর্ডার চূড়ান্ত ও নিশ্চিত করা হয়। অনিবার্য পরিস্থিতি, স্টক সংকট বা অন্যান্য
                    যৌক্তিক কারণে SUNNAH A to Z যেকোনো অর্ডার বাতিল করার অধিকার সংরক্ষণ করে।
                </p>

                <h3 class="font-size-18 mb-2">
                    অ্যাকাউন্ট ও পেমেন্ট (Account &amp; Payment)
                </h3>

                <p>
                    পেমেন্টের জন্য ব্যবহৃত কার্ড, অ্যাকাউন্ট বা অন্যান্য পেমেন্ট মাধ্যম
                    ক্রেতার নিজস্ব হতে হবে অথবা তা ব্যবহারের যথাযথ অনুমতি থাকতে হবে।
                    নিজের অ্যাকাউন্টের লগইন তথ্য ও নিরাপত্তা বজায় রাখার দায়িত্ব সম্পূর্ণভাবে
                    ক্রেতার।
                </p>

                <h3 class="font-size-18 mb-2">
                    মেধাস্বত্ব (Intellectual Property)
                </h3>

                <p class="mb-0">
                    SUNNAH A to Z-এর ওয়েবসাইটের লোগো, ব্র্যান্ডিং, ডিজাইন, ছবি, লেখা এবং
                    অন্যান্য কনটেন্ট আমাদের সুরক্ষিত মেধাস্বত্ব বা অনুমোদিত সম্পত্তি।
                    পূর্বানুমতি ছাড়া এসব কনটেন্ট ব্যবহার, কপি বা স্বয়ংক্রিয়ভাবে তথ্য সংগ্রহ
                    (Bot/Scraping) করা কঠোরভাবে নিষিদ্ধ।
                </p>

            </div>


            <!-- 2. Return & Refund -->
            <div class="mb-10">

                <h2 class="font-size-25 mb-4">
                    2. রিটার্ন ও রিফান্ড পলিসি
                    <span class="text-primary">(Return &amp; Refund Policy)</span>
                </h2>

                <h3 class="font-size-18 mb-2">
                    সময়সীমা (Timeframe)
                </h3>

                <p>
                    পণ্য হাতে পাওয়ার তারিখ থেকে সর্বোচ্চ <strong>৩ দিনের মধ্যে</strong>
                    রিটার্ন বা পরিবর্তনের (Exchange) জন্য আবেদন করতে হবে।
                    সম্ভব হলে ডেলিভারি প্রতিনিধির উপস্থিতিতে পণ্যটি যাচাই করে নেওয়ার
                    জন্য ক্রেতাকে পরামর্শ দেওয়া হচ্ছে।
                </p>

                <h3 class="font-size-18 mb-2">
                    গ্রহণযোগ্য কারণ (Valid Reasons)
                </h3>

                <p>
                    ভুল, ত্রুটিপূর্ণ, ভাঙা/ক্ষতিগ্রস্ত অথবা মেয়াদোত্তীর্ণ পণ্য সরবরাহ করা হলে
                    রিটার্ন বা পরিবর্তনের আবেদন করা যাবে।
                </p>

                <h3 class="font-size-18 mb-2">
                    যেসব পণ্য রিটার্নযোগ্য নয় (Non-Returnable Items)
                </h3>

                <ul class="pl-5">
                    <li>ব্যবহৃত সুগন্ধি বা পারফিউম</li>
                    <li>খোলা মধু বা অন্যান্য খাদ্যপণ্য</li>
                    <li>ব্যবহৃত সুন্নতী পোশাক</li>
                    <li>কাস্টমাইজড পণ্য</li>
                </ul>

                <h3 class="font-size-18 mb-2">
                    রিটার্নের শর্ত (Return Conditions)
                </h3>

                <p>
                    রিটার্নের জন্য পণ্যটি অবশ্যই অক্ষত অবস্থায় থাকতে হবে এবং মূল প্যাকেজিং ও
                    ট্যাগ অক্ষুণ্ণ থাকতে হবে। রিটার্নের সময় পণ্যের ইনভয়েস বা ক্যাশমেমো
                    সঙ্গে প্রদান করতে হবে।
                </p>

                <h3 class="font-size-18 mb-2">
                    টাকা ফেরত (Refund)
                </h3>

                <p>
                    কোনো পণ্য স্টকে না থাকায় অর্ডার বাতিল হলে, প্রযোজ্য ক্ষেত্রে প্রদত্ত
                    অর্থ <strong>৩ থেকে ১০ কার্যদিবসের মধ্যে</strong> রিফান্ড করা হবে।
                </p>

                <h3 class="font-size-18 mb-2">
                    শিপিং / কুরিয়ার চার্জ
                </h3>

                <p class="mb-0">
                    SUNNAH A to Z-এর ভুলের কারণে ত্রুটিপূর্ণ, ভুল বা ক্ষতিগ্রস্ত পণ্য সরবরাহ
                    করা হলে প্রযোজ্য রিটার্ন বা রিপ্লেসমেন্টের কুরিয়ার খরচ আমরা বহন করব।
                    তবে ক্রেতার ব্যক্তিগত পছন্দ পরিবর্তন বা ভুল অর্ডারের কারণে পণ্য পরিবর্তন
                    বা রিটার্ন করতে চাইলে উভয় দিকের প্রযোজ্য কুরিয়ার চার্জ ক্রেতাকে বহন করতে হবে।
                </p>

            </div>


            <!-- 3. Liability & Complaints -->
            <div class="mb-10">

                <h2 class="font-size-25 mb-4">
                    3. দায়বদ্ধতার সীমা ও অভিযোগ
                    <span class="text-primary">(Limitation of Liability &amp; Complaints)</span>
                </h2>

                <p>
                    ক্রেতার দেওয়া ভুল বা অসম্পূর্ণ তথ্য অথবা তৃতীয় পক্ষের
                    (যেমন: কুরিয়ার সার্ভিস বা পেমেন্ট গেটওয়ে) সেবা-সংক্রান্ত সমস্যা বা
                    ব্যর্থতার কারণে সৃষ্ট ক্ষতি, বিলম্ব বা জটিলতার জন্য SUNNAH A to Z
                    দায়ী থাকবে না।
                </p>

                <p>
                    যেকোনো অনাকাঙ্ক্ষিত পরিস্থিতিতে, প্রযোজ্য আইন দ্বারা অন্যথা নির্ধারিত
                    না হলে, SUNNAH A to Z-এর সর্বোচ্চ দায়বদ্ধতা সংশ্লিষ্ট অর্ডারের
                    মোট মূল্যের মধ্যে সীমাবদ্ধ থাকবে।
                </p>

                <h3 class="font-size-18 mb-2">
                    অভিযোগ নিষ্পত্তি (Complaints)
                </h3>

                <p>
                    যেকোনো অভিযোগ বা সমস্যা সাধারণত <strong>৩ থেকে ৭ কার্যদিবসের মধ্যে</strong>
                    পর্যালোচনা ও সমাধানের জন্য প্রয়োজনীয় পদক্ষেপ নেওয়া হবে।
                </p>

            </div>


            <!-- Contact -->
            <div class="mb-10">

                <h2 class="font-size-25 mb-4">
                    যোগাযোগ করুন (Contact Us)
                </h2>

                <div class="bg-gray-13 p-4">

                    <p class="mb-2">
                        <strong>Email:</strong>
                        <a href="mailto:support@sunnahatoz.com">
                            support@sunnahatoz.com
                        </a>
                    </p>

                    <p class="mb-2">
                        <strong>Hotline / WhatsApp:</strong>
                        <a href="tel:+8801577445578">
                            015 77 44 55 78
                        </a>
                    </p>

                    <p class="mb-0">
                        <strong>Office Address:</strong>
                        পশ্চিম নন্দিপাড়া, খিলগাঁও, ঢাকা-১২১৯, বাংলাদেশ।
                    </p>

                </div>

            </div>


            <!-- English Version -->
            <div class="border-top pt-10 mb-10">

                <h2 class="font-size-25 mb-4">
                    SUNNAH A to Z — Terms &amp; Conditions and Return Policy
                </h2>

                <p>
                    By accessing, browsing, or using our website or platform, or by placing an
                    order with SUNNAH A to Z, you acknowledge that you have read, understood,
                    and agreed to the following Terms &amp; Conditions and Return Policy.
                </p>


                <h3 class="font-size-18 mb-2">
                    1. General Terms &amp; Conditions
                </h3>

                <h4 class="font-size-16 mb-2">Personal Use</h4>
                <p>
                    All products purchased from the SUNNAH A to Z website are intended for
                    personal use only. Commercial resale of our products without prior
                    authorization is strictly prohibited.
                </p>

                <h4 class="font-size-16 mb-2">Accurate Information</h4>
                <p>
                    Customers must provide accurate and complete information when placing an
                    order, including their name, delivery address, and active mobile number.
                    SUNNAH A to Z shall not be responsible for delivery delays, failed deliveries,
                    or related complications resulting from incorrect or incomplete information.
                </p>

                <h4 class="font-size-16 mb-2">Order Confirmation</h4>
                <p>
                    Orders are finalized and confirmed based on product availability, delivery
                    capacity, and other relevant considerations. SUNNAH A to Z reserves the
                    right to cancel any order due to unavoidable circumstances, stock shortages,
                    or other reasonable causes.
                </p>

                <h4 class="font-size-16 mb-2">Account &amp; Payment</h4>
                <p>
                    Any card, account, or other payment method used for a purchase must belong
                    to the customer or be used with proper authorization. Customers are solely
                    responsible for maintaining the confidentiality and security of their
                    account and login information.
                </p>

                <h4 class="font-size-16 mb-2">Intellectual Property</h4>
                <p>
                    All logos, branding, designs, images, text, and other content available on
                    the SUNNAH A to Z website are protected intellectual property or authorized
                    property of SUNNAH A to Z. Unauthorized use, copying, or automated data
                    collection, including bots or scraping, is strictly prohibited.
                </p>


                <h3 class="font-size-18 mb-2 mt-6">
                    2. Return &amp; Refund Policy
                </h3>

                <h4 class="font-size-16 mb-2">Timeframe</h4>
                <p>
                    Return or exchange requests must be submitted within
                    <strong>3 days of receiving the product</strong>. Customers are encouraged
                    to inspect the product in the presence of the delivery representative
                    whenever possible.
                </p>

                <h4 class="font-size-16 mb-2">Valid Reasons</h4>
                <p>
                    Returns or exchanges are accepted for products that are wrong, defective,
                    broken/damaged, or expired upon delivery.
                </p>

                <h4 class="font-size-16 mb-2">Non-Returnable Items</h4>

                <ul class="pl-5">
                    <li>Used perfumes or fragrances</li>
                    <li>Opened honey or other food products</li>
                    <li>Used Sunnah apparel</li>
                    <li>Customized products</li>
                </ul>

                <h4 class="font-size-16 mb-2">Return Conditions</h4>
                <p>
                    Returned products must remain in their original and undamaged condition,
                    with the original packaging and tags intact. The invoice or cash memo
                    must also be provided with the returned product.
                </p>

                <h4 class="font-size-16 mb-2">Refunds</h4>
                <p>
                    If an order is cancelled because the product is out of stock, the applicable
                    refund will be processed within <strong>3 to 10 business days</strong>.
                </p>

                <h4 class="font-size-16 mb-2">Shipping / Courier Charges</h4>
                <p>
                    If a return or replacement is required due to an error on the part of
                    SUNNAH A to Z, we will bear the applicable courier charges. However,
                    if a customer requests an exchange or return due to a change of preference
                    or an incorrect order, the customer will be responsible for the applicable
                    courier charges for both directions.
                </p>


                <h3 class="font-size-18 mb-2 mt-6">
                    3. Limitation of Liability &amp; Complaints
                </h3>

                <p>
                    SUNNAH A to Z shall not be held responsible for losses, delays, or issues
                    caused by incorrect or incomplete information provided by the customer or
                    by third-party service providers such as courier services and payment gateways.
                </p>

                <p>
                    In any unforeseen circumstance, and to the extent permitted by applicable
                    law, the maximum liability of SUNNAH A to Z shall be limited to the total
                    value of the relevant order.
                </p>

                <h4 class="font-size-16 mb-2">Complaints</h4>

                <p>
                    Complaints are generally reviewed and appropriate action is taken within
                    <strong>3 to 7 business days</strong>.
                </p>

            </div>


            <!-- English Contact -->
            <div class="bg-gray-13 p-4 mb-10">

                <p class="mb-2">
                    <strong>Email:</strong>
                    <a href="mailto:support@sunnahatoz.com">
                        support@sunnahatoz.com
                    </a>
                </p>

                <p class="mb-2">
                    <strong>Hotline / WhatsApp:</strong>
                    <a href="tel:+8801577445578">
                        015 77 44 55 78
                    </a>
                </p>

                <p class="mb-0">
                    <strong>Office Address:</strong>
                    West Nandipara, Khilgaon, Dhaka-1219, Bangladesh.
                </p>

            </div>

        </div>
    </div>

@endsection