<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <!-- Start cookieyes banner --> 
    <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/6c5771fd376fd4a6e4b3f44f/script.js"></script> 
    <!-- End cookieyes banner -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Happymeds</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/');?>assets/img/favicons/happymeds_logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/');?>assets/img/favicons/happymeds_logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/');?>assets/img/favicons/happymeds_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/');?>assets/img/favicons/happymeds_logo.png">
    <link rel="manifest" href="<?php echo base_url('assets/');?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo base_url('assets/');?>assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <link href="<?php echo base_url('assets/');?>assets/css/theme.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('success')): ?>
                alert("<?= session()->getFlashdata('success'); ?>");
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                alert("<?= session()->getFlashdata('error'); ?>");
            <?php endif; ?>
        });
    </script>
</head>

<body>

    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="<?php echo base_url('assets/');?>assets/img/illustrations/ARANEA.png">
                    <img src="<?php echo base_url('assets/');?>assets/img/illustrations/ARANEA.png" alt="Logo" style="height: 40px; margin-right: 10px;">
                    <div class="d-flex align-items-center">
                        <div class="text-warning">Happy</div>
                        <div class="text-1000">Meds</div>
                    </div>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
                        <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium active" aria-current="page" href="<?php echo base_url('') ?>">Home</a></li>
                        <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium" href="<?php echo base_url('#features'); ?>">Features</a></li>
                        <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium" href="<?php echo base_url('#pricing'); ?>">Collaborations</a></li>
                        <li class="nav-item" data-anchor="data-anchor"><a class="nav-link fw-medium" href="<?php echo base_url('#faq'); ?>">FAQ</a></li>
                    </ul>
                    <form class="ps-lg-5" id="createAccountForm" action="<?php echo base_url('user_types') ?>">
                        <button class="btn btn-lg btn-primary rounded-pill order-0" type="submit" id="createAccountButton">Create Account / sign in</button>
                    </form>
                </div>
            </div>
        </nav>
    </main>

    <script>
        // Assuming base_url is defined in your JavaScript
        const base_url = "<?php echo base_url(); ?>";

        document.querySelectorAll('a.nav-link').forEach(function(anchor) {
            anchor.addEventListener('click', function(event) {
                const href = anchor.getAttribute('href');
                
                // Check if href is a fragment identifier
                if (href.startsWith('#')) {
                    event.preventDefault(); // Prevent the default link click behavior
                    const targetElement = document.querySelector(href);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                } else if (href.startsWith('http') || href.startsWith('https') || href.startsWith(base_url)) {
                    // Handle full URLs and base URLs by navigating to them directly
                    window.location.href = href;
                } else {
                    // Handle relative paths as fragment identifiers
                    event.preventDefault();
                    const targetElement = document.querySelector(href);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        // Fallback to navigating to the URL if element is not found
                        window.location.href = href;
                    }
                }
            });
        });
    </script>
</body>
</html>
