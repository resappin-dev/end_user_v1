<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap">
</head>
<style>
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333333;
        font-family: 'Oswald', sans-serif;
    }

    p {
        color: #666666;
        margin-bottom: 20px;
        font-size: 12px;
    }

    .verify-button {
        background-color: #3033ea;
        color: white;
        padding: 12px 24px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        margin-top: 20px;
    }

    .verify-button:hover {
        background-color: #7a7cf4;
    }

    .texture-bg {
        position: fixed;
        display: block;
        top: 0;
        left: 0;
        width: 300px;
        height: 300px;
        background-image: url('{{ asset('desain/img/bg-v2.png') }}');
        background-size: cover;
        background-position: center;
        z-index: -1;
        opacity: 0.8;
    }
</style>

<body>
    <div class="texture-bg"></div>
    <div class="container">
        <img src="{{ $message->embed(public_path('template/img/image/logo_acc.png')) }}" style="width: 200px; height:150px"
            alt="Logo" />
        <h1>Welcome to RESAPPIN</h1>
        <p>Hello {{ $customer->name }},</p>
        <p>Thank you for registering. Please click on the following link to verify your email:</p>

        <a href="{{ url('verify-email/' . $customer->email) }}" class="verify-button">Verify Account</a>
    </div>
</body>

</html>