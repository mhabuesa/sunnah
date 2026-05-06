        @forelse ($orders as $key => $order)
            <tr>
                @if ($order->order_status == 'out_for_delivery')
                    <td><input type="checkbox" class="form-check-input selectRow" value="{{ $order->id }}"
                            name="selectRowId[]"></td>
                @endif
                <th class="text-center" scope="row">{{ $orders->firstItem() + $key }}</th>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td class="fw-semibold fs-sm">
                    {{ $order->customer->name ?? 'N/A' }} <br>
                    <small>{{ $order->customer->phone ?? '' }}</small>
                </td>
                <td>৳{{ number_format($order->total, 2) }}</td>
                <td>
                    <span class="badge bg-info text-uppercase">{{ $order->payment_method }}</span>
                </td>
                <td>

                    @if ($order->order_type == 'pos')
                        <span class="badge bg-primary text-uppercase">{{ $order->user->name }}</span>
                    @elseif ($order->order_type == 'landing')
                        <span class="badge bg-info text-uppercase">Campaign</span>
                    @else
                        <span class="badge bg-success text-uppercase">Customer</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group">

                        {{-- View --}}
                        <a href="{{ route('admin.orders.details', $order->id) }}" class="btn btn-alt-secondary">
                            <i class="fa fa-fw text-info fa-eye"></i>
                        </a>

                        {{-- Invoice --}}
                        <a href="{{ route('admin.orders.invoice', $order->id) }}" target="_blank"
                            class="btn btn-alt-secondary">
                            <i class="fa fa-fw text-success fa-receipt"></i>
                        </a>

                        {{-- Delete --}}
                        <button type="button" class="btn btn-alt-secondary" onclick="deleteOrder(this)"
                            data-id="{{ $order->id }}">
                            <i class="fa fa-fw fa-trash text-danger"></i>
                        </button>

                        {{-- Delivery --}}
                        @if ($order->order_status === 'confirmed' && $delivery->isNotEmpty())
                            @php
                                $deliveryRoute = fn($method) => route('admin.deliver.details', [
                                    'method' => urlencode($method->name),
                                    'id' => $order->id,
                                ]);
                            @endphp

                            @if ($delivery->count() > 1)
                                {{-- Dropdown --}}
                                <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-truck-arrow-right"></i>
                                </button>

                                <div class="dropdown-menu fs-sm">
                                    @foreach ($delivery as $method)
                                        <a href="{{ $deliveryRoute($method) }}" class="dropdown-item text-capitalize">
                                            {{ $method->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                {{-- Single delivery --}}
                                <a href="{{ $deliveryRoute($delivery->first()) }}" class="btn btn-dark">
                                    <i class="fa-solid fa-truck-arrow-right"></i>
                                </a>
                            @endif
                        @endif

                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No Orders Found</td>
            </tr>
        @endforelse
