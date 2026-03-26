    @extends('backend.layouts.app')
    @section('title', 'Order List')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 m-auto" id="filterForm" style="display:;">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Filter Product
                            </h3>
                            <button id="closeFilterForm" class="btn btn-sm btn-danger">
                                <i class="fas fa-x"></i>
                            </button>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="order_type">Order Type</label>

                                        <select class="form-control __form-control" name="order_type" id="order_type">
                                            <option value="all">All</option>
                                            <option value="pos">POS</option>
                                            <option value="frontend">Frontend</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="payment_status">Payment Status</label>
                                        <select class="form-control __form-control" id="payment_status"
                                            name="payment_status" style="width: 100%;">
                                            <option value="all">All</option>
                                            <option value="paid">Paid</option>
                                            <option value="unpaid">Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="user">Users</label>
                                        <select class="js-select2 form-select" id="user" name="user_id"
                                            style="width: 100%;" data-placeholder="Choose users..">
                                            <option value="">All User</option>
                                            @foreach ($users as $key => $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_type">Date Type</label>
                                        <select class="form-control __form-control" name="date_type" id="date_type">
                                            <option value="" >
                                                All Data
                                            </option>
                                            <option value="today">
                                                Today
                                            </option>
                                            <option value="this_week">
                                                This Week</option>
                                            <option value="this_month">
                                                This Month</option>
                                            <option value="this_year">
                                                This Year</option>
                                            <option value="custom_date">
                                                Custom Date</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2" id="from_div" style="display: none;">
                                    <div class="mb-3">
                                        <label class="title-color" for="customer">Start date</label>
                                        <div class="form-group">
                                            <input type="date" name="from" value="" id="from_date"
                                                class="form-control" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2" id="to_div" style="display: none;">
                                    <label class="title-color" for="customer">End date</label>
                                    <div class="form-group">
                                        <input type="date" value="" name="to" id="to_date"
                                            class="form-control" required="required">
                                    </div>
                                </div>

                            </div>

                            <div class="mb-0 text-end">
                                <button type="button" id="resetFilter" class="btn btn-warning mt-4">
                                    Reset
                                </button>

                                <button type="button" id="applyFilter" class="btn btn-primary mt-4">
                                    Show Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default d-block">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="block-title">Order List</h3>
                                </div>
                                <div class="col-lg-6 text-center text-lg-end">
                                    <div class="block-options space-x-1 md_mt-2 p-0">
                                        <button type="button" class="btn btn-sm btn-alt-secondary"
                                            data-toggle="class-toggle" data-target="#one-dashboard-search-orders"
                                            data-class="d-none">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <div class="dropdown d-inline-block">
                                            <button type="button" class="btn btn-sm btn-alt-secondary" id="filterBtn">
                                                <i class="fa fa-fw fa-flask"></i>
                                                Filters
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                            <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                <div class="push">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-alt" id="productSearch"
                                            name="one-ecom-orders-search" placeholder="Search all Orders..">
                                        <span class="input-group-text bg-body border-0">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto pb-0 position-relative">
                            <div id="tableLoader" class="position-absolute top-50 start-50 translate-middle d-none">
                                <div class="spinner-border text-primary" role="status"></div>
                            </div>
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Customer Info</th>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>
                                        <th>Order Placed By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="orderContainer">
                                    {{-- AJAX load --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="block-content block-content-full py-0">
                            <div class="text-center mt-3" id="paginationContainer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('footer_scripts')
        <script>
            One.helpersOnLoad(['jq-select2']);
        </script>


        <script>
            $(document).ready(function() {

                let filters = {
                    order_status: "{{ $type ?? 'pending' }}", // default order status
                    order_type: 'all',
                    payment_status: 'all',
                    user_id: '',
                    date_type: '',
                    from: '',
                    to: '',
                    search: ''
                };

                function loadOrders(page = 1) {
                    $('#tableLoader').removeClass('d-none');

                    $.get("{{ route('admin.orders.getOrders') }}", {
                        ...filters,
                        page: page
                    }, function(res) {
                        $('#orderContainer').html(res.html);
                        $('#paginationContainer').html(res.pagination);
                    }).always(function() {
                        $('#tableLoader').addClass('d-none');
                    });
                }

                // Initial load
                loadOrders();

                // Pagination click
                $(document).on('click', '#paginationContainer .pagination a', function(e) {
                    e.preventDefault();
                    let page = $(this).attr('href').split('page=')[1];
                    loadOrders(page);
                });

                // **Live search**
                $('#productSearch').on('keyup', function() {
                    filters.search = $(this).val();
                    loadOrders(1);
                });

                // **Show Data button** - other filters
                $('#applyFilter').on('click', function() {
                    filters.order_type = $('#order_type').val();
                    filters.payment_status = $('#payment_status').val();
                    filters.user_id = $('#user').val();
                    filters.date_type = $('#date_type').val();
                    filters.from = $('#from_date').val();
                    filters.to = $('#to_date').val();
                    loadOrders(1);
                });

                // Date type change: custom date show/hide
                $('#date_type').on('change', function() {
                    let val = $(this).val();
                    if (val == 'custom_date') {
                        $('#from_div, #to_div').show();
                    } else {
                        $('#from_div, #to_div').hide();
                        $('#from_date, #to_date').val('');
                    }
                });

                // Filter form toggle
                $('#filterForm').hide();
                $('#filterBtn').on('click', function() {
                    $('#filterForm').slideToggle();
                });
                $('#closeFilterForm').on('click', function() {
                    $('#filterForm').slideUp();
                });

                // Reset filter
                $('#resetFilter').on('click', function() {
                    $('#order_type').val('all');
                    $('#payment_status').val('all');
                    $('#user').val('').trigger('change');
                    $('#date_type').val('');
                    $('#from_date').val('');
                    $('#to_date').val('');
                    $('#productSearch').val('');
                    filters = {
                        order_status: "{{ $type ?? 'pending' }}",
                        order_type: 'all',
                        payment_status: 'all',
                        user_id: '',
                        date_type: '',
                        from: '',
                        to: '',
                        search: ''
                    };
                    loadOrders(1);
                });

            });
        </script>

        <script>
            $(document).ready(function() {

                // Filter form initially hidden
                $('#filterForm').hide();

                // Show filter form
                $('#filterBtn').on('click', function() {
                    $('#filterForm').slideDown();
                });

                // Hide filter form
                $('#closeFilterForm').on('click', function() {
                    $('#filterForm').slideUp();
                });

            });
        </script>
    @endpush
