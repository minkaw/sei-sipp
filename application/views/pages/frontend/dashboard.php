<?php $this->load->view('template/frontend/layout_header_frontend')?>
<?php $this->load->view('template/frontend/config/slider')?>
        
	<!-- Services -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="service-wrapper">
						<img src="<?php echo base_url('assets/frontend/img/service-icon/diamond.png') ?>" alt="Service 1">
						<h3>Aliquam in adipiscing</h3>
						<p>Praesent rhoncus mauris ac sollicitudin vehicula. Nam fringilla turpis turpis, at posuere turpis aliquet sit amet condimentum</p>
						<a href="#" class="btn">Read more</a>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-wrapper">
						<img src="<?php echo base_url('assets/frontend/img/service-icon/ruler.png') ?>" alt="Service 2">
						<h3>Curabitur mollis</h3>
						<p>Suspendisse eget libero mi. Fusce ligula orci, vulputate nec elit ultrices, ornare faucibus orci. Aenean lectus sapien, vehicula</p>
						<a href="#" class="btn">Read more</a>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-wrapper">
						<img src="<?php echo base_url('assets/frontend/img/service-icon/box.png') ?>" alt="Service 3">
						<h3>Vivamus mattis</h3>
						<p>Phasellus posuere et nisl ac commodo. Nulla facilisi. Sed tincidunt bibendum cursus. Aenean vulputate aliquam risus rutrum scelerisque</p>
						<a href="#" class="btn">Read more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Services -->

	<!-- Call to Action Bar -->
	<div class="section section-white">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="calltoaction-wrapper">
						<h1><a href="http://www.sohohosting.co.uk/">Host This Template on Soho Hosting.</a></h1>
						<p>Looking for an awesome and reliable webhosting? Try <a href="http://www.sohohosting.co.uk/"><span>Soho Hosting</span></a>.
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- End Call to Action Bar -->

	<!-- Testimonials -->
	<div class="section">
		<div class="container">
			<h2>Testimonials</h2>
			<div class="row">
				<!-- Testimonial -->
				<div class="testimonial col-md-4 col-sm-6">
					<!-- Author Photo -->
					<div class="author-photo">
						<img src="<?php echo base_url('assets/frontend/img/user1.jpg') ?>" alt="Author 1">
					</div>
					<div class="testimonial-bubble">
						<blockquote>
							<!-- Quote -->
							<p class="quote">
								"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut."
							</p>
							<!-- Author Info -->
							<cite class="author-info">
								- Name Surname,<br>Managing Director at <a href="#">Some Company</a>
							</cite>
						</blockquote>
						<div class="sprite arrow-speech-bubble"></div>
					</div>
				</div>
				<!-- End Testimonial -->
				<div class="testimonial col-md-4 col-sm-6">
					<div class="author-photo">
						<img src="<?php echo base_url('assets/frontend/img/user5.jpg') ?>" alt="Author 2">
					</div>
					<div class="testimonial-bubble">
						<blockquote>
							<p class="quote">
								"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo."
							</p>
							<cite class="author-info">
								- Name Surname,<br>Managing Director at <a href="#">Some Company</a>
							</cite>
						</blockquote>
						<div class="sprite arrow-speech-bubble"></div>
					</div>
				</div>
				<div class="testimonial col-md-4 col-sm-6">
					<div class="author-photo">
						<img src="<?php echo base_url('assets/frontend/img/user2.jpg') ?>" alt="Author 3">
					</div>
					<div class="testimonial-bubble">
						<blockquote>
							<p class="quote">
								"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."
							</p>
							<cite class="author-info">
								- Name Surname,<br>Managing Director at <a href="#">Some Company</a>
							</cite>
						</blockquote>
						<div class="sprite arrow-speech-bubble"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Testimonials -->

<?php $this->load->view('template/frontend/layout_footer_frontend')?>