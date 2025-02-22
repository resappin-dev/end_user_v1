<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Cairo', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo img {
        width: 200px;
        height: auto;
    }

    h1 {
        color: #333333;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    p {
        color: #666666;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .reset-button {
        display: inline-block;
        background-color: #7FAD39;
        color: white;
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 5px;
        margin: 20px 0;
        text-align: center;
    }

    .reset-button:hover {
        background-color: #679032;
    }

    .footer {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eeeeee;
        text-align: center;
    }

    .footer p {
        color: #999999;
        font-size: 14px;
        margin: 5px 0;
    }
</style>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ $message->embed(public_path('template/img/logo.png')) }}" alt="Logo">
        </div>

        <h1>Reset Your Password</h1>
        <p>Hello {{ $customer->name }},</p>
        <p>We received a request to reset your password. Click the button below to create a new password:</p>

        <div style="text-align: center;">
            <a href="{{ $resetUrl }}" class="reset-button">Reset Password</a>
        </div>

        <div class="footer">
            <p>If you didn't request a password reset, please ignore this email.</p>
            <p>This link will expire in 60 minutes.</p>
            <p>For security reasons, please don't forward this email to anyone.</p>
        </div>
    </div>
</body>

</html>