<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Services\PathaoService;
use App\Services\RedxService;
use App\Services\SteadfastService;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    protected $pathao;

    public function __construct()
    {
        $this->pathao = new PathaoService();
    }

    // public function steadfast_details($id)
    // {
    //     $order = Order::with('customer')->where('id', $id)->first();
    //     $method = 'steadfast';
    //     return view('backend.delivery.steadfast', compact('order', 'method'));
    // }

    // public function pathao_details($id)
    // {
    //     $order = Order::with('customer')->where('id', $id)->first();
    //     $method = 'pathao';
    //     return view('backend.delivery.pathao', compact('order', 'method'));
    // }

    // public function redx_details($id)
    // {
    //     $order = Order::with('customer')->where('id', $id)->first();
    //     $method = 'redx';
    //     return view('backend.delivery.redx', compact('order', 'method'));
    // }

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

    public function steadfast_submit(Request $request)
    {

        $order_id = $request->order_id;
        $order = Order::find($order_id);
        $orderData = [
            'invoice' => $order->invoice_no,
            'recipient_name' => $order->customer->name,
            'recipient_phone' => $order->customer->phone,
            'recipient_address' => $order->customer->address,
            'cod_amount' => $order->total,
            'note' => $request->note,
        ];

        $steadfast =  new SteadfastService();
        $response = $steadfast->createOrder($orderData);

        if (!isset($response['status']) || $response['status'] != 200) {
            $errors = $response['errors'] ?? [];
            $errorMessages = collect($errors)->flatten()->implode(', ');
            return redirect()->back()->with('error', $errorMessages ?: 'Failed to place order.');
        }

        $order->update([
            'order_status' => 'out_for_delivery',
            'delivery_cons_id' => $response['consignment']['tracking_code'],
            'delivery_method' => 'steadfast',
        ]);

        return redirect()->route('admin.orders.list', 'out_for_delivery')->with('success', 'Order sent to Steadfast successfully!');
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


        $order = Order::findOrFail($id);

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


        if (isset($response['code']) && $response['code'] == 200) {

            $order->delivery_method =  $method;
            $order->delivery_cons_id = $response['data']['consignment_id'];
            $order->order_status = 'out_for_delivery';
            $order->save();

            return redirect()->route('admin.orders.list', 'out_for_delivery')->with('success', 'Order sent to Pathao successfully!');
        } else {

            return redirect()->back()->with(
                'error',
                $response['message'] ?? 'Pathao order failed'
            );
        }
    }

    public function redx_areas()
    {
        $service = new RedxService();
        $response = $service->getAreas();

        return response()->json($response['areas'] ?? []);
    }

    public function redx_submit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'area_id' => 'required',
            'area_name' => 'required',
            'address' => 'required',
            'cod' => 'required',
            'weight' => 'required',
        ]);

        $order = Order::findOrFail($id);

        $data = [
            "customer_name" => $request->name,
            "customer_phone" => $request->phone,
            "delivery_area" => $request->area_name,
            "delivery_area_id" => (int)$request->area_id,
            "customer_address" => $request->address,
            "merchant_invoice_id" => $order->invoice_no,
            "cash_collection_amount" => $request->cod,
            "parcel_weight" => (int)$request->weight,
            "value" => $request->cod,
            "instruction" => "N/A",
        ];

        $service = new RedxService();
        $response = $service->createOrder($data);

        if (isset($response['tracking_id'])) {
            $order->delivery_method =  'redx';
            $order->delivery_cons_id = $response['tracking_id'];
            $order->order_status = 'out_for_delivery';
            $order->save();

            return redirect()->route('admin.orders.list', 'out_for_delivery')->with('success', 'Order sent to Redx successfully!');
        }

        return back()->with('error', 'Failed to create parcel');
    }
}