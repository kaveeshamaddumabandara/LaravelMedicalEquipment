@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Administrator Panel </h1>

    <!-- Medicine Form -->
    <div class="card mb-4">
        <div class="card-header">You can add available medical equipments here...</div>
        <div class="card-body">
            <form method="POST" action="{{ route('medicine.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Equipment Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Pieces Available</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add to store</button>
            </form>
        </div>
    </div>

    <!-- Medicines Table -->
    <div class="card">
        <div class="card-header">Equipments</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicines as $medicine)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $medicine->name }}</td>
                            <td>{{ $medicine->quantity }}</td>
                            <td>
                                <form action="{{ route('medicine.destroy', $medicine->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
            

        <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body"></div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Make Admin</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </di>
</div>

@endsection
