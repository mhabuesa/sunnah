@extends('backend.layouts.app')
@section('title', 'Order Details')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .td_details {
            font-size: 13px;
            font-weight: 500
        }

        .td_product {
            font-size: 18px;
            font-weight: 600;
        }

        .product_image img {
            height: 50px;
            margin: auto 10px
        }

        .td_image {
            display: inline-block !important;
        }

        #main-container .content {
            padding-top: 0 !important
        }

        .summary-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 5px 0px;
            border: 1px solid #e5e5e5;
            transition: 0.3s;
        }

        .summary-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .summary-card .count {
            font-size: 15px;
            font-weight: 600;
            color: #0d6efd;
            margin-bottom: 0px;
        }

        .summary-card .label {
            font-size: 12px;
            color: #6c757d;
            margin: 0;
        }



        .courier-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            align-items: center;
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .courier-row:last-child {
            border-bottom: none;
        }

        .courier-row .name {
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }
    </style>
@endpush

@section('content')
    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                <img class="png_icon" src="{{ asset('assets/icon/png/product_cart2.png') }}" alt=""> Order Details
            </h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- PRODUCT SECTION -->
            <div class="col-lg-9  m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header" style="align-items: normal">
                        <div class="text-start">
                            <h3 class="block-title text-capitalize">Order ID #{{ $order->id }}</h3>
                            <h3 class="block-title text-capitalize">
                                <i class="fa-regular fa-calendar-days"></i> {{ $order->created_at->format('d-m-Y') }}
                                <i class="fa-regular fa-alarm-clock"></i> {{ $order->created_at->format('H:i') }}
                            </h3>
                        </div>
                        <div class="text-end">
                            <button onclick="printOrder({{ $order->id }})"
                                class="btn btn-primary btn-sm {{ setting()->invoice }}">
                                <i class="fa-solid fa-print"></i>
                                @if (setting()->invoice == 'invoice')
                                    Invoice Print
                                @else
                                    Receipt Print
                                @endif

                            </button>
                            @php
                                $statusLabels = [
                                    'pending' => ['label' => 'Pending', 'color' => 'warning'],
                                    'on_review' => ['label' => 'On Review', 'color' => 'info'],
                                    'schedule' => ['label' => 'Scheduled Delivery', 'color' => 'primary'],
                                    'confirmed' => ['label' => 'Confirmed', 'color' => 'success'],
                                    'delivered' => ['label' => 'Delivered', 'color' => 'success'],
                                    'failed' => ['label' => 'Failed To Deliver', 'color' => 'danger'],
                                    'canceled' => ['label' => 'Canceled', 'color' => 'danger'],
                                    'returned' => ['label' => 'Returned', 'color' => 'secondary'],
                                    'out_for_delivery' => ['label' => 'Out For Delivery', 'color' => 'info'],
                                ];

                                $currentStatus = $statusLabels[$order->order_status] ?? [
                                    'label' => ucfirst($order->order_status),
                                    'color' => 'primary',
                                ];
                            @endphp

                            <div class="mt-2">
                                <p class="mb-0">
                                    Status:
                                    <span class="badge bg-{{ $currentStatus['color'] }} text-capitalize">
                                        {{ $currentStatus['label'] }}
                                    </span>
                                </p>

                                <p class="mb-0">
                                    Payment Method:
                                    <span class="text-primary fw-bold text-capitalize">{{ $order->payment_method }}</span>
                                </p>

                                <p class="mb-0">
                                    Payment Status:
                                    <span
                                        class="text-{{ $order->payment_status == 'paid' ? 'success' : 'danger' }} fw-bold text-capitalize">
                                        {{ $order->payment_status }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto pb-0">
                        <table class="table table-vcenter ">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Item Details</th>
                                    <th width="140">Item Price</th>
                                    <th width="140">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="product_image">
                                                    <img class="rounded" src="{{ asset($item->product->image) }}"
                                                        alt="{{ $item->product->name }}">
                                                </div>
                                                <div class="product_item">
                                                    <div class="td_product">
                                                        {{ Str::limit($item->product->name, 100, '...') }}
                                                    </div>
                                                    <div class="td_details">
                                                        Qty : {{ $item->qty }}
                                                    </div>
                                                    @if ($item->variation)
                                                        <div class="td_details">
                                                            Variation: {{ $item->variation?->attributeValue->value }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>৳{{ $item->price }}</td>
                                        <td>৳{{ $item->price * $item->qty }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-md-end mb-3">
                            <div class="col-md-9 col-lg-8">
                                <dl class="row text-sm-right text-end">
                                    <dt class="col-5">Sub total</dt>
                                    <dd class="col-6">
                                        <strong>৳{{ $order->subtotal }}</strong>
                                    </dd>
                                    <dt class="col-sm-5">Extra discount</dt>
                                    <dd class="col-sm-6">
                                        <strong>-
                                            ৳{{ $order->extra_discount }}</strong>
                                    </dd>
                                    <dt class="col-sm-5">Coupon discount</dt>
                                    <dd class="col-sm-6">
                                        <strong>-
                                            ৳{{ $order->discount_amount }}</strong>
                                    </dd>
                                    <dt class="col-5 text-uppercase">Shipping Cost</dt>
                                    <dd class="col-6">
                                        <strong>৳{{ $order->shipping_cost }}</strong>
                                    </dd>
                                    <dt class="col-sm-5">Total</dt>
                                    <dd class="col-6">
                                        <strong>৳{{ $order->total }}</strong>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="col-lg-3 m-auto mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="block block-rounded mb-0">
                            <div class="block-content block-content-full overflow-x-auto">

                                <!-- HEADER -->
                                <h4 class="mb-4 d-flex justify-content-between align-items-center gap-2">
                                    <span>Customer Information</span>
                                    <span class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editCustomerInfo">
                                        <i class="fa fa-pencil text-primary"></i>
                                    </span>
                                </h4>

                                <!-- CUSTOMER INFO -->
                                <div class="d-flex">
                                    <div>
                                        @if ($order->customer->image)
                                            <img class="avatar rounded-circle" width="60"
                                                src="https://alziro.com/assets/back-end/img/placeholder/user.png">
                                        @else
                                            <img class="avatar rounded-circle" width="60"
                                                src="https://placehold.co/400?text=IMAGE">
                                        @endif
                                    </div>

                                    <div class="mx-3">
                                        <div>
                                            <span id="customerName">
                                                {{ $order->customer->name }}
                                            </span>
                                        </div>

                                        <div>
                                            <strong id="customerPhone">
                                                {{ $order->customer->phone }}
                                            </strong>
                                        </div>

                                        <div>
                                            Address:
                                            <span id="customerAddress">
                                                {{ $order->customer->address }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger btn-sm float-end mt-3" id="fraudCheckBtn">
                                    Fraud Check
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 m-auto mt-2 d-none" id="fraudSection">
                        <div class="block block-rounded mb-0">
                            <div class="block-content block-content-full overflow-x-auto">

                                <h4 class="text-center">Customer Delivery Report</h4>

                                <!-- 🔥 REPORT CONTAINER -->
                                <div id="fraudReport" class="mt-3">

                                    <!-- Loading -->
                                    <div id="fraudLoading" class="text-center py-4 d-none">
                                        <div class="spinner-border text-danger"></div>
                                        <p class="mb-0 mt-2">Checking fraud...</p>
                                    </div>

                                    <!-- Data -->
                                    <div id="fraudContent"></div>

                                </div>
                                <div id="fraudScore"></div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= Order Info Update ================= -->
                    <div class="col-12 m-auto mt-2 mb-3">
                        <div class="block block-rounded mb-0">
                            <div class="block-content block-content-full overflow-x-auto">

                                <!-- HEADER -->
                                <h4 class="mb-4 text-center">
                                    <span>Order Info Update</span>
                                </h4>

                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    <div class="mt-4">
                                        <label for="order_status" class="form-label">Status</label>
                                        <select name="order_status" id="order_status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option {{ $order->order_status == 'pending' ? 'selected' : '' }}
                                                value="pending"> Pending</option>
                                            <option {{ $order->order_status == 'on_review' ? 'selected' : '' }}
                                                value="on_review">On Review</option>
                                            <option {{ $order->order_status == 'schedule' ? 'selected' : '' }}
                                                value="schedule">Scheduled Delivery</option>
                                            <option {{ $order->order_status == 'confirmed' ? 'selected' : '' }}
                                                value="confirmed">Confirmed</option>
                                            @if ($order->order_status == 'out_for_delivery')
                                                <option {{ $order->order_status == 'out_for_delivery' ? 'selected' : '' }}
                                                    value="delivered">Out For Delivery</option>
                                            @endif
                                            <option {{ $order->order_status == 'delivered' ? 'selected' : '' }}
                                                value="delivered">Delivered</option>
                                            <option {{ $order->order_status == 'failed' ? 'selected' : '' }}
                                                value="failed">
                                                Failed to Deliver</option>
                                            <option {{ $order->order_status == 'canceled' ? 'selected' : '' }}
                                                value="canceled">Canceled</option>
                                            <option {{ $order->order_status == 'returned' ? 'selected' : '' }}
                                                value="returned">Returned</option>
                                        </select>
                                    </div>
                                    <div class="mt-4 {{ $order->order_status == 'schedule' ? '' : 'd-none' }}"
                                        id="schedule_delivery">
                                        <label for="scheduled_at" class="form-label">Scheduled Date</label>
                                        <input type="date" class="form-control" name="scheduled_at"
                                            value="{{ $order->scheduled_at?->format('Y-m-d') }}" id="scheduled_at">
                                    </div>
                                    <div class="mt-4">
                                        <label for="method" class="form-label">Payment Method</label>
                                        <select name="payment_method" class="form-control" id="method">
                                            <option {{ $order->payment_method == 'cod' ? 'selected' : '' }}
                                                value="cod">COD</option>
                                            <option {{ $order->payment_method == 'cash' ? 'selected' : '' }}
                                                value="cash">Cash</option>
                                            <option {{ $order->payment_method == 'wallet' ? 'selected' : '' }}
                                                value="wallet">Wallet</option>
                                        </select>
                                    </div>
                                    <div class="mt-4">
                                        <label for="payment_status" class="form-label">Payment Status</label>
                                        <select name="payment_status" class="form-control" id="payment_status">
                                            <option {{ $order->payment_status == 'paid' ? 'selected' : '' }}
                                                value="paid">Paid</option>
                                            <option {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}
                                                value="unpaid">Unpaid</option>
                                        </select>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button class="btn btn-primary w-25" type="submit">Update</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ================= MODAL ================= -->
            <div class="modal fade" id="editCustomerInfo" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5>Edit Customer Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <form id="updateCustomerForm">
                                @csrf
                                <input type="hidden" id="customer_id" value="{{ $order->customer->id }}">

                                <!-- NAME -->
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" id="edit_name" class="form-control"
                                        value="{{ $order->customer->name }}">
                                    <small class="text-danger d-none" id="editNameError"></small>
                                </div>

                                <!-- ADDRESS -->
                                <div class="mb-3">
                                    <label>Address</label>
                                    <input type="text" id="edit_address" class="form-control"
                                        value="{{ $order->customer->address }}">
                                    <small class="text-danger d-none" id="editAddressError"></small>
                                </div>

                            </form>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <button class="btn btn-primary" id="updateCustomerInfoBtn">
                                Update
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('footer_scripts')
    <script>
        $(document).ready(function() {

            // CSRF setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ================= UPDATE CUSTOMER =================
            $(document).on('click', '#updateCustomerInfoBtn', function(e) {
                e.preventDefault();

                let btn = $(this);

                // clear errors
                $('#editNameError, #editAddressError')
                    .addClass('d-none')
                    .text('');

                let id = $('#customer_id').val();
                let name = $('#edit_name').val();
                let address = $('#edit_address').val();

                btn.prop('disabled', true).text('Updating...');

                $.ajax({
                    url: "{{ route('admin.customer.updateInfo') }}",
                    type: "POST",
                    data: {
                        id: id,
                        name: name,
                        address: address
                    },

                    success: function(res) {

                        if (res.success) {

                            // 🔥 LIVE UPDATE UI
                            $('#customerName').text(res.customer.name);
                            $('#customerAddress').text(res.customer.address);

                            // close modal
                            $('#editCustomerInfo').modal('hide');

                            // optional toast
                            if (typeof showToast === "function") {
                                showToast('Customer updated successfully', 'success');
                            }
                        }
                    },

                    error: function(xhr) {

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.name) {
                                $('#editNameError')
                                    .removeClass('d-none')
                                    .text(errors.name[0]);
                            }

                            if (errors.address) {
                                $('#editAddressError')
                                    .removeClass('d-none')
                                    .text(errors.address[0]);
                            }
                        }
                    },

                    complete: function() {
                        btn.prop('disabled', false).text('Update');
                    }
                });
            });

            // ================= MODAL RESET =================
            $('#editCustomerInfo').on('hidden.bs.modal', function() {
                $('#editNameError, #editAddressError')
                    .addClass('d-none')
                    .text('');
            });

        });
    </script>

    <script>
        $(document).on('click', '#fraudCheckBtn', function() {

            let phone = "{{ $order->customer->phone }}";

            // 🔥 Show section & loading
            $('#fraudSection').removeClass('d-none');
            $('#fraudLoading').removeClass('d-none');
            $('#fraudContent').html('');
            $('#fraudScore').html('');
            $('#fraudCheckBtn').prop('disabled', true).text('Checking...');

            $.ajax({
                url: "{{ route('admin.orders.fraudCheck') }}",
                type: "POST",
                data: {
                    phone: phone
                },
                timeout: 10000, // ⬅ 10 second timeout

                success: function(res) {

                    $('#fraudLoading').addClass('d-none');
                    $('#fraudCheckBtn').prop('disabled', false).text('Fraud Check');

                    if (res.success) {
                        let summaries = res.api1?.Summaries || {};
                        let totalSummary = res.api2?.Summaries || {};

                        let html = '';

                        // ===== TOTAL SUMMARY =====
                        html += `
                                <div class="row text-center d-flex justify-content-center g-3 mb-3">
                                    <div class="col-md-3">
                                        <div class="summary-card">
                                            <h3 class="count">${totalSummary["Total Parcels"] || 0}</h3>
                                            <p class="label">Total Order</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="summary-card">
                                            <h3 class="count">${totalSummary["Total Delivered"] || 0}</h3>
                                            <p class="label">Delivered</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="summary-card">
                                            <h3 class="count text-danger">${totalSummary["Total Canceled"] || 0}</h3>
                                            <p class="label text-danger">Canceled</p>
                                        </div>
                                    </div>
                                </div>
                                `;

                        // ===== Courier Table Header =====
                        html += `
                                <div class="d-flex justify-content-between px-3 py-2 border-bottom fw-semibold text-muted small">
                                    <span>কুরিয়ার</span>
                                    <span>অর্ডার</span>
                                    <span>ডেলিভারি</span>
                                    <span>বাতিল</span>
                                    <span>বাতিল হার</span>
                                </div>
                                `;

                        // ===== Courier Rows =====
                        let totalOrders = 0;
                        let totalCanceled = 0;

                        Object.keys(summaries).forEach(courier => {
                            let item = summaries[courier];

                            let total = item["Total Parcels"] ?? item["Total Delivery"] ?? 0;
                            let delivered = item["Delivered Parcels"] ?? item[
                                "Successful Delivery"] ?? 0;
                            let canceled = item["Canceled Parcels"] ?? item[
                                "Canceled Delivery"] ?? 0;

                            totalOrders += total;
                            totalCanceled += canceled;

                            let cancelRate = total > 0 ? ((canceled / total) * 100).toFixed(1) :
                                0;

                            let badgeClass = 'bg-success';
                            if (cancelRate > 20) badgeClass = 'bg-danger';
                            else if (cancelRate > 10) badgeClass = 'bg-warning';

                            html += `
                            <div class="courier-row">
                                <div class="name">${courier}</div>
                                <div>${total}</div>
                                <div>${delivered}</div>
                                <div>${canceled}</div>
                                <div><span class="badge ${badgeClass}">${cancelRate}%</span></div>
                            </div>`;
                        });

                        $('#fraudContent').html(html);

                        // ===== Calculate Fraud Score =====
                        let overallCancelRate = totalOrders > 0 ? (totalCanceled / totalOrders) * 100 :
                            0;
                        let fraudScoreText = '';
                        let fraudBadgeClass = '';

                        if (overallCancelRate > 20) {
                            fraudScoreText = 'High Risk';
                            fraudBadgeClass = 'bg-danger';
                        } else if (overallCancelRate > 10) {
                            fraudScoreText = 'Medium Risk';
                            fraudBadgeClass = 'bg-warning';
                        } else {
                            fraudScoreText = 'Safe';
                            fraudBadgeClass = 'bg-success';
                        }

                        $('#fraudScore').html(`
                            <div class="mt-3 text-center">
                                <span class="badge ${fraudBadgeClass} fs-7 ">${fraudScoreText}</span>
                            </div>
                            `);
                    } else {
                        $('#fraudContent').html(
                            `<p class="text-danger text-center">Fraud check failed</p>`);
                        $('#fraudScore').html('');
                    }
                },

                error: function(xhr, status) {
                    $('#fraudLoading').addClass('d-none');
                    $('#fraudCheckBtn').prop('disabled', false).text('Fraud Check');

                    // ✅ Check if timeout
                    if (status === 'timeout') {
                        $('#fraudContent').html(
                            `<p class="text-danger text-center">Fraud check failed (Timeout)</p>`);
                    } else {
                        $('#fraudContent').html(`<p class="text-danger text-center">Server error</p>`);
                    }

                    $('#fraudScore').html('');
                }
            });
        });
    </script>

    <script>
        function printOrder(orderId) {
            let oldFrame = document.getElementById('printFrame');
            if (oldFrame) oldFrame.remove();

            let iframe = document.createElement('iframe');
            iframe.id = 'printFrame';
            iframe.style.display = 'none';
            document.body.appendChild(iframe);

            iframe.src = "{{ url('/admin/orders/printReceipt') }}/" + orderId;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const statusSelect = document.getElementById("order_status");
            const scheduleDiv = document.getElementById("schedule_delivery");
            const dateInput = document.getElementById("scheduled_at");

            // prepare animation style
            scheduleDiv.style.overflow = "hidden";
            scheduleDiv.style.transition = "all 0.3s ease";

            // Initial check
            toggleScheduleField(true);

            // On change
            statusSelect.addEventListener("change", () => toggleScheduleField(false));

            function toggleScheduleField(isInitial = false) {
                if (statusSelect.value === "schedule") {
                    scheduleDiv.classList.remove("d-none");

                    if (!isInitial) {
                        scheduleDiv.style.maxHeight = "0px";
                        setTimeout(() => {
                            scheduleDiv.style.maxHeight = scheduleDiv.scrollHeight + "px";
                        }, 10);
                    } else {
                        scheduleDiv.style.maxHeight = "none";
                    }

                    dateInput.setAttribute("required", true);

                } else {
                    scheduleDiv.style.maxHeight = "0px";
                    dateInput.removeAttribute("required");

                    setTimeout(() => {
                        scheduleDiv.classList.add("d-none");
                    }, 300);
                }
            }
        });
    </script>
@endpush
