@extends('layouts.app')
@section('title', 'login')
@section('content')

<div class="form sign-up">
    <h2>Welcome Login!!</h2>
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            
        </div>
        <div class="form-group ">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
           
        </div>
        <button type="submit" class="submit">Sign In</button>
        <p class="text-center">Don't have an account? Please&nbsp;<a href="{{ route('register') }}" style="color:#d4af7a;">Sign up!.</a></p>
    </form>
</div>

@endsection