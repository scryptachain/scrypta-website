<?php echo $header; ?>
<main>
		<!-- ./Page header -->
		<header class="page header color-1 overlay alpha-8 image-background cover gradient gradient-43">
			<div class="divider-shape">
				<!-- waves divider -->
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" class="shape-waves" style="left: 0; transform: rotate3d(0,1,0,180deg);">
					<path class="shape-fill shape-fill-1" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z" />
				</svg>
			</div>
			<div class="container pb-9" style="">
				<div class="row">
					<div class="col-md-6">
						<h1 class="regular display-4 color-1 mb-4">Contact us</h1>
						<p class="lead color-1">Get in touch and let us know how we can help. Fill out the form and we’ll be in touch as soon as possible.</p>
					</div>
				</div>
			</div>
		</header>
		<!-- ./Contact Us -->
		<section class="section mt-7n">
			<div class="container bring-to-front pt-0">
				<div class="row align-items-center gap-y">
					<div class="col-md-6">
						<div class="shadow bg-1 p-4 rounded">
							<form action="srv/contact.php" method="post" class="form form-contact" name="form-contact" data-response-message-animation="slide-in-up">
								<div class="form-group">
									<label for="contact_email" class="bold mb-0">Email address</label>
									<small id="emailHelp" class="form-text color-2 mt-0 mb-2 italic">We'll never share your email with anyone else.</small>
									<input type="email" name="Contact[email]" id="contact_email" class="form-control bg-1" placeholder="Valid Email" required>
								</div>
								<div class="form-group">
									<label for="contact_email" class="bold">Subject</label>
									<input type="text" name="Contact[subject]" id="contact_subject" class="form-control bg-1" placeholder="Subject" required>
								</div>
								<div class="form-group">
									<label for="contact_email" class="bold">Message</label>
									<textarea name="Contact[message]" id="contact_message" class="form-control bg-1" placeholder="What do you want to let us know?" rows="8" required></textarea>
								</div>
								<div class="form-group">
									<button id="contact-submit" data-loading-text="Sending..." name="submit" type="submit" class="btn btn-accent btn-rounded">Send Message</button>
								</div>
							</form>
							<div class="response-message">
								<div class="section-heading">
									<i class="fas fa-check font-lg"></i>
									<p class="font-md m-0">Thank you!</p>
									<p class="response">Your message has been send, we will contact you as soon as possible.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 ml-md-auto">
						<div class="section-heading">
							<p class="small bold badge badge-info">Let's do business</p>
							<h2>Step into our place</h2>
						</div>
						<div class="media">
							<i class="fas fa-map-marker font-l color-3 mr-3"></i>
							<div class="media-body">123 Street St, Your City,
								<span class="d-block">YC Country</span>
							</div>
						</div>
						<div class="media my-4">
							<i class="fas fa-phone font-l color-3 mr-3"></i>
							<div class="media-body">
								<span class="d-block">
									<a href="tel:+1-123-456-7890">(123) 456-7890</a>
								</span>
								<span class="d-block">
									<a href="tel:+1-987-654-3201">(987) 654-3201</a>
								</span>
							</div>
						</div>
						<div class="media">
							<i class="fas fa-envelope font-l color-3 mr-3"></i>
							<div class="media-body">
								<a href="mailto:support@5studios.net">support@5studios.net</a>
							</div>
						</div>
						<hr class="my-4">
						<nav class="nav justify-content-center justify-content-md-start">
							<a href="#" class="btn btn-circle btn-sm brand-facebook mr-3">
								<i class="fab fa-facebook"></i>
							</a>
							<a href="#" class="btn btn-circle btn-sm brand-twitter mr-3">
								<i class="fab fa-twitter"></i>
							</a>
							<a href="#" class="btn btn-circle btn-sm brand-instagram">
								<i class="fab fa-instagram"></i>
							</a>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<!-- ./Other contact channels -->
		<section class="section b-b">
			<div class="container">
				<div class="row gap-y align-items-center text-center text-lg-left">
					<div class="col-12 col-md-6 py-4 px-5 b-md-r">
						<i class="pe pe-7s-cash pe-3x color-5"></i>
						<a href="javascript:void(0)" class="mt-4 color-5 d-flex align-items-center">
							<h4 class="mr-3">Contact Sales</h4>
							<i class="fas fa-long-arrow-alt-right"></i>
						</a>
						<p class="mt-4">Looking for a custom quote? need to tell us more about your project? or want a demonstration? drop us a line to
							<a href="mailto:support@5studios.net">sales@5studios.net</a>
						</p>
					</div>
					<div class="col-12 col-md-6 py-4 px-5">
						<i class="pe pe-7s-help2 pe-3x color-5"></i>
						<a href="javascript:void(0)" class="mt-4 color-5 d-flex align-items-center">
							<h4 class="mr-3">Technical Support</h4>
							<i class="fas fa-long-arrow-alt-right"></i>
						</a>
						<p class="mt-4">Any question about how to integrate your product?. Don't fret, our geek team is ready for you at
							<a href="mailto:support@5studios.net">support@5studios.net</a>
						</p>
					</div>
				</div>
			</div>
		</section>
	</main>
<?php echo $footer; ?>