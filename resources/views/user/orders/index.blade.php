<x-layouts.user>

    <div class="col">
        <div class="p-2">
            <div class="d-flex justify-content-center">
                <div class="w-75">
                    <h3>My Orders</h3>

                    @foreach ($orders as $order)
                        <div class="col border-top border-bottom">
                            <div class="row">
                                <div class="col-1">
                                    Name:
                                </div>
                                <div class="col-5">
                                    {{ $order->name }}
                                </div>
                                <div class="col-1">
                                    Contact:
                                </div>
                                <div class="col">
                                    {{ $order->contact }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    Address:
                                </div>
                                <div class="col-9">
                                    {{ $order->address }}
                                </div>
                                <div class="col">
                                    <a href="{{ route('user.orders.show', ['order' => $order]) }}"
                                        class="btn btn-sm btn-primary">Select</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    Date:
                                </div>
                                <div class="col-5">
                                    {{ $order->created_at }}
                                </div>
                                <div class="col-1">
                                    Status:
                                </div>
                                <div class="col">
                                    {{ $order->status }}
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex py-2">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>






</x-layouts.user>
