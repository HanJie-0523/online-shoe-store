<x-layouts.user>

    <div class="row pt-5">
        <div class="col-3">
            <x-products.categories />
        </div>

        <div class="col">
            <h3>Wishlist</h3>
            @foreach ($wishlists as $wishlist)
                <a href="{{ route('user.products.show', ['product' => $wishlist]) }}" style="text-decoration: none; color:black">
                    <div class="row py-1">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $wishlist->image) }}" class="img-fluid">
                        </div>
                        <div class="col">
                            <div class="row">
                                {{ $wishlist->name }}
                            </div>
                            <div class="row">
                                RM {{ $wishlist->price }}
                            </div>
                            <div class="row">
                                {{ $wishlist->created_at }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach


        </div>



    </div>




</x-layouts.user>
