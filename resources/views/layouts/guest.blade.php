<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('admin-assets/images/car.png') }}" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-card {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 40px;
            border-top: 5px solid #f75d34; 
        }

        .auth-logo {
            color: #f75d34;
            font-size: 28px;
            font-weight: 800;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-bottom: 10px;
        }

        .auth-logo i {
            margin-right: 5px;
        }

        .auth-subtitle {
            text-align: center;
            color: #6c757d;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        .form-label {
            font-weight: 500;
            color: #344767;
            font-size: 0.9rem;
        }

        .form-control {
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid #d2d6da;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #f75d34;
            box-shadow: 0 0 0 0.2rem rgba(247, 93, 52, 0.25);
        }

        /* Buttons */
        .btn-primary {
            background-color: #f75d34;
            border-color: #f75d34;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #d94b26;
            border-color: #d94b26;
        }

        .form-check-input:checked {
            background-color: #f75d34;
            border-color: #f75d34;
        }

        .text-orange {
            color: #f75d34 !important;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <a href="/" class="auth-logo">
            <i class="fas fa-steering-wheel"></i> Unbundl
        </a>
        
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>