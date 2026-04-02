<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Services\PathaoService;
use App\Services\SteadfastService;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    protected $pathao;

    public function __construct()
    {
        $this->pathao = new PathaoService();
    }

    public function details($method, $id)
    {
        $order = Order::with('customer')->where('id', $id)->first();

        if ($method == 'steadfast') {
            return view('backend.delivery.steadfast', compact('order', 'method'));
        } elseif ($method == 'pathao') {
            return view('backend.delivery.pathao', compact('order', 'method'));
        } elseif ($method == 'redx') {
            return view('backend.delivery.redx', compact('order', 'method'));
        }
    }

    public function steadfast_submit(Request $request, $id)
    {

        // dd($request->all());
        $method = 'steadfast';


        $order = Order::findOrFail($id); // order fetch

        $deliveryMethod = DeliveryMethod::where('name', $method)->firstOrFail();
        $service = new SteadfastService($deliveryMethod->config);


        $data = [
            "invoice" => (string) $order->invoice_no,
            "recipient_name" => $request->name,
            "recipient_phone" => $request->phone,
            "recipient_address" => $request->address,
            "cod_amount" => (int) $request->amount,
            "note" => $request->note ?? null,
        ];

        // Check required fields (exclude 'note')
        $requiredFields = collect($data)->except('note');

        if ($requiredFields->contains(null)) {
            return redirect()->back()->with('error', 'Order data is incomplete.');
        }

        $response = $service->createOrder($data);

        if (!isset($response['status']) || $response['status'] != 200) {
            $errors = $response['errors'] ?? [];
            $errorMessages = collect($errors)->flatten()->implode(', ');
            return redirect()->back()->with('error', $errorMessages ?: 'Failed to place order.');
        }

        dd($response);

        if (isset($response['status']) && $response['status'] === 'success') {
            $order->delivery_method = $method;
            $order->delivery_cons_id = $response['consignment']['tracking_code'];
            $order->save();
            return redirect()->route('admin.orders.list', 'out_for_delivery')->with('success', 'Order sent to Steadfast successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create order: ' . $response['message'] ?? 'Unknown error');
        }
    }

    public function getCities()
    {
        $cities = $this->pathao->getCities();
        return response()->json($cities['data']['data'] ?? []);
    }

    public function getZones($city_id)
    {
        $zones = $this->pathao->getZones($city_id);
        return response()->json($zones['data']['data'] ?? $zones ?? []);
    }

    public function getAreas($zone_id)
    {
        $areas = $this->pathao->getAreas($zone_id);
        return response()->json($areas['data']['data'] ?? $areas ?? []);
    }


    public function pathao_submit(Request $request, $id)
    {
        $method = 'pathao';


        $order = Order::findOrFail($id); // order fetch

        $deliveryMethod = DeliveryMethod::where('name', $method)->firstOrFail();

        $response = $this->pathao->createOrder([
            'store_id'           => $deliveryMethod->config['store_id'],
            'merchant_order_id'  => $order->invoice_no,
            'recipient_name'     => $order->customer->name,
            'recipient_phone'    => $order->customer->phone,
            'recipient_address'  => $order->customer->address,
            'recipient_city'     => $order->city_id,
            'recipient_zone'     => $order->zone_id,
            'recipient_area'     => $order->area_id,
            'delivery_type'      => 48,
            'item_type'          => 2,
            'item_quantity'      => 1,
            'item_weight'        => 0.5,
            'amount_to_collect'  => $order->total,
        ]);


        // ✅ Check success
        if (isset($response['code']) && $response['code'] == 200) {

            $order->delivery_method = 'pathao';
            $order->delivery_cons_id = $response['data']['consignment_id'];
            $order->order_status = 'delivered';
            $order->save();

            return redirect()->route('admin.orders.list', 'out_for_delivery')->with('success', 'Order sent to Pathao successfully!');
        } else {

            return redirect()->back()->with(
                'error',
                $response['message'] ?? 'Pathao order failed'
            );
        }
    }
}
