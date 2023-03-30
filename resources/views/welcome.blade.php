<x-layouts.user>

    <div class="row pt-5">
        <div class="col-3">
            <x-products.categories />
        </div>
        <div class="col">
            {{-- product list --}}

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-4">
                        <a href="{{ route('user.products.show', ['product' => $product]) }}"
                            style="text-decoration: none; color:black;">
                            <x-products.item :item="[
                                'image' => $product->image,
                                'name' => $product->name,
                                'price' => $product->price,
                            ]" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="d-flex">
        {!! $product->links() !!}
    </div> --}}



</x-layouts.user>
