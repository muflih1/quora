@extends('layout.layout')

@section('content')
    <div class="auth_centered">
      <div class="auth_box_container">
        <h1>Create account</h1>
        <form action="{{ route('auth.register_store') }}" method="POST">
          @csrf
          <div class="row mbb">
            <label for="name">Your name</label>
            <input type="text" id="name" name="name" placeholder="First and last name"
              value="{{ old('name') }}" />
            @error('name')
                <div class="form_error_message">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mbb">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" />
            @error('email')
                <div class="form_error_message">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mbb">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" 
              placeholder="at least 6 characters" value="{{ old('password') }}" />
            @error('password')
                <div class="form_error_message">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mbb">
            <label for="confirm_password">Re-enter password</label>
            <input type="password" id="confirm_password" name="password_confirmation" />
            @error('confirm_password')
                <div class="form_error_message">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mbxl">
            <button type="submit" class="auth_primary_button">Create your account</button>
          </div>
          <div class="row">
            <p>Already have an account? <a href="{{ route('auth.login') }}" class="zh-hover--textDecoration_underline">Sign in</a></p>
          </div>
        </form>
      </div>
    </div>
@endsection