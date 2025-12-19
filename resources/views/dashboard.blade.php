@extends('layouts.user')

@section('user_content')
<div class="welcome-card">
    <div>
        @if(Session::has('user_id'))
        <h2>Welcome Back, {{ Session::get('user_name') }}</h2>
        @else
        <h2>Welcome Back, Guest</h2>
        @endif
    </div>
    <div>
        <img src="{{ asset('images/user_illustration.png') }}" alt="User" style="width: 150px;">
    </div>
</div>
@endsection