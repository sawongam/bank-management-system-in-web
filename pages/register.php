<?php
$error = '';
if (isset($_GET['msg'])) {
    $error = $_GET['msg'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sawongam Bank</title>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/logres.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body class="body-color body-whole">
    <div class="container">
        <div class="row">

            <!-- Bank Image Section -->
            <div class="col-lg-6 align-items-center justify-content-center pb-5 d-none d-lg-flex">
                <img src="../assets/img/register-d.png" class="register-d">
                <img src="../assets/img/register-bank.png" class="register-bank">
            </div>

            <!-- Register Form Section -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center" style="height: 100vh;">
                <div class="col-8">
                    <div class="col-md-12 fw-bold mb-5 text-center login-header">Please Fill out form to Register!</div>
                    <form action="../scripts/register_auth.php" method="POST">
                        <div class="mb-1">
                            <label for="fullName" class="form-label text-black login-label">Full Name</label>
                            <input type="text" class="form-control rounded-4 textfield" id="fullName" name="fullName">
                            <small id="error-fullName" class="form-text text-danger error-font"></small>
                        </div>
                        <div class="mb-1">
                            <label for="address" class="form-label text-black login-label">Address</label>
                            <input type="text" class="form-control rounded-4 textfield" id="address" name="address">
                            <small id="error-address" class="form-text text-danger error-font"></small>
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label text-black login-label">Email</label>
                            <input type="email" class="form-control rounded-4 textfield" id="email" name="email">
                            <small id="error-email" class="form-text text-danger error-font"></small>
                        </div>
                        <div class="mb-2 password-field">
                            <label for="password" class="form-label text-black login-label">Password</label>
                            <input type="password" class="form-control rounded-4 textfield" id="password"
                                name="password">
                            <img src="../assets/img/eye-open.png" class="password-icon" id="eye-register">
                            <small id="error-password" class="text-danger error-font"></small>
                        </div>
                        <div class="mb-2 password-field">
                            <label for="confirmPassword" class="form-label text-black login-label">Confirm
                                Password</label>
                            <input type="password" class="form-control rounded-4 textfield" id="confirm-password">
                            <img src="../assets/img/eye-open.png" class="password-icon" id="eye-confirm">
                            <small id="error-confirmPassword" class="form-text text-danger error-font">
                                <?php echo $error ?>
                            </small>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit"
                                class="btn btn-primary rounded-4 mb-4 elevatedButton">Register</button>
                        </div>
                    </form>
                    <p class="mt-4 login-label text-center">Already have an account? <a href="login.php"
                            class="no-underline">Login</a>
                    </p>
                    <!-- Social Icons -->
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="https://facebook.com/sawongam">
                                    <img src="../assets/img/fb-icon.png" height="24px" class="zoom-on-hover"
                                        alt="facebook">
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#">
                                    <img src="../assets/img/whats-icon.png" height="24px" class="zoom-on-hover"
                                        alt="whatsapp">
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#">
                                    <img src="../assets/img/tel-icon.png" height="24px" class="zoom-on-hover"
                                        alt="telegram">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/register.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>