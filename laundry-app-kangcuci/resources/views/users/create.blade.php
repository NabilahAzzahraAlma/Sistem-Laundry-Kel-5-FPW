@extends('layouts.app')

@section('content')
<h3>Add New User</h3>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input name="phone" class="form-control" required>
    </div>

    <button class="btn btn-primary">Save</button>

</form>
@endsection
