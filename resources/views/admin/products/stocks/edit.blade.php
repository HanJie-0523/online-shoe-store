<x-layouts.admin>

    <h3>Add Stocks</h3>

    <form method="POST" action="{{ route('admin.products.stocks.update', ['product' => $product, 'stock' => $stock]) }}">
        @csrf
        @method('PUT')

        <!--Color-->
        <label class='form-label' for="color">Color:</label><br>
        <input class="form-control" type="text" id="color" name="color" value="{{ $stock->color }}" required><br>

        <!-- Size -->
        <label class='form-label' for="size">Size:</label><br>
        <input class="form-control" type="text" id="size" name="size" value="{{ $stock->size }}"
            required><br>

        <!--Quantity-->
        <label class="form-label" for="quantity">Quantity:</label><br>
        <input class="form-control" type="number" id="quantity" name="quantity" value="{{ $stock->quantity }}"
            required><br>

        <button class="btn btn-primary" type="submit">Update</button>

    </form>


</x-layouts.admin>
