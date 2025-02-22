<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
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

        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .countdown {
            animation: fadeInOut 2s infinite;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.5;
            }
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
                timer: 5000
            });
        </script>
    @endif

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg border-0" style="max-width: 900px;">
            <div class="row g-0">
                <!-- Message Side -->
                <div class="col-md-7 bg-white">
                    <div class="card-body p-5 text-center">
                        <h3 class="fw-bold mb-4">Email Verification Success!</h3>
                        <div class="text-secondary countdown">
                            Directing you to Dashboard in <span id="timer">5</span> seconds...
                        </div>
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
        let timeLeft = 5;
        const timerElement = document.getElementById('timer');

        const countdown = setInterval(() => {
            timeLeft--;
            timerElement.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                window.location.href = '/';
            }
        }, 1000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>