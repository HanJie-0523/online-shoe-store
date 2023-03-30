<x-layouts.admin>

    <div class="col">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h3>Order Details</h3>
            </div>
            <div>
                <a href="{{ route('admin.orders.edit', ['order' => $order]) }}" class="btn btn-sm btn-success">Edit</a>
            </div>
        </div>
        <div class="col">
            Name: {{ $order->name }}
        </div>
        <div class="col">
            Contact: {{ $order->contact }}
        </div>
        <div class="col">
            Address: {{ $order->address }}
        </div>
        <div class="col">
            Order Time: {{ $order->created_at }}
        </div>
        <div class="col">
            Status: {{ $order->status }}
        </div>
        <div class="col py-3">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderProducts as $orderProduct)
                            <tr>
                                <td align="center">
                                    <div>
                                        <img src="{{ asset('storage/' . $orderProduct->product->image) }}" class="image-fluid"
                                            style="width: 100px;
                                    height: 200px; object-fit: contain;">
                                    </div>
                                </td>
                                <td>{{ $orderProduct->name }}</td>
                                <td>{{ $orderProduct->color }}</td>
                                <td>{{ $orderProduct->size }}</td>
                                <td>{{ $orderProduct->price }}</td>
                                <td>{{ $orderProduct->quantity }}</td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <div class="col">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        Amount: RM {{ $order->amount }}
                    </div>

                </div>
            </div>
        </div>



    </div>












</x-layouts.admin>
