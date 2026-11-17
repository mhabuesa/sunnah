@extends('backend.layouts.app')
@section('title', 'Donation Details')
@section('content')
    <div class="container-fluid">
        <div class="row items-push justify-content-center">
            <div class="col-sm-6 col-xxl-5">
                <div class="block block-rounded">
                    <div class="block-content">
                        <h4 class="fw-bold text-primary mb-1">{{ $donation->donor_name }}</h4>
                        <p class="text-muted mb-0 fw-bold text-black">Total Donation: ৳{{ number_format($donation->amount, 2) }}</p>
                        <p class="text-muted mb-3">Date: {{  $donation->created_at->format('d-M-Y') }}</p>

                        <hr>

                        <h5 class="fw-bold mb-3">Donation Breakdown:</h5>

                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Purpose</th>
                                        <th class="text-end">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purpose as $item)
                                        @php
                                            $subcat = $subcategories[$item['subcategory_id']] ?? null;
                                        @endphp
                                        <tr>
                                            <td class="fw-medium">
                                                {{ $subcat ? $subcat->subcategory : 'Unknown Subcategory' }}
                                            </td>
                                            <td class="text-end fw-bold">
                                                ৳{{ number_format($item['amount'], 2) }}
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
@endsection
