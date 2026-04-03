        @forelse ($orders as $key => $order)
            <tr>
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

                    <span class="badge bg-primary text-uppercase">{{ $order->user->name ?? 'Customer' }}</span>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{ route('admin.orders.details', $order->id) }}"
                            class="btn btn-alt-secondary js-bs-tooltip-enabled"><i
                                class="fa fa-fw text-info fa-eye"></i></a>
                        <a href="{{ route('admin.orders.invoice', $order->id) }}" target="_blank"
                            class="btn btn-alt-secondary js-bs-tooltip-enabled"><i
                                class="fa fa-fw text-success fa-receipt"></i></a>
                        <button type="button" class="btn btn-alt-secondary" onclick="deleteOrder(this)"
                            data-id="{{ $order->id }}">
                            <i class="fa fa-fw fa-trash text-danger "></i>
                        </button>
                        @if ($order->order_status == 'confirmed')
                            @if ($delivery->count() > 0)
                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-truck-arrow-right"></i>
                                </button>

                                <div class="dropdown-menu fs-sm deliveryMenu">
                                    @foreach ($delivery as $method)
                                        <a href="{{ route('admin.deliver.details', ['method' => urlencode($method->name), 'id' => $order->id]) }}"
                                            class="btn btn-alt-secondary dropdown-item text-capitalize">
                                            {{ $method->name }}
                                        </a>
                                    @endforeach
                                </div>
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
