@extends('layouts.app')
@section('title', 'register')
@section('content')

<div class="form sign-in">
    <h2>Create your Account</h2>
    <form action="{{ url('/register')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            <span class="error-text">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            <span class="error-text">
                @error('email')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group ">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
            <span class="error-text">
                @error('password')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group ">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
            <span class="error-text">
                @error('password_confirmation')
                    {{$message}}
                @enderror
            </span>
        </div>
        <button type="submit" class="submit">Sign Up</button>
        <p class="text-center">If you already has an account, just&nbsp;<a href="{{ route('login')}}" style="color:#d4af7a;">sign in.</a></p>
    </form>
</div>


@endsection