<x-layouts.admin>

    <h3>Add Stocks</h3>

    <form method="POST" action="{{ route('admin.products.stocks.store', $product) }}">
        @csrf

        <div class="row">
            <div class="col-12">
                <!--Color-->
                <label class='form-label' for="color">Color:</label><br>
                <input class="form-control" type="text" id="color" name="color" required><br>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Size -->
                <label class='form-label' for="size">Size:</label><br>
                <input class="form-control" type="text" id="size" name="size" required><br>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!--Quantity-->
                <label class="form-label" for="quantity">Quantity:</label><br>
                <input class="form-control" type="number" id="quantity" name="quantity" required><br>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>

    </form>


</x-layouts.admin>
