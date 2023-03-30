<x-layouts.admin>

    <H1>Users</h1>

    <div class="d-flex">
        <form action="{{ route('admin.users.index') }}" class="flex-grow-1 d-flex">
            <div class="flex-grow-1 p-1">
                <input type="text" class="form-control" placeholder="Search" name="search"
                    value="{{ request()->input('search') }}">
            </div>
            <div class="p-1">
                <button class="btn btn-primary">Search</button>
            </div>
        </form>
        <div class="p-1">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Add User</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Last updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->contact }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex">
        {!! $users->links() !!}
    </div>

</x-layouts.admin>
