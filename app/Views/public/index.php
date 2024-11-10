

<!-- Imroz Preloader -->
<div class="preloader">
    <div class='loader'>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
    </div>
</div>

<!-- Start Slider Area  -->
<div class="slider-area slider-style-1 variation-default slider-bg-image bg-banner1 slider-bg-shape" data-black-overlay="1">
    <!-- <div class="bg-blend-top bg_dot-mask"></div> -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="inner text-center mt--140">
                    
                <h1 class="title display-one">ARANEA Healthcare Platform : Building a Smarter Healthcare Ecosystem 
    <br> <span class="header-caption">
    <span class="cd-headline rotate-1">
    <span class="cd-headline rotate-1">
        <span class="cd-words-wrapper" style="width: 221px;">
            <b class="theme-gradient is-visible">Healthcare Solutions</b>
            <b class="theme-gradient is-hidden">Brand Partner Program</b>
            <b class="theme-gradient is-hidden">Subscribe with Us</b>
        </span>
    </span>
        </span> at ARANEA
    </h1>

    <style>
        /* Base font size for larger screens */
        .title.display-one {
            font-size: 2.5rem; /* Adjust this value as needed */
        }

        /* Adjust font size for medium screens */
        @media (max-width: 992px) {
            .title.display-one {
                font-size: 2rem; /* Slightly smaller for medium screens */
            }
        }

        /* Further adjust font size for smaller screens */
        @media (max-width: 768px) {
            .title.display-one {
                font-size: 1.75rem; /* Smaller for tablets */
            }
        }

        /* Smallest size for mobile screens */
        @media (max-width: 576px) {
            .title.display-one {
                font-size: 1.5rem; /* Even smaller for mobile devices */
            }
        }
    </style>

    
<p class="description">Build a future-ready healthcare ecosystem with Aranea's Smart Tools. 
    <br> Optimize your healthcare supplychain with distribution and seamless import and export solutions.
</p>
    <!-- Left Floating Icon -->
    <div class="floating-icon left-float">
        <img src="<?php echo base_url('assets/icons/healthcare_logo.png'); ?>" alt="Healthcare Icon 1">
    </div>

    <!-- Right Floating Icon -->
    <div class="floating-icon right-float">
        <img src="<?php echo base_url('assets/icons/healthcare_logo.png'); ?>" alt="Healthcare Icon 2">
    </div>

    <style>
            /* Base font size for larger screens */
    .title.display-one {
        font-size: 2.5rem;
    }

    /* Responsive font adjustments */
    @media (max-width: 992px) {
        .title.display-one {
            font-size: 2rem;
        }
    }
    @media (max-width: 768px) {
        .title.display-one {
            font-size: 1.75rem;
        }
    }
    @media (max-width: 576px) {
        .title.display-one {
            font-size: 1.5rem;
        }
    }

    /* Floating icon styles */
    .floating-icon {
        position: absolute;
        width: 50px;
        height: 50px;
        z-index: 1;
        opacity: 0.8;
        animation: float 4s ease-in-out infinite;
    }

    .left-float {
        top: 30%;
        left: 5%;
    }

    .right-float {
        top: 30%;
        right: 5%;
    }

    /* Floating animation */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    </style>
<div class="form-group">
    <textarea name="text" id="slider-text-area" cols="30" rows="2" readonly></textarea>
    <a class="btn-default @@btnClass" href="<?php echo base_url('get_started') ?>" target="_blank">Explore Solutions</a>
</div>



                        <script>
                            // Typewriter effect function
                            function typeWriterEffect(text, element, speed) {
                                let i = 0;
                                function typeWriter() {
                                    if (i < text.length) {
                                        element.value += text.charAt(i);
                                        i++;
                                        setTimeout(typeWriter, speed);
                                    }
                                }
                                typeWriter();
                            }

                            // Call the typewriter effect with the target textarea
                            document.addEventListener("DOMContentLoaded", function() {
                                const textArea = document.getElementById('slider-text-area');
                                const text = "To get started with ARANEA platform, click the button below";
                                typeWriterEffect(text, textArea, 100); // 100ms between each character
                            });
                        </script>
                    <div class="inner-shape">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/bg/icon-shape/icon-shape-one.png" alt="Icon Shape" class="iconshape iconshape-one">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/bg/icon-shape/icon-shape-two.png" alt="Icon Shape" class="iconshape iconshape-two">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/bg/icon-shape/icon-shape-three.png" alt="Icon Shape" class="iconshape iconshape-three">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/bg/icon-shape/icon-shape-four.png" alt="Icon Shape" class="iconshape iconshape-four">
                    </div>
                </div>
            </div>
            <div class="col-lg-11 col-xl-11 justify-content-center">
                <div class="slider-frame">
                    <img class="slider-image-effect shape-dark" src="<?php echo base_url('assets/landing/') ?>assets/images/bg/brand-partner-banner.png" alt="Banner Images">
                    <img class="slider-image-effect shape-light" src="<?php echo base_url('assets/landing/') ?>assets/images/light/bg/brand-partner-banner-light.png" alt="Banner Images">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape">
        <img class="bg-shape-one" src="<?php echo base_url('assets/landing/') ?>assets/images/bg/bg-shape-four.png" alt="Bg Shape">
        <img class="bg-shape-two" src="<?php echo base_url('assets/landing/') ?>assets/images/bg/bg-shape-five.png" alt="Bg Shape">
    </div>
</div>
<!-- End Slider Area  -->

<!-- Start Brand Area -->
<div class="rainbow-brand-area rainbow-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title rating-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                    <p class="b1 mb--0 small-title">Company certifications</p>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12 mt--10">
            <ul class="brand-list brand-style-2 slider-brand slider-brand-activation">
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>1.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>2.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>3.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>4.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>5.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>6.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>7.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>8.png" alt="Brand Image"></a></li>
                <!-- <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>9.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>10.png" alt="Brand Image"></a></li>
                <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>11.png" alt="Brand Image"></a></li> -->
                <!-- <li class="slide-single-layout"><a href="#"><img class="icon-size" src="<?php echo base_url('assets/icons/') ?>12.png" alt="Brand Image"></a></li> -->
            </ul>
        </div>
        <style>
            .icon-size {
                width: 100%; /* Make the width responsive */
    height: auto; /* Keep the height proportional to the width */
    max-width: 200px;
}
.brand-style-2 li a img {
    opacity: 0.6;
    transition: 0.3s;
    max-height: 100px;
}
        </style>
        </div>
    </div>
</div>

<!-- Start Tab__Style--one Area  -->
<div class="rainbow-service-area rainbow-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center pb--60" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                    <h4 class="subtitle">
                                <span class="theme-gradient">RAINBOW UNLOCKS THE POTENTIAL ai</span>
                            </h4>
                    <h2 class="title mb--0">Generative AI made for <br> creators.</h2>
                </div>
            </div>
        </div>

        <div class="row row--30 align-items-center">
            <div class="col-lg-12">
                <div class="rainbow-default-tab style-three generator-tab-defalt">
                    <ul class="nav nav-tabs tab-button" role="tablist">
                        <li class="nav-item tabs__tab " role="presentation">
                            <button class="nav-link rainbow-gradient-btn without-shape-circle" id="video-generator-tab" data-bs-toggle="tab" data-bs-target="#video-generate" type="button" role="tab" aria-controls="video-generate" aria-selected="false"><span class="generator-icon"><img
                                                src="<?php echo base_url('assets/landing/') ?>assets/images/icons/video-g.png" alt="Vedio Generator Icon">Brand Partner</span><span class="border-bottom-style"></span></button>
                        </li>
                        <li class="nav-item tabs__tab" role="presentation">
                            <button class="nav-link rainbow-gradient-btn without-shape-circle active" id="audio-generator-tab" data-bs-toggle="tab" data-bs-target="#audio-generate" type="button" role="tab" aria-controls="audio-generate" aria-selected="true"><span class="generator-icon"><img
                                                src="<?php echo base_url('assets/landing/') ?>assets/images/icons/audio-g.png" alt="Vedio Generator Icon">B2B Partner</span><span class="border-bottom-style"></span></button>
                        </li>
                        <li class="nav-item tabs__tab " role="presentation">
                            <button class="nav-link rainbow-gradient-btn without-shape-circle" id="photo-generator-tab" data-bs-toggle="tab" data-bs-target="#photo-generate" type="button" role="tab" aria-controls="photo-generate" aria-selected="false"><span class="generator-icon"><img
                                                src="<?php echo base_url('assets/landing/') ?>assets/images/icons/photo-g.png" alt="Vedio Generator Icon">Manufacturer</span><span class="border-bottom-style"></span></button>
                        </li>
                        <li class="nav-item tabs__tab " role="presentation">
                            <button class="nav-link rainbow-gradient-btn without-shape-circle" id="text-generator-tab" data-bs-toggle="tab" data-bs-target="#text-generate" type="button" role="tab" aria-controls="text-generate" aria-selected="false"><span class="generator-icon"><img
                                                src="<?php echo base_url('assets/landing/') ?>assets/images/icons/text-g.png" alt="Vedio Generator Icon">Supplier</span><span class="border-bottom-style"></span></button>
                        </li>
                        <li class="nav-item tabs__tab " role="presentation">
                            <button class="nav-link rainbow-gradient-btn without-shape-circle" id="code-generator-tab" data-bs-toggle="tab" data-bs-target="#code-generate" type="button" role="tab" aria-controls="code-generate" aria-selected="false"><span class="generator-icon"><img
                                                src="<?php echo base_url('assets/landing/') ?>assets/images/icons/code-g.png" alt="Vedio Generator Icon">Agent</span><span class="border-bottom-style"></span></button>
                        </li>
                    </ul>

                    <div class="rainbow-tab-content tab-content">
                        <div class="tab-pane fade" id="video-generate" role="tabpanel" aria-labelledby="video-generator-tab">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="section-title">
                                            <h2 class="title">Aranea Healthcare Brand Partners: Empower Your Business Growth.</h2>
                                            <div class="features-section">
                                                <ul class="list-style--1">
                                                    <li><i class="fa-regular fa-circle-check"></i>Exclusive Partnership Opportunities</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Enhanced Brand Visibility</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Tailored Marketing Solutions</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Access to Global Markets</li>
                                                </ul>
                                            </div>
                                            <div class="read-more">
                                                <a class="btn-default color-blacked" href="#">Start Partnering Now <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mt_md--30 mt_sm--30">
                                        <div class="export-img">
                                            <div class="inner-without-padding">
                                                <div class="export-img img-bg-shape">
                                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/generator-img/brand_partner.webp" alt="Chat example Image">
                                                    <div class="image-shape"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="audio-generate" role="tabpanel" aria-labelledby="audio-generator-tab">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="section-title">
                                            <h2 class="title">B2B Partners: Strengthen Your Business Connections.</h2>
                                            <div class="features-section">
                                                <ul class="list-style--1">
                                                    <li><i class="fa-regular fa-circle-check"></i>Collaborative Opportunities</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Efficient Supply Chain Solutions</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Optimized Procurement Processes</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Access to Key Industry Networks</li>
                                                </ul>
                                            </div>
                                            <div class="read-more">
                                                <a class="btn-default color-blacked" href="#">Start Partnering Now <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mt_md--30 mt_sm--30">
                                        <div class="export-img">
                                            <div class="inner-without-padding">
                                                <div class="export-img img-bg-shape">
                                                    <img class="shape-dark" src="<?php echo base_url('assets/landing/') ?>assets/images/generator-img/b2b_partner.webp" alt="Chat example Image">
                                                    <img class="shape-light" src="<?php echo base_url('assets/landing/') ?>assets/images/generator-img/b2b_partner.webp" alt="Chat example Image">
                                                    <div class="image-shape"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="photo-generate" role="tabpanel" aria-labelledby="photo-generator-tab">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="section-title">
                                            <h2 class="title">Empower Your Manufacturing with Cutting-Edge Solutions.</h2>
                                            <div class="features-section">
                                                <ul class="list-style--1">
                                                    <li><i class="fa-regular fa-circle-check"></i>Streamlined Production Processes</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Advanced Manufacturing Technologies</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Optimized Supply Chain Management</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Real-Time Data & Analytics</li>
                                                </ul>
                                            </div>
                                            <div class="read-more">
                                                <a class="btn-default color-blacked" href="#">Enhance Your Manufacturing <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mt_md--30 mt_sm--30">
                                        <div class="export-img">
                                            <div class="inner-without-padding">
                                                <div class="export-img img-bg-shape">
                                                    <img src="https://media.licdn.com/dms/image/D4D12AQE-6tK6I_wS0g/article-cover_image-shrink_720_1280/0/1715235394941?e=2147483647&v=beta&t=XRMydgCcIuhcqz5vkVLZlWwg79E3VKG3CYZVq0fDAg8" alt="Chat example Image">
                                                    <div class="image-shape"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="text-generate" role="tabpanel" aria-labelledby="text-generator-tab">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="section-title">
                                            <h2 class="title">Maximize Supply Chain Efficiency with Innovative Solutions.</h2>
                                            <div class="features-section">
                                                <ul class="list-style--1">
                                                    <li><i class="fa-regular fa-circle-check"></i>Seamless Order Fulfillment</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Real-Time Inventory Management</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Automated Restocking Systems</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Global Distribution Network</li>
                                                </ul>
                                            </div>
                                            <div class="read-more">
                                                <a class="btn-default color-blacked" href="#">Optimize Your Supply Chain <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mt_md--30 mt_sm--30">
                                        <div class="export-img">
                                            <div class="inner-without-padding">
                                                <div class="export-img img-bg-shape">
                                                    <img src="https://i1.sndcdn.com/artworks-exSvky0QMFUlIB92-JGVyaw-t500x500.jpg" alt="Chat example Image">
                                                    <div class="image-shape"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="code-generate" role="tabpanel" aria-labelledby="code-generator-tab">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="section-title">
                                            <h2 class="title">Empower Your Business with Strategic Agent Solutions.</h2>
                                            <div class="features-section">
                                                <ul class="list-style--1">
                                                    <li><i class="fa-regular fa-circle-check"></i>Personalized Client Management</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Optimized Sales Strategies</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Comprehensive Market Analysis</li>
                                                    <li><i class="fa-regular fa-circle-check"></i>Advanced Communication Tools</li>
                                                </ul>
                                            </div>
                                            <div class="read-more">
                                                <a class="btn-default color-blacked" href="#">Start Maximizing Opportunities <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mt_md--30 mt_sm--30">
                                        <div class="export-img">
                                            <div class="inner-without-padding">
                                                <div class="export-img img-bg-shape">
                                                    <img src="https://media.licdn.com/dms/image/D5612AQFJgprdIC2qlQ/article-cover_image-shrink_720_1280/0/1719033574633?e=2147483647&v=beta&t=Ujr9FQKmhzzb6hKl8lDHNdGdUJxvbdTyIBajjdxCvyQ" alt="Chat example Image">
                                                    <div class="image-shape"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Tab__Style--one Area  -->


<!-- Start Service__Style--one Area  -->
<div class="rainbow-service-area rainbow-section-gap rainbow-section-gapBottom-big">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-left" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                    <h4 class="subtitle">
                    <span class="theme-gradient">Empowering Businesses</span>
                </h4>
                    <h2 class="title mb--60">
                    Collaborate Seamlessly, Grow Exponentially <br> With ARANEA Platform
                </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="service-wrapper rainbow-service-slider-actvation slick-grid-15 rainbow-slick-dot rainbow-gradient-arrows">
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default aiwave-service-default has-bg-shaped">
                            <div class="inner">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/icons/service-icon-01.svg" alt="Servece Icon">
                                </div>
                                <div class="description centered-shape">
                                    <h5 class="title">Explore Products</h5>
                                    <p class="desc">Enable partners, suppliers, and manufacturers to easily discover and invest in the right products, streamlining the process.</p>
                                    <a class="read-more-btn" href="#">Explore More <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                            <div class="bg-shaped">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default aiwave-service-default has-bg-shaped">
                            <div class="inner">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/icons/service-icon-02.svg" alt="Service Icon">
                                </div>
                                <div class="description centered-shape">
                                    <h5 class="title">Collaborate Seamlessly</h5>
                                    <p class="desc">Empower users to effortlessly connect with suppliers, manufacturers, and partners across the platform to streamline business operations and drive innovation.</p>
                                    <a class="read-more-btn" href="#">Explore More <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                            <div class="bg-shaped">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default aiwave-service-default has-bg-shaped">
                            <div class="inner">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/icons/service-icon-01.svg" alt="Servece Icon">
                                </div>
                                <div class="description centered-shape">
                                    <h5 class="title">Instant Support</h5>
                                    <p class="desc">Provides users with immediate assistance, enabling quick responses to inquiries and ensuring seamless communication across all business partners and stakeholders.</p>
                                    <a class="read-more-btn" href="#">Explore More <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                            <div class="bg-shaped">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default aiwave-service-default has-bg-shaped">
                            <div class="inner">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/icons/service-icon-01.svg" alt="Service Icon">
                                </div>
                                <div class="description centered-shape">
                                    <h5 class="title">Comprehensive Knowledge Hub</h5>
                                    <p class="desc">Access detailed information and insights across a range of categories, ensuring that all your queries about products, suppliers, and partnerships are addressed in one unified platform.</p>
                                    <a class="read-more-btn" href="#">Explore More <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                            <div class="bg-shaped">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default aiwave-service-default has-bg-shaped">
                            <div class="inner">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/icons/service-icon-02.svg" alt="Service Icon">
                                </div>
                                <div class="description centered-shape">
                                    <h5 class="title">Seamless Connectivity</h5>
                                    <p class="desc">ARANEA connects you with suppliers, manufacturers, distributors, and partners globally, ensuring smooth communication and transaction processing, no matter where you are located.</p>
                                    <a class="read-more-btn" href="#">Explore More <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                            <div class="bg-shaped">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default aiwave-service-default has-bg-shaped">
                            <div class="inner">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/icons/service-icon-01.svg" alt="Service Icon">
                                </div>
                                <div class="description centered-shape">
                                    <h5 class="title">Swift Response</h5>
                                    <p class="desc">ARANEA ensures rapid responses to inquiries, whether you're a supplier, manufacturer, or brand partner. Our platform prioritizes efficient communication, saving you time and streamlining your operations.</p>
                                    <a class="read-more-btn" href="#">Explore More <span><i class="fa-sharp fa-solid fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                            <div class="bg-shaped">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Service__Style--one Area  -->

<!-- Start Advanced Tab area -->
<div class="rainbow-advance-tab-area aiwave-bg-gradient rainbow-section-gap-big">
    <div class="container">
        <div class="html-tabs" data-tabs="true">
            <div class="row row--30">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active advance-tab-content-1 right-top" id="home-3" role="tabpanel" aria-labelledby="home-tab-3">
                            <div class="rainbow-splite-style">
                                <div class="split-wrapper">
                                    <div class="row g-0 radius-10 align-items-center">
                                        <div class="col-lg-12 col-xl-5 col-12">
                                            <div class="thumbnail">
                                                <img class="radius" src="https://t3.ftcdn.net/jpg/04/76/98/34/360_F_476983486_lpgFNMTmvb6F1pFMnooOQotgpyoM2PVG.jpg" alt="split Images">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-7 col-12">
                                            <div class="split-inner">
                                                <div class="subtitle">
                                                    <span class="theme-gradient">How it Works</span>
                                                </div>
                                                <h2 class="title sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">Connect with ARANEA Platform</h2>
                                                <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">Easily connect with ARANEA’s platform, designed for suppliers, manufacturers, and brand partners. Manage your products, streamline operations, and access exclusive tools through our intuitive interface.</p>
                                                <div class="view-more-button mt--35 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                                                    <a class="btn-default color-blacked" href="get_started">Try It Now <i class="fa-sharp fa-light fa-arrow-right ml--5"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade advance-tab-content-1" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                            <div class="rainbow-splite-style">
                                <div class="split-wrapper">
                                    <div class="row g-0 radius-10 align-items-center">
                                        <div class="col-lg-12 col-xl-5 col-12">
                                            <div class="thumbnail">
                                                <img class="radius" src="https://www.protelesis.com/images-content/blog/streamline-business-operations.jpg" alt="split Images">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-7 col-12">
                                            <div class="split-inner">
                                                <div class="subtitle">
                                                    <span class="theme-gradient">Exploring Efficiency</span>
                                                </div>
                                                <h2 class="title sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">Streamline Your Business Operations</h2>
                                                <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">Unlock advanced tools and methods to optimize your business operations. With ARANEA’s platform, efficiently manage supply chains, product listings, and distribution while staying ahead of the competition.</p>
                                                <div class="view-more-button mt--35 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                                                    <a class="btn-default color-blacked" href="get_started">Try It Now <i class="fa-sharp fa-light fa-arrow-right ml--5"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade advance-tab-content-1" id="contact-3" role="tabpanel" aria-labelledby="contact-tab-3">
                            <div class="rainbow-splite-style">
                                <div class="split-wrapper">
                                    <div class="row g-0 radius-10 align-items-center">
                                        <div class="col-lg-12 col-xl-5 col-12">
                                            <div class="thumbnail">
                                                <img class="radius" src="https://1602894.fs1.hubspotusercontent-na1.net/hub/1602894/hubfs/170814062_m_normal_none%20%281%29.jpg?height=400&name=170814062_m_normal_none%20%281%29.jpg" alt="split Images">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-7 col-12">
                                            <div class="split-inner">
                                                <div class="subtitle">
                                                    <span class="theme-gradient">Navigating Cybersecurity</span>
                                                </div>
                                                <h2 class="title sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">Protecting Your Business Data</h2>
                                                <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">Stay ahead of potential threats with robust cybersecurity strategies tailored for ARANEA’s platform. Ensure the protection of your business operations, data integrity, and client information across the supply
                                                    chain and digital presence.</p>
                                                <div class="view-more-button mt--35 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                                                    <a class="btn-default color-blacked" href="get_started">Try It Now <i class="fa-sharp fa-light fa-arrow-right ml--5"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade advance-tab-content-1" id="explore-3" role="tabpanel" aria-labelledby="explore-tab-3">
                            <div class="rainbow-splite-style">
                                <div class="split-wrapper">
                                    <div class="row g-0 radius-10 align-items-center">
                                        <div class="col-lg-12 col-xl-5 col-12">
                                            <div class="thumbnail">
                                                <img class="radius" src="https://media.licdn.com/dms/image/C4E12AQFafkHnbcxWbA/article-cover_image-shrink_720_1280/0/1601642976113?e=2147483647&v=beta&t=d7rrfI6jz_ynW60PTzvAq_9n4nFP3PbZP0DvnoU48hs" alt="split Images">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-7 col-12">
                                            <div class="split-inner">
                                                <div class="subtitle">
                                                    <span class="theme-gradient">Mastering Data Analytics</span>
                                                </div>
                                                <h2 class="title sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">
            Demystifying Business Insights</h2>
                                                <p class="description sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">Unlock the power of data analytics on the ARANEA platform. Use advanced tools to transform raw business data into actionable insights that enhance decision-making for brand partners, suppliers, and B2B operations.</p>
                                                <div class="view-more-button mt--35 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                                                    <a class="btn-default color-blacked" href="get_started">Try It Now <i class="fa-sharp fa-light fa-arrow-right ml--5"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt--60">
                    <div class="advance-tab-button advance-tab-button-1 right-top">
                        <ul class="nav nav-tabs tab-button-list" id="myTab-3" role="tablist">

                            <li class="col-lg-3 nav-item" role="presentation">
                                <a href="#" class="nav-link tab-button active" id="home-tab-3" data-bs-toggle="tab" data-bs-target="#home-3" role="tab" aria-controls="home-3" aria-selected="true">
                                    <div class="tab">
                                        <div class="count-text">
                                            <span class="theme-gradient">01</span>
                                        </div>
                                        <h4 class="title">Engage with ARANEA</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-3 nav-item" role="presentation">
                                <a href="#" class="nav-link tab-button" id="profile-tab-3" data-bs-toggle="tab" data-bs-target="#profile-3" role="tab" aria-controls="profile-3" aria-selected="false">
                                    <div class="tab">
                                        <div class="count-text">
                                            <span class="theme-gradient">02</span>
                                        </div>
                                        <h4 class="title">Optimize Your Business</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-3 nav-item" role="presentation">
                                <a href="#" class="nav-link tab-button" id="contact-tab-3" data-bs-toggle="tab" data-bs-target="#contact-3" role="tab" aria-controls="contact-3" aria-selected="false">
                                    <div class="tab">
                                        <div class="count-text">
                                            <span class="theme-gradient">03</span>
                                        </div>
                                        <h4 class="title">Secure Transactions</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-3 nav-item" role="presentation">
                                <a href="#" class="nav-link tab-button" id="explore-tab-3" data-bs-toggle="tab" data-bs-target="#explore-3" role="tab" aria-controls="explore-3" aria-selected="false">
                                    <div class="tab">
                                        <div class="count-text">
                                            <span class="theme-gradient">04</span>
                                        </div>
                                        <h4 class="title">Analyze Performance</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="bg-shape">
        <img src="<?php echo base_url('assets/landing/assets/images/brand_partner_mobile.png') ?>" alt="Bg Shape">
    </div> -->
</div>
<!-- End Advanced Tab Area -->


<!-- Start Collabration-Style-One  -->
<div class="rainbow-collobration-area rainbow-section-gap-big">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
    <h4 class="subtitle ">
        <span class="theme-gradient">ARANEA Healthcare</span>
    </h4>
    <h2 class="title mb--20">All-in-One Platform for Seamless<br> Healthcare Collaboration</h2>
    <p class="description">Empowering healthcare professionals, suppliers, and patients to connect, collaborate, and streamline processes with advanced AI-driven tools.</p>
    <a class="btn-default btn-large color-blacked" href="get_started">Try It Now <i
            class="fa-sharp fa-light fa-arrow-right ml--5"></i></a>
</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt--60">
                <div class="collabration-image-section">
                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/split/split-2.png" alt="collabration-image">
                    <div class="logo-section">
                        <div class="center-logo">
                            <img class="shape-dark" style="max-width: 150%;" src="<?php echo base_url('assets/') ?>assets/img/illustrations/ARANEA_WHITE.png" alt="Small Logo">
                            <img class="shape-light" src="assets/images/light/split/split-2-logo.png" alt="Small Logo">
                        </div>
                    </div>
                </div>

                <style>
                    .rainbow-collobration-area .collabration-image-section .logo-section .center-logo {
                        padding: 27px 47px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        background: #0e0c1500;
                        border-radius: 20px;
                        position: relative;
                        z-index: 2;
                        width: 210px;
                        height: 210px;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
<!-- End Collabration-Style-One  -->


<!-- Start CTA Style-one Area  -->
<div class="rainbow-rn-cta">
    <div class="container">
        <div class="row row--0 align-items-center content-wrapper">
            <div class="col-lg-8">
                <div class="inner">
                    <div class="content text-left">
                        <h4 class="title sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">Join the ARANEA Community</h4>
                        <p class="sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">
                            Be part of a thriving community of healthcare professionals, innovators, and businesses sharing ideas, best practices, and strategies for using cutting-edge technology to drive better outcomes in healthcare and business solutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <div class="call-to-btn text-start text-lg-end sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                        <div class="team-image">
                            <img src="<?php echo base_url('assets/landing/') ?>assets/images/cta-img/team-01.png" alt="Group Image">
                        </div>
                        <a class="btn-default" href="https://community.aranea.in/">Join ARANEA Now for Free</a>
                    </div>
                </div>
            </div>
            <div class="bg-shape">
                <img src="<?php echo base_url('assets/landing/') ?>assets/images/cta-img/bg-shape-01.png" alt="BG Shape">
            </div>
        </div>
    </div>
</div>
<!-- End CTA Style-one Area  -->

<!-- Start Pricing Style-2  -->
<div class="rainbow-pricing-area rainbow-section-gap">
    <div class="container-fluid">

        <!-- Pricing Part -->
        <div class="wrapper rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                            <h4 class="subtitle">
                                        </h4>
                            <h2 class="title w-600 mb--20">
                                        Choose Your Account Types
                                        </h2>
                            <p class="description b1">
                                Select the account type that suits your needs and get started.
                            </p>
                        </div>


                    </div>
                </div>
                <div class="tab-content p-0 bg-transparent border-0 border bg-light" id="nav-tabContent">

                    <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row row--15">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-pricing style-aiwave">
                                    <div class="pricing-table-inner">
                                        <div class="pricing-top">
                                            <div class="pricing-header">
                                                <div class="icon">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </div>
                                                <h4 class="title color-var-one">Healthcare B2B Store</h4>
                                                <p class="subtitle">Dedicated web based application, door to door delivery system,Advanced updated dashboards</p>
                                                <div class="pricing">
                                                </div>
                                            </div>
                                            <div class="pricing-body">
                                                <div class="features-section">
                                                    <h6>Features</h6>
                                                    <ul class="list-style--1">
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> Sell or buy products through our platform
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> User friendly web based application
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> Access to large network of buyers and sellers
                                                        </li>
                                                        <li>
                                                            <i class="fa-sharp fa-regular fa-minus-circle"></i> Production and sales and support
                                                        </li>
                                                        <li>
                                                            <i class="fa-sharp fa-regular fa-minus-circle"></i> Advance Updates via dashboard
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a class="btn-default" href="ecommerce_home">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-pricing style-aiwave">
                                    <div class="pricing-table-inner">
                                        <div class="pricing-top">
                                            <div class="pricing-header">
                                                <div class="icon">
                                                    <i class="fa-solid fa-tools"></i>
                                                </div>
                                                <h4 class="title color-var-two">Supplier/ Manufacturer/ Agent/ Agency/ Distributor/ Franchise</h4>
                                                <p class="subtitle">Sell or distribute products through our platform</p>

                                            </div>
                                            <div class="pricing-body">
                                                <div class="features-section has-show-more">
                                                    <h6>Features</h6>
                                                    <ul class="list-style--1 has-show-more-inner-content">
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i>Import and Export Solutions
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> Door to Door delivery system
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> Marketing and sales support
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> Reliable logistics and distribution
                                                        </li>

                                                        <li>
                                                            <i class="fa-sharp fa-regular fa-minus-circle"></i> AI Blog Updates via dashboard
                                                        </li>
                                                        <li>
                                                            <i class="fa-sharp fa-regular fa-minus-circle"></i> Advance Updates via dashboard
                                                        </li>
                                                    </ul>
                                                    <div class="rbt-show-more-btn">Show More</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a class="btn-default" href="public_login" target="_blank">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-pricing style-aiwave">
                                    <div class="pricing-table-inner">
                                        <div class="pricing-top">
                                            <div class="pricing-header">
                                                <div class="icon">
                                                    <i class="fa-sharp fa-regular fa-handshake"></i>
                                                </div>
                                                <h4 class="title color-var-three">Healthcare Brand Partner</h4>
                                                <p class="subtitle">Invest in products and earn benefits from sales</p>

                                            </div>
                                            <div class="pricing-body">
                                                <div class="features-section has-show-more">
                                                    <h6>Features</h6>
                                                    <ul class="list-style--1 has-show-more-inner-content">
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i>Turnover benefits based on chosen products(good content)
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i>Benefits get to the wallet through bank
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> 5-year subscription plan
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-circle-check"></i> Turnover benefits
                                                        </li>
                                                        <li>
                                                            <i class="fa-sharp fa-regular fa-minus-circle"></i> AI Blog Updates via dashboard
                                                        </li>
                                                        <li>
                                                            <i class="fa-sharp fa-regular fa-minus-circle"></i> Advance Updates via dashboard
                                                        </li>
                                                    </ul>
                                                    <div class="rbt-show-more-btn">Show More</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a class="btn-default" href="partner_signin">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- End Pricing Style-2  -->

<!-- Service Area -->
<div class="aiwave-service-area rainbow-section-gap">
    <div class="container">
        <div class="row row--15 service-wrapper">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-duration="700">
                <div class="service service__style--1 aiwave-style text-center">
                    <div class="icon">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/service-icon-01.png" alt="Service Image">
                    </div>
                    <div class="content">
                        <h4 class="title w-600">100% No-Risk, Money Back Guarantee!</h4>
                        <p class="description b1 mb--0">Refunds issued within 14 days for unsatisfied healthcare product or service purchases on the ARANEA platform.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                <div class="service service__style--1 aiwave-style text-center">
                    <div class="icon">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/service-icon-02.png" alt="Service Image">
                    </div>
                    <div class="content">
                        <h4 class="title w-600">Upgrade or Cancel Anytime</h4>
                        <p class="description b1 mb--0">Easily upgrade or cancel your ARANEA healthcare solutions plan at any time—flexibility at your fingertips.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="200">
                <div class="service service__style--1 aiwave-style text-center">
                    <div class="icon">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/service-icon-03.png" alt="Service Image">
                    </div>
                    <div class="content">
                        <h4 class="title w-600">Try the Free Version</h4>
                        <p class="description b1 mb--0">Not sure yet? Experience ARANEA’s healthcare solutions for free and upgrade when ready.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <!-- Start Testimonial Area  -->
<div class="rainbow-testimonial-area rainbow-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-left" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                    <h4 class="subtitle">
                        <span class="theme-gradient">Community Driven Healthcare</span>
                    </h4>
                    <h2 class="title mb--60">
                        What Our Partners Say
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="service-wrapper rainbow-service-slider-actvation slick-grid-15 rainbow-slick-dot rainbow-gradient-arrows">
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card active card-style-default testimonial-style-defalt has-bg-shaped">
                            <div class="inner">
                                <div class="rating">
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="description">ARANEA has transformed the way we manage healthcare distribution. The platform is seamless and efficient.</p>
                                    <div class="bottom-content">
                                        <div class="meta-info-section">
                                            <p class="title-text">Sarah Johnson</p>
                                            <p class="desc">Healthcare Partner</p>
                                            <div class="desc-img">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-t.png" alt="Brand Image">
                                            </div>
                                        </div>
                                        <div class="meta-img-section">
                                            <a class="btn-default rounded-player style-two xs-size popup-video" href="https://www.youtube.com/watch?v=ikEdN260zRg">
                                                <span><i class="fa-duotone fa-play"></i></span>
                                            </a>
                                            <a class="image" href="#">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/team/team-02sm.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-shape">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>

                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default testimonial-style-defalt has-bg-shaped">
                            <div class="inner">
                                <div class="rating">
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="description">The ARANEA platform has simplified our supply chain management, giving us a competitive edge in healthcare services.</p>
                                    <div class="bottom-content">
                                        <div class="meta-info-section">
                                            <p class="title-text">James Carter</p>
                                            <p class="desc">Supplier</p>
                                            <div class="desc-img">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-t.png" alt="Brand Image">
                                            </div>
                                        </div>
                                        <div class="meta-img-section">
                                            <a class="btn-default rounded-player style-two xs-size popup-video" href="https://www.youtube.com/watch?v=ikEdN260zRg">
                                                <span><i class="fa-duotone fa-play"></i></span>
                                            </a>
                                            <a class="image" href="#">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/team/team-02sm.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-shape">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>

                    <!-- Additional Testimonial 1 -->
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default testimonial-style-defalt has-bg-shaped">
                            <div class="inner">
                                <div class="rating">
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="description">Our partnership with ARANEA has allowed us to scale our operations and meet the growing demands of our clients.</p>
                                    <div class="bottom-content">
                                        <div class="meta-info-section">
                                            <p class="title-text">Maria Thompson</p>
                                            <p class="desc">Brand Partner</p>
                                            <div class="desc-img">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-t.png" alt="Brand Image">
                                            </div>
                                        </div>
                                        <div class="meta-img-section">
                                            <a class="btn-default rounded-player style-two xs-size popup-video" href="https://www.youtube.com/watch?v=ikEdN260zRg">
                                                <span><i class="fa-duotone fa-play"></i></span>
                                            </a>
                                            <a class="image" href="#">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/team/team-02sm.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-shape">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>

                    <!-- Additional Testimonial 2 -->
                    <div class="slide-single-layout">
                        <div class="rainbow-box-card card-style-default testimonial-style-defalt has-bg-shaped">
                            <div class="inner">
                                <div class="rating">
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                    <a href="#rating">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="description">The ARANEA platform’s ability to adapt to changing regulations in the healthcare industry has been a game changer.</p>
                                    <div class="bottom-content">
                                        <div class="meta-info-section">
                                            <p class="title-text">Thomas Evans</p>
                                            <p class="desc">Agency Partner</p>
                                            <div class="desc-img">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-t.png" alt="Brand Image">
                                            </div>
                                        </div>
                                        <div class="meta-img-section">
                                            <a class="btn-default rounded-player style-two xs-size popup-video" href="https://www.youtube.com/watch?v=ikEdN260zRg">
                                                <span><i class="fa-duotone fa-play"></i></span>
                                            </a>
                                            <a class="image" href="#">
                                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/team/team-02sm.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-shape">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial.png" alt="" class="bg shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-dark">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial.png" alt="" class="bg shape-light">
                                <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/service/bg-testimonial-hover.png" alt="" class="bg-hover shape-light">
                            </div>
                        </div>
                    </div>
                    <!-- End Additional Testimonial -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial Area  -->

        <!-- Start Brand Area -->
        <div class="rainbow-brand-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title rating-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <div class="rating">
                                <a href="#rating">
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                </a>
                                <a href="#rating">
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                </a>
                                <a href="#rating">
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                </a>
                                <a href="#rating">
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                </a>
                                <a href="#rating">
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                </a>
                            </div>
                            <p class="subtitle mb--0">Based on 20,000+ reviews on</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt--10">
                        <ul class="brand-list brand-style-2">
                            <li><a href="#"><img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-01.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-02.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-03.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="<?php echo base_url('assets/landing/') ?>assets/images/brand/brand-04.png" alt="Brand Image"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-shape-left">
                <img src="<?php echo base_url('assets/landing/') ?>assets/images/bg/bg-shape-two.png" alt="Bg shape">
            </div>
        </div>

        <!-- Start CTA Area -->
      <div class="rainbow-cta-area rainbow-section-gap rainbow-section-gapBottom-big">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="aiwave-cta">
                    <div class="inner">
                        <div class="content-left">
                            <div class="section-title text-left" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                                <h4 class="subtitle">
                                    <span class="theme-gradient">Get Started with ARANEA</span>
                                </h4>
                                <h2 class="title w-600 mb--20">
                                    Discover AI-Driven Healthcare Solutions
                                </h2>
                                <p class="description b1">
                                    Through our AI-powered platform, you can manage healthcare products, 
                                    connect with suppliers, manufacturers, and partners, and receive personalized recommendations to grow your business.
                                </p>
                            </div>
                            <div class="app-store-btn">
                                <a class="store-btn" href="#">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/cta-img/play-app.png" alt="Play Store Button">
                                </a>
                                <a class="store-btn" href="#">
                                    <img src="<?php echo base_url('assets/landing/') ?>assets/images/cta-img/apple-app.png" alt="Apple Store Button">
                                </a>
                            </div>
                        </div>
                        <div class="content-right">
                            <div class="img-right">
                                <img src="https://media.licdn.com/dms/image/C4E12AQHQ93UQ1be7vQ/article-cover_image-shrink_720_1280/0/1617704785828?e=2147483647&v=beta&t=ch0dFZwVNrcS_djoAn5HQ8LIuynffa7KZj-7ahKDHJs" alt="Mobile View">
                            </div>
                        </div>
                        <div class="bg-shape-one">
                            <img src="<?php echo base_url('assets/landing/') ?>assets/images/cta-img/bg-shape.png" alt="Bg shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    html, body {
    max-width: 100%;
    overflow-x: hidden;
}

</style>