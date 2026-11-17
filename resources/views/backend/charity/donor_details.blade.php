@extends('backend.layouts.app')
@section('title', 'Donation Details')
@section('content')
    <div class="container-fluid">
        <div class="row items-push justify-content-center">
            <div class="col-sm-6 col-xxl-10">
                <div class="content">
                    <!-- Header Block / Summary Card -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Donor Details Overview</h3>
                        </div>
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col-md-4">
                                    <div class="fs-sm fw-semibold text-muted text-uppercase">Donor Name</div>
                                    <div class="fs-4 fw-bold text-dark">{{ $donorInfo['name'] }}</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fs-sm fw-semibold text-muted text-uppercase">Phone Number</div>
                                    <div class="fs-4 fw-bold text-dark">{{ $donorInfo['phone'] }}</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fs-sm fw-semibold text-muted text-uppercase">Total Contributed</div>
                                    <div class="fs-3 fw-bold text-success">
                                        ৳{{ number_format($donorInfo['total_amount'], 2) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Donations Breakdown Table -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Donation History & Donation Breakdown</h3>
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Donation No</th>
                                            <th>Date</th>
                                            <th>Donation Breakdown</th>
                                            <th class="text-end">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donations as $donation)
                                            @php
                                                $purpose = is_string($donation->purpose)
                                                    ? json_decode($donation->purpose, true)
                                                    : $donation->purpose;
                                            @endphp
                                            <tr>
                                                <td class="fw-semibold fs-sm">{{ $donation->donation_no }}</td>
                                                <td class="fs-sm">
                                                    {{ \Carbon\Carbon::parse($donation->created_at)->format('d M, Y h:i A') }}
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled mb-0">
                                                        @if (is_array($purpose))
                                                            @foreach ($purpose as $item)
                                                                @php
                                                                    $subcat =
                                                                        $subcategories[$item['subcategory_id']] ?? null;
                                                                @endphp
                                                                <li class="fs-sm">
                                                                    <i class="fa fa-angle-right text-primary me-1"></i>
                                                                    <strong>{{ $subcat ? $subcat->subcategory : 'Unknown Subcategory' }}</strong>:
                                                                    ৳{{ number_format($item['amount'], 2) }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <span class="text-muted fs-sm">N/A</span>
                                                        @endif
                                                    </ul>
                                                </td>
                                                <td class="text-end fw-bold text-success">
                                                    ৳{{ number_format($donation->amount, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
