<x-layouts.user>

    <div class="col">
        <div class="p-2">
            <div class="d-flex justify-content-center">
                <div class="w-75">
                    <h3>Cart</h3>
                    <a href="{{ route('user.orders.index') }}" class="btn btn-sm btn-primary">My Orders</a>


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
                        <tbody id="cartProducts">
                            <div id="cartProducts">
                                @foreach ($cartProducts as $cartProduct)
                                    {{-- <div id="{{ $cartProduct->id }}"> --}}
                                        <tr id="cart_{{$cartProduct->id}}">
                                            <td align="center">
                                                <div>
                                                    <img src="{{ asset('storage/' . $cartProduct->product->image) }}"
                                                        class="image-fluid"
                                                        style="width: 100px;
                                                        height: 200px; object-fit: contain;">
                                                </div>
                                            </td>
                                            <input type="hidden" name="id" value="{{ $cartProduct->id }}" />
                                            <td>{{ $cartProduct->product->name }}</td>
                                            <td>{{ $cartProduct->color }}</td>
                                            <td>{{ $cartProduct->size }}</td>
                                            <td>{{ $cartProduct->product->price }}</td>
                                            <td>{{ $cartProduct->quantity }}</td>
                                            <td>
                                                <a href="{{ route('user.products.show', ['product' => $cartProduct->product]) }}"
                                                    class="btn btn-sm btn-primary">Select</a>
                                            </td>
                                            <td>

                                                @csrf
                                                <button type="button" onclick="deleteCart('{{ $cartProduct->id }}')"
                                                    class="btn btn-sm btn-danger">Remove</button>

                                            </td>
                                        </tr>
                                    {{-- </div> --}}
                                @endforeach


                            </div>

                        </tbody>

                    </table>
                    <div class="d-flex">
                        {{-- {!! $cartProducts->links() !!} --}}
                    </div>
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            RM{{ $total }}
                        </div>
                        <a class="btn btn-sm btn-primary {{ sizeof($cartProducts) == 0 ? 'disabled' : '' }}"
                            href="{{ route('user.orders.create') }}">Check Out</a>



                    </div>





                </div>
            </div>
        </div>
    </div>


</x-layouts.user>


<script type="module">

    window.deleteCart=(id)=>{
        // console.log(id);
        // document.getElementById("x1").remove();


        axios.delete('{{route("user.carts.deleteCart")}}',{data: { id: id }}).then(function(r) {

            document.getElementById('cart_'+id).remove();
            alert(r.data.id+" "+r.data.success);
        }).catch(function(e){
            if(e.response){
                if(e.response.data.error)
                alert(e.response.data.error);
                else
                alert(e.response.data.message);

            }else{
                alert(e);
            }
        });
    }





</script>
