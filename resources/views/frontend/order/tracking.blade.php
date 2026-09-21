@extends('frontend.layouts.app')

@section('title', 'Track Your Order')

@push('header_script')
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/custom/style.css">
@endpush

@section('content')

    {{-- =========================
        TRACKING HEADER
    ========================== --}}
    <section class="tracking-header">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7 mb-4 mb-lg-0">

                    <div class="tracking-label">
                        <span>•</span> LIVE ORDER TRACKING
                    </div>

                    <h1>Track Your Order</h1>

                    <p>
                        Real-time updates on your shipment progress
                    </p>

                    @if ($searched && $order)
                        <div class="searched-order-number">
                            <span>Order Number</span>
                            <strong>#{{ $order->invoice_no }}</strong>
                        </div>
                    @endif

                </div>

                <div class="col-lg-5">

                    <form action="{{ route('order.tracking') }}" method="GET" class="tracking-search">

                        <input type="text" name="order_number" value="{{ request('order_number') }}" class="form-control"
                            placeholder="Enter order number..." required>

                        <button type="submit" class="btn tracking-search-btn">
                            Search
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </section>


    {{-- =========================
        TRACKING BODY
    ========================== --}}
    <section class="tracking-body">

        <div class="container">

            {{-- ==================================
                 ORDER NOT FOUND
            =================================== --}}
            @if ($searched && !$order)

                <div class="not-found-wrapper">

                    <div class="not-found-card">

                        <div class="not-found-icon">
                            📦
                        </div>

                        <h3>Order Not Found</h3>

                        <p>
                            We couldn't find an order with that number.
                            Please double-check and try again.
                        </p>

                        <a href="{{ url('/') }}" class="btn tracking-main-btn">
                            Back to Shopping
                        </a>

                    </div>

                </div>

                {{-- ==================================
                 ORDER FOUND
            =================================== --}}
            @elseif($order)
                <div class="row g-4">

                    {{-- =========================
                        LEFT SIDE
                    ========================== --}}
                    <div class="col-lg-8">

                        {{-- ORDER TIMELINE --}}
                        <div class="tracking-card">

                            <div class="tracking-card-header">

                                <div>
                                    <span class="card-header-icon">↻</span>
                                    Order Timeline
                                </div>

                                <span class="status-badge
                                    status-{{ $order->status }}">
                                    {{ ucwords(str_replace('_', ' ', $order->status)) }}
                                </span>

                            </div>


                            <div class="tracking-card-body">

                                @php

                                    /*
                                    |--------------------------------------------------------------------------
                                    | Map your order statuses to timeline steps
                                    |--------------------------------------------------------------------------
                                    */

                                    $status = $order->order_status;

                                    if ($status === 'pending') {
                                        $currentStep = 1;
                                    } elseif (in_array($status, ['on_review', 'schedule'])) {
                                        $currentStep = 2;
                                    } elseif ($status === 'confirmed') {
                                        $currentStep = 3;
                                    } elseif ($status === 'out_for_delivery') {
                                        $currentStep = 5;
                                    } elseif ($status === 'delivered') {
                                        $currentStep = 6;
                                    } else {
                                        $currentStep = 1;
                                    }

                                    $isFailed = in_array($status, ['failed', 'canceled', 'returned']);

                                @endphp


                                {{-- CANCELLED / FAILED ALERT --}}
                                @if ($isFailed)

                                    <div
                                        class="tracking-alert
                                        {{ $status === 'canceled' ? 'cancelled' : 'failed' }}">

                                        <div class="alert-title">
                                            <span>×</span>

                                            {{ ucwords(str_replace('_', ' ', $status)) }}
                                        </div>

                                        <div class="alert-text">

                                            @if ($status === 'canceled')
                                                This order has been cancelled.
                                            @elseif($status === 'returned')
                                                This order has been returned.
                                            @else
                                                This order delivery has failed.
                                            @endif

                                        </div>

                                    </div>

                                @endif


                                {{-- TIMELINE --}}
                                <div class="order-timeline">

                                    @php
                                        $steps = [
                                            1 => [
                                                'title' => 'Order Placed',
                                                'date' => $order->created_at,
                                            ],
                                            2 => [
                                                'title' => 'Approved',
                                                'date' => null,
                                            ],
                                            3 => [
                                                'title' => 'Ready to Ship',
                                                'date' => null,
                                            ],
                                            4 => [
                                                'title' => 'Packed',
                                                'date' => null,
                                            ],
                                            5 => [
                                                'title' => 'In Transit',
                                                'date' => null,
                                            ],
                                            6 => [
                                                'title' => 'Delivered',
                                                'date' => null,
                                            ],
                                        ];
                                    @endphp


                                    @foreach ($steps as $step => $item)
                                        <div
                                            class="timeline-step
                                            {{ $step <= $currentStep ? 'completed' : '' }}
                                            {{ $step == $currentStep ? 'active' : '' }}">

                                            <div class="timeline-circle">

                                                @if ($step < $currentStep)
                                                    ✓
                                                @else
                                                    {{ $step }}
                                                @endif

                                            </div>

                                            <div class="timeline-title">
                                                {{ $item['title'] }}
                                            </div>

                                            @if ($item['date'])
                                                <div class="timeline-date">
                                                    {{ $item['date']->format('d M') }}
                                                </div>
                                            @endif

                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>


                        {{-- PRODUCTS --}}
                        <div class="tracking-card">

                            <div class="tracking-card-header">

                                <div>
                                    <span class="card-header-icon">♧</span>
                                    Products
                                </div>

                                <span class="item-count">
                                    {{ $order->orderDetails->count() }} item(s)
                                </span>

                            </div>


                            <div class="tracking-card-body products-body">

                                @foreach ($order->orderDetails as $detail)
                                    <div class="tracking-product">

                                        <div class="product-image">

                                            @if ($detail->product?->thumbnail)
                                                <img src="{{ asset($detail->product->thumbnail) }}"
                                                    alt="{{ $detail->product->name }}">
                                            @elseif($detail->product?->image)
                                                <img src="{{ asset($detail->product->image) }}"
                                                    alt="{{ $detail->product->name }}">
                                            @else
                                                <div class="no-product-image">
                                                    📦
                                                </div>
                                            @endif

                                        </div>


                                        <div class="product-info">

                                            <h6>
                                                {{ $detail->product?->name }}
                                            </h6>

                                            <span>
                                                Qty: {{ $detail->qty }}
                                            </span>

                                        </div>


                                        <div class="product-price">

                                            <strong>
                                                {{ number_format($detail->price * $detail->qty, 2) }}
                                                BDT
                                            </strong>

                                            <small>
                                                {{ number_format($detail->price, 2) }}
                                                / unit
                                            </small>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>


                    {{-- =========================
                        RIGHT SIDE
                    ========================== --}}
                    <div class="col-lg-4">

                        {{-- ORDER SUMMARY --}}
                        <div class="tracking-card">

                            <div class="tracking-card-header">
                                <div>
                                    <span class="card-header-icon">▣</span>
                                    Order Summary
                                </div>
                            </div>


                            <div class="summary-body">

                                <div class="summary-row">
                                    <span>Subtotal</span>
                                    <strong>
                                        {{ number_format($order->subtotal, 2) }} BDT
                                    </strong>
                                </div>

                                <div class="summary-row">
                                    <span>Delivery Fee</span>
                                    <strong>
                                        + {{ number_format($order->shipping_cost ?? 0, 2) }} BDT
                                    </strong>
                                </div>

                                <div class="summary-row discount">
                                    <span>Discount</span>
                                    <strong>
                                        - {{ number_format($order->discount_amount ?? 0, 2) }} BDT
                                    </strong>
                                </div>

                                <div class="summary-total">
                                    <span>Grand Total</span>

                                    <strong>
                                        {{ number_format($order->total, 2) }} BDT
                                    </strong>
                                </div>


                                <div class="summary-row paid">
                                    <span>Total Paid</span>

                                    <strong>
                                        {{ number_format($order->paid_amount ?? 0, 2) }} BDT
                                    </strong>
                                </div>


                                <div class="summary-row due">
                                    <span>Amount Due</span>

                                    <strong>
                                        {{ number_format($order->total ?? 0, 2) }}
                                        BDT
                                    </strong>
                                </div>


                                <div class="payment-status">

                                    <small>PAYMENT STATUS</small>

                                    <span class="payment-badge">
                                        {{ $order->payment_status == 'paid' ? 'PAID' : 'UNPAID' }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- SHIPPING DETAILS --}}
                        <div class="tracking-card">

                            <div class="tracking-card-header">

                                <div>
                                    <span class="card-header-icon">⌾</span>
                                    Shipping Details
                                </div>

                            </div>


                            <div class="shipping-body">

                                <div class="shipping-item">

                                    <small>CUSTOMER</small>

                                    <strong>
                                        {{ $order->customer->name }}
                                    </strong>

                                </div>


                                <div class="shipping-item">

                                    <small>PHONE</small>

                                    <strong>
                                        {{ $order->customer->phone }}
                                    </strong>

                                </div>


                                <div class="shipping-item">

                                    <small>DELIVERY ADDRESS</small>

                                    <strong>
                                        {{ $order->customer->address }}
                                    </strong>

                                </div>


                                <div class="shipping-item">

                                    <small>PAYMENT METHOD</small>

                                    <strong>
                                        {{ strtoupper($order->payment_method) }}
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- ==================================
                 INITIAL STATE
            =================================== --}}
            @else
                <div class="not-found-wrapper">

                    <div class="not-found-card">

                        <div class="not-found-icon">
                            📦
                        </div>

                        <h3>Track Your Order</h3>

                        <p>
                            Enter your order number above to see
                            your order status and delivery progress.
                        </p>

                    </div>

                </div>

            @endif

        </div>

    </section>

@endsection
