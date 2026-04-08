@extends('backend.layouts.app')
@section('title', 'Promotional SMS')
@push('style')
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto" id="addCouponField">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">SMS Marketing</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.sms.send') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-4">
                                        <label class="form-label" for="message_body">Message Body</label>

                                        <textarea class="form-control" name="message_body" id="message_body" rows="10" placeholder="Type your Message Body"
                                            required></textarea>

                                        <small class="text-muted d-block mt-2">
                                            Character Count: <span id="charCount">0</span> |
                                            Remaining: <span id="remaining">150</span> |
                                            SMS Parts: <span id="smsCount">0</span>
                                        </small>

                                        @error('message_body')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="customer_selection">Select Customer</label>
                                        <select name="customer_selection" id="customer_selection" class="form-control">
                                            <option value="all">All</option>
                                            <option value="week">Last one Week</option>
                                            <option value="15days">Last 15 Days</option>
                                            <option value="month">Last one Month</option>
                                            <option value="custom">Custom Date</option>
                                        </select>
                                        <div class="mt-2 d-none" id="customDateSelector">
                                            <label class="form-label" for="filter_customer">Select Date</label>
                                            <div class="input-daterange input-group" data-date-format="mm/dd/yyyy"
                                                data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                                <input type="text" class="form-control" id="start_date" name="start_date"
                                                    placeholder="From" data-week-start="1" data-autoclose="true"
                                                    data-today-highlight="true" readonly>
                                                <span class="input-group-text fw-semibold">
                                                    <i class="fa fa-fw fa-arrow-right"></i>
                                                </span>
                                                <input type="text" class="form-control" id="end_date" name="end_date"
                                                    placeholder="To" data-week-start="1" data-autoclose="true"
                                                    data-today-highlight="true" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="filter_customer">Filter Customers by Order
                                            Status</label>
                                        <select name="filter_customer" id="filter_customer" class="form-control">
                                            <option value="all">All Customers</option>
                                            <option value="ordered">Customers Who Ordered</option>
                                            <option value="not_ordered">Customers Who Didn't Order</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">
                                            Total Customers:
                                            <strong id="total_customers">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </strong>
                                        </label>
                                        <p>
                                            SMS Credit:
                                            <strong id="sms_credit">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </strong>
                                            <span id="insufficient_sms" class="text-danger d-none">(Insufficient
                                                credit)</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0 text-end">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('footer_scripts')
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                format: "mm/dd/yyyy",
                autoclose: true,
                todayHighlight: true,
                weekStart: 1
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const customerSelect = document.getElementById('customer_selection');
            const filterSelect = document.getElementById('filter_customer');
            const totalCustomersEl = document.getElementById('total_customers');
            const smsCreditEl = document.getElementById('sms_credit');
            const insufficientEl = document.getElementById('insufficient_sms');
            const customDateDiv = document.getElementById('customDateSelector');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');

            // ১. Custom Date Field হাইড বা শো করা
            function toggleCustomDate() {
                if (customerSelect.value === 'custom') {
                    customDateDiv.classList.remove('d-none');
                } else {
                    customDateDiv.classList.add('d-none');
                }
            }

            // ২. AJAX এর মাধ্যমে কাস্টমার কাউন্ট আপডেট করা
            function updateCustomerCount() {
                let customerType = customerSelect.value;
                let orderFilter = filterSelect.value;
                let startDate = startDateInput.value;
                let endDate = endDateInput.value;

                // যদি Custom সিলেক্ট করা থাকে কিন্তু ডেট দেওয়া না হয়, তবে রিকোয়েস্ট পাঠাবে না
                if (customerType === 'custom' && (!startDate || !endDate)) {
                    totalCustomersEl.textContent = 'Select date range';
                    return;
                }

                totalCustomersEl.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span>';

                const url =
                    `/admin/sms/customer-count?customer_selection=${customerType}&filter_customer=${orderFilter}&start_date=${startDate}&end_date=${endDate}`;

                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        totalCustomersEl.textContent = data.total_customers;

                        // ক্রেডিট চেক
                        let currentCredit = parseInt(smsCreditEl.textContent) || 0;
                        if (data.total_customers > currentCredit) {
                            smsCreditEl.classList.add('text-danger');
                            insufficientEl.classList.remove('d-none');
                        } else {
                            smsCreditEl.classList.remove('text-danger');
                            insufficientEl.classList.add('d-none');
                        }
                    })
                    .catch(err => {
                        console.error('Error:', err);
                        totalCustomersEl.textContent = 'Error!';
                    });
            }

            // ৩. শুরুতে ডেটা লোড করা (Available SMS সহ)
            function loadInitialData() {
                totalCustomersEl.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span>';
                smsCreditEl.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span>';

                fetch(`/admin/sms/customer-count?customer_selection=all&filter_customer=all`)
                    .then(res => res.json())
                    .then(data => {
                        totalCustomersEl.textContent = data.total_customers;
                        smsCreditEl.textContent = data.available_sms;
                    })
                    .catch(err => console.error('Initial Load Error:', err));
            }

            // ৪. ইভেন্ট লিসেনার সেটআপ
            customerSelect.addEventListener('change', function() {
                toggleCustomDate();
                updateCustomerCount();
            });

            filterSelect.addEventListener('change', updateCustomerCount);

            // Bootstrap Datepicker এর জন্য jQuery ইভেন্ট (এটি গুরুত্বপূর্ণ)
            // সাধারণ 'change' ইভেন্ট অনেক সময় কাজ করে না, তাই 'changeDate' ব্যবহার করা হয়েছে
            $(startDateInput).datepicker().on('changeDate', function() {
                updateCustomerCount();
            });

            $(endDateInput).datepicker().on('changeDate', function() {
                updateCustomerCount();
            });

            // ৫. পেজ লোড হওয়ার সময় রান হবে
            toggleCustomDate();
            loadInitialData();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const textarea = document.getElementById("message_body");
            const charCountEl = document.getElementById("charCount");
            const remainingEl = document.getElementById("remaining");
            const smsCountEl = document.getElementById("smsCount");

            const limit = 150; // 1 SMS = 150 characters

            textarea.addEventListener("input", function() {

                let text = textarea.value;
                let length = text.length;

                // total characters
                charCountEl.textContent = length;

                // remaining characters (for current SMS part)
                let remaining = limit - (length % limit);
                if (remaining === limit && length !== 0) {
                    remaining = 0;
                }
                remainingEl.textContent = remaining;

                // total SMS parts
                let smsCount = Math.ceil(length / limit);
                smsCountEl.textContent = smsCount;

                // empty হলে reset
                if (length === 0) {
                    remainingEl.textContent = limit;
                    smsCountEl.textContent = 0;
                }
            });

        });
    </script>
@endpush
