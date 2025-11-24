@extends('layouts.app')

@section('content')
<h3>Edit User</h3>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input name="name" value="{{ $user->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" value="{{ $user->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input name="phone" value="{{ $user->phone }}" class="form-control" required>
    </div>

    <button class="btn btn-success">Update</button>

</form>
@endsection
