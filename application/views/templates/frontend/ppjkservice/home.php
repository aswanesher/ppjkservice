<!-- WIDGET SLIDER -->
<?php 
if(!empty($slider_widget)) {
    $this->load->view($temp.'widget/slider_widget');
} 
?>
<!-- END WIDGET SLIDER -->

<!-- WIDGET PAGE -->
<?php 
if(!empty($page_widget)) {
    $this->load->view($temp.'widget/page_widget');
}   
?>
<!-- END WIDGET PAGE -->

<!-- WIDGET BLOG -->
<?php 
if(!empty($blog_widget)) {
    $this->load->view($temp.'widget/produk_widget');
} 
?>
<!-- END WIDGET BLOG --> 

<!--<section class="featured-services style-two">
	<div class="thm-container">
		<div class="row">
			<div class="col-lg-8 col-md-12 featured-service-box pull-right">
				<div class="col-md-6 col-sm-6">
					<div class="single-featured-service">
						<header>
							<div class="icon-box">
								<i class="flaticon-commercial15"></i>
							</div>
							<div class="title-box">
								<h3><span>Contract logistics</span></h3>
							</div>						
						</header>
						<article>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non.</p>
						</article>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="single-featured-service">
						<header>
							<div class="icon-box">
								<i class="flaticon-woman93"></i>
							</div>
							<div class="title-box">
								<h3><span>Consulting Services</span></h3>
							</div>						
						</header>
						<article>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non.</p>
						</article>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="single-featured-service">
						<header>
							<div class="icon-box">
								<i class="flaticon-airplane68"></i>
							</div>
							<div class="title-box">
								<h3><span>Reaching Large Destinations</span></h3>
							</div>						
						</header>
						<article>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non.</p>
						</article>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="single-featured-service">
						<header>
							<div class="icon-box">
								<i class="flaticon-delivery18"></i>
							</div>
							<div class="title-box">
								<h3><span>Goods Tracking Support</span></h3>
							</div>						
						</header>
						<article>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non.</p>
						</article>
					</div>
				</div>
			</div>
			<div class="col-md-4 hidden-sm">
				<div class="left-full-img">
					<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/full-man.jpg" alt="Awesome Image" class="pull-right">
				</div>
			</div>
		</div>
	</div>
</section>-->



<!--<section class="faq-section sec-padding">
	<div class="thm-container">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div class="sec-title">
					<h2><span>some of our core values</span></h2>
				</div>
				<div class="accrodion-grp" data-grp-name="faq-accrodion">
					<div class="accrodion active">
						<div class="accrodion-title">
							<h4>Our Mission</h4>
						</div>
						<div class="accrodion-content">
							<div class="img-caption">
								<div class="img-box">
									<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/accrodion/1.jpg" alt="Awesome Image"/>
								</div>
								<div class="content-box">
									<h4>Our Delivery is all our our country</h4>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehen- derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<ul>
										<li><i class="fa fa-long-arrow-right"></i> Adipis civelit</li>
										<li><i class="fa fa-long-arrow-right"></i> Adipis civelit</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="accrodion ">
						<div class="accrodion-title">
							<h4>Our Vision</h4>
						</div>
						<div class="accrodion-content">
							<div class="img-caption">
								<div class="img-box">
									<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/accrodion/1.jpg" alt="Awesome Image"/>
								</div>
								<div class="content-box">
									<h4>Our Delivery is all our our country</h4>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehen- derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<ul>
										<li><i class="fa fa-long-arrow-right"></i> Adipis civelit</li>
										<li><i class="fa fa-long-arrow-right"></i> Adipis civelit</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="accrodion">
						<div class="accrodion-title">
							<h4>Our About</h4>
						</div>
						<div class="accrodion-content">
							<div class="img-caption">
								<div class="img-box">
									<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/accrodion/1.jpg" alt="Awesome Image"/>
								</div>
								<div class="content-box">
									<h4>Our Delivery is all our our country</h4>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehen- derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<ul>
										<li><i class="fa fa-long-arrow-right"></i> Adipis civelit</li>
										<li><i class="fa fa-long-arrow-right"></i> Adipis civelit</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="sec-title">
					<h2><span>Our locations</span></h2>
				</div>
				<div class="view-location">
					<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/view-location.png" alt="Awesome Image"/>
					<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non numquam eius modi.</p>
					<a href="#">view our locations</a>
				</div>
			</div>
		</div>
	</div>
</section>-->



<!--<section class="request-qoute has-overlay">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-6">
				<div class="sec-padding has-overlay">
					<div class="sec-title">
						<h2><span>Testimonials</span></h2>
					</div>
					<div class="testimonial-box with-carousel">
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class="content-box">
									<div class="top">
										<div class="qoute-box">
											“							
										</div>
										<div class="title">
											<h3>Logic Cargo is Great Firm</h3>
										</div>
									</div>						
									<div class="content">							
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum </p>
										<span>Michale John (CEO & Founder)</span>
										<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/testimonials/1.png" alt="">
									</div>
								</div>
							</div>
							<div class="item">
								<div class="content-box">
									<div class="top">
										<div class="qoute-box">
											“							
										</div>
										<div class="title">
											<h3>Logic Cargo is Great Firm</h3>
										</div>
									</div>						
									<div class="content">							
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum </p>
										<span>Michale John (CEO & Founder)</span>
										<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/testimonials/2.png" alt="">
									</div>
								</div>
							</div>
							<div class="item">
								<div class="content-box">
									<div class="top">
										<div class="qoute-box">
											“							
										</div>
										<div class="title">
											<h3>Logic Cargo is Great Firm</h3>
										</div>
									</div>						
									<div class="content">							
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum </p>
										<span>Michale John (CEO & Founder)</span>
										<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/testimonials/3.png" alt="">
									</div>
								</div>
							</div>
							<div class="item">
								<div class="content-box">
									<div class="top">
										<div class="qoute-box">
											“							
										</div>
										<div class="title">
											<h3>Logic Cargo is Great Firm</h3>
										</div>
									</div>						
									<div class="content">							
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum </p>
										<span>Michale John (CEO & Founder)</span>
										<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/testimonials/1.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="sec-padding">
					<div class="sec-title">
						<h2><span>request a quote</span></h2>
					</div>
					<form action="http://vinodpal.com/demos/logic-cargo/includes/sendemail.php" class="contact-form">
						<div class="form-grp full">
							<input type="text" name="name" placeholder="Name">
						</div>
						<div class="form-grp full">
							<input type="text" name="email" placeholder="Email*">
						</div>
						<div class="form-grp-box">
							<div class="form-grp half">
								<select class="select-menu" name="selectMenu">
									<option value="default">Choose Something...</option>	
									<option value="Ware Housing">Ware Housing</option>	
									<option value="Ware Housing">Ware Housing</option>	
									<option value="Ware Housing">Ware Housing</option>	
									<option value="Ware Housing">Ware Housing</option>	
									<option value="Ware Housing">Ware Housing</option>	
								</select>
							</div>
							<div class="form-grp half">
								<input type="text" name="subject" placeholder="Subject">
							</div>
						</div>
						<div class="form-grp">
							<textarea name="message" placeholder="Message"></textarea>
						</div>
						<button type="submit" class="thm-btn">Submit Now <i class="fa fa-arrow-circle-right"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="team-section sec-padding">
	<div class="thm-container">
		<div class="sec-title">
			<h2><span>our team members</span></h2>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="single-team-member img-cap-effect">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/team/1.jpg" alt="Awesome Image"/>
						<div class="img-caption">
							<div class="box-holder">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="content">
						<div class="name-box">
							<h3>Jenefir White</h3>
							<span>Supervisor</span>
						</div>
						<p>Lorem ipsum dolor sit ametetd consectetur adipiscing elit.</p>
					</div>
					<a href="#" class="readmore">CONTACT ME <i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-team-member img-cap-effect">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/team/2.jpg" alt="Awesome Image"/>
						<div class="img-caption">
							<div class="box-holder">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="content">
						<div class="name-box">
							<h3>Jenefir White</h3>
							<span>Supervisor</span>
						</div>
						<p>Lorem ipsum dolor sit ametetd consectetur adipiscing elit.</p>
					</div>
					<a href="#" class="readmore">CONTACT ME <i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-team-member img-cap-effect">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/team/3.jpg" alt="Awesome Image"/>
						<div class="img-caption">
							<div class="box-holder">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="content">
						<div class="name-box">
							<h3>Jenefir White</h3>
							<span>Supervisor</span>
						</div>
						<p>Lorem ipsum dolor sit ametetd consectetur adipiscing elit.</p>
					</div>
					<a href="#" class="readmore">CONTACT ME <i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-team-member img-cap-effect">
					<div class="img-box">
						<img src="<?php echo base_url();?>assets/frontend/ppjkservice/images/team/4.jpg" alt="Awesome Image"/>
						<div class="img-caption">
							<div class="box-holder">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="content">
						<div class="name-box">
							<h3>Jenefir White</h3>
							<span>Supervisor</span>
						</div>
						<p>Lorem ipsum dolor sit ametetd consectetur adipiscing elit.</p>
					</div>
					<a href="#" class="readmore">CONTACT ME <i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>			
	</div>
</section>-->


<!--<section class="fact-counter sec-padding">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon-box">
						<i class="icon icon-User"></i>
					</div>
					<div class="text-box">
						<h4 class="timer" data-from="0" data-to="250"></h4>
						<p>Emploies in Team</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon-box">
						<i class="icon icon-BigTruck"></i>
					</div>
					<div class="text-box">
						<h4 class="timer" data-from="0" data-to="106"></h4>
						<p>Company Vihicles</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon-box">
						<i class="icon icon-WorldGlobe"></i>
					</div>
					<div class="text-box">
						<h4 class="timer" data-from="0" data-to="406"></h4>
						<p>Worldwide Clients</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-fact-counter">
					<div class="icon-box">
						<i class="icon icon-Briefcase"></i>
					</div>
					<div class="text-box">
						<h4 class="timer" data-from="0" data-to="308"></h4>
						<p>Projects Done</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>-->


<!-- WIDGET BLOG -->
<?php 
if(!empty($blog_widget)) {
    $this->load->view($temp.'widget/blog_widget');
} 
?>
<!-- END WIDGET BLOG --> 


<!-- WIDGET DELIVERY -->
<?php 
if(!empty($delivery_widget)) {
    $this->load->view($temp.'widget/delivery_widget');
}   
?>
<!-- END WIDGET DELIVERY -->


<!--<section class="footer-top">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<h3>Logistic and cargo</h3>
					<p>Contact us now to get quote for all your global <br>shipping and cargo need.</p>
				</div>
				<div class="col-md-6">
					<a class="thm-btn" href="contact.html">Contact Us <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>-->

