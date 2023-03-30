<x-layouts.admin>

    <H1>Products</h1>

    <div class="d-flex">
        <form action="{{ route('admin.products.index') }}" class="flex-grow-1 d-flex">
            <div class="flex-grow-1 p-1">
                <input type="text" class="form-control" placeholder="Search" name="search"
                    value="{{ request()->input('search') }}">
            </div>
            <div class="p-1">
                <button class="btn btn-primary">Search</button>
            </div>
        </form>
        <div class="p-1">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Add Product</a>
        </div>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Created By</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                    <tr>
                        <td>
                            <div style="width: 10em">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
                            </div>
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @foreach ($product->categories as $category)
                                {{ $category->name }}
                            @endforeach
                        </td>
                        <td>{{ $product->user->name }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <form action="{{ route('admin.products.destroy',['product'=>$product]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', ['product'=>$product]) }}" class="btn btn-sm btn-success">Edit</a>
                        </td>

                        <td>
                            <a href="{{ route('admin.products.show', ['product'=>$product]) }}"
                                class="btn btn-sm btn-primary">Select</a>
                        </td>
                    </tr>

            @endforeach
        </tbody>
    </table>


    <div class="d-flex">
        {!! $products->links() !!}
    </div>

</x-layouts.admin>
