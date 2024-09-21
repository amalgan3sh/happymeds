<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>ARANEA Platform : Choose Your User Type</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ARANEA">
    <meta name="robots" content="index, follow">

    <meta name="keywords" content="Supplier, Manufacturer, Distributor, Agent, Agency, Franchise, User Type, ARANEA Platform">
    <meta name="description" content="ARANEA Platform user type selection. Choose how you plan to use the ARANEA platform: as an Agent, Agency, Manufacturer, Distributor, Supplier, or Franchise.">
    <meta property="og:title" content="ARANEA Platform : Choose Your User Type">
    <meta property="og:description" content="Select how you plan to use the ARANEA platform to unlock tailored features and access for your business.">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link class="main-css" href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="authincation fix-wrapper">
        <div class="container">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="error-page">
                        <div class="error-inner text-center">
                            <!-- <div class="dz-error" data-text="User Type">Choose Your User Type</div> -->
                            <h2 class="error-head mb-0">How are you planning to use ARANEA?</h2>
                            <p>Select the user type that best describes your role to proceed.</p>

                            <!-- User Type Selection Form -->
                            <form action="<?= base_url('update_user_type') ?>" method="POST">
                                <div class="form-group">
                                    <label for="user_type">Select one of the following:</label>
                                    <select name="user_type" class="form-control" id="user_type" required>
                                        <option value="">Select one...</option>
                                        <option value="agent">Agent</option>
                                        <option value="agency">Agency</option>
                                        <option value="manufacturer">Manufacturer</option>
                                        <option value="distributor">Distributor</option>
                                        <option value="supplier">Supplier</option>
                                        <option value="franchise">Franchise</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                            <!-- End of Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>

</body>

</html>