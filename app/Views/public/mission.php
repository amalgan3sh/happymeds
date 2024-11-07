
<!-- Start Breadcrumb Area  -->
<div class="main-content">
    <!-- Start Breadcrumb area  -->
    <div class="breadcrumb-area breadcarumb-style-1 pt--180 pb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h3 class="title h3">Mission</h3>
                        <ul class="page-list">
                            <li class="rainbow-breadcrumb-item"><a href="<?php echo base_url('/') ?>">Home</a></li>
                            <li class="rainbow-breadcrumb-item active">Mission</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb area  -->
</div>

<!-- Start Blog Area  -->
<div class="rainbow-blog-section rainbow-section-gap-big bg-color-1">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="rainbow-blog-details-area">
                    <div class="post-page-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content text-center">
                                        <div class="thumbnail">
                                            <img class="w-100 radius" src="https://bachpanhospitals.com/wp-content/uploads/2024/03/Our-Mission-Bachpan-Childrens-Hospital.jpg" alt="Mission Image">
                                        </div>
                                        <ul class="rainbow-meta-list">
                                            <li>
                                                <i class="feather-user"></i>
                                                <a href="#">ARANEA Team</a>
                                            </li>
                                            <li>
                                                <i class="feather-calendar"></i>
                                                10 Dec 2023
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-details-content pt--40">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content">
                                        <h2 class="title">ARANEA Mission: Empowering Innovation and Sustainable Development</h2>
                                        <p>At ARANEA, our mission is to drive transformative change by fostering a collaborative ecosystem that combines modern technology with sustainable practices. Our mission extends across healthcare, providing scalable solutions that bridge traditional values with technological advancements.</p>

                                        <h6>1. Driving Innovation in Healthcare:</h6>
                                        <p>We strive to enhance healthcare through an integrated platform that supports manufacturers, suppliers, and brand partners in streamlining operations. Our system enables real-time updates, seamless product listings, and investment opportunities, ensuring everyone has a role in advancing healthcare solutions.</p>

                                        <h6>2. Supporting Sustainable Business Practices:</h6>
                                        <p>ARANEA connects businesses with industry leaders, enabling them to adopt sustainable practices while driving growth and efficiency. Our platform encourages collaboration and ethical entrepreneurship, helping businesses make a positive social impact.</p>

                                        <h6>3. Creating Global Opportunities:</h6>
                                        <p>By providing access to a global marketplace, ARANEA empowers B2B partners, manufacturers, and brand partners to expand their reach. Our platform supports investments, optimizes supply chains, and connects businesses with tools needed to succeed in a connected world.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Mission Image -->
                    <div class="post-page-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content text-center">
                                        <div class="thumbnail">
                                            <img class="w-100 radius" src="https://media.licdn.com/dms/image/D4D12AQGWaMSju-paSw/article-cover_image-shrink_720_1280/0/1682455746064?e=2147483647&v=beta&t=149qWjPfXonX7rNmNBkK5jQVNIYpUtLcJFyYs9vJEzc" alt="Mission Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blog-details-content pt--40 rainbow-section-gapBottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content">
                                        <p>At ARANEA, we are committed to ethical entrepreneurship, blending technological advancement with a commitment to social responsibility. We envision a future where innovation and sustainability create a healthier, more connected world.</p>
                                        <div class="category-meta">
                                            <span class="text">Tags:</span>
                                            <div class="tagcloud">
                                                <a href="#">Healthcare</a>
                                                <a href="#">Sustainability</a>
                                                <a href="#">Business Innovation</a>
                                                <a href="#">Collaboration</a>
                                            </div>
                                        </div>

                                        <!-- Start Comment Form Area -->
                                        <div class="rainbow-comment-form pt--60">
                                            <div class="inner">
                                                <div class="section-title">
                                                    <span class="subtitle">Have a Comment?</span>
                                                    <h2 class="title">Leave a Reply</h2>
                                                </div>
                                                <form id="contact-form" class="mt--40">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-12">
                                                            <div class="rnform-group">
                                                                <input type="text" name="name" placeholder="Name" required>
                                                            </div>
                                                            <div class="rnform-group">
                                                                <input type="email" name="email" placeholder="Email" required>
                                                            </div>
                                                            <div class="rnform-group">
                                                                <input type="text" name="website" placeholder="Website">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-12">
                                                            <div class="rnform-group">
                                                                <textarea name="message" placeholder="Comment" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="blog-btn">
                                                                <button type="submit" class="btn-default"><span>SEND MESSAGE</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Include EmailJS SDK -->
                                        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.6.4/dist/email.min.js"></script>
                                        <script type="text/javascript">
                                            (function(){
                                                emailjs.init("ZqAGdlu-q_WGJsESw"); // Your EmailJS User ID
                                            })();
                                        </script>

                                        <script type="text/javascript">
                                            document.getElementById('contact-form').addEventListener('submit', function(event) {
                                                event.preventDefault(); // Prevent form from submitting normally

                                                // Send email using EmailJS
                                                emailjs.sendForm('service_ejuut2p', 'template_zye5m7k', this)
                                                    .then(function() {
                                                        alert('Message sent successfully!');
                                                    }, function(error) {
                                                        alert('Failed to send message. Error: ' + JSON.stringify(error));
                                                    });
                                            });
                                        </script>
                                        <!-- End Comment Form Area -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Section -->
            <div class="col-lg-4 mt_md--40 mt_sm--40">
                <aside class="rainbow-sidebar">
                    <!-- Search Widget -->
                    <div class="rbt-single-widget widget_search mt--40">
                        <div class="inner">
                            <form class="blog-search" action="#">
                                <input type="text" placeholder="Search ...">
                                <button class="search-button">
                                    <i class="feather-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="rbt-single-widget widget_categories mt--40">
                        <h3 class="title">Categories</h3>
                        <div class="inner">
                            <ul class="category-list">
                                <li><a href="#"><span class="left-content">Sustainability</span><span class="count-text">5</span></a></li>
                                <li><a href="#"><span class="left-content">Healthcare</span><span class="count-text">3</span></a></li>
                                <li><a href="#"><span class="left-content">Innovation</span><span class="count-text">2</span></a></li>
                                <li><a href="#"><span class="left-content">Collaboration</span><span class="count-text">4</span></a></li>
                                <li><a href="#"><span class="left-content">Technology</span><span class="count-text">3</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="rbt-single-widget widget_recent_entries mt--40">
                        <h3 class="title">Recent Posts</h3>
                        <div class="inner">
                            <ul>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="https://c8.alamy.com/comp/2C04T23/brainstorming-innovation-idea-process-and-creative-thinking-concept-with-light-bulb-lamp-for-start-up-business-project-illustration-for-web-landing-p-2C04T23.jpg" alt="Blog">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="blog">10 ways to empower your business with ARANEA</a>
                                            <span class="cate">Business Innovation</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvJf78lQn8Jqfjh6E5yj10ZbHwtDBbri0Le9TC8d9iwK4knVQHax-joFmVoC8t7yoCkkM&usqp=CAU" alt="Blog">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="blog">Best Sustainable Practices for Modern Enterprises</a>
                                            <span class="cate">Sustainability</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgs82KfCq75L84hMbSJU3g-CoWQkKj-XGwsw&s" alt="Blog">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="blog">Harnessing Technology for Global Impact</a>
                                            <span class="cate">Technology</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area  -->