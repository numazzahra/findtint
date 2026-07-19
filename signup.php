<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - FindTint</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Argent+CF:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #e91e63;
            --primary-dark: #c2185b;
            --text: #2d2d2d;
            --text-light: #666;
            --white: #ffffff;
            --gray: #ddd;
            --gray-light: #f6f6f6;
            --shadow: 0 10px 40px rgba(233, 30, 99, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffeef8, #fff5f7);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: var(--white);
            padding: 40px 35px;
            border-radius: 24px;
            box-shadow: var(--shadow);
            animation: fadeIn 0.6s ease;
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-text {
            font-size: 36px;
            font-weight: 700;
            color: var(--primary);
            font-family: 'Argent CF', serif;
            font-style: italic;
            text-shadow: 2px 2px 0px rgba(233, 30, 99, 0.2);
            letter-spacing: -1px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;
            padding: 5px 15px;
        }

        .logo-text::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #ffeef8, #fff5f7);
            border-radius: 10px;
            z-index: -1;
            transform: skew(-5deg);
            box-shadow: 0 4px 10px rgba(233, 30, 99, 0.15);
        }

        h2 {
            margin: 15px 0 10px;
            font-size: 28px;
            font-weight: 600;
            color: var(--text);
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }

        p {
            text-align: center;
            color: var(--text-light);
            margin-bottom: 30px;
            font-size: 15px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 15px;
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
            color: var(--text);
        }

        input {
            width: 100%;
            padding: 16px 18px;
            border-radius: 12px;
            border: 2px solid var(--gray);
            font-size: 15px;
            background: var(--gray-light);
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        input:focus {
            border-color: var(--primary);
            background: var(--white);
            outline: none;
            box-shadow: 0 0 0 3px rgba(233, 30, 99, 0.1);
            transform: translateY(-2px);
        }

        button {
            width: 100%;
            padding: 16px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
            box-shadow: 0 6px 20px rgba(233, 30, 99, 0.3);
        }

        button:hover {
            background: linear-gradient(135deg, var(--primary-dark), #ad1457);
            box-shadow: 0 8px 25px rgba(233, 30, 99, 0.4);
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        .small-text {
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
            color: var(--text-light);
        }

        .small-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .small-text a:hover {
            color: var(--primary-dark);
        }

        .small-text a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .small-text a:hover::after {
            width: 100%;
        }

        .error-msg {
            background: #ffebee;
            color: #c62828;
            padding: 14px 16px;
            font-size: 14px;
            border-left: 4px solid #c62828;
            border-radius: 8px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .success-msg {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 14px 16px;
            font-size: 14px;
            border-left: 4px solid #2e7d32;
            border-radius: 8px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 25px;
            }

            .logo-text {
                font-size: 30px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <div class="logo-text">FindTint</div>
        </div>

        <h2>Create Account</h2>
        <p>Join FindTint to start your beauty journey ✨</p>

        <!-- PHP Error message -->
        <?php if (isset($_GET["error"])): ?>
            <div class="error-msg"><?= htmlspecialchars($_GET["error"]) ?></div>
        <?php endif; ?>

        <!-- PHP Success message -->
        <?php if (isset($_GET["success"])): ?>
            <div class="success-msg"><?= htmlspecialchars($_GET["success"]) ?></div>
        <?php endif; ?>

        <form action="proses_signup.php" method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" required>
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button class="signin-btn" type="submit">Sign Up</button>
        </form>

        <p class="small-text">
            Already have an account?
            <a href="login.php">Sign in</a>
        </p>
    </div>

</body>

</html>