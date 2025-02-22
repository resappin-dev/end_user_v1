<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template') }}/css/font-awesome.min.css">
    <style>
        .divider {
    width: 2px;
    background-color: rgba(164, 183, 245, 0.3); /* Matches bg-primary with opacity */
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

        .btn-register {
            background-color: #7FAD39;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: #6a9230;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .form-floating label {
            color: #666;
        }

        .form-check-input:checked {
            background-color: #7FAD39;
            border-color: #7FAD39;
        }
    </style>
</head>

<body class="bg-primary bg-opacity-25">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg border-0" style="max-width: 1000px;">
            <div class="row g-0">
                <!-- Form Side -->
                <div class="col-md-7 bg-white">
                    <div class="card-body p-5">
                        <h2 class="fw-bold text-center mb-4" style="color: #333;">Create Account</h2>

                        <form action="/register" method="post">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger bg-danger bg-opacity-10 border-0">
                                    @foreach ($errors->all() as $error)
                                        <p class="mb-0 text-danger"><i class="fa fa-exclamation-circle me-2"></i>{{ $error }}
                                        </p>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Full Name">
                                    <label for="nama">Full Name</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Address">
                                    <label for="alamat">Address</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Phone Number">
                                    <label for="no_hp">Phone Number</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                        placeholder="Confirm Password">
                                    <label for="password_confirmation">Confirm Password</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" onclick="togglePassword()">
                                    <label class="form-check-label text-secondary">Show Password</label>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-register w-100 py-2 mb-3">REGISTER</button>

                            <div class="text-center text-secondary">
                                <p>Already have an account? <a href="/login" class="text-decoration-none"
                                        style="color: #7FAD39;">Login here</a></p>
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
        function togglePassword() {
            var password = document.getElementById("password");
            var confirmation = document.getElementById("password_confirmation");
            password.type = password.type === "password" ? "text" : "password";
            confirmation.type = confirmation.type === "password" ? "text" : "password";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>