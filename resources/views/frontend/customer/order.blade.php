@extends('frontend.layouts.app')
@section('title', 'Customer Orders')
@push('header_script')
    <style>
        /* =========================================
                                               CUSTOMER DASHBOARD
                                            ========================================= */

        .customer-sidebar,
        .customer-content {
            width: 100%;
        }


        /* =========================================
                                               SIDEBAR
                                            ========================================= */

        .customer-sidebar {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.04);
        }


        /* Profile */

        .customer-profile {
            position: relative;
            text-align: center;
            padding: 25px;
        }

        .profile-cover {
            height: 120px;
            background:
                linear-gradient(135deg,
                    rgba(13, 171, 145, 0.85),
                    rgba(8, 143, 121, 0.85));
        }

        .profile-image-wrapper {
            width: 100px;
            height: 100px;
            margin: -50px auto 15px;
            position: relative;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            background: #fff;
            padding: 5px;
            border: 4px solid #fff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .profile-info h4 {
            margin: 0;
            font-size: 19px;
            font-weight: 600;
            color: #222;
        }

        .profile-info p {
            margin: 5px 15px 0;
            font-size: 13px;
            color: #777;
            word-break: break-word;
        }


        /* =========================================
                                               CUSTOMER MENU
                                            ========================================= */

        .customer-menu {
            padding: 10px 12px 15px;
            border-top: 1px solid #eeeeee;
        }

        .customer-menu-item {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 13px;

            padding: 13px 15px;
            margin-bottom: 3px;

            border-radius: 7px;

            text-decoration: none;
            color: #555;

            font-size: 15px;
            font-weight: 500;

            transition: all 0.25s ease;
            background: transparent;
            border: none;
            text-align: left;
        }

        .customer-menu-item:hover {
            color: #0dab91;
            background: #effaf8;
            padding-left: 20px;
        }

        .customer-menu-item.active {
            color: #0dab91;
            background: #e5f7f3;
            font-weight: 600;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 15px;
        }

        .logout-btn {
            cursor: pointer;
        }


        /* =========================================
                                               RIGHT CONTENT
                                            ========================================= */

        .customer-content {
            background: #fff;
        }


        /* Header */

        .dashboard-header {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px 28px;
            margin-bottom: 20px;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.03);
        }

        .dashboard-header h2 {
            margin: 0 0 5px;
            font-size: 26px;
            font-weight: 600;
            color: #222;
        }

        .dashboard-header p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }


        /* =========================================
                                               STATISTICS
                                            ========================================= */

        .dashboard-stat-card {
            display: flex;
            align-items: center;
            gap: 15px;

            background: #ffffff;

            border: 1px solid #eeeeee;
            border-radius: 10px;

            padding: 20px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);

            transition: all 0.25s ease;
        }

        .dashboard-stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        }

        .stat-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #e7f8f4;
            color: #0dab91;

            border-radius: 9px;

            font-size: 18px;
        }

        .dashboard-stat-card h3 {
            margin: 0;
            font-size: 23px;
            font-weight: 600;
            color: #222;
        }

        .dashboard-stat-card p {
            margin: 2px 0 0;
            color: #777;
            font-size: 13px;
        }


        /* =========================================
                                               DASHBOARD CARD
                                            ========================================= */

        .dashboard-card {
            background: #ffffff;
            border: 1px solid #eeeeee;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.03);
        }

        .dashboard-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 20px;
        }

        .dashboard-card-header h3 {
            margin: 0;
            font-size: 19px;
            font-weight: 600;
            color: #222;
        }

        .dashboard-card-header p {
            margin: 4px 0 0;
            color: #888;
            font-size: 13px;
        }

        .view-all-btn {
            color: #0dab91;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .view-all-btn:hover {
            color: #07836f;
        }


        /* =========================================
                                               ORDER TABLE
                                            ========================================= */

        .customer-order-table {
            margin: 0;
            min-width: 650px;
        }

        .customer-order-table thead th {
            border-bottom: 1px solid #ddd;
            border-top: none;

            padding: 13px 10px;

            color: #555;

            font-size: 13px;
            font-weight: 600;

            white-space: nowrap;
        }

        .customer-order-table tbody td {
            padding: 15px 10px;

            vertical-align: middle;

            border-bottom: 1px solid #eeeeee;

            color: #555;
            font-size: 13px;
        }

        .customer-order-table tbody tr:last-child td {
            border-bottom: none;
        }

        .customer-order-table tbody tr:hover {
            background: #fafdfc;
        }


        /* =========================================
                                               ORDER STATUS
                                            ========================================= */

        .order-status {
            display: inline-flex;
            align-items: center;

            padding: 5px 12px;

            border-radius: 30px;

            font-size: 11px;
            font-weight: 600;
        }

        .order-status.shipped {
            color: #0b9c82;
            background: #e5f7f3;
        }

        .order-status.pending {
            color: #e96c6c;
            background: #fff0f0;
        }


        /* =========================================
                                               ACCOUNT INFORMATION
                                            ========================================= */

        .small-card {
            height: 100%;
        }

        .account-info {
            border-top: 1px solid #eeeeee;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            gap: 15px;

            padding: 12px 0;

            border-bottom: 1px solid #eeeeee;

            font-size: 13px;
        }

        .info-item span {
            color: #888;
        }

        .info-item strong {
            color: #333;
            text-align: right;
            word-break: break-word;
        }

        .edit-profile-btn {
            display: inline-block;

            margin-top: 18px;

            padding: 9px 18px;

            background: #0dab91;
            color: #fff;

            border-radius: 6px;

            font-size: 13px;
            font-weight: 600;

            text-decoration: none;
        }

        .edit-profile-btn:hover {
            background: #07836f;
            color: #fff;
        }


        /* =========================================
                                               QUICK ACTIONS
                                            ========================================= */

        .quick-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .quick-actions a {
            display: flex;
            align-items: center;
            gap: 8px;

            padding: 12px;

            background: #f8faf9;

            border-radius: 7px;

            color: #555;

            text-decoration: none;

            font-size: 13px;

            transition: all 0.2s ease;
        }

        .quick-actions a i {
            color: #0dab91;
        }

        .quick-actions a:hover {
            background: #e7f8f4;
            color: #0dab91;
        }


        /* =========================================
                                               RESPONSIVE
                                            ========================================= */

        @media (max-width: 991px) {

            .customer-sidebar {
                margin-bottom: 5px;
            }

            .dashboard-header {
                padding: 20px;
            }

            .dashboard-card {
                padding: 20px;
            }

        }


        @media (max-width: 767px) {

            .dashboard-header h2 {
                font-size: 22px;
            }

            .dashboard-stat-card {
                padding: 16px;
            }

            .dashboard-card {
                padding: 16px;
            }

            .dashboard-card-header {
                align-items: flex-start;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

        }

        /* =========================================
                           ORDER ACTION
                        ========================================= */

        .order-action {
            position: relative;
            display: inline-block;
        }


        /* 3 Dot Button */

        .order-action-btn {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #e8e8e8;
            background: #fff;

            border-radius: 6px;

            color: #555;
            font-size: 16px;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .order-action-btn:hover,
        .order-action-btn.active {
            background: #f1faf8;
            border-color: #0dab91;
            color: #0dab91;
        }


        /* =========================================
                           DROPDOWN
                        ========================================= */

        .order-action-menu {
            position: fixed;

            min-width: 150px;

            padding: 6px;

            background: #fff;

            border: 1px solid #eeeeee;
            border-radius: 8px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);

            z-index: 9999;

            opacity: 0;
            visibility: hidden;

            transform: translateY(-5px);

            transition:
                opacity 0.15s ease,
                transform 0.15s ease;
        }


        /* Open */

        .order-action-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .order-action-menu.open-up {
            transform: translateY(5px);
        }

        .order-action-menu.open-up.show {
            transform: translateY(0);
        }


        /* =========================================
                           ACTION ITEM
                        ========================================= */

        .order-action-item {
            width: 100%;

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 9px 10px;

            border: none;
            background: transparent;

            border-radius: 5px;

            color: #555;

            text-decoration: none;

            font-size: 13px;

            cursor: pointer;

            text-align: left;

            transition: all 0.2s ease;
        }

        .order-action-item i {
            width: 17px;
            text-align: center;
            font-size: 13px;
        }

        .order-action-item:hover {
            background: #f5f8f7;
            color: #0dab91;
        }


        /* Cancel */

        .order-action-item.cancel-action {
            color: #e85d5d;
        }

        .order-action-item.cancel-action:hover {
            background: #fff1f1;
            color: #dc4040;
        }

        .dashboard-card {
            overflow: visible;
        }
    </style>
@endpush
@section('content')
    <div class="container py-5">
        <div class="row g-4">

            {{-- ================= LEFT SIDEBAR ================= --}}
            @include('frontend.customer.partials.sidebar')


            {{-- ================= RIGHT CONTENT ================= --}}
            <div class="col-lg-9 col-md-8">

                <div class="customer-content">
                    {{-- All Orders --}}
                    <div class="dashboard-card">

                        <div class="dashboard-card-header">
                            <div>
                                <h3>All Orders</h3>
                            </div>
                        </div>


                        <div class="table-responsive">

                            <table class="table customer-order-table">

                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>

                                            <td>
                                                <strong>#{{ $order->invoice_no }}</strong>
                                            </td>

                                            <td>
                                                @foreach ($order->orderDetails as $detail)
                                                    <div>
                                                        {{ $detail->product->name }} - {{ $detail->variant }}
                                                        <span class="">- ({{ $detail->qty }} x
                                                            {{ number_format($detail->price) }}) </span>
                                                    </div>
                                                @endforeach
                                            </td>

                                            <td>
                                                {{ $order->created_at->format('M d, Y') }}
                                            </td>

                                            <td>
                                                <span class="order-status shipped capitalize text-white"
                                                    style="background-color: {{ $order->order_status == 'pending' ? '#e96c6c' : '#0b9c82' }}">
                                                   {{ ucwords(str_replace('_', ' ', $order->order_status)) }}
                                                </span>
                                            </td>

                                            <td>
                                                <strong>{{ number_format($order->total) }}</strong>
                                            </td>
                                            <td>
                                                <div class="order-action">

                                                    <button type="button" class="order-action-btn"
                                                        onclick="toggleOrderMenu(this)">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </button>

                                                    <div class="order-action-menu">

                                                        <a href="#" class="order-action-item">
                                                            <i class="fa-solid fa-file-invoice"></i>
                                                            <span>Invoice</span>
                                                        </a>

                                                        <button type="button" class="order-action-item cancel-action">
                                                            <i class="fa-solid fa-ban"></i>
                                                            <span>Cancel Order</span>
                                                        </button>

                                                    </div>

                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                No orders found.
                                            </td>
                                        </tr>
                                    @endforelse


                                    {{-- <tr>

                                            <td>
                                                <strong>#355678</strong>
                                            </td>

                                            <td>
                                                Peanut Butter Bite Premium Cookies
                                            </td>

                                            <td>
                                                Aug 17, 2026
                                            </td>

                                            <td>
                                                <span class="order-status pending">
                                                    Pending
                                                </span>
                                            </td>

                                            <td>
                                                <strong>$25.69</strong>
                                            </td>

                                        </tr>


                                        <tr>

                                            <td>
                                                <strong>#647536</strong>
                                            </td>

                                            <td>
                                                Yumitos Chilli Sprinkled Potato Chips
                                            </td>

                                            <td>
                                                Aug 15, 2026
                                            </td>

                                            <td>
                                                <span class="order-status shipped">
                                                    Shipped
                                                </span>
                                            </td>

                                            <td>
                                                <strong>$25.69</strong>
                                            </td>

                                        </tr>


                                        <tr>

                                            <td>
                                                <strong>#125689</strong>
                                            </td>

                                            <td>
                                                Healthy Long Life Toned Milk
                                            </td>

                                            <td>
                                                Aug 14, 2026
                                            </td>

                                            <td>
                                                <span class="order-status pending">
                                                    Pending
                                                </span>
                                            </td>

                                            <td>
                                                <strong>$25.69</strong>
                                            </td>

                                        </tr> --}}

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

@push('footer_script')
    <script>
        function toggleOrderMenu(button) {

            const currentMenu = button.nextElementSibling;

            // If this menu is already open, close it
            if (currentMenu.classList.contains('show')) {

                currentMenu.classList.remove('show', 'open-up');
                button.classList.remove('active');

                return;
            }


            // Close all other menus
            document.querySelectorAll('.order-action-menu').forEach(function(menu) {
                menu.classList.remove('show', 'open-up');
            });

            document.querySelectorAll('.order-action-btn').forEach(function(btn) {
                btn.classList.remove('active');
            });


            // Get button position
            const buttonRect = button.getBoundingClientRect();


            // Temporarily show menu to calculate height
            currentMenu.style.visibility = 'hidden';
            currentMenu.style.display = 'block';

            const menuHeight = currentMenu.offsetHeight;
            const menuWidth = currentMenu.offsetWidth;

            currentMenu.style.display = '';
            currentMenu.style.visibility = '';


            const spaceBelow = window.innerHeight - buttonRect.bottom;
            const spaceAbove = buttonRect.top;


            // Horizontal position
            let leftPosition = buttonRect.right - menuWidth;

            if (leftPosition < 10) {
                leftPosition = 10;
            }

            if (leftPosition + menuWidth > window.innerWidth - 10) {
                leftPosition = window.innerWidth - menuWidth - 10;
            }


            // Vertical position
            if (spaceBelow >= menuHeight + 10) {

                // Open below
                currentMenu.style.top = (buttonRect.bottom + 7) + 'px';

                currentMenu.classList.remove('open-up');

            } else {

                // Open above
                currentMenu.style.top = (buttonRect.top - menuHeight - 7) + 'px';

                currentMenu.classList.add('open-up');
            }


            currentMenu.style.left = leftPosition + 'px';


            // Show
            currentMenu.classList.add('show');
            button.classList.add('active');
        }


        /*
        |--------------------------------------------------------------------------
        | Click outside → close
        |--------------------------------------------------------------------------
        */

        document.addEventListener('click', function(e) {

            if (!e.target.closest('.order-action')) {

                document.querySelectorAll('.order-action-menu').forEach(function(menu) {
                    menu.classList.remove('show', 'open-up');
                });

                document.querySelectorAll('.order-action-btn').forEach(function(btn) {
                    btn.classList.remove('active');
                });

            }

        });
    </script>
@endpush
