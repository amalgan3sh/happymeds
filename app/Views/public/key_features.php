<!-- Start Key Features Section -->
<div class="rainbow-features-section rainbow-section-gap-big bg-color-1">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-12">
                <div class="rainbow-features-details-area">
                    <div class="post-page-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content text-center">
                                        <h2 class="title">ARANEA Key Features</h2>
                                        <p>Explore the core features of ARANEA, designed to empower healthcare, business innovation, and sustainability.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="features-details-content pt--40">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content">
                                        <h2 class="title">1. Driving Innovation in Healthcare</h2>
                                        <p>ARANEA enhances the global healthcare system by streamlining operations for manufacturers, suppliers, and brand partners. With seamless product listing, investment opportunities, and real-time updates, we ensure that healthcare solutions are delivered efficiently.</p>

                                        <h2 class="title">2. Supporting Sustainable Business Practices</h2>
                                        <p>Through ARANEA, businesses connect with key industry players to drive innovation and adopt sustainable practices that enhance operational efficiency. Our platform fosters collaboration and growth while contributing to a meaningful social impact.</p>

                                        <h2 class="title">3. Creating Global Opportunities</h2>
                                        <p>ARANEA provides a global marketplace for B2B partners, manufacturers, and brand partners. From product investment to optimized supply chains, our platform equips businesses with the tools they need to thrive in a connected world.</p>
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
                                        <img class="w-100 radius" src="https://img.freepik.com/premium-photo/find-key-success_391052-9838.jpg" alt="Key Features Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="features-details-content pt--40 rainbow-section-gapBottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content">
                                        <h2 class="title">Empowering Ethical Entrepreneurship</h2>
                                        <p>At ARANEA, we believe in fostering ethical entrepreneurship that promotes sustainable economic growth while addressing global challenges. We integrate advanced technologies with a commitment to social responsibility, creating a future where innovation and sustainability coexist.</p>

                                        <div class="category-meta">
                                            <span class="text">Explore More:</span>
                                            <div class="tagcloud">
                                                <a href="#">Healthcare</a>
                                                <a href="#">Sustainability</a>
                                                <a href="#">Business Innovation</a>
                                                <a href="#">Collaboration</a>
                                                <a href="#">Real Estate</a>
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
        </div>
    </div>
</div>
<!-- End Key Features Section -->