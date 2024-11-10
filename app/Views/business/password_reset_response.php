<!-- Response Page Start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Response</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.min.css">
    <style>
        .response-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .response-card {
            max-width: 500px;
            padding: 2rem;
            border-radius: .5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .response-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .success-icon { color: #28a745; }
        .error-icon { color: #dc3545; }
    </style>
</head>
<body>

<div class="response-container">
    <div class="card response-card">
        <!-- Conditional Icon and Message Based on Success or Error -->
        <div id="responseMessage">
            <!-- Success -->
            <div id="successMessage">
                <i class="response-icon success-icon fas fa-check-circle"></i>
                <h3>Password Reset Successful</h3>
                <p>Your password has been updated successfully. You can now log in with your new password.</p>
            </div>

            <!-- Error -->
            <div id="errorMessage" style="display: none;">
                <i class="response-icon error-icon fas fa-times-circle"></i>
                <h3>Password Reset Failed</h3>
                <p>There was an error updating your password. Please try again or contact support.</p>
            </div>
        </div>

        <!-- Link to Login -->
        <a href="<?= site_url('public_login') ?>" class="btn btn-primary mt-3">Go to Login</a>
    </div>
</div>

<!-- Scripts -->
<script src="vendor/global/global.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    // Example: Show appropriate message based on response
    const isSuccess = true; // Change this based on server response
    document.getElementById('successMessage').style.display = isSuccess ? 'block' : 'none';
    document.getElementById('errorMessage').style.display = isSuccess ? 'none' : 'block';
</script>
</body>
</html>
<!-- Response Page End -->
