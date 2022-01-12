@extends('template')

@section('title', 'Register')

@section('import')
  <link rel="stylesheet" href="{{ asset("storage/css/auth/register.css") }}">
@endsection

@section('content')
  <main class="register">
    <div class="register-container">
      <div class="register-left">

      </div>
      <form action="{{ route('register-cont') }}" method="POST" class="register-right">
        @csrf
        @if(session('success') !== null)
          <div class="register-success">{{ session('success') }}</div>
        @endif
        <h1 class="form-hello">HELLO!</h1>
        <h3 class="form-text">Please fill this form to create your account</h3>
        <div class="form-field @error('name') invalid @enderror">
          <input type="text" name="name" id="name" placeholder="a" value="{{ old('name') }}">
          <label for="name">Name</label>
          @error('name')
            <div class="invalid-message">{{ $errors->first('name') }}</div>
          @enderror
        </div>
        <div class="form-field @error('company') invalid @enderror">
          <input type="text" name="company" id="company" placeholder="a" value="{{ old('company') }}">
          <label for="company">Company</label>
          @error('company')
            <div class="invalid-message">{{ $errors->first('company') }}</div>
          @enderror
        </div>
        <div class="form-field @error('email') invalid @enderror">
          <input type="text" name="email" id="email" placeholder="a" value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
            <div class="invalid-message">{{ $errors->first('email') }}</div>
          @enderror
        </div>
        <div class="form-field @error('phone') invalid @enderror">
          <input type="text" name="phone" id="phone" placeholder="b" value="{{ old('phone') }}">
          <label for="phone">Phone</label>
          @error('phone')
            <div class="invalid-message">{{ $errors->first('phone') }}</div>
          @enderror
        </div>
        <div class="form-field @error('password') invalid @enderror">
          <input type="password" name="password" id="password" placeholder="b">
          <label for="password">Password</label>
          @error('password')
            <div class="invalid-message">{{ $errors->first('password') }}</div>
          @enderror
        </div>
        <div class="form-field @error('confirm') invalid @enderror">
          <input type="password" name="confirm" id="confirm" placeholder="b">
          <label for="confirm">Confirm Password</label>
          @error('confirm')
            <div class="invalid-message">{{ $errors->first('confirm') }}</div>
          @enderror
        </div>
        <button type="submit" class="form-button">Create an Account</button>
      </form>
    </div>
  </main>
@endsection