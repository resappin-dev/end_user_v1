<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template') }}/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .divider {
            width: 2px;
            background-color: rgba(164, 183, 245, 0.3);
            height: 90%;
            position: absolute;
            left: 0;
            top: 5%;
            box-shadow: 0 0 8px rgba(164, 183, 245, 0.1);
        }

        .form-control:focus {
            border-color: #7FAD39;
            box-shadow: 0 0 0 0.2rem rgba(127, 173, 57, 0.25);
        }

        .btn-login {
            background-color: #7FAD39;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #6a9230;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-primary bg-opacity-25">
    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ Session::get('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            var errorMessage = @json($errors->all());
            var formattedErrorMessage = errorMessage.join(' & ');
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: formattedErrorMessage,
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg border-0" style="max-width: 900px;">
            <div class="row g-0">
                <!-- Form Side -->
                <div class="col-md-7 bg-white">
                    <div class="card-body p-5">
                        <h2 class="fw-bold text-center mb-4">Welcome Back</h2>
                        <form action="{{ route('login') }}" method="post" id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Username">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" onclick="myFunction()">
                                    <label class="form-check-label text-secondary">Show Password</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-login w-100 py-2 mb-3">LOGIN</button>
                            <div class="text-center text-secondary">
                                <a href="/forgot-password" class="text-decoration-none" style="color: #7FAD39;">Forgot
                                    Password?</a>
                                <p class="mt-2">New user? <a href="/register" class="text-decoration-none"
                                        style="color: #7FAD39;">Create an account</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Logo Side -->
                <div class="col-md-5 bg-white d-flex align-items-center justify-content-center p-4 position-relative">
                    <div class="divider"></div>
                    <img src="{{ asset('template/img/image/logo_acc.png') }}" alt="Logo" class="img-fluid"
                        style="max-width: 80%;">
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            x.type = x.type === "password" ? "text" : "password";
        }

        if (localStorage.getItem('lastUsername')) {
            document.getElementById('username').value = localStorage.getItem('lastUsername');
        }

        document.getElementById('loginForm').addEventListener('submit', function () {
            localStorage.setItem('lastUsername', document.getElementById('username').value);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>