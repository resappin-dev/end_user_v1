<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template') }}/css/font-awesome.min.css">
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

        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .btn-back {
            background-color: #7FAD39;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #6a9230;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-primary bg-opacity-25">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg border-0" style="max-width: 900px;">
            <div class="row g-0">
                <!-- Message Side -->
                <div class="col-md-7 bg-white">
                    <div class="card-body p-5 text-center">
                        @if(session('failed'))
                            <div class="mb-4">
                                <h3 class="fw-bold text-danger mb-3">Email Not Found</h3>
                                <p class="text-secondary">Sorry, your email has not been registered yet.</p>
                                <p class="text-secondary">Please re-check your email. Thank you.</p>
                            </div>
                        @else
                            <div class="mb-4">
                                <h3 class="fw-bold text-success mb-3">Email Sent</h3>
                                <p class="text-secondary">We have sent a password reset link to your email.</p>
                                <p class="text-secondary">Please check your email. Thank you.</p>
                            </div>
                        @endif

                        <a href="{{ url('/login') }}" class="btn btn-back mt-3">
                            <i class="fa fa-arrow-left me-2"></i>Back to Login
                        </a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>