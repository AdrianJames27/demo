<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        @if (empty($orderDetails['items']))
            <tr> 
                <td colspan="4" class="text-center">No order yet.</td> 
            </tr>
        @else
            @foreach ($orderDetails['items'] as $itemDetail)
                <tr>
                    <td>{{ $itemDetail['item_name'] }}</td>
                    <td>{{ $itemDetail['quantity'] }}</td>
                    <td>${{ number_format($itemDetail['unit_price'], 2) }}</td>
                    <td>${{ number_format($itemDetail['total_price'], 2) }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="text-end">
    @if (!empty($orderDetails['items']))
        <h5>Total Amount Ordered: ${{ number_format($orderDetails['total_amount_ordered'], 2) }}</h5>
    @endif
</div>

{{-- data to extract
$orderDetails => 'items', 'total_amount_ordered'
$itemsDetails => 'item_name', 'quantity', 'unit_price', 'total_price' --}}