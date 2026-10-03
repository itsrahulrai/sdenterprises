<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ setting('site_name', 'S D Enterprises') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            /* ============================================================
               S D ENTERPRISES BRAND PALETTE (Grounded in the Logo)
               Rich Espresso, Warm Roast Brown, Amber Gold, and Cream
            ============================================================ */
            --sde-coffee-dark: #24130A;
            --sde-espresso: #2B170D;
            --sde-primary: #4A2511;
            --sde-secondary: #5A3218;
            --sde-accent: #7A421C;
            --sde-gold: #C89F65;
            --sde-gold-light: #E8CA9D;
            --sde-gold-dark: #A67C43;

            --sde-bg: #FAF7F3;
            --sde-card: #FFFFFF;
            --sde-border: #E8DCCF;
            --sde-border-subtle: #F0E8DF;

            --sde-text-dark: #24130A;
            --sde-text: #4A3E37;
            --sde-muted: #85756A;

            --sde-shadow:
                0 18px 45px rgba(36, 19, 10, 0.10),
                0 6px 18px rgba(36, 19, 10, 0.05);

            --sde-radius: 22px;
            --sde-radius-sm: 12px;

            --sde-gradient: linear-gradient(135deg, #24130A 0%, #4A2511 48%, #6B3718 100%);
            --sde-gold-gradient: linear-gradient(135deg, #A67C43 0%, #C89F65 52%, #E8CA9D 100%);
        }

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 18% 18%, rgba(200, 159, 101, 0.16), transparent 36%),
                radial-gradient(circle at 82% 82%, rgba(74, 37, 17, 0.13), transparent 42%),
                linear-gradient(135deg, #F8F3ED 0%, #FAF6F1 50%, #F2E9DE 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
            overflow-x: hidden;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.97);
            border-radius: var(--sde-radius);
            padding: 40px 36px 42px;
            border: 1px solid var(--sde-border);
            box-shadow: var(--sde-shadow);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(14px);
        }

        /* Top Gold Accent Bar */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--sde-gold-gradient);
        }

        /* Soft Decorative Coffee Glow */
        .login-card::after {
            content: '';
            position: absolute;
            top: -95px;
            right: -95px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(200, 159, 101, 0.15), rgba(74, 37, 17, 0.04) 55%, transparent 72%);
            pointer-events: none;
        }

        /* Logo & Brand Presentation */
        .login-logo-wrap {
            text-align: center;
            margin-bottom: 22px;
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-logo-badge {
            width: 82px;
            height: 82px;
            border-radius: 50%;
            background: #FFFFFF;
            padding: 5px;
            box-shadow: 0 8px 24px rgba(59, 28, 16, 0.12);
            border: 2px solid var(--sde-border);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            transition: transform 0.3s ease;
        }

        .login-logo-badge:hover {
            transform: scale(1.04);
        }

        .login-logo-badge img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .login-brand-name {
            font-family: 'Poppins', sans-serif;
            font-size: 19px;
            font-weight: 800;
            color: var(--sde-coffee-dark);
            letter-spacing: 0.8px;
            margin: 0;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .login-brand-tagline {
            font-family: 'Poppins', sans-serif;
            font-size: 8.5px;
            font-weight: 600;
            color: var(--sde-muted);
            letter-spacing: 0.6px;
            margin: 4px 0 0 0;
            text-transform: uppercase;
        }

        /* Header Subtitle */
        .login-heading {
            text-align: center;
            margin-bottom: 26px;
            position: relative;
            z-index: 2;
        }

        .login-portal-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(200, 159, 101, 0.12);
            color: var(--sde-gold-dark);
            border: 1px solid rgba(200, 159, 101, 0.3);
            font-size: 10.5px;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 20px;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .login-heading p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--sde-text);
            font-weight: 500;
        }

        .premium-divider {
            width: 48px;
            height: 2.5px;
            margin: 10px auto 0;
            border-radius: 10px;
            background: var(--sde-gold-gradient);
        }

        /* Form Controls */
        .form-label {
            font-size: 0.83rem;
            font-weight: 600;
            color: var(--sde-text-dark);
            margin-bottom: 7px;
            letter-spacing: 0.2px;
        }

        .input-group {
            border-radius: var(--sde-radius-sm);
            overflow: hidden;
            border: 1.5px solid var(--sde-border);
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
            background: #FFFFFF;
        }

        .input-group:focus-within {
            border-color: var(--sde-gold-dark);
            box-shadow: 0 0 0 0.22rem rgba(200, 159, 101, 0.18);
        }

        .input-group-text {
            background: #FFFFFF;
            border: none;
            color: var(--sde-primary);
            padding-left: 15px;
            padding-right: 6px;
            font-size: 1.05rem;
        }

        .form-control {
            border: none;
            height: 48px;
            font-size: 0.9rem;
            color: var(--sde-text-dark);
            box-shadow: none !important;
            background: #FFFFFF;
        }

        .form-control:focus {
            background: #FFFFFF;
            color: var(--sde-text-dark);
        }

        .form-control::placeholder {
            color: #A3968B;
            font-weight: 400;
            font-size: 0.88rem;
        }

        .btn-toggle-pwd {
            background: #FFFFFF;
            border: none;
            color: #8C7B6B;
            padding-right: 14px;
            padding-left: 6px;
            cursor: pointer;
            transition: color 0.2s ease;
            font-size: 1rem;
        }

        .btn-toggle-pwd:hover {
            color: var(--sde-primary);
        }

        /* Remember Box */
        .remember-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 6px;
            margin-bottom: 24px;
        }

        .form-check-label {
            font-size: 0.83rem;
            color: var(--sde-text);
            font-weight: 500;
            user-select: none;
            cursor: pointer;
        }

        .form-check-input {
            border-color: var(--sde-border);
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--sde-primary);
            border-color: var(--sde-primary);
        }

        .form-check-input:focus {
            border-color: var(--sde-gold-dark);
            box-shadow: 0 0 0 0.18rem rgba(200, 159, 101, 0.2);
        }

        /* Sign In Button */
        .btn-login {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: var(--sde-radius-sm);
            background: var(--sde-gradient);
            color: #FFFFFF;
            font-weight: 700;
            font-size: 0.92rem;
            letter-spacing: 0.5px;
            transition: all 0.28s ease;
            box-shadow: 0 10px 24px rgba(59, 28, 16, 0.25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1A0D06 0%, #3B1C10 48%, #5A2E14 100%);
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(59, 28, 16, 0.35);
            color: #FFFFFF;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login i {
            font-size: 1.05rem;
        }

        /* Alert */
        .alert-danger {
            border: 1px solid rgba(220, 53, 69, 0.2);
            background: #FFF5F5;
            color: #B42318;
            border-radius: 12px;
            font-size: 0.84rem;
            font-weight: 500;
        }

        /* Return to Website link */
        .login-back-link {
            text-align: center;
            margin-top: 22px;
            position: relative;
            z-index: 2;
        }

        .login-back-link a {
            color: var(--sde-muted);
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .login-back-link a:hover {
            color: var(--sde-primary);
        }

        @media (max-width: 576px) {
            body {
                padding: 20px 14px;
            }

            .login-card {
                padding: 30px 22px 34px;
                border-radius: 18px;
            }

            .login-logo-badge {
                width: 70px;
                height: 70px;
                margin-bottom: 10px;
            }

            .login-brand-name {
                font-size: 17px;
            }

            .login-brand-tagline {
                font-size: 7.5px;
            }
        }
    </style>
</head>

<body>

    <div class="login-card">

        {{-- Logo & Brand Block --}}
        <div class="login-logo-wrap">
            <div class="login-logo-badge">
                @if (setting('site_logo'))
                    <img
                        src="{{ asset('public/storage/' . setting('site_logo')) }}"
                        alt="{{ setting('site_name', 'S D Enterprises') }}"
                    >
                @else
                    <i class="bi bi-cup-hot" style="font-size: 32px; color: #4A2511;"></i>
                @endif
            </div>

            <h1 class="login-brand-name">{{ setting('site_name', 'S D ENTERPRISES') }}</h1>
            <p class="login-brand-tagline">{{ setting('site_tagline', 'BEVERAGE SOLUTIONS FOR A BETTER TOMORROW') }}</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger py-2 px-3 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-circle-fill flex-shrink-0"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="adminEmail">
                    Email Address
                </label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input
                        type="email"
                        id="adminEmail"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="admin@sdenterprises.com"
                        required
                        autofocus
                    >
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="adminPassword">
                    Password
                </label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input
                        type="password"
                        id="adminPassword"
                        name="password"
                        class="form-control"
                        placeholder="••••••••"
                        required
                    >
                    <button type="button" class="btn-toggle-pwd" id="togglePasswordBtn" aria-label="Toggle password visibility">
                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                    </button>
                </div>
            </div>

            <div class="remember-box">
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                    >
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Sign In to Dashboard</span>
            </button>
        </form>

        <div class="login-back-link">
            <a href="{{ route('home') }}">
                <i class="bi bi-arrow-left"></i>
                <span>Back to {{ setting('site_name', 'S D Enterprises') }}</span>
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password Visibility Toggle
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const pwdInput = document.getElementById('adminPassword');
        const pwdIcon = document.getElementById('togglePasswordIcon');

        if (toggleBtn && pwdInput && pwdIcon) {
            toggleBtn.addEventListener('click', function () {
                const isPassword = pwdInput.getAttribute('type') === 'password';
                pwdInput.setAttribute('type', isPassword ? 'text' : 'password');
                pwdIcon.classList.toggle('bi-eye', !isPassword);
                pwdIcon.classList.toggle('bi-eye-slash', isPassword);
            });
        }
    </script>
</body>
</html>