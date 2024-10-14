<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th>Transaction No.</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($orders) === 0) {{-- if the order count is 0 --}}
                <tr>
                    <td colspan="4" class="text-center">No orders available.</td>
                </tr>
            @else
                @foreach ($orders as $order)
                    <tr>
                        <td> {{ $order->transaction_no }} </td>
                        <td> {{ $order->customer_name }} </td>
                        <td> {{ $order->state }} </td>
                        <td role="button" class="btn btn-sm btn-primary w-100 btnShowDetails"
                            data-bs-toggle="modal" 
                            data-bs-target="#orderModal" 
                            data-transaction-no="{{ $order->transaction_no }}"
                        >
                            <i class="fa-regular fa-folder-open"></i>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

{{-- status:

0 - cancelled
1 - served
2 - ready to serve
3 - pending --}}

{{-- Modal --}}
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="orderDetails"> {{-- will add here --}} </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btnShowDetails').on('click', function(e) {
            const transactionNo = e.target.getAttribute('data-transaction-no');

            $.ajax({
                url: '/order_details',
                method: 'GET',
                data: { transactionNo: transactionNo },
                success: function(response) {
                    $('#orderDetails').html(response);
                }
            });
        });
    });
</script>