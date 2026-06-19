@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">

        Edit User

    </h3>

    <form action="{{ route('users.update', $user) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Name</label>

            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>New Password</label>

            <input type="password" name="password" class="form-control">

            <small class="text-muted">

                Leave blank if you don't want to change password.

            </small>

        </div>

        <button class="btn btn-success">

            Update User

        </button>

    </form>
@endsection
