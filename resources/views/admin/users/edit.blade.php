<x-layouts.admin>

    <H1>Edit User</h1>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <!--Name-->
        <label class='form-label' for="name">Name:</label><br>
        <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}" required><br>

        <div class="row">
            <div class="col-6">
                <!--Email-->
                <label class='form-label' for="email">Email:</label><br>
                <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" required><br>
            </div>
            <div class="col-6">
                <!--Contact-->
                <label class='form-label' for="contact">Contact:</label><br>
                <input class="form-control" type="tel" id="contact" name="contact" value="{{$user->contact}}" pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required><br>
            </div>
        </div>
        <div>
            <!--Address-->
            <label class='form-label' for="address">Address:</label><br>
            <input class="form-control" type="text" id="address" name="address" value="{{$user->address}}" required><br>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>

    </form>




</x-layouts.admin>
