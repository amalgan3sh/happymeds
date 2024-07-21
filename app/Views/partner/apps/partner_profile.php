<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <!-- <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div> -->
                        <div class="profile-info">
                            <div class="profile-photo">
                                <?php if (empty($userProfile['profile_photo'])): ?>
                                    <img src="<?= esc(base_url('images/tab/1.jpg')) ?>" alt="Default Profile Photo" class="img-fluid rounded-circle">
                                <?php else: ?>
                                    <img src="<?= esc(base_url('public/uploads/profiles/' . $userProfile['profile_photo'])) ?>" class="img-fluid rounded-circle" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?php echo $userProfile['user_name']; ?></h4>
                                    <p><?php echo $userProfile['designation']; ?></p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0"><?php echo $userProfile['email']; ?></h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ms-auto">
                                    <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item"><a href="javascript:void(0);"><i class="fa fa-user-circle text-primary me-2"></i> View profile</a></li>
                                        <li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addCloseFriendModal"><i class="fa fa-users text-primary me-2"></i> Add to close friends</a></li>
                                        <li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#createGroupModal"><i class="fa fa-plus text-primary me-2"></i> Create group</a></li>
                                        <li class="dropdown-item"><a href="javascript:void(0);" class="text-danger sweet-confirm"><i class="fa fa-ban text-danger me-2"></i> Block</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="m-b-0">12</h3><span>Investments</span>
                                            </div>
                                            <div class="col">
                                                <h3 class="m-b-0">$748k</h3><span>Portfolio Value</span>
                                            </div>
                                            <div class="col">
                                                <h3 class="m-b-0">21.3%</h3><span>Avg. ROI</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#linkModal"><i class="fa fa-link m-0"></i> </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="linkModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Share Investment Opportunity</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input class="form-control" placeholder="Paste deal link here">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Share</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-primary">View Portfolio</a>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="postModal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Post</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                     <textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
                                                     <a class="btn btn-primary" href="javascript:void(0)">Post</a>                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-blog">
                                    <h5 class="text-primary d-inline">Healthcare Innovations</h5>
                                    <img src="https://i.ytimg.com/vi/FFZQJzOyIs0/maxresdefault.jpg" alt="Healthcare Innovations" class="img-fluid mt-4 mb-4 w-100 rounded">
                                    <h4><a href="healthcare-details.html" class="text-dark">Revolutionary Treatment for Diabetes</a></h4>
                                    <p class="mb-0">Our healthcare sector is buzzing with news about a revolutionary new treatment for diabetes that shows promise in improving patients' lives significantly. This treatment uses a novel approach to manage blood sugar levels...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-interest mb-5">
                                    <h5 class="text-primary mb-2">Investment Focus</h5>
                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Cardiology</a>
                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Medical Devices</a>
                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Telemedicine</a>
                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">AI in Healthcare</a>
                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Biotech</a>
                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Preventive Medicine</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-news">
                                    <h5 class="text-primary mb-4">Market Insights</h5>
                                    <div class="media pt-3 pb-3">
                                        <img src="https://res.cloudinary.com/dlpitjizv/image/upload/v1687454099/impact/20210630_Impact_How_Telehealth_Has_Impacted_the_Healthcare_Industry_Blog_Data_1_2a71c4e0ad.jpg" alt="" class="me-3 rounded" width="75">
                                        <div class="media-body">
                                            <h5 class="m-b-5"><a href="telemedicine-details.html" class="text-dark">Telemedicine Stocks Surge</a></h5>
                                            <p class="mb-0">The surge in telemedicine adoption during the pandemic has led to a significant boost in the sector, with stocks rising sharply...</p>
                                        </div>
                                    </div>
                                    <div class="media pt-3 pb-3">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGuY5GUbNssd6ltb0-zozxDJbsrZDyY8FXgOkuCVmhg0zo8W5nZotEk53I2bnatnJZE04&usqp=CAU" alt="" class="me-3 rounded" width="75">
                                        <div class="media-body">
                                            <h5 class="m-b-5"><a href="biotech-merger-details.html" class="text-dark">Biotech Merger Shakes Market</a></h5>
                                            <p class="mb-0">In a major development, GeneTech and BioNova have announced their merger, creating ripples across the biotech industry...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Posts</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">About Me</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="my-posts" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <div class="post-input">
                                                <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Share your investment insights or medical breakthroughs..."></textarea> 
                                                <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#linkModal"><i class="fa fa-link m-0"></i> </a>
                                                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">Post</a>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="https://bitperfect.pe/wp-content/uploads/2024/07/compressed_img-0i6ZQTQa2ul6HqDQhnpVK3jR.png" alt="CardioTech" class="img-fluid w-100 rounded">
                                                <a class="post-title" href="cardiotech-details.html"><h3 class="text-dark">Breakthrough in CardioTech Innovations</h3></a>
                                                <p>Our recent investment in CardioTech is proving to be a game-changer. Their latest wearable device monitors cardiac health in real-time, providing early detection of potential heart issues and allowing for timely medical intervention...</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i class="fa fa-heart"></i></span>Endorse</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="https://lh3.googleusercontent.com/xJRGE_K4G0Qnm06tt5Pb_7f2gwkN9-uCaXOlTaHdNyatvnoqoZAv0FMXd9pQAjD2TW9zNUmN5VMK19AJDTLWm9iDwDvNBXsh8jAiGFqSmcErGzMKPZxy9DkQy-Oy5BFttW2S4VhN" alt="Telemedicine for Rural Areas" class="img-fluid w-100 rounded">
                                                <a class="post-title" href="rural-telemedicine-details.html"><h3 class="text-dark">Telemedicine for Rural Areas</h3></a>
                                                <p>Excited to announce our partnership with RuralHealth Connect. By leveraging satellite internet and AI-powered diagnostics, we're bringing top-tier cardiac care to remote regions. Early results show a 40% reduction in emergency cardiac events...</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i class="fa fa-heart"></i></span>Endorse</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i class="fa fa-reply"></i></span>Reply</button>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="about-me" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">About Me</h4>
                                                <p class="mb-2"><?php echo $userProfile['about_me']; ?></p>
                                            </div>
                                        </div>
                                        <div class="profile-skills mb-5">
                                            <h4 class="text-primary mb-2">Expertise</h4>
                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1"><?php echo $userProfile['skills']; ?></a>
                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">ASP.NET</a>
                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">C#</a>
                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Entity Framewrok</a>
                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">JIRA</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">React JS</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Project Management</a>
                                                </div>
                                                <div class="profile-lang  mb-5">
                                                    <h4 class="text-primary mb-2">Language</h4>
													<a href="javascript:void(0);" class="badge badge-primary light badge-sm"><i class="flag-icon flag-icon-us"></i><?php echo $userProfile['language']; ?></a> 
													<a href="javascript:void(0);" class="badge badge-secondary light badge-sm"><i class="flag-icon flag-icon-fr"></i> Malayalam</a>
                                                    <a href="javascript:void(0);" class="badge badge-warning light badge-sm"><i class="flag-icon flag-icon-bd"></i> Hindi</a>
                                                </div>
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $userProfile['firstname'].' '.$userProfile['lastname']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $userProfile['email']; ?></span>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span></span>
                                                        </div>
                                                    </div> -->
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $userProfile['age']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $userProfile['location']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $userProfile['experience']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Bank Account Details</h4>
                                                        <form>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Account Number</label>
                                                                    <input type="text" placeholder="Account Number" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">IFSC</label>
                                                                    <input type="text" placeholder="IFSC" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" placeholder="Account Holder Name" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Branch</label>
                                                                <input type="text" placeholder="Branch" class="form-control">
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">City</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">State</label>
                                                                    <select class="form-control default-select wide" id="inputState">
                                                                        <option selected="">Choose...</option>
                                                                        <option>Option 1</option>
                                                                        <option>Option 2</option>
                                                                        <option>Option 3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-2">
                                                                    <label class="form-label">Zip</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="form-check custom-checkbox">
																	<input type="checkbox" class="form-check-input" id="gridCheck">
																	<label class="form-check-label form-label" for="gridCheck"> Check me out</label>
																</div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Sign
                                                                in</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Reply</button>
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
        <!--**********************************
            Content body end
        ***********************************-->

		<div class="modal fade" id="addCloseFriendModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add to close friends</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="mb-3">
								<input class="form-control" placeholder="search here...">
							</div>
							<ul class="user-media-list">
								<li class="mb-2 border-bottom pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/1.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Archie Parker</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
								<li class="mb-2 border-bottom pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/2.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Alfie Mason</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
								<li class="mb-2 border-bottom pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/3.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Bashid Samim</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
								<li class="mb-2 border-bottom pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/4.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Jack Ronan</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
								<li class="mb-2 pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/5.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Oliver Acker</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
							</ul>
							<input type="submit" value="Done" class="submit btn btn-primary w-100" name="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="createGroupModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Group</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="mb-3">
								<label class="form-label">Name</label>
								<input class="form-control" placeholder="Enter group name">
							</div>
							<div class="mb-3">
								<label class="form-label">Select Friends</label>
								<input class="form-control" placeholder="search here...">
							</div>
							<ul class="user-media-list">
								<li class="mb-2 border-bottom pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/1.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Archie Parker</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
								<li class="mb-2 border-bottom pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/2.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Alfie Mason</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
								<li class="mb-2 pb-2">
									<div class="d-flex align-items-center">
										<div class="img_cont me-2">
											<img src="images/avatar/5.jpg" height="45" width="45" class="rounded-circle user_img" alt="">
										</div>
										<div class="user_info">
											<h6 class="mb-0">Oliver Acker</h6>
											<p class="mb-0">Kalid is online</p>
										</div>
									</div>
								</li>
							</ul>
							<input type="submit" value="Create" class="submit btn btn-primary w-100" name="submit">
						</form>
					</div>
				</div>
			</div>
		</div>


        <!--**********************************
            Footer start
        ***********************************-->
       <div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/"
						target="_blank">DexignLab</a> <span class="current-year">2024</span>
				</p>
			</div>
		</div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
	
	<!--removeIf(production)-->
        
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<!-- Light Gallery -->
	<script src="vendor/lightgallery/dist/lightgallery.min.js"></script>
	<script src="vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js"></script>
	<script src="vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   
	<script>
		document.querySelector(".sweet-confirm").onclick = function () { 
			Swal.fire({ 
				title: "Block Profile?", 
				text: "Are you sure you want to block profile", 
				type: "warning", showCancelButton: !0, 
				confirmButtonColor: "#DD6B55", 
				confirmButtonText: "Block", 
				closeOnConfirm: !1 
			})
		}
	</script>
	
</body>
</html>