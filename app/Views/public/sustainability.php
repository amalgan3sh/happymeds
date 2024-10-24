<!-- Start Sustainability Projects Section -->
<div class="rainbow-sustainability-section rainbow-section-gap-big bg-color-1">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="rainbow-sustainability-details-area">
                    <div class="post-page-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content text-center">
                                        <div class="thumbnail">
                                            <img class="w-100 radius" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjm5xVzhUAzKYK9_QqYoUyGWw1off7iJLOp1dFrN2sDdkVQh115N5eBFJFndBTMpopGvkcIkdkefoXyQA-Q-MjSU0DxLfb-xeljVyin6UozhOeNmR6ZsqiY4ikPRVgICigJSMFvd2HxrWzBwn-JIQYpYd9u2WBYVOFVI_aQQkqYrRCaQcSs1GZpMnDm/s1600/sust-ngos.png" alt="Sustainability Image">
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
                    <div class="sustainability-details-content pt--40">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content">
                                        <h2 class="title">ARANEA Sustainability Projects</h2>
                                        <p>ARANEA is committed to driving sustainable development through innovative and eco-friendly projects. Our initiatives are focused on improving healthcare systems, optimizing real estate, and fostering environmental stewardship. Through strategic collaboration, we aim to create a sustainable future for all.</p>

                                        <h6>1. Sustainable Healthcare Solutions:</h6>
                                        <p>We are developing sustainable healthcare solutions that prioritize efficiency and eco-friendly practices. By reducing waste and optimizing resource use, ARANEA’s projects aim to improve healthcare outcomes while minimizing environmental impact.</p>

                                        <h6>2. Green Real Estate Projects:</h6>
                                        <p>ARANEA is pioneering green real estate projects that integrate energy-efficient technologies and sustainable building practices. These projects help reduce carbon footprints, making a positive impact on both the environment and local communities.</p>

                                        <h6>3. Environmental Initiatives:</h6>
                                        <p>Through our platform, ARANEA partners with businesses and communities to implement large-scale environmental initiatives, including reforestation, water conservation, and renewable energy projects. Together, we are building a greener, more sustainable world.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-page-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content text-center">
                                        <div class="thumbnail">
                                            <img class="w-100 radius" src="https://i0.wp.com/mia-platform.eu/wp-content/uploads/BlogPost_Cloud-Sustainability.jpg?fit=1024%2C529&ssl=1" alt="Sustainability Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sustainability-details-content pt--40 rainbow-section-gapBottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content">
                                        <p>ARANEA’s sustainability efforts are designed to create long-term benefits for the environment and society. By working with key partners, we are driving initiatives that foster ethical entrepreneurship, community growth, and environmental preservation.</p>
                                        <div class="category-meta">
                                            <span class="text">Explore More:</span>
                                            <div class="tagcloud">
                                                <a href="#">Sustainable Healthcare</a>
                                                <a href="#">Green Real Estate</a>
                                                <a href="#">Environmental Initiatives</a>
                                                <a href="#">Sustainability</a>
                                                <a href="#">Renewable Energy</a>
                                            </div>
                                        </div>

                                        <!-- Start Comment Form Area -->
                                    <div class="rainbow-comment-form pt--60">
                                        <div class="inner">
                                            <div class="section-title">
                                                <span class="subtitle">Have a Project in mind?</span>
                                                <h2 class="title">Contact Us</h2>
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
            <div class="col-lg-4 mt_md--40 mt_sm--40">
                <aside class="rainbow-sidebar">
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
                    <div class="rbt-single-widget widget_categories mt--40">
                        <h3 class="title">Projects</h3>
                        <div class="inner">
                            <ul class="category-list">
                                <li>
                                    <a href="#">
                                        <span class="left-content">Sustainability</span>
                                        <span class="count-text">5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="left-content">Green Real Estate</span>
                                        <span class="count-text">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="left-content">Healthcare Solutions</span>
                                        <span class="count-text">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="left-content">Environmental Initiatives</span>
                                        <span class="count-text">4</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="left-content">Renewable Energy</span>
                                        <span class="count-text">3</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="rbt-single-widget widget_recent_entries mt--40">
                        <h3 class="title">Recent Projects</h3>
                        <div class="inner">
                            <ul>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyGzJmVtobhsAJfvwJhbT2CiFf4oRS1yAkRA&s" alt="Sustainability Project">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="sustainability-details.html">Revolutionizing Healthcare with Sustainability</a>
                                            <span class="cate">Sustainable Healthcare</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="https://media.licdn.com/dms/image/D5612AQEYzFTF0fG7sw/article-cover_image-shrink_720_1280/0/1716194545804?e=2147483647&v=beta&t=PrcRJD_jSmRZ-6cZWcJOsZ5UKCu93t4oaMQmnhWAVjI" alt="Sustainability Project">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="sustainability-details.html">Building Green Real Estate Solutions</a>
                                            <span class="cate">Green Real Estate</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="https://etimg.etb2bimg.com/photo/102186407.cms" alt="Sustainability Project">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="sustainability-details.html">Expanding Environmental Initiatives</a>
                                            <span class="cate">Environmental Initiatives</span>
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
<!-- End Sustainability Projects Section -->