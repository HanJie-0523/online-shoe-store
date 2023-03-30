<x-layouts.admin>

    <H1>Add User</h1>

    <form method="POST" action="{{ route('admin.users.store') }}" >
        @csrf

        <div class="row">
            <div class="col-6">
                <!--Name-->
                <label class='form-label' for="name">Name:</label><br>
                <input class="form-control" type="text" id="name" name="name" required><br>
            </div>


            <div class="col-6">
                <!-- Password -->
                <label class='form-label' for="password">Password:</label><br>
                <input class="form-control" type="password" id="password" name="password" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <!--Email-->
                <label class='form-label' for="email">Email:</label><br>
                <input class="form-control" type="email" id="email" name="email" required>
                @error('email')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
                <br>
            </div>
            <div class="col-6">
                <!--Contact-->
                <label class='form-label' for="contact">Contact:</label><br>
                <input class="form-control" type="tel" id="contact" name="contact"
                    pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required><br>
            </div>
        </div>
        <div>
            <!--Address-->
            <label class='form-label' for="address">Address:</label><br>
            <input class="form-control" type="text" id="address" name="address" required><br>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>

    </form>




</x-layouts.admin>
