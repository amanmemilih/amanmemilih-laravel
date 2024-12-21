
@extends('layouts.auth')

@section('content')
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12">
        <div class="login-card">
          <form class="theme-form login-form" method="POST" action="{{ route('login.store') }}">
            @csrf
            <h4>Login</h4>
            <h6>Selamat datang! silahkan login menggunakan akun anda.</h6>
            <div class="form-group">
              <label>Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" required placeholder="Ketik email" value="{{ old('email') }}" />
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa-regular fa-lock-keyhole"></i></span>
                <input class="form-control" type="password" name="password" required placeholder="Ketik password" />
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('contents')
<form class="user" method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group">
    <input type="text" class="form-control form-control-user  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Ketik email" autofocus>
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-group">
    <input id="password" type="password" class="form-control form-control-user  @error('password') is-invalid @enderror" name="password" required placeholder="Ketik Password" autocomplete="off">
    @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-group">
    <div class="custom-control custom-checkbox small">
      <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label class="custom-control-label" for="remember">Ingatkan Saya</label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-user btn-block">
    Masuk
  </button>
</form>
@endsection
