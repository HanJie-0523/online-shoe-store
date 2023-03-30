<x-layouts.user>
    <div class="col">
        <form method="POST" action="{{ route('user.orders.store') }}">
            @csrf
            <h3>Checkout</h3>
            <div class="col">
                <label class='form-label' for="name">Name:</label><br>
                <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}"
                    required><br>
            </div>
            <div class="col">
                <label class='form-label' for="contact">Contact:</label><br>
                <input class="form-control" type="tel" id="contact" name="contact" value="{{ $user->contact }}"
                    pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required><br>
            </div>
            <div class="col">
                <label class='form-label' for="address">Address:</label><br>
                <input class="form-control" type="text" id="address" name="address" value="{{ $user->address }}"
                    required><br>
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
                            @foreach ($cartProducts as $cartProduct)
                                <tr>
                                    <td align="center">
                                        <div>
                                            <img src="{{ asset('storage/' . $cartProduct->product->image) }}" class="image-fluid"
                                                style="width: 100px;
                                        height: 200px; object-fit: contain;">
                                        </div>
                                    </td>
                                    <td>{{ $cartProduct->product->name }}</td>
                                    <td>{{ $cartProduct->color }}</td>
                                    <td>{{ $cartProduct->size }}</td>
                                    <td>{{ $cartProduct->product->price }}</td>
                                    <td>{{ $cartProduct->quantity }}</td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <div class="col">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            Amount: RM {{ $amount }}
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary ">Place Order</button>

                    </div>
                </div>
            </div>
        </form>



    </div>
</x-layouts.user>
