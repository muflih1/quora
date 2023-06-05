@extends('layout.layout')

@section('content')
<div class="auth_centered">
  @error('login_error')
    <div class="login_error_message">
      {{ $message }}
    </div>
  @enderror
  <div class="auth_box_container login">
    <h1>Sign in</h1>
    <form action="{{ route('auth.login_store') }}" method="POST">
      @csrf
      <div class="row mbb">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" />
        @error('email')
            <div class="form_error_message">{{ $message }}</div>
        @enderror
      </div>
      <div class="row mbb">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" />
        @error('password')
            <div class="form_error_message">{{ $message }}</div>
        @enderror
      </div>
      <div class="row mbxl">
        <button type="submit" class="auth_primary_button">Log in</button>
      </div>

      <div class="divider">
        <div class="line"></div>
        <div class="text">Don't have and account?</div>
        <div class="line"></div>
      </div>

      <a href="{{ route('auth.register') }}" class="auth_secondry_button">Create your account</a>
    </form>
  </div>
</div>
@endsection