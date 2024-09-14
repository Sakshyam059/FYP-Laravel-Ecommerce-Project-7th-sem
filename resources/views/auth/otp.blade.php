<style>
    body {
        font-family: Arial, sans-serif;
        color: #333;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .container {
        background: #fff;
        padding: 20px;
        margin: 0 auto;
        max-width: 600px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        color: #333;
        font-size: 24px;
    }
    p {
        font-size: 16px;
        line-height: 1.5;
    }
    .otp-code {
        font-size: 24px;
        font-weight: bold;
        color: #007bff;
        margin: 20px 0;
    }
    .footer {
        margin-top: 20px;
        font-size: 14px;
        color: #777;
        text-align: center;
    }
    .footer a {
        color: #007bff;
        text-decoration: none;
    }
</style>
<div class="container">
    <h1>Your OTP Code</h1>
    <p>Thank you for using our service. Your One-Time Password (OTP) for verification is:</p>
    <div class="otp-code">
        {{ $otp }}
    </div>
    <p>This code is valid for 10 minutes. Please enter it on the verification page to complete your registration or login process.</p>
    <p>If you did not request this code, please ignore this email or contact support if you have any concerns.</p>
    <div class="footer">
        <p>Best regards,<br>The {{ config('app.name') }} Team</p>
        <p><a href="{{ url('/') }}">Visit our website</a></p>
    </div>
</div>