<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function list($type = 'pending') {
        $users = User::all();
        return view("backend.order.list", compact("type", "users"));
    }

    public function getOrders(Request $request)
    {
        $query = Order::with(['customer', 'user'])->latest();

        // 1. Filter by order status
        if ($request->order_status && $request->order_status != 'all') {
            $query->where('order_status', $request->order_status);
        }

        // 2. Filter by order type (POS/frontend)
        if ($request->order_type && $request->order_type != 'all') {
            $query->where('order_type', $request->order_type);
        }

        // 3. Filter by payment status
        if ($request->payment_status && $request->payment_status != 'all') {
            $query->where('payment_status', $request->payment_status);
        }

        // 4. Filter by user (seller_id)
        if ($request->user_id) {
            $query->where('seller_id', $request->user_id);
        }

        // 5. Filter by date type
        if ($request->date_type) {
            $today = Carbon::today();
            switch ($request->date_type) {
                case 'today':
                    $query->whereDate('created_at', $today);
                    break;
                case 'this_week':
                    $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'this_month':
                    $query->whereMonth('created_at', $today->month)
                          ->whereYear('created_at', $today->year);
                    break;
                case 'this_year':
                    $query->whereYear('created_at', $today->year);
                    break;
                case 'custom_date':
                    if ($request->from && $request->to) {
                        $query->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59']);
                    }
                    break;
            }
        }

        // 6. Search by order ID, customer name, or phone
        if ($request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('customer', function($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%")
                         ->orWhere('phone', 'like', "%{$search}%");
                  });
            });
        }

        $orders = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('backend.order.order_table', compact('orders'))->render(),
                'pagination' => (string) $orders->links('pagination::bootstrap-5')
            ]);
        }

        return view('backend.pos.orders', compact('orders'));
    }

    public function details($id)
    {
        $order = Order::with([
            'customer',
            'orderDetails.product',
            'orderDetails.variation'
        ])->findOrFail($id);

        return view('backend.order.details', compact('order'));
    }


    public function fraudCheck(Request $request)
    {
        $phone = $request->phone;
        Log::info($phone);

        $apiKey = config('api.FRAUD_CHECK_API');

        try {

            // API 1
            $api1 = Http::get("https://dash.hoorin.com/api/courier/api", [
                'apiKey' => $apiKey,
                'searchTerm' => $phone
            ]);

            // API 2
            $api2 = Http::get("https://dash.hoorin.com/api/courier/sheet", [
                'apiKey' => $apiKey,
                'searchTerm' => $phone
            ]);

            return response()->json([
                'success' => true,
                'api1' => $api1->json(),
                'api2' => $api2->json(),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'API Error'
            ]);
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'order_status'=> 'required',
            'payment_method'=> 'required',
            'payment_status'=> 'required',
        ]);
        Order::findOrFail($id)->update([
            'payment_method'=> $request->payment_method,
            'payment_status'=> $request->payment_status,
            'order_status'=> $request->order_status,
        ]);
        return redirect()->back()->with('success','Order Update Successful');
    }

    public function printReceipt($id)
    {
        // ডেটাবেজ থেকে অর্ডার এবং আইটেমগুলো নিয়ে আসা
        $order = Order::findOrFail($id);

        return view('backend.order.receipt', compact('order'));
}
}