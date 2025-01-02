
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            <form class="theme-form login-form" method="POST" action="{{ route('login.store') }}">
              @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda" required>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi Anda" required>
                </div>
                <button type="submit" class="btn btn-danger w-100">Login</button>
                <div class="text-center mt-3">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

