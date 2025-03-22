<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login - POS POPCIY</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-dark d-flex align-items-center justify-content-center" style="height:100vh;">

        <div class="card p-4 shadow" style="width: 350px;">
            <h3 class="text-center mb-3">Login</h3>

            <!-- Pesan sukses (misalnya setelah logout) -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error validasi atau error login -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form login -->
            <form action="{{ route('login.process') }}" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control"
                        required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>

        <!-- Bootstrap JS (Opsional, jika butuh interaksi JS) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
