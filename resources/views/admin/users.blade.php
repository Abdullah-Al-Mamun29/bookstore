@extends('layouts.admin')

@section('title', 'User Accounts')

@section('admin_content')
<div class="container-xxl py-5" style="min-height:90vh;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5 text-center px-3">USER ACCOUNTS</h1>
        </div>

        <div class="row">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row" class="py-3">{{ $user->id }}</th>
                        <td class="py-3">{{ $user->name }}</td>
                        <td class="py-3">{{ $user->email }}</td>
                        <td class="py-3">
                            <span class="{{ $user->user_type == 'admin' ? 'text-warning' : '' }}">
                                {{ $user->user_type }}
                            </span>
                        </td>
                        <td class="py-3">
                            <a href="{{ route('admin.user.delete', $user->id) }}"
                                title="Delete"
                                onclick="return confirm('delete this user?');">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection