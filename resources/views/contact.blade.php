@include("layouts.header")
		<aside id="colorlib-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12 breadcrumbs text-center">
						<h2>Contact us</h2>
						<p><span><a href="index.html">Home</a></span> / <span>Contact</span></p>
					</div>
				</div>
			</div>
		</aside>

		<div id="colorlib-container">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="heading-2">Contact Information</h2>
						<div class="row contact-info-wrap row-pb-lg">
							<div class="col-md-3">
								<p><span><i class="icon-location-2"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="#">yourwebsite.com</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div id="map" class="colorlib-map"></div>
							</div>
							<div class="col-md-6">
								<h2 class="heading-2">Get In Touch</h2>
								<form action="#">
									<div class="row form-group">
										<div class="col-md-6">
											<label for="fname">First Name</label>
											<input type="text" id="fname" class="form-control" placeholder="Your firstname">
										</div>
										<div class="col-md-6">
											<label for="lname">Last Name</label>
											<input type="text" id="lname" class="form-control" placeholder="Your lastname">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-md-12">
											<label for="email">Email</label>
											<input type="text" id="email" class="form-control" placeholder="Your email address">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-md-12">
											<label for="subject">Subject</label>
											<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-md-12">
											<label for="message">Message</label>
											<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Send Message" class="btn btn-primary">
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-instagram">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 colorlib-heading text-center">
					<h2>Instagram</h2>
				</div>
			</div>
			<div class="row">
				<div class="instagram-entry">
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-1.jpg);">
					</a>
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-2.jpg);">
					</a>
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-3.jpg);">
					</a>
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-4.jpg);">
					</a>
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-5.jpg);">
					</a>
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-6.jpg);">
					</a>
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-7.jpg);">
					</a>
					<a href="#" class="instagram text-center" style="background-image: url(images/gallery-8.jpg);">
					</a>
				</div>
			</div>
		</div>
    @include("layouts.footer")
