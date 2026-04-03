<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Services\PathaoService;
use App\Services\SteadfastService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SteadFast\SteadFastCourierLaravelPackage\Facades\SteadfastCourier;

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

    public function steadfast_submit(Request $request)
    {

        // dd($request->all());
        $method = 'steadfast';
        $order_id = $request->order_id;

        $order = Order::findOrFail($order_id); // order fetch


        // $orderData = [
        //     "invoice" => $order->invoice_no,
        //     "recipient_name" => $request->name,
        //     "recipient_phone" => $request->phone,
        //     "recipient_address" => $request->address,
        //     "cod_amount" => $request->amount,
        //     "note" => $request->note,
        // ];

        $orderData = [
            'invoice' => $order->invoice_no,
            'recipient_name' => 'John Doe',
            'recipient_phone' => '01234567890',
            'recipient_address' => 'Fla# A1,House# 17/1, Road# 3/A, Dhanmondi,Dhaka-1209',
            'cod_amount' => 1000,
            'note' => 'Handle with care'
        ];

        $response = SteadfastCourier::placeOrder($orderData);
        if (!isset($response['status']) || $response['status'] != 200) {
            $errors = $response['errors'] ?? [];
            $errorMessages = collect($errors)->flatten()->implode(', ');
            return redirect()->back()->with('error', $errorMessages ?: 'Failed to place order.');
        }

        // $service = new SteadfastService();
        // $response = $service->createOrder($orderData);

        // dd($response);

        // if (isset($response['status']) && $response['status'] === 'success') {
        //     $order->delivery_method = $method;
        //     $order->order_status = 'out_for_delivery';
        //     $order->delivery_cons_id = $response['consignment']['tracking_code'];
        //     $order->save();
        //     return redirect()->route('admin.orders.list', 'out_for_delivery')->with('success', 'Order sent to Steadfast successfully!');
        // } else {
        //     return redirect()->back()->with('error', 'Failed to create order: ' . $response['message'] ?? 'Unknown error');
        // }
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
}