    @extends('backend.layouts.app')
    @section('title', 'Order List')
    @push('style')
        <style>
            .delivery-menu {
                --bs-dropdown-zindex: 1000;
                --bs-dropdown-min-width: 11.25rem;
                --bs-dropdown-padding-x: 0;
                --bs-dropdown-padding-y: 0.5rem;
                --bs-dropdown-spacer: 0.125rem;
                --bs-dropdown-font-size: 1rem;
                --bs-dropdown-color: var(--bs-body-color);
                --bs-dropdown-bg: var(--bs-body-bg);
                --bs-dropdown-border-color: #d2d9e2;
                --bs-dropdown-border-radius: var(--bs-border-radius);
                --bs-dropdown-border-width: var(--bs-border-width);
                --bs-dropdown-inner-border-radius: calc(var(--bs-border-radius) - var(--bs-border-width));
                --bs-dropdown-divider-bg: #dfe3ea;
                --bs-dropdown-divider-margin-y: 0.5rem;
                --bs-dropdown-box-shadow: 0 0.25rem 2rem rgba(0, 0, 0, 0.08);
                --bs-dropdown-link-color: #212529;
                --bs-dropdown-link-hover-color: #212529;
                --bs-dropdown-link-hover-bg: #ebeef2;
                --bs-dropdown-link-active-color: #212529;
                --bs-dropdown-link-active-bg: #dde2e9;
                --bs-dropdown-link-disabled-color: var(--bs-tertiary-color);
                --bs-dropdown-item-padding-x: 0.75rem;
                --bs-dropdown-item-padding-y: 0.5rem;
                --bs-dropdown-header-color: #6c757d;
                --bs-dropdown-header-padding-x: 0.75rem;
                --bs-dropdown-header-padding-y: 0.5rem;
                position: absolute;
                z-index: var(--bs-dropdown-zindex);
                display: none;
                min-width: var(--bs-dropdown-min-width);
                padding: var(--bs-dropdown-padding-y) var(--bs-dropdown-padding-x);
                margin: 0;
                font-size: var(--bs-dropdown-font-size);
                color: var(--bs-dropdown-color);
                text-align: left;
                list-style: none;
                background-color: var(--bs-dropdown-bg);
                background-clip: padding-box;
                border: var(--bs-dropdown-border-width) solid var(--bs-dropdown-border-color);
                border-radius: var(--bs-dropdown-border-radius);
            }

            .delivery-menu.show {
                display: block;
            }
        </style>
    @endpush
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
                                            <option value="">
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
                                        <th><input id="select_all" type="checkbox" class="form-check-input me-2"> <label
                                                for="select_all">Select All</label> </th>
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
                                <tfoot>
                                    <td colspan="9">
                                        <button id="printSelected" class="btn btn-primary btn-sm">
                                            <span class="spinner-border spinner-border-sm me-2 d-none" role="status"
                                                aria-hidden="true"></span>
                                            <span class="btn-text">Print Selected</span>
                                        </button>
                                    </td>
                                </tfoot>
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
            function deleteOrder(button) {
                const id = $(button).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('admin.orders.destroy', ':id') }}";
                        url = url.replace(':id', id);
                        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            success: function(data) {
                                if (data.success) {
                                    showToast(data.message, "success");
                                    $(button).closest('tr').remove();
                                } else {
                                    showToast(data.message, "error");
                                }
                            },
                            error: function(xhr) {
                                showToast("An error occurred: " + xhr.responseJSON.message, "error");
                            }
                        });
                    }
                });
            }
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

        <script>
            $(document).ready(function() {

                // Select All click
                $('#select_all').on('change', function() {
                    $('.selectRow').prop('checked', $(this).prop('checked'));
                });

                // Individual checkbox change
                $(document).on('change', '.selectRow', function() {

                    // total checkbox count
                    let total = $('.selectRow').length;

                    // checked checkbox count
                    let checked = $('.selectRow:checked').length;

                    // if all checked → select_all checked
                    if (total === checked) {
                        $('#select_all').prop('checked', true);
                    } else {
                        $('#select_all').prop('checked', false);
                    }
                });

            });
        </script>

        <script>
            $('#printSelected').on('click', function() {

                let ids = [];
                $('.selectRow:checked').each(function() {
                    ids.push($(this).val());
                });

                if (ids.length === 0) {
                    showToast('Please select at least one order', 'error');
                    return;
                }

                let $button = $(this);
                let $spinner = $button.find('.spinner-border');
                let $btnText = $button.find('.btn-text');

                // Show spinner
                $spinner.removeClass('d-none');
                $btnText.text('Processing...');
                $button.prop('disabled', true);

                // create hidden iframe
                let iframe = document.createElement('iframe');
                iframe.style.display = 'none';

                // When iframe loads, hide spinner
                iframe.onload = function() {
                    $spinner.addClass('d-none');
                    $btnText.text('Print Selected');
                    $button.prop('disabled', false);
                };

                iframe.src = "{{ route('admin.orders.bulkPrint') }}?ids=" + ids.join(',');
                document.body.appendChild(iframe);
            });
        </script>
    @endpush
