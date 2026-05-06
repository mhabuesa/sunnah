<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $campaign->campaign_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/css/glightbox.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <style>
        body {
            font-family: 'Hind Siliguri', sans-serif;
            scroll-behavior: smooth;
        }

        .mango-gradient {
            background: linear-gradient(135deg, #f59e0b 0%, #ea580c 100%);
        }

        .banner-bg {
            background: linear-gradient(180deg, #fb923c 0%, #ffffff 100%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
        }


        /* Styling to match your image exactly */
        .swiper-button-next,
        .swiper-button-prev {
            z-index: 50;
        }


        #orderBadge {
            transition: all 0.3s ease;
            opacity: 1;
            transform: scale(1);
        }

        #orderBadge.opacity-0 {
            opacity: 0;
            transform: scale(0);
            pointer-events: none;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50 text-slate-800">
    @php
        $words = explode(' ', $campaign->site_name);
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
    @endphp
    <section
        class="relative bg-gradient-to-r from-orange-500 to-orange-400 pt-12 pb-24 md:pt-20 md:pb-32 px-4 overflow-hidden">

        <div class="max-w-7xl mx-auto flex justify-between items-center mb-12 relative z-10">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center font-bold text-orange-500">
                    {{ $initials }}
                </div>
                <span class="text-white font-bold text-xl">{{ $campaign->site_name }}</span>
            </div>
            <div
                class="hidden md:flex bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30 items-center gap-2">
                <span class="text-yellow-300 text-sm">{{ $campaign->content['rating'] }}</span>
                <span
                    class="text-white text-xs">{{ $campaign->content['review'] ? $campaign->content['review'] . ' রিভিউ' : '' }}
                </span>
            </div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">

            <div class="text-white space-y-6">
                <div
                    class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                    <span
                        class="text-[10px] md:text-xs font-bold uppercase tracking-wider">{{ $campaign->content['subtitle'] }}</span>
                </div>

                <h1 class="text-4xl md:text-6xl font-black leading-[1.1]">
                    {{ $campaign->content['title'] }}
                </h1>

                <p class="text-orange-50/90 text-sm md:text-lg max-w-lg leading-relaxed">
                    {{ $campaign->content['shortText'] }}
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#checkout"
                        class="bg-white text-orange-600 px-8 py-4 rounded-2xl font-bold flex items-center gap-2 shadow-xl shadow-orange-700/20 hover:bg-orange-50 transition-all">
                        🛒 এখনই অর্ডার করুন
                    </a>
                    <a href="#fasility"
                        class="bg-white/10 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-2xl font-bold hover:bg-white/20 transition-all">
                        {{ $campaign->content['featureButton'] }}
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-4 pt-10 border-t border-white/20">
                    <div>
                        <h3 class="text-xl md:text-2xl font-black"> {{ $campaign->content['feature_1'] }}</h3>
                        <p class="text-xs text-orange-100">{{ $campaign->content['text_1'] }}</p>
                    </div>
                    <div>
                        <h3 class="text-xl md:text-2xl font-black"> {{ $campaign->content['feature_2'] }}</h3>
                        <p class="text-xs text-orange-100">{{ $campaign->content['text_2'] }}</p>
                    </div>
                    <div>
                        <h3 class="text-xl md:text-2xl font-black"> {{ $campaign->content['feature_3'] }}</h3>
                        <p class="text-xs text-orange-100">{{ $campaign->content['text_3'] }}</p>
                    </div>
                </div>

                <div
                    class="flex items-center gap-6 text-[10px] md:text-xs text-orange-100/80 uppercase font-bold tracking-widest pt-2">
                    <span>✓ মানি-ব্যাক গ্যারান্টি</span>
                    <span>✓ ক্যাশ অন ডেলিভারি</span>
                </div>
            </div>

            <div class="relative flex justify-center lg:justify-end">
                <div class="relative w-full max-w-md">
                    @php
                        $singleProduct = $products->first();
                    @endphp

                    <a href="#gallery">
                        <div class="rounded-[3rem] overflow-hidden shadow-2xl border-[10px] border-white/10">
                            <img src="{{ asset($singleProduct->image ?? '') }}" class="w-full h-full object-cover"
                                alt="Premium Mango">
                        </div>
                    </a>

                    <div
                        class="absolute -top-6 -right-6 md:-right-10 bg-green-600 text-white px-4 py-2 rounded-2xl shadow-xl flex items-center gap-2 border-4 border-white/20 animate-bounce">
                        <span class="text-lg">🚚</span>
                        <div class="leading-tight">
                            <p class="text-[10px] font-bold">দ্রুত</p>
                            <p class="text-xs font-black">ডেলিভারি</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full leading-[0]">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                <path
                    d="M0 60L48 55C96 50 192 40 288 45C384 50 480 70 576 75C672 80 768 70 864 60C960 50 1056 40 1152 40C1248 40 1344 50 1392 55L1440 60V120H1392C1344 120 1248 120 1152 120C1056 120 960 120 864 120C768 120 672 120 576 120C480 120 384 120 288 120C192 120 96 120 48 120H0V60Z"
                    fill="#FAF9F6" />
            </svg>
        </div>
    </section>

    <section id="fasility" class="py-20 bg-[#FAF9F6] px-4">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-orange-50 text-orange-600 px-4 py-1.5 rounded-full text-[10px] font-bold mb-4 border border-orange-100 uppercase tracking-wider">
                    ✨ কেন {{ $campaign->site_name }}?
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-4">
                    {{ $campaign->content['feature_title'] }}
                </h2>
                <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
                    {{ $campaign->content['feature_description'] }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($campaign->content['features'] as $feature)
                    <div
                        class="bg-white p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-orange-100 transition-all duration-300 group border border-gray-50">
                        <div
                            class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            {{ $feature['icon'] }}
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 mb-3"> {{ $feature['title'] }}</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            {{ $feature['description'] }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section id="gallery" class="py-20 bg-[#FAF9F6] overflow-hidden">
        <div class="container mx-auto px-4 max-w-6xl">

            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-4">
                    <span class="text-orange-500">{{ $campaign->content['gallery_title'] }}</span>
                </h2>
                <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
                    {{ $campaign->content['gallery_description'] }}
                </p>
            </div>

            <div class="relative px-10">
                <div class="swiper myMangoSwiper">
                    <div class="swiper-wrapper">

                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <a href="javascript:void(0);"
                                    class="glightbox group relative block overflow-hidden rounded-[2.5rem] h-[450px]">
                                    <img src="{{ asset($product->image) }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent">
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div
                    class="swiper-button-next !w-12 !h-12 bg-white !text-orange-500 rounded-full shadow-lg after:!text-sm border border-gray-100 hover:bg-orange-500 hover:!text-white transition-all -right-4">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div
                    class="swiper-button-prev !w-12 !h-12 bg-white !text-orange-500 rounded-full shadow-lg after:!text-sm border border-gray-100 hover:bg-orange-500 hover:!text-white transition-all -left-4">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white overflow-hidden px-4">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-orange-50 text-orange-600 px-4 py-1 rounded-full text-xs font-bold mb-4 border border-orange-100">
                    🍃 আমাদের প্রক্রিয়া
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-slate-800">
                    <span class="text-orange-500">{{ $campaign->content['processes_title'] }}</span>
                </h2>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                    {{ $campaign->content['processes_description'] }}
                </p>
            </div>

            <div class="flex flex-wrap items-center lg:gap-20">
                <div class="w-full lg:w-5/12 mb-12 lg:mb-0 relative">
                    <div class="relative z-10">
                        <img src="{{ asset($campaign->content['processes_main_image']) }}" alt="Mango Garden">

                        <div
                            class="absolute -top-4 -left-4 bg-white p-3 rounded-2xl shadow-xl flex items-center gap-2 border border-gray-50">
                            <span class="text-orange-500 text-2xl font-bold">৫+</span>
                            <span class="text-[10px] text-gray-500 font-bold leading-tight">বছরের <br> অভিজ্ঞতা</span>
                        </div>

                        <div
                            class="absolute -bottom-6 -right-6 w-48 bg-white p-3 rounded-3xl shadow-2xl border border-gray-50 hidden md:block transition-transform hover:scale-105">
                            <img src="{{ asset($campaign->content['processes_secondary_image']) }}"
                                class="rounded-2xl mb-2" alt="Packed Mango">
                            <div class="flex justify-between items-center px-1">
                                <span class="text-[10px] font-bold text-gray-400">Premium Pack</span>
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute -z-0 -bottom-10 -left-10 w-40 h-40 bg-orange-100 rounded-full blur-3xl opacity-60">
                    </div>
                </div>

                <div class="w-full lg:w-6/12 relative">
                    <div
                        class="absolute left-6 top-8 bottom-8 w-0.5 bg-gradient-to-b from-orange-500 via-orange-300 to-orange-100 hidden md:block">
                    </div>

                    <div class="space-y-10">
                        @foreach ($campaign->content['processes'] as $key => $process)
                            <div class="flex items-start gap-6 relative group">
                                <div
                                    class="w-12 h-12 bg-white shadow-lg shadow-orange-100 border border-orange-50 rounded-2xl flex items-center justify-center shrink-0 z-10 group-hover:bg-orange-500 group-hover:text-white transition-all duration-300">
                                    <span class="text-orange-500 group-hover:text-white">{{ $process['icon'] }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold text-orange-400 uppercase tracking-widest">Step
                                        0{{ $key + 1 }}</span>
                                    <h4 class="text-xl font-bold text-slate-800 mb-1">{{ $process['title'] }}</h4>
                                    <p class="text-gray-500 text-sm leading-relaxed">{{ $process['description'] }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-900 text-white">
        <div class="container mx-auto max-w-6xl px-6 text-center">
            <h2 class="text-3xl font-bold mb-12">৫০০০+ খুশি গ্রাহক আমাদের সাথে</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($campaign->content['testimonials'] as $testimonial)
                    <div class="bg-slate-800 p-8 rounded-3xl text-left">
                        <div class="text-yellow-400 mb-4">⭐⭐⭐⭐⭐</div>
                        <p class="italic text-gray-300">"{{ $testimonial['text'] }}"</p>
                        <p class="mt-4 font-bold text-orange-400">— {{ $testimonial['name'] }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50/50 px-4">
        <div class="max-w-4xl mx-auto">

            <div class="text-center mb-12">
                <div
                    class="inline-flex items-center gap-2 bg-orange-100 text-orange-600 px-4 py-1.5 rounded-full text-sm font-bold mb-4">
                    ❓ প্রশ্ন ও উত্তর
                </div>
                <h2 class="text-4xl font-bold text-slate-800 mb-4">
                    আপনার সকল <span class="text-orange-500">জিজ্ঞাসা</span>
                </h2>
            </div>

            <div class="space-y-4">
                @foreach ($campaign->content['faqs'] as $key => $faq)
                    <div
                        class="faq-item bg-white {{ $key == 0 ? 'border-2' : '' }} border-orange-400 rounded-[2rem] overflow-hidden transition-all duration-300">
                        <button onclick="toggleFaq(this)"
                            class="w-full flex items-center justify-between p-6 md:px-8 text-left bg-orange-50/50">
                            <span class="text-lg md:text-xl font-bold text-slate-800">{{ $faq['question'] }}</span>
                            <span
                                class="icon w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center rotate-180 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <div class="content {{ $key == 0 ? 'block' : 'hidden' }} px-6 md:px-8 pb-6 pt-2">
                            <p class="text-gray-600">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <section id="checkout" class="py-16 bg-orange-500 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-2 bg-white/20 text-white px-4 py-1 rounded-full text-sm mb-4">
                    🛒 অর্ডার করুন আজই
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $campaign->content['cart_title'] }}
                </h2>
                <p class="text-orange-100 text-sm md:text-base">{{ $campaign->content['cart_description'] }}</p>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12">

                <div class="lg:col-span-7 p-6 md:p-10 border-r border-gray-100">
                    <div class="flex items-center gap-3 mb-8">
                        <span
                            class="w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold">১</span>
                        <h3 class="text-xl font-bold text-gray-800">প্রোডাক্ট নির্বাচন করুন</h3>
                        <span class="text-xs text-gray-400 font-medium">(একাধিক প্রোডাক্ট যোগ করতে পারবেন)</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($products as $key => $product)
                            <div class="border border-gray-100 rounded-3xl p-4 hover:shadow-md transition-shadow">
                                <img src="{{ asset($product->image) }}"
                                    class="w-full h-40 object-cover rounded-2xl mb-4" alt="Mango">
                                <h4 class="font-bold text-gray-800">{{ $product->name }}</h4>
                                <p class="text-xs text-gray-500 mb-3">{{ $product->size }} • {{ $product->info }}</p>
                                <div class="flex items-center gap-2 mb-4">
                                    <span
                                        class="text-orange-600 font-bold text-lg bn-number">৳{{ $product->price }}</span>
                                    @if ($product->old_price)
                                        <span
                                            class="text-gray-400 line-through text-xs bn-number">৳১{{ $product->old_price }}</span>
                                    @endif
                                </div>
                                <button
                                    onclick="addToCart({{ $product->id }},'{{ $product->name }} • ({{ $product->size }})', {{ $product->price }})"
                                    class="w-full py-2.5 rounded-xl bg-gradient-to-r from-orange-400 to-amber-500 text-white font-bold text-sm flex items-center justify-center gap-2 hover:opacity-90 transition-all">
                                    <span>+</span> কার্ট যোগ করুন
                                </button>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="lg:col-span-5 bg-orange-50/50 p-6 md:p-10">

                    <div class="mb-10">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-bold text-gray-800 flex items-center gap-2">
                                🛒 আপনার কার্ট
                            </h4>
                            <span id="cart-count-badge"
                                class="w-6 h-6 bg-orange-500 text-white text-xs rounded-full flex items-center justify-center font-bold">0</span>
                        </div>
                        <div
                            class="bg-white rounded-3xl p-6 border border-orange-100 min-h-[120px] flex flex-col justify-center shadow-sm">
                            <div id="cart-items-list" class="space-y-3">
                                <div id="empty-cart-msg" class="text-center py-4">
                                    <div
                                        class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-2">
                                        🛒</div>
                                    <p class="text-gray-400 text-xs">বাম পাশ থেকে প্রোডাক্ট যোগ করুন</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <span
                                class="w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center font-bold">২</span>
                            <h3 class="text-xl font-bold text-gray-800">আপনার তথ্য দিন</h3>
                        </div>

                        <form class="space-y-4" action="{{ route('campaign.order') }}" method="POST">
                            @csrf
                            <div>
                                <label class="text-xs font-semibold text-gray-500 mb-1 block ml-2">আপনার নাম *</label>
                                <input type="text" placeholder="যেমন: রহীম"
                                    class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-100 outline-none transition-all text-sm"
                                    name="name" required value="{{ old('name') }}">
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-500 mb-1 block ml-2">মোবাইল নম্বর
                                    *</label>
                                <input type="tel" placeholder="01XXXXXXXXX"
                                    class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-100 outline-none transition-all text-sm"
                                    name="phone" required value="{{ old('phone') }}">
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-500 mb-1 block ml-2">সম্পূর্ণ ঠিকানা
                                    *</label>
                                <textarea name="address" rows="3" placeholder="বাসা, রোড, এলাকা, জেলা"
                                    class="w-full px-5 py-3 rounded-2xl border 
                                        @error('address') border-red-400 focus:border-red-500 focus:ring-red-100 
                                        @else border-gray-200 focus:border-orange-500 focus:ring-orange-100 @enderror 
                                        outline-none transition-all text-sm"
                                    required>{{ old('address') }}</textarea>
                            </div>

                            <input type="hidden" name="cart_data" id="cart_data">

                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full py-4 bg-gradient-to-r from-orange-500 to-amber-600 text-white font-bold rounded-2xl shadow-xl shadow-orange-200 hover:shadow-orange-300 transition-all flex items-center justify-center gap-2 text-lg">
                                    🛒 অর্ডার কনফার্ম করুন
                                </button>
                            </div>
                        </form>

                        <div
                            class="mt-6 flex items-center justify-center gap-4 text-[10px] font-bold text-gray-400 uppercase">
                            <span class="flex items-center gap-1">🚚 ক্যাশ অন ডেলিভারি</span>
                            <span class="flex items-center gap-1">🔒 ১০০% নিরাপদ</span>
                        </div>

                        <div
                            class="mt-8 pt-6 border-t border-orange-100 flex flex-wrap justify-between items-center gap-4">

                            <!-- WhatsApp -->
                            <a href="https://wa.me/8801700000000" target="_blank"
                                class="flex items-center gap-2 hover:opacity-80 transition">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    📞
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase leading-none">WhatsApp করুন
                                    </p>
                                    <p class="text-sm font-bold text-gray-700">+৮৮০ ১৭০০-০০০০০০</p>
                                </div>
                            </a>

                            <!-- Address -->
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">📍</div>
                                <p class="text-xs font-bold text-gray-500">রংপুর, বাংলাদেশ</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 py-12 text-center text-gray-400 border-t border-slate-800">
        <div class="container mx-auto px-6">
            <h2 class="text-white text-2xl font-bold mb-4">আমার আম ঘর</h2>
            <div class="flex justify-center gap-6 mb-8 text-white">
                <a href="#"
                    class="hover:text-orange-500 transition-colors underline decoration-orange-500">Facebook</a>
                <a href="#"
                    class="hover:text-orange-500 transition-colors underline decoration-orange-500">WhatsApp</a>
            </div>
            <p class="text-sm">© 2026 Amar Am Ghor. All Rights Reserved. <br> Developed with ❤️ by Abu Esa.</p>
        </div>
    </footer>

    <!-- Floating Order Badge Button -->
    <button id="orderBadge" onclick="scrollToCheckout()"
        class="fixed bottom-6 right-6 z-50 bg-green-600 text-white px-5 py-3 rounded-full shadow-2xl flex items-center gap-2 animate-bounce">
        <span class="font-bold">অর্ডার করুন</span>

        <span class="ml-2 bg-white text-orange-600 text-xs font-bold px-2 py-1 rounded-full animate-pulse">
            Checkout
        </span>
    </button>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/js/glightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        // Initialize Swiper (Left-Right Slider)
        const swiper = new Swiper(".myMangoSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            },
        });

        // Initialize GLightbox (Zooming Image)
        // const lightbox = GLightbox({
        //     selector: '.glightbox',
        //     touchNavigation: true,
        //     loop: true,
        // });
    </script>

    <script>
        // ==============================
        // NOTYF SETUP
        // ==============================
        const notyf = new Notyf({
            duration: 2000,
            position: {
                x: 'right',
                y: 'top'
            }
        });

        function toast(msg, type = 'success') {
            if (type === 'error') {
                notyf.error(msg);
            } else {
                notyf.success(msg);
            }
        }

        // ==============================
        // CART COOKIE
        // ==============================
        function saveCart() {
            const d = new Date();
            d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));

            document.cookie = "cart=" + encodeURIComponent(JSON.stringify(cart)) +
                "; expires=" + d.toUTCString() +
                "; path=/";
        }

        function getCart() {
            const name = "cart=";
            const decoded = decodeURIComponent(document.cookie);
            const arr = decoded.split(';');

            for (let c of arr) {
                c = c.trim();
                if (c.indexOf(name) === 0) {
                    try {
                        return JSON.parse(c.substring(name.length));
                    } catch {
                        return [];
                    }
                }
            }
            return [];
        }

        // ==============================
        // INIT
        // ==============================
        let cart = getCart();
        renderCart();

        // ==============================
        // ADD TO CART
        // ==============================
        function addToCart(id, name, price) {
            let item = cart.find(p => p.id === id);

            if (item) {
                item.qty += 1;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    qty: 1
                });
            }

            saveCart();
            renderCart();
            toast("কার্টে যোগ হয়েছে");
        }

        // ==============================
        // CHANGE QTY (FIXED)
        // ==============================
        function changeQty(id, type) {
            let item = cart.find(p => p.id === id);

            if (!item) return;

            if (type === 'inc') {
                item.qty++;
                toast("আপডেট হয়েছে");
            }

            if (type === 'dec') {
                item.qty--;

                if (item.qty <= 0) {
                    cart = cart.filter(p => p.id !== id);
                    toast("Item removed", "error");
                } else {
                    toast("আপডেট হয়েছে");
                }
            }

            saveCart();
            renderCart();
        }

        // ==============================
        // REMOVE
        // ==============================
        function removeItem(id) {
            cart = cart.filter(p => p.id !== id);
            saveCart();
            renderCart();
            toast("Item removed", "error");
        }

        // ==============================
        // RENDER CART
        // ==============================
        function renderCart() {
            const box = document.getElementById('cart-items-list');
            const badge = document.getElementById('cart-count-badge');

            if (!box || !badge) return;

            if (cart.length === 0) {
                box.innerHTML = `
            <div class="text-center py-4">
                <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-2">🛒</div>
                <p class="text-gray-400 text-xs">কার্ট খালি</p>
            </div>
        `;
                badge.innerText = '০';
                return;
            }

            let totalQty = 0;
            let totalPrice = 0;

            box.innerHTML = cart.map(item => {
                totalQty += item.qty;
                totalPrice += item.qty * item.price;

                return `
            <div class="flex justify-between items-center bg-orange-50 p-2 rounded-xl border mb-2">
                <div>
                    <p class="text-xs font-bold">${item.name}</p>
                    <p class="text-[10px] text-gray-500">
                        ৳${toBanglaNumber(item.price)} × ${toBanglaNumber(item.qty)}
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    <button onclick="changeQty(${item.id}, 'dec')" class="px-2 bg-gray-200 rounded">-</button>
                    <span class="text-sm font-bold">${toBanglaNumber(item.qty)}</span>
                    <button onclick="changeQty(${item.id}, 'inc')" class="px-2 bg-gray-200 rounded">+</button>

                    <button onclick="removeItem(${item.id})" class="text-red-500 ml-2">×</button>
                </div>
            </div>
        `;
            }).join('');

            box.innerHTML += `
        <div class="border-t pt-2 flex justify-between font-bold">
            <span>মোট</span>
            <span>৳${toBanglaNumber(totalPrice)}</span>
        </div>
    `;

            badge.innerText = toBanglaNumber(cart.length);
        }

        // ==============================
        // BANGLA NUMBER
        // ==============================
        function toBanglaNumber(num) {
            const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

            return num.toString().split('').map(d => {
                return en.includes(d) ? bn[en.indexOf(d)] : d;
            }).join('');
        }

        function applyBanglaNumbers() {
            document.querySelectorAll('.bn-number').forEach(el => {
                el.innerHTML = toBanglaNumber(el.innerHTML);
            });
        }

        // Page load এ run
        document.addEventListener("DOMContentLoaded", applyBanglaNumbers);
    </script>

    <script>
        function toggleFaq(button) {
            const parent = button.parentElement;
            const content = parent.querySelector('.content');
            const icon = parent.querySelector('.icon');
            const allItems = document.querySelectorAll('.faq-item');

            // Close all other items
            allItems.forEach(item => {
                if (item !== parent) {
                    item.classList.remove('border-orange-400', 'border-2');
                    item.classList.add('border-gray-200');
                    item.querySelector('.content').classList.add('hidden');
                    item.querySelector('.icon').classList.remove('rotate-180', 'bg-orange-500', 'text-white');
                    item.querySelector('.icon').classList.add('bg-gray-100', 'text-gray-400');
                    item.querySelector('button').classList.remove('bg-orange-50/50');
                }
            });

            // Toggle current item
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                parent.classList.add('border-orange-400', 'border-2');
                parent.classList.remove('border-gray-200');
                icon.classList.add('rotate-180', 'bg-orange-500', 'text-white');
                button.classList.add('bg-orange-50/50');
            } else {
                content.classList.add('hidden');
                parent.classList.remove('border-orange-400', 'border-2');
                parent.classList.add('border-gray-200');
                icon.classList.remove('rotate-180', 'bg-orange-500', 'text-white');
                button.classList.remove('bg-orange-50/50');
            }
        }
    </script>


    <script>
        // Scroll to checkout section
        function scrollToCheckout() {
            document.getElementById("checkout").scrollIntoView({
                behavior: "smooth"
            });
        }

        // Hide badge when checkout is visible
        const checkoutSection = document.getElementById("checkout");
        const orderBadge = document.getElementById("orderBadge");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Checkout visible → hide badge
                    orderBadge.classList.add("opacity-0", "scale-0");
                    orderBadge.classList.remove("opacity-100", "scale-100", "animate-bounce");
                } else {
                    // Checkout not visible → show badge
                    orderBadge.classList.remove("opacity-0", "scale-0");
                    orderBadge.classList.add("opacity-100", "scale-100", "animate-bounce");
                }
            });
        }, {
            threshold: 0.3
        });

        observer.observe(checkoutSection);
    </script>

    @if ($errors->any())
        <script>
            window.addEventListener('load', function() {
                const el = document.getElementById('checkout');
                if (el) {
                    el.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }

                // focus first error field
                const firstError = document.querySelector('.border-red-400');
                if (firstError) {
                    firstError.focus();
                }
            });
        </script>
    @endif

    <script>
        document.querySelector('form').addEventListener('submit', function() {

            // cart empty check (optional but recommended)
            if (cart.length === 0) {
                toast("কার্টে প্রোডাক্ট যোগ করুন", "error");
                event.preventDefault();
                return;
            }

            // hidden input এ cart বসানো
            document.getElementById('cart_data').value = JSON.stringify(cart);
        });
    </script>



</body>

</html>
