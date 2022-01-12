@extends('template')

@section('title', 'Login')

@section('import')
<link rel="stylesheet" href="{{ asset('storage/css/auth/login.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('content')

<div class="login">
  <div class="login-overlay"></div>
  <div class="login-container">
    <div class="login-title">
      <p>Hello</p>
      <p>Welcome Back!</p>
    </div>
    <form action="{{ route('login-cont') }}" method="post" class="login-form">
      @csrf
      @error('message')
        <div class="login-error">{{ $errors->first('message') }}</div>      
      @enderror
      <div class="form-div form-username">
        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-div form-password">
        <input type="password" name="password" id="" class="form-control" placeholder="Password">
      </div>
      <div class="form-remember">
        <input type="checkbox" name="remember" id="remember" class="form-check-input">
        <label for="remember" class="form-check-label">Remember Me</label>
      </div>
      <button type="submit" class="form-button">Login</button>
      <a class="form-forget" href="">
        Forget your password?
      </a>
    </form>

  </div>
</div>

<div class="new">
  <div class="new-container">
    <div class="new-title">
      New to AiPostify?
    </div>
    <a href="{{ route('register') }}" class="new-button">
      REGISTER
    </a>
  </div>
</div>

@endsection