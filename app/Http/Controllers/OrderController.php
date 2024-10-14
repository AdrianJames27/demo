<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function search_order(Request $request)
    {
        $keyword = $request->keyword;
        $orders = Order::where('transaction_no', 'like', '%' . $keyword . '%')
            ->orWhere('customer_name', 'like', '%' . $keyword . '%')->get();

        return view('search_result', compact('orders'));
    }

    public function order_details(Request $request)
    {
        $order = Order::where('transaction_no', $request->transactionNo)->first();

        if ($order) {
            $orderItems = OrderItem::where('order_id', $order->order_id)->get();

            // Get an array of item IDs from the order items
            $itemIds = $orderItems->pluck('items_id');

            // Retrieve all items associated with the order items in one query
            $items = Item::whereIn('items_id', $itemIds)->get()->keyBy('items_id');

            $totalAmountOrdered = 0;
            $itemsDetails = [];

            foreach ($orderItems as $orderItem) {
                // Retrieve the item associated with the order item
                $item = $items->get($orderItem->items_id);

                if ($item) {
                    // Calculate total price for this order item
                    $totalPrice = $item->price * $item->quantity;

                    // Accumulate the total amount ordered
                    $totalAmountOrdered += $totalPrice;

                    // Store item details
                    $itemsDetails[] = [
                        'item_name' => $item->name,
                        'quantity' => $orderItem->quantity,
                        'unit_price' => $item->price,
                        'total_price' => $totalPrice,
                    ];
                }
            }

            $orderDetails = [
                'items' => $itemsDetails,
                'total_amount_ordered' => $totalAmountOrdered,
            ];
        } else {
            // Handle the case where the order is not found
            $orderDetails = [
                'items' => [],
                'total_amount_ordered' => 0,
            ];
        }

        return view('modal', compact('orderDetails'));
    }
}
