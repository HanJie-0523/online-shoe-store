<x-layouts.admin>

    <H1>Edit Order</h1>

    <form method="POST" action="{{ route('admin.orders.update', ['order' => $order]) }}">
        @csrf
        @method('PUT')

        <label class='form-label' for="name">Name:</label><br>
        <input class="form-control" type="text" id="name" name="name" value="{{ $order->name }}" required><br>

        <label class="form-label" for="contact">Contact:</label><br>
        <input class="form-control" type="text" id="contact" name="contact" value="{{ $order->contact }}"
            required><br>

        <label class="form-label" for="address">Address:</label><br>
        <input class="form-control" type="text" id="address" name="address" value="{{ $order->address }}"
            required><br>

        {{-- <label class="form-label" for="status">Status:</label><br>
        <select name="status" id="status" class="form-control">
                <option>unpaid</option>
                <option>paid</option>
        </select><br> --}}

        <button class="btn btn-primary" type="submit">Update</button>
    </form>

</x-layouts.admin>
