<x-layouts.admin>

    <H1>Edit Product</h1>

    <form method="POST" action="{{ route('admin.products.update', ['product' => $product]) }}">
        @csrf
        @method('PUT')

        <!--Name-->
        <label class='form-label' for="name">Name:</label><br>
        <input class="form-control" type="text" id="name" name="name" value="{{ $product->name }}" required><br>




        <!-- Description -->
        <label class='form-label' for="desciption">Description:</label><br>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea><br>



        <!--Price-->
        <label class="form-label" for="price">Price:</label><br>
        <input class="form-control" type="number" step="0.01" id="price" name="price"
            value="{{ $product->price }}" required><br>


        {{-- <div class="row">
            <div class="col-12">
                <label class="form-label" for="category">Price:</label><br>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option>{{ $category->name }}</option>
                    @endforeach
                </select><br>
            </div>
        </div> --}}

        {{-- <div class="row">
            <div class="col-12">
                <label for="image" class="form-label">Picture</label><br>
                <input class="form-control" type="file" id="image" name="image" required><br>
            </div>
        </div> --}}

        <button class="btn btn-primary" type="submit">Add</button>
    </form>

</x-layouts.admin>
