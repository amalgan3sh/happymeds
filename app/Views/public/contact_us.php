<!-- Start Breadcrumb Area  -->
<div class="main-content">
    <!-- Start Breadcarumb area  -->
    <div class="breadcrumb-area breadcarumb-style-1 pt--180 pb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h3 class="title h3">Contact Us</h3>
                        <ul class="page-list">
                            <li class="rainbow-breadcrumb-item"><a href="<?php echo base_url('/') ?>">Home</a></li>
                            <li class="rainbow-breadcrumb-item active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- End Breadcarumb area  -->
</div>

<!-- Start Contact Area  -->
<div class="main-content">
    <div class="rainbow-contact-area rainbow-section-gapTop-big">
        <div class="container">
            <div class="row mt--40 row--15">
                <div class="col-lg-8">
                    <div class="contact-details-box">
                        <h3 class="title">Get in Touch with ARANEA</h3>
                        <p>Fill out the form below to get started with a free quotation for ARANEA's healthcare, real estate, and sustainability services.</p>

                        <div class="profile-details-tab">
                            <div class="advance-tab-button">
                                <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="contactTab" role="tablist">
                                    <li role="presentation">
                                        <a href="#" class="tab-button active" id="general-contact-tab" data-bs-toggle="tab" data-bs-target="#general-contact" role="tab" aria-controls="general-contact" aria-selected="true">
                                            <span class="title">General Contact</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" class="tab-button" id="business-inquiry-tab" data-bs-toggle="tab" data-bs-target="#business-inquiry" role="tab" aria-controls="business-inquiry" aria-selected="true">
                                            <span class="title">Business Inquiry</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" class="tab-button" id="support-tab" data-bs-toggle="tab" data-bs-target="#support" role="tab" aria-controls="support" aria-selected="true">
                                            <span class="title">Support</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <!-- General Contact Form -->
                                <div class="tab-pane fade active show" id="general-contact" role="tabpanel" aria-labelledby="general-contact-tab">
                                    <form action="<?= site_url('contact/submitInquiry') ?>" method="POST" class="rbt-profile-row rbt-default-form row row--15">
                                        <input type="hidden" name="inquiry_type" value="general">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="firstname">First Name</label>
                                                <input id="firstname" name="firstname" type="text" placeholder="Your First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input id="lastname" name="lastname" type="text" placeholder="Your Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" type="email" placeholder="Your Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phonenumber">Phone Number</label>
                                                <input id="phonenumber" name="phonenumber" type="tel" placeholder="+1-202-555-0174">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea id="message" name="message" cols="20" rows="5" placeholder="Your Message or Inquiry"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button type="submit" class="btn-default">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <style>
                    .rainbow-section-gapTop-big {
                        padding: 50px 0 !important;
                    }
                </style>

                                <!-- Business Inquiry Form -->
                                <div class="tab-pane fade" id="business-inquiry" role="tabpanel" aria-labelledby="business-inquiry-tab">
                                    <form action="<?= site_url('contact/submitInquiry') ?>" method="POST" class="rbt-profile-row rbt-default-form row row--15">
                                        <input type="hidden" name="inquiry_type" value="business">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="firstname">First Name</label>
                                                <input id="firstname" name="firstname" type="text" placeholder="Your First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input id="lastname" name="lastname" type="text" placeholder="Your Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="company">Company</label>
                                                <input id="company" name="company" type="text" placeholder="Your Company Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" type="email" placeholder="Your Business Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="message">Business Inquiry</label>
                                                <textarea id="message" name="message" cols="20" rows="5" placeholder="Your Business Inquiry"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button type="submit" class="btn-default">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Support Form -->
                                <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
                                    <form action="<?= site_url('contact/submitInquiry') ?>" method="POST" class="rbt-profile-row rbt-default-form row row--15">
                                        <input type="hidden" name="inquiry_type" value="support">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="firstname">First Name</label>
                                                <input id="firstname" name="firstname" type="text" placeholder="Your First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input id="lastname" name="lastname" type="text" placeholder="Your Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" type="email" placeholder="Your Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phonenumber">Phone Number</label>
                                                <input id="phonenumber" name="phonenumber" type="tel" placeholder="+1-202-555-0174">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="message">Support Query</label>
                                                <textarea id="message" name="message" cols="20" rows="5" placeholder="Describe your issue or support request"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button type="submit" class="btn-default">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="col-lg-4 mt_md--30 mt_sm--30">
                    <div class="rainbow-address">
                        <div class="icon">
                            <i class="fa-sharp fa-regular fa-location-dot"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">Location</h4>
                            <p class="b2">ARANEA Headquarters, Kasargod District, Kerala, India</p>
                        </div>
                    </div>
                    <div class="rainbow-address">
                        <div class="icon">
                            <i class="fa-sharp fa-solid fa-headphones"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">Contact Number</h4>
                            <p class="b2"><a href="tel:+917736702333">+917736702333</a></p>
                            <!-- <p class="b2"><a href="tel:+85599677336">+85599677336</a></p> -->
                        </div>
                    </div>
                    <div class="rainbow-address">
                        <div class="icon">
                            <i class="fa-sharp fa-regular fa-envelope"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">Email Address</h4>
                            <p class="b2"><a href="mailto:contact@aranea.in">healthcare@aranea.in</a></p>
                            <!-- <p class="b2"><a href="mailto:support@aranea.in">support@aranea.in</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- End Contact Area  -->

<!-- Display JavaScript alert on form submission success or error -->
<?php if (session()->has('success')): ?>
    <script>
        alert("<?= session('success') ?>");
    </script>
<?php elseif (session()->has('error')): ?>
    <script>
        alert("<?= session('error') ?>");
    </script>
<?php endif; ?>