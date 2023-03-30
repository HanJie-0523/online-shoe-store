<x-layouts.admin>

    <H3 class="p-2">{{ $product->name }}</h3>
    <div class="row">
        <div class="col-4">
            <div style="width: 15em">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
            </div>
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-2">
                    Name:
                </div>
                <div class="col">
                    {{ $product->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Price:
                </div>
                <div class="col">
                    RM {{ $product->price }}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Rating:
                </div>
                <div class="col">
                    {{ $product->rating }}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Categories:
                </div>
                <div class="col">
                    @foreach ($product->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Description:
                </div>
                <div class="col">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>

    <div class="row py-3">
        <div class="row">
            <div class="col-10">
                <h5>Color & Size</h5>
            </div>
            <div class="col-2">
                <a href="{{ route('admin.products.stocks.create', $product) }}" class="btn btn-sm btn-primary">+ Add</a>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ $stock->color }}</td>
                            <td>{{ $stock->size }}</td>
                            <td>{{ $stock->quantity }}</td>
                            {{-- <td>{{ $stock-> }}</td> --}}
                            <td>
                                <form action="{{ route('admin.products.stocks.destroy',['product'=>$product, 'stock'=> $stock]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.products.stocks.edit',  ['product'=>$product, 'stock'=> $stock]) }}" class="btn btn-sm btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
        <div class="d-flex">
            {!! $stocks->links() !!}
        </div>
    </div>

















</x-layouts.admin>
