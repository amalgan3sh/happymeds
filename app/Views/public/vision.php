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
                                            <img class="w-100 radius" src="https://media.licdn.com/dms/image/D4D12AQEtTKDhfoL_bw/article-cover_image-shrink_720_1280/0/1695032536439?e=2147483647&v=beta&t=02oXif4vTzdnevgLfmSJHjOcKFX22tq4hB9UySjehbA" alt="Blog Images">
                                        </div>
                                        <ul class="rainbow-meta-list">
                                            <li>
                                                <i class="feather-user"></i>
                                                <a href="#">ARANEA Eco Vista Team</a>
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
                                    <h2 class="title">Our Vision for Sustainable Innovation</h2>
                                    <p>At ARANEA Eco Vista, we aim to lead innovative and sustainable developments by seamlessly blending traditional values with modern advancements. Our vision is to create impactful projects that drive economic growth while contributing to environmental stewardship and community well-being.</p>

                                    <h6>1. Community-Centered Development</h6>
                                    <p>We are dedicated to developing collaborative platforms that connect professionals, individuals, and organizations, facilitating meaningful change and progress both locally and globally. ARANEA Eco Vista is committed to fostering a vibrant and sustainable future where individuals and communities thrive.</p>

                                    <h6>2. Sustainable Practices in Healthcare and Real Estate</h6>
                                    <p>Our platform integrates eco-friendly practices across healthcare, real estate, and technology services, ensuring that our solutions contribute to a greener future. By focusing on sustainability, we aim to address global challenges such as climate change, resource management, and public health.</p>

                                    <h6>3. Innovation in Technology and Social Responsibility</h6>
                                    <p>By leveraging cutting-edge technology, ARANEA Eco Vista aims to build a global platform that encourages responsible entrepreneurship, ethical business practices, and social responsibility. Our goal is to inspire future generations to pursue innovation while maintaining a deep commitment to environmental sustainability and social equity.</p>

                                    <h6>4. A Global Impact</h6>
                                    <p>Our projects, such as the ARANEA Healthcare Platform and The Nest Ecocity, exemplify our commitment to sustainable growth and innovation. These initiatives aim to provide high-quality healthcare solutions, sustainable living environments, and economic opportunities for individuals and businesses alike.</p>

                                    <p>Together, we are building the future, one step at a time. Through strategic leadership, ARANEA Eco Vista will continue to be a driving force in shaping a more sustainable, collaborative, and prosperous world for all.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Blog Image -->
                <div class="post-page-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content text-center">
                                    <div class="thumbnail">
                                        <img class="w-100 radius" src="https://cdn.vidyard.com/thumbnails/22247264/mRMudXw2FAVuDcz_DXZzddeKbJNI211A.jpg" alt="Blog Images">
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
                                    <p>We are committed to driving positive change in society by offering innovative solutions that combine cutting-edge technology and sustainable practices. Our vision reflects our unwavering belief that we can create a better future through collaboration, integrity, and forward-thinking leadership.</p>

                                    <div class="category-meta">
                                        <span class="text">Tags:</span>
                                        <div class="tagcloud">
                                            <a href="#">Sustainability</a>
                                            <a href="#">Innovation</a>
                                            <a href="#">Healthcare</a>
                                            <a href="#">Community</a>
                                            <a href="#">Technology</a>
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
                        <ul class="category-list ">
                            <li><a href="#"><span class="left-content">Sustainability</span><span class="count-text">3</span></a></li>
                            <li><a href="#"><span class="left-content">Innovation</span><span class="count-text">5</span></a></li>
                            <li><a href="#"><span class="left-content">Healthcare</span><span class="count-text">4</span></a></li>
                            <li><a href="#"><span class="left-content">Technology</span><span class="count-text">2</span></a></li>
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
                                        <img src="https://fastercapital.co/i/Iwoh-Sustainability--Promoting-Environmental-Conservation-and-Stewardship--Sustainable-Practices-for-a-Greener-Future.webp" alt="Blog">
                                    </div>
                                    <div class="content">
                                        <a class="d-block" href="blog">5 Sustainable Practices for a Greener Future</a>
                                        <span class="cate">Sustainability</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list-blog-sm">
                                    <div class="img">
                                        <img src="https://media.licdn.com/dms/image/D5612AQFsrcFk7M8TKg/article-cover_image-shrink_720_1280/0/1688377133429?e=2147483647&v=beta&t=0ZsEmx9QotsEKBFCmescZQZT10RkHs4Kg-VcZU_P4ZU" alt="Blog">
                                    </div>
                                    <div class="content">
                                        <a class="d-block" href="blog">How AI is Revolutionizing Healthcare</a>
                                        <span class="cate">Healthcare</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Archives Widget -->
                <div class="rbt-single-widget widget_archive mt--40">
                    <h3 class="title">Archives</h3>
                    <div class="inner">
                        <ul>
                            <li><a href="#"><span class="cate">10 Dec 2023</span></a></li>
                            <li><a href="#"><span class="cate">30 Nov 2023</span></a></li>
                            <li><a href="#"><span class="cate">12 Oct 2023</span></a></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
</div>
<!-- End Blog Area -->
