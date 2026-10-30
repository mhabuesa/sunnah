@extends('frontend.layouts.app')
@section('title', 'Zakat Calculator')

@push('header_script')
    <style>
        .zakat-wrapper {
            background: #f7faf8;
            padding: 30px 0 50px;
        }

        .zakat-header {
            background: linear-gradient(135deg, #164e3b, #23694e);
            color: #fff;
            padding: 35px 25px;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .zakat-header h2 {
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .zakat-header p {
            margin: 0;
            color: #e1eee7;
            font-size: 20px;
        }

        .zakat-card {
            background: #fff;
            border: 1px solid #e8eee9;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 20px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .035);
        }

        .zakat-section-title {
            color: #164e3b;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .zakat-section-title i {
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #edf5f0;
            color: #164e3b;
            border-radius: 8px;
        }

        .zakat-field {
            margin-bottom: 18px;
        }

        .zakat-field label {
            display: block;
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }

        .zakat-field .form-control {
            height: 45px;
            border: 1px solid #e1e8e3;
            border-radius: 8px;
            box-shadow: none;
        }

        .zakat-field .form-control:focus {
            border-color: #164e3b;
            box-shadow: 0 0 0 3px rgba(22, 78, 59, .08);
        }

        .zakat-field .input-group-text {
            background: #f4f8f5;
            border-color: #e1e8e3;
            color: #164e3b;
            font-weight: 600;
        }

        .zakat-note {
            color: #888;
            margin-top: 6px;
        }

        .zakat-result {
            background: #fff;
            border: 1px solid #e8eee9;
            border-radius: 12px;
            padding: 22px;
            position: sticky;
            top: 20px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .035);
        }

        .zakat-result-title {
            color: #164e3b;
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .zakat-result-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 13px 0;
            border-bottom: 1px solid #edf0ed;
        }

        .zakat-result-row span:first-child {
            color: #666;
        }

        .zakat-result-row strong {
            color: #333;
            text-align: right;
        }

        .zakat-payable {
            background: #edf6f0;
            border-radius: 10px;
            padding: 18px;
            margin-top: 20px;
            text-align: center;
        }

        .zakat-payable p {
            color: #47745b;
            margin-bottom: 8px;
        }

        .zakat-payable h3 {
            color: #164e3b;
            font-size: 30px;
            font-weight: 700;
            margin: 0;
        }

        .zakat-calculate-btn {
            background: #164e3b;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: 600;
            width: 100%;
            margin-top: 18px;
        }

        .zakat-calculate-btn:hover {
            background: #0d382a;
            color: #fff;
        }

        .zakat-info {
            background: #fff9e9;
            border: 1px solid #f3e6bd;
            border-radius: 10px;
            padding: 15px;
            color: #78612b;
            line-height: 1.8;
            margin-top: 20px;
        }

        #donateNowBtn {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 999;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 13px;
            background: #164e3b;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            border-radius: 10px 0 0 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
            writing-mode: vertical-rl;
            animation: donatePulse 2s infinite;
        }

        #donateNowBtn:hover {
            background: #0d382a;
            color: #fff;
        }

        #donateNowBtn i {
            transform: rotate(90deg);
        }

        @keyframes donatePulse {

            0%,
            100% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
            }

            50% {
                box-shadow: 0 4px 22px rgba(22, 78, 59, .55);
            }
        }

        @media(max-width:767px) {
            .zakat-wrapper {
                padding: 20px 0 35px;
            }

            .zakat-header {
                padding: 25px 18px;
            }

            .zakat-header h2 {
                font-size: 22px;
            }

            .zakat-card,
            .zakat-result {
                padding: 17px;
            }

            .zakat-result {
                position: static;
            }

            #donateNowBtn {
                padding: 12px 10px;
            }
        }

        /* Clean Zakat Amount Input */
        .zakat-field .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .zakat-field .input-group-text {
            position: absolute;
            right: 12px;
            z-index: 5;
            border: none;
            background: transparent;
            color: #164e3b;
            font-weight: 600;
            padding: 0;
            pointer-events: none;
        }

        .zakat-field .form-control {
            height: 48px;
            border: 1px solid #e1e8e3;
            border-radius: 8px !important;
            padding: 10px 42px 10px 14px;
            background: #fff;
            color: #333;
            box-shadow: none;
        }

        .zakat-field .form-control:focus {
            border-color: #164e3b;
            box-shadow: 0 0 0 3px rgba(22, 78, 59, .08);
        }

        .zakat-field .form-control::placeholder {
            color: #b0b8b2;
            font-size: 16px;
        }
    </style>
@endpush

@section('content')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3 d-flex justify-content-between align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 mt-3 flex-nowrap overflow-auto">
                        <li class="breadcrumb-item flex-shrink-0">
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0">
                            <a href="{{ route('charity.index') }}">ছ্বদাকাহ ও চ্যারিটি</a>
                        </li>
                        <li class="breadcrumb-item active flex-shrink-0" aria-current="page">
                            যাকাত ক্যালকুলেটর
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="zakat-wrapper">
        <div class="container">

            {{-- Page Header --}}
            <div class="zakat-header text-center">
                <h2>যাকাত ক্যালকুলেটর</h2>
                <p>আপনার সম্পদের হিসাব করুন এবং সহজেই জেনে নিন প্রদেয় যাকাতের পরিমাণ।</p>
            </div>

            <div class="row">

                {{-- Calculator Form --}}
                <div class="col-lg-8">

                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-gem"></i>
                            সোনা, রূপা ও অলঙ্কার
                        </h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>সোনা, রূপার গহনা, বার বা গিনি কয়েন</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control zakat-asset"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">বর্তমান বাজার মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>সোনা/রূপা/মূল্যবান পাথর/হিরক বা মণিমুক্তা মিশ্রিত অলঙ্কার</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control zakat-asset"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">শুধুমাত্র সোনা বা রূপার মূল্য</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-building"></i>
                            জমি, বাড়ি ও যানবাহন
                        </h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>ব্যবসার জন্য ক্রয়কৃত খালি প্লট</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control zakat-asset"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">বর্তমান বাজার মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>নিজ ব্যবহার্যের অতিরিক্ত বাড়ি/ফ্ল্যাট</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control zakat-asset"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">রক্ষণাবেক্ষণ খরচ বাদে বাৎসরিক আয় (যদি সঞ্চিত থাকে)</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>ব্যবসায় ব্যবহৃত যানবাহন (রিক্সা, ট্যাক্সি, লরি, সিএনজি, গাড়ি, বাস-ট্রাক,
                                        ট্রলার, লঞ্চ, নৌকা ইত্যাদি)</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control zakat-asset"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">রক্ষণাবেক্ষণ খরচ বাদে বাৎসরিক আয় (যদি সঞ্চিত থাকে)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-piggy-bank"></i>
                            সঞ্চয় ও আর্থিক সম্পদ
                        </h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>সাবালকের বিভিন্ন সঞ্চয় বা যাকাতযোগ্য সম্পদ</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control zakat-asset"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">সব সম্পদের সর্বমোট মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>প্রাইজবন্ড</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control zakat-asset"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">সবগুলোর বর্তমান মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>ব্যক্তিগত বা পোষ্যের নামের বীমা</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">বীমায় জমাকৃত মোট প্রিমিয়াম</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>নিজ বা পোষ্যের ডিপিএস বা এ ধরনের যেকোনো সঞ্চয়</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">জমাকৃত মোট অর্থ</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>বিভিন্ন ধরনের সঞ্চয়পত্র</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">সবগুলো সঞ্চয়পত্রের ক্রয় মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>বন্ড (ব্যাংক বা অর্থলগ্নী প্রতিষ্ঠানের বিভিন্ন নামের বন্ড)</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">সবগুলো বন্ডের ক্রয়কৃত মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>বিভিন্ন মেয়াদী আমানত</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">জমাকৃত মোট অর্থ</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>প্রভিডেন্ট ফান্ডে জমাকৃত মূল টাকা</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">প্রভিডেন্ট ফান্ডে জমাকৃত মূল টাকা যখন থেকে নিসাব পরিমাণ হবে তখন
                                        থেকে যাকাত গণনা করতে হবে। এরপর পূর্ণ ১ বছর হলে নিসাব থাকলে তার যাকাত দিতে হবে।</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-chart-line"></i>
                            শেয়ার ও যৌথ মালিকানা
                        </h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>সিডিবিএল বা স্টক এক্সচেঞ্জে তালিকাভুক্ত/অতালিকাভুক্ত শেয়ার</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">শেয়ার ক্রয় করা হয়েছে কম মূল্যে, যাকাত প্রদানের সময় শেয়ারের
                                        মূল্য বেশি হলে ক্রয়মূল্যে যাকাত দিতে হবে। আবার শেয়ার ক্রয় করা হয়েছে বেশি মূল্যে,
                                        যাকাত প্রদানের সময়কার মূল্য কম হলে বর্তমান মূল্য ধরতে হবে।</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>অংশীদারি বা যৌথ মালিকানার যাকাতযোগ্য সম্পদ</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">যৌথভাবে যাকাত আদায় না হলে নিজ অংশের বর্তমান বাজার মূল্য</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-globe-asia"></i>
                            বিদেশের সম্পদ ও নগদ অর্থ
                        </h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>বিদেশের সকল যাকাতযোগ্য সম্পদ (যদি থাকে)</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">বর্তমান সম্পদের মূল্য (বাংলাদেশি টাকায়)</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>ক্যাশের/হাতের বা সঞ্চিত নগদ অর্থ</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">মোট অর্থের পরিমাণ</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>সেভিংস (সঞ্চয়ী) অ্যাকাউন্ট</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">নির্দিষ্ট তারিখের ব্যালেন্স</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>কারেন্ট (চলতি) অ্যাকাউন্ট</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">নির্দিষ্ট তারিখের ব্যালেন্স</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-store"></i>
                            ব্যবসায়িক পণ্য ও পশুসম্পদ
                        </h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>কারখানায় ব্যবসায়িক উদ্দেশ্যে ব্যবহারের জন্য ক্রয়কৃত কাঁচামাল/প্রস্তুতকৃত
                                        পণ্য/ব্যবসায়িক মজুদ</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">ক্রয়কৃত মালের মূল্য / কোম্পানির নির্ধারিত বিক্রয় মূল্য / মজুদ
                                        মালের মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>পোল্ট্রি ফার্মের ব্রয়লার বড় করে বিক্রির জন্য পালিত হলে</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">ফার্মের হাঁস-মুরগির বর্তমান মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>ব্যবসার জন্য পালিত গরু/মহিষ/ছাগল/ভেড়া/ঘোড়া/উট/দুম্বা</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">সব পশুর বর্তমান বাজার মূল্য</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>ব্যবসায়িক উদ্দেশ্যে চাষকৃত মাছ</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">বিক্রয় মূল্য (যদি সঞ্চিত থাকে)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-hand-holding-usd"></i>
                            ঋণ ও অগ্রিম যাকাত
                        </h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>চন্দ্র বৎসরের অগ্রিম যাকাত প্রদান করলে</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any" class="form-control"
                                            placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">অগ্রিম যাকাতের পরিমাণ</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>প্রদানকৃত ঋণের অর্থ বা ধার দেওয়া টাকা</label>
                                    <div class="input-group">
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-asset" placeholder="টাকার পরিমাণ লিখুন">
                                        <span class="input-group-text">৳</span>
                                    </div>
                                    <div class="zakat-note">প্রদানকৃত ঋণ বা ধার দেওয়া টাকা ফেরত পাওয়া সুনিশ্চিত তার মোট
                                        পরিমাণ</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Liabilities --}}
                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-file-invoice-dollar"></i>
                            ঋণ ও অন্যান্য দায়
                        </h4>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>পরিশোধযোগ্য ঋণ</label>
                                    <div class="input-group">
                                        <span class="input-group-text">৳</span>
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-liability" name="loan" placeholder="0.00">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="zakat-field">
                                    <label>বকেয়া বিল ও অন্যান্য দায়</label>
                                    <div class="input-group">
                                        <span class="input-group-text">৳</span>
                                        <input type="number" min="0" step="any"
                                            class="form-control zakat-liability" name="other_liabilities"
                                            placeholder="0.00">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Nisab --}}
                    <div class="zakat-card">
                        <h4 class="zakat-section-title">
                            <i class="fas fa-balance-scale"></i>
                            নিসাবের পরিমাণ
                        </h4>

                        <div class="zakat-field mb-0">
                            <label>বর্তমান নিসাবের মূল্য (টাকা)</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" min="0" step="any" id="nisabAmount"
                                    class="form-control" placeholder="বর্তমান নিসাবের মূল্য লিখুন">
                            </div>
                            <div class="zakat-note">
                                নির্ভরযোগ্য বর্তমান বাজারদর অনুযায়ী স্বর্ণ বা রৌপ্যের নিসাবের মূল্য লিখুন।
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Result --}}
                <div class="col-lg-4">
                    <div class="zakat-result">

                        <h4 class="zakat-result-title">
                            <i class="fas fa-calculator mr-2"></i>
                            যাকাতের হিসাব
                        </h4>

                        <div class="zakat-result-row">
                            <span>মোট সম্পদ</span>
                            <strong id="totalAssets">৳ ০</strong>
                        </div>

                        <div class="zakat-result-row">
                            <span>মোট দায়</span>
                            <strong id="totalLiabilities">৳ ০</strong>
                        </div>

                        <div class="zakat-result-row">
                            <span>নিট সম্পদ</span>
                            <strong id="netAssets">৳ ০</strong>
                        </div>

                        <div class="zakat-result-row">
                            <span>নিসাবের পরিমাণ</span>
                            <strong id="nisabDisplay">৳ ০</strong>
                        </div>

                        <div class="zakat-payable">
                            <p>আপনার প্রদেয় যাকাত</p>
                            <h3 id="zakatPayable">৳ ০</h3>
                        </div>

                        <button type="button" class="zakat-calculate-btn" id="resetCalculator">
                            <i class="fas fa-redo-alt mr-2"></i>
                            নতুন করে হিসাব করুন
                        </button>

                        <div class="zakat-info" id="zakatMessage">
                            আপনার সম্পদের পরিমাণ লিখুন এবং নিসাবের মূল্য নির্ধারণ করুন। যাকাতের হিসাব এখানে দেখা যাবে।
                        </div>

                    </div>
                </div>

            </div>

            <div class="zakat-info">
                <strong>বিশেষ দ্রষ্টব্য:</strong>
                এই ক্যালকুলেটরটি প্রাথমিক হিসাবের সহায়ক। সম্পদের ধরন, ঋণের মেয়াদ, পাওনা টাকার অবস্থা,
                স্বর্ণ-রূপার ব্যবহার এবং অন্যান্য শরিয়াহসংক্রান্ত বিষয়ে সঠিক সিদ্ধান্তের জন্য
                অভিজ্ঞ আলেমের পরামর্শ নিন।
            </div>

        </div>
    </div>

    <a href="{{ route('charity.index') }}" id="donateNowBtn">
        <i class="fas fa-hand-holding-heart"></i>
        <span>দান করুন</span>
    </a>

@endsection

@push('footer_script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const assetInputs = document.querySelectorAll('.zakat-asset');
            const liabilityInputs = document.querySelectorAll('.zakat-liability');
            const nisabInput = document.getElementById('nisabAmount');

            const formatMoney = (amount) => {
                return '৳ ' + Number(amount).toLocaleString('en-BD', {
                    maximumFractionDigits: 2
                });
            };

            const getTotal = (inputs) => {
                let total = 0;

                inputs.forEach(input => {
                    total += Math.max(0, parseFloat(input.value) || 0);
                });

                return total;
            };

            function calculateZakat() {

                const totalAssets = getTotal(assetInputs);
                const totalLiabilities = getTotal(liabilityInputs);
                const nisab = Math.max(0, parseFloat(nisabInput.value) || 0);

                const netAssets = Math.max(0, totalAssets - totalLiabilities);

                let zakat = 0;
                let message = '';

                if (nisab <= 0) {
                    message = 'যাকাতের হিসাব পেতে বর্তমান নিসাবের মূল্য লিখুন।';
                } else if (netAssets >= nisab) {
                    zakat = netAssets * 0.025;
                    message =
                        'আলহামদুলিল্লাহ! আপনার নিট সম্পদ নিসাবের সমান বা বেশি। প্রদেয় যাকাতের পরিমাণ নিচে দেখানো হয়েছে।';
                } else {
                    message =
                        'আপনার নিট সম্পদ বর্তমানে নির্ধারিত নিসাবের নিচে। এই হিসাব অনুযায়ী যাকাত প্রযোজ্য হচ্ছে না।';
                }

                document.getElementById('totalAssets').textContent = formatMoney(totalAssets);
                document.getElementById('totalLiabilities').textContent = formatMoney(totalLiabilities);
                document.getElementById('netAssets').textContent = formatMoney(netAssets);
                document.getElementById('nisabDisplay').textContent = formatMoney(nisab);
                document.getElementById('zakatPayable').textContent = formatMoney(zakat);
                document.getElementById('zakatMessage').textContent = message;
            }

            [...assetInputs, ...liabilityInputs, nisabInput].forEach(input => {
                input.addEventListener('input', calculateZakat);
            });

            document.getElementById('resetCalculator').addEventListener('click', function() {

                [...assetInputs, ...liabilityInputs].forEach(input => {
                    input.value = '';
                });

                nisabInput.value = '';

                calculateZakat();
            });

            calculateZakat();
        });
    </script>
@endpush
