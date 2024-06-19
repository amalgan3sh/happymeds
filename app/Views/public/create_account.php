<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="wrapper">
                        <form action="#">
                            <div class="row">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Email or Phone" required>
                            </div>
                            <div class="row">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" required>
                            </div>
                            <div class="pass"><a href="#">Forgot password?</a></div>
                            <div class="row button">
                                <input type="submit" value="Login">
                            </div>
                            <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button to trigger the modal -->
<button type="button" class="btn btn-lg btn-primary rounded-pill order-0" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
