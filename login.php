<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FindTint</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Argent+CF:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #e91e63;
            --primary-dark: #c2185b;
            --primary-light: #f8bbd9;
            --text: #2d2d2d;
            --text-light: #666;
            --background: #fff5f7;
            --white: #ffffff;
            --gray-light: #f5f5f5;
            --gray: #e0e0e0;
            --shadow: 0 8px 32px rgba(233, 30, 99, 0.15);
            --radius: 16px;
            --gradient: linear-gradient(135deg, #ffeef8 0%, #fff5f7 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: var(--gradient);
            padding: 20px;
            color: var(--text);
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            background: var(--white);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(233, 30, 99, 0.2);
        }

        .left {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
            position: relative;
            overflow: hidden;
        }

        .left::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-light) 0%, transparent 70%);
            border-radius: 0 0 0 100px;
            z-index: 0;
        }

        .left-content {
            position: relative;
            z-index: 1;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
            position: relative;
            padding-left: 60px;
        }

        .logo-icon {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(233, 30, 99, 0.3);
        }

        .logo-icon::before {
            content: '💄';
            font-size: 24px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .logo-text {
            font-family: 'Argent CF', serif;
            font-size: 36px;
            font-weight: 600;
            font-style: italic;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .left h2 {
            margin-bottom: 12px;
            font-size: 32px;
            color: var(--text);
            font-weight: 600;
            position: relative;
            display: inline-block;
        }

        .left h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--primary-light));
            border-radius: 2px;
        }

        .left p {
            margin-bottom: 30px;
            color: var(--text-light);
            font-size: 16px;
            line-height: 1.5;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text);
            font-size: 14px;
        }

        .left input[type="email"],
        .left input[type="password"] {
            width: 100%;
            padding: 16px 18px;
            border-radius: 10px;
            border: 2px solid var(--gray);
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            box-sizing: border-box;
            background: var(--gray-light);
        }

        .left input[type="email"]:focus,
        .left input[type="password"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(233, 30, 99, 0.1);
            background: var(--white);
        }

        .left button {
            width: 100%;
            padding: 16px;
            margin: 10px 0;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .left button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .left button:hover::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }

            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        .left button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .signin-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .signin-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #ad1457 100%);
        }

        .left .small-text {
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
            color: var(--text-light);
            font-weight: 400;
        }

        .left a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .left a:hover {
            text-decoration: underline;
            color: var(--primary-dark);
        }

        .remember {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .remember-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-left input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary);
        }

        .remember-left label {
            cursor: pointer;
            color: var(--text);
            font-weight: 400;
        }

        .remember a {
            color: var(--primary);
            font-size: 14px;
            font-weight: 500;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            color: var(--text-light);
            position: relative;
            font-size: 14px;
            font-weight: 400;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: var(--gray);
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .manual-google-btn {
            width: 100%;
            padding: 16px;
            margin: 10px 0;
            border-radius: 10px;
            border: 2px solid var(--gray);
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--white);
            color: var(--text);
            text-decoration: none;
        }

        .manual-google-btn:hover {
            border-color: #d0d0d0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
            text-decoration: none;
            color: var(--text);
        }

        .google-icon {
            width: 18px;
            height: 18px;
            margin-right: 10px;
        }

        .right {
            flex: 1;
            background: linear-gradient(rgba(233, 30, 99, 0.1), rgba(233, 30, 99, 0.1)), url('https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80') center/cover no-repeat;
            position: relative;
            overflow: hidden;
        }

        .right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.2) 0%, rgba(195, 55, 100, 0.1) 100%);
        }

        .right-content {
            position: absolute;
            bottom: 40px;
            left: 40px;
            color: white;
            z-index: 2;
            max-width: 80%;
        }

        .right-content h3 {
            font-size: 28px;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            font-weight: 600;
        }

        .right-content p {
            font-size: 16px;
            opacity: 0.9;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            font-weight: 400;
        }

        .error-msg {
            background: #ffebee;
            color: #c62828;
            padding: 14px;
            border-radius: 8px;
            margin: 10px 0;
            font-size: 14px;
            display: none;
            border-left: 4px solid #c62828;
            animation: shake 0.5s ease-in-out;
            font-weight: 400;
        }

        .success-msg {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 14px;
            border-radius: 8px;
            margin: 10px 0;
            font-size: 14px;
            display: none;
            border-left: 4px solid #2e7d32;
            animation: fadeIn 0.5s ease-in-out;
            font-weight: 400;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                max-width: 500px;
            }

            .right {
                min-height: 200px;
            }

            .left {
                padding: 40px 30px;
            }

            .right-content {
                bottom: 20px;
                left: 20px;
                max-width: 90%;
            }

            .right-content h3 {
                font-size: 22px;
            }

            .logo {
                font-size: 24px;
                padding-left: 50px;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
            }

            .logo-text {
                font-size: 30px;
            }
        }

        @media (max-width: 480px) {
            .left {
                padding: 30px 20px;
            }

            .remember {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .remember a {
                align-self: flex-end;
            }

            .logo {
                font-size: 22px;
                padding-left: 45px;
                margin-bottom: 20px;
            }

            .logo-icon {
                width: 38px;
                height: 38px;
            }

            .logo-text {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="left-content">

                <div class="logo">
                    <div class="logo-icon"></div>
                    <span class="logo-text">FindTint</span>
                </div>

                <h2>Welcome back</h2>
                <p>Please enter your details to continue your beauty journey</p>

                <!-- Error message dari PHP -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="error-msg" style="display:block;">
                        <?= htmlspecialchars($_GET['error']) ?>
                    </div>
                <?php endif; ?>

                <!-- FORM LOGIN PHP -->
                <form action="proses_login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <div class="remember">
                        <div class="remember-left">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="#" onclick="forgotPassword(event)">Forgot password?</a>
                    </div>

                    <button class="signin-btn" type="submit">Sign in</button>
                </form>

                <div class="divider">or sign in with</div>

                <!-- TOMBOL GOOGLE MANUAL -->
                <div class="google-signin-container">
                    <a href="google_login.php" class="manual-google-btn">
                        <svg class="google-icon" viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                        </svg>
                        Sign in with Google
                    </a>
                </div>

                <p class="small-text">
                    Don't have an account?
                    <a href="signup.php">Sign up</a>
                </p>
            </div>
        </div>

        <div class="right">
            <div class="right-content">
                <h3>Discover Your Perfect Look</h3>
                <p>Personalized makeup recommendations based on your unique features and preferences</p>
            </div>
        </div>
    </div>

    <script>
        function forgotPassword(e) {
            e.preventDefault();
            alert("Password reset feature not implemented yet.");
        }
    </script>

</body>

</html>