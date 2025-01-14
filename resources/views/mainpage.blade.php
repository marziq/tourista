@extends('master.layout')

@section('content')

	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->

		<div class="home_slider_container">

			<div class="owl-carousel owl-theme home_slider">

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@anikindimitry -->
					<div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>discover</h1>
							<h1>the world</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>discover</h1>
							<h1>the world</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>discover</h1>
							<h1>the world</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Nav - Prev -->
			<div class="home_slider_nav home_slider_prev">
				<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_prev'>
							<stop offset='0%' stop-color='#426253'/>
							<stop offset='100%' stop-color='#cdff4f'/>
						</linearGradient>
					</defs>
					<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
					M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
					C22.545,2,26,5.541,26,9.909V23.091z"/>
					<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
					11.042,18.219 "/>
				</svg>
			</div>

			<!-- Home Slider Nav - Next -->
			<div class="home_slider_nav home_slider_next">
				<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_next'>
							<stop offset='0%' stop-color='#426253'/>
							<stop offset='100%' stop-color='#cdff4f'/>
						</linearGradient>
					</defs>
				<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
				M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
				C22.545,2,26,5.541,26,9.909V23.091z"/>
				<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
				17.046,15.554 "/>
				</svg>
			</div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots">
				<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
					<li class="home_slider_custom_dot active"><div></div>01.</li>
					<li class="home_slider_custom_dot"><div></div>02.</li>
					<li class="home_slider_custom_dot"><div></div>03.</li>
				</ul>
			</div>

		</div>

	</div>

	<!-- Search -->

	<div class="search">


		<!-- Search Contents -->

		<div class="container fill_height">
			<div class="row fill_height">
				<div class="col fill_height">

					<!-- Search Tabs -->

					<div class="search_tabs_container">
						<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/suitcase.png" alt=""><span>hotels</span></div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/bus.png" alt="">rentals</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/departure.png" alt="">flights</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/island.png" alt="">trips</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="images/diving.png" alt="">attractions</div>
						</div>
					</div>

					<!-- Hotel Search Panel -->

                    <div class="search_panel active">
                        <form action="{{ route('search_hotel') }}" method="POST" id="search_form_1" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                            @csrf
                            <div class="search_item">
                                <div>Destination</div>
                                <input type="text" name="destination" class="destination search_input" required="required" value="{{ request('destination') }}" placeholder="Enter destination">
                            </div>
                            <div class="search_item">
                                <div>Check In</div>
                                <input type="date" name="check_in" class="check_in search_input" required="required" value="{{ old('check_in', request('check_in')) }}" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="search_item">
                                <div>Check Out</div>
                                <input type="date" name="check_out" class="check_out search_input" required="required" value="{{ old('check_out', request('check_out')) }}" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="search_item">
                                <div>Pax</div>
                                <select name="pax" id="pax" class="dropdown_item_select search_input" required="required">
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                </select>
                            </div>

                            <button type="submit" class="button search_button">Search<span></span><span></span><span></span></button>
                        </form>
                    </div>

                    <!-- Rental Search Panel -->
                    <div class="search_panel active">
                        <form action="{{ route('processRentalSearch') }}" method="POST" id="search_form_2" class="search_panel_content d-flex flex-wrap align-items-center justify-content-between">
                            @csrf
                            <!-- Pick-up Location -->
                            <div class="search_item me-3 mb-3">
                                <div>Pick-up Location</div>
                                <select name="location" id="location" class="form-select search_input" required>
                                    <option value="">Choose</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                    <option value="Ipoh">Ipoh</option>
                                    <option value="Langkawi">Langkawi</option>
                                    <option value="Pulau Pangkor">Pulau Pangkor</option>
                                    <option value="Penang">Penang</option>
                                </select>
                            </div>

                            <!-- Pick-up Date -->
                            <div class="search_item">
                                <div>Pick-up Date</div>
                                <input type="date" name="pickup_date" class="pickup_date search_input" required placeholder="YYYY-MM-DD">
                            </div>

                            <!-- Return Date -->
                            <div class="search_item">
                                <div>Return Date</div>
                                <input type="date" name="return_date" class="return_date search_input" required placeholder="YYYY-MM-DD">
                            </div>

                            <!-- Search Button -->
                            <div class="mb-3">
                                <button type="submit" class="button search_button">Search<span></span><span></span><span></span></button>
                            </div>
                        </form>

                </div>




					<!-- Flight Search Panel -->
	    <div class="search_panel">
		<form action="{{ route('flights.search') }}" method="GET" id="search_form_6" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
			<!-- Departure Field -->
			<div class="search_item">
				<label for="departure">DEPARTURE</label>
				<input type="text" name="departure" class="search_input" placeholder="Enter departure city" required>
			</div>

			<!-- Destination Field -->
			<div class="search_item">
				<label for="destination">DESTINATION</label>
				<input type="text" name="destination" id="destination" class="search_input" placeholder="Enter destination" required>
			</div>

			<!-- Departure Date Field -->
			<div class="search_item">
				<label for="departure_date">TRAVEL DATE</label>
				<input type="date" name="travel_date" id="travel_date" class="search_input" required>
			</div>

			<!-- Passenger Dropdown -->
			<div class="search_item">
				<label for="adults">PASSENGERS </label>
				<input type="number" name="passenger" id="passenger" class="search_input" value="1" min="1" max="20">
			</div>



			  <!-- Submit Button -->
			  <button type="submit" class="button search_button">Search<span></span><span></span><span></span></button>
                        </form>
                    </div>

					<!-- Search Panel Tour package-->

                    <div class="search_panel">
                        <form action="{{ route('search') }}" method="POST" id="search_form_4" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                            @csrf
                            <div class="search_item">
                                <div>Package Name</div>
                                <input type="text" name="package" class="package search_input">
                            </div>
                            <div class="search_item">
                                <div>Price Range</div>
                                <div class="price_range">
                                    <input type="number" name="min_price" class="price search_input" placeholder="Min Price" min="0" step="0.01">
                                    <input type="number" name="max_price" class="price search_input" placeholder="Max Price" min="0" step="0.01">
                                </div>
                            </div>
                            <button class="button search_button">search<span></span><span></span><span></span></button>
                        </form>
                    </div>

                    <!-- Search Panel Attractions-->
                    <div class="search_panel">
                        <form action="{{ route('attractions.search') }}" method="GET" id="search_form_5" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                            <!-- Destination Field -->
                            <div class="search_item">
                                <div>Destination</div>
                                <input type="text" name="destination" class="destination search_input" placeholder="Enter destination" required="required">
                            </div>
                            <!-- Date Field -->
                            <div class="search_item">
                                <div>Date</div>
                                <input type="text" name="date" class="date search_input" placeholder="YYYY-MM-DD" required="required">
                            </div>
                            <!-- Category Field -->
                            <div class="search_item">
                                <div>Category</div>
                                <select name="category" id="category_5" class="dropdown_item_select search_input" required="required">
                                    <option value="anything">Anything</option>
                                    <option value="theme park">Theme park</option>
                                    <option value="museum">Museum</option>
                                    <option value="Indoor">Indoor games</option>
                                    <option value="zoo">Zoo and Aquariums</option>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="button search_button">Search<span></span><span></span><span></span></button>
                        </form>
                    </div>

        <!-- Date Field -->
        <div class="search_item">
            <div>Date</div>
            <input type="text" name="date" class="date search_input" placeholder="YYYY-MM-DD " required="required">
        </div>

        <!-- Category Field -->
        <div class="search_item">
            <div>Category</div>
            <select name="category" id="category_5" class="dropdown_item_select search_input" required="required">
                <option value="anything">Anything</option>
                <option value="adventure">Adventure</option>
                <option value="culture">Culture</option>
                <option value="nature">Nature</option>
                <option value="beach">Beach</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button class="button search_button">Search<span></span><span></span><span></span></button>
    </form>
</div>


					<!-- Search Panel -->

					<div class="search_panel">
						<form action="#" id="search_form_6" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_6" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_6" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	 <!-- Intro -->


     <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="intro_title text-center">We have the best tours</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="intro_text text-center">
                        <p>Your ultimate travel companion, unlocking unforgettable adventures, hidden gems, and experiences that turn every journey into a story worth sharing! </p>
                    </div>
                </div>
            </div>
            <div class="row intro_items">


                <!-- Intro Item -->


                <div class="col-lg-4 intro_col">
                    <div class="intro_item">
                        <div class="intro_item_overlay"></div>
                        <!-- Image by https://unsplash.com/@dnevozhai -->
                        <div class="intro_item_background" style="background-image:url(images/intro_1.jpg)"></div>
                        <div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
                            <div class="intro_date">May 25th - June 01st</div>
                            <div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
                            <div class="intro_center text-center">
                                <h1>Desaru</h1>
                                <div class="intro_price">From RM1450</div>
                                <div class="rating rating_4">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Intro Item -->


                <div class="col-lg-4 intro_col">
                    <div class="intro_item">
                        <div class="intro_item_overlay"></div>
                        <!-- Image by https://unsplash.com/@hellolightbulb -->
                        <div class="intro_item_background" style="background-image:url(images/intro_2.jpg)"></div>
                        <div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
                            <div class="intro_date">May 25th - June 01st</div>
                            <div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
                            <div class="intro_center text-center">
                                <h1>Cherating</h1>
                                <div class="intro_price">From RM1450</div>
                                <div class="rating rating_4">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Intro Item -->


                <div class="col-lg-4 intro_col">
                    <div class="intro_item">
                        <div class="intro_item_overlay"></div>
                        <!-- Image by https://unsplash.com/@willianjusten -->
                        <div class="intro_item_background" style="background-image:url(images/intro_3.jpg)"></div>
                        <div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
                            <div class="intro_date">May 25th - June 01st</div>
                            <div class="button intro_button"><div class="button_bcg"></div><a href="#">see more<span></span><span></span><span></span></a></div>
                            <div class="intro_center text-center">
                                <h1>Maldives</h1>
                                <div class="intro_price">From RM7,999.99</div>
                                <div class="rating rating_4">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>




    <!-- Offers -->


    <div class="offers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section_title">Our Services</h2>
                </div>
            </div>
            <div class="row offers_items">


                <!-- Offers Item -->
                <div class="col-lg-6 offers_col">
                    <div class="offers_item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="offers_image_container">
                                    <!-- Image by https://unsplash.com/@kensuarez -->
                                    <div class="offers_image_background" style="background-image:url(images/gambarhotel.jpg)"></div>
                                    <div class="offer_name"><a href="#">Hotel Booking</a></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="offers_content">
                                    <div class="offers_price"> Hotel<span>booking</span></div>
                                    <div class="rating_r rating_r_4 offers_rating">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                    </div>
                                    <p class="offers_text">"Experience ultimate comfort and relaxation with our handpicked hotel stays. Whether you’re traveling for leisure or business, our curated accommodations offer luxurious rooms, excellent amenities, and unmatched hospitality. From budget-friendly options to premium suites, find the perfect stay to complement your journey"</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="images/post.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link"><a href="offers.html">read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Offers Item -->
                <div class="col-lg-6 offers_col">
                    <div class="offers_item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="offers_image_container">
                                    <!-- Image by Egzon Bytyqi -->
                                    <div class="offers_image_background" style="background-image:url(images/gambarflight.jpg)"></div>
                                    <div class="offer_name"><a href="#">Flight Ticket</a></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="offers_content">
                                    <div class="offers_price">Flight<span>booking</span></div>
                                    <div class="rating_r rating_r_4 offers_rating">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                    </div>
                                    <p class="offers_text">Take to the skies with our streamlined flight booking services. Compare fares across major airlines and book flights that suit your schedule and budget. From domestic to international routes, we ensure a smooth and stress-free flying experience with top-notch customer support.</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="images/post.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link"><a href="offers.html">read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Offers Item -->
                <div class="col-lg-6 offers_col">
                    <div class="offers_item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="offers_image_container">
                                    <!-- Image by https://unsplash.com/@nevenkrcmarek -->
                                    <div class="offers_image_background" style="background-image:url(images/gambarcar.jpg)"></div>
                                    <div class="offer_name"><a href="#">car rental</a></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="offers_content">
                                    <div class="offers_price">Car <span>rental</span></div>
                                    <div class="rating_r rating_r_4 offers_rating">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                    </div>
                                    <p class="offers_text">Navigate your destination with ease by choosing from our wide selection of car rentals. Enjoy the freedom to explore on your terms with vehicles ranging from compact sedans to spacious SUVs. With competitive pricing and flexible booking options, your travel becomes hassle-free and convenient</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="images/post.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link"><a href="offers.html">read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Offers Item -->
                <div class="col-lg-6 offers_col">
                    <div class="offers_item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="offers_image_container">
                                    <!-- Image by https://unsplash.com/@mantashesthaven -->
                                    <div class="offers_image_background" style="background-image:url(images/gambarattraction.jpg)"></div>
                                    <div class="offer_name"><a href="#">tattraction booking</a></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="offers_content">
                                    <div class="offers_price">Attraction<span>booking</span></div>
                                    <div class="rating_r rating_r_4 offers_rating">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                    </div>
                                    <p class="offers_text">"Discover unforgettable experiences with our curated attractions. Explore iconic landmarks, thrilling activities, and cultural gems tailored to suit every traveler’s interest. Dive into adventures that create memories for a lifetime, with tickets and tours made simple to book."</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="images/post.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
                                            <li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link"><a href="offers.html">read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Testimonials -->


    <div class="testimonials">
        <div class="test_border"></div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section_title">what our customers say about us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">


                    <!-- Testimonials Slider -->


                    <div class="test_slider_container">
                        <div class="owl-carousel owl-theme test_slider">


                            <!-- Testimonial Item -->
                            <div class="owl-item">
                                <div class="test_item">
                                    <div class="test_image"><img src="images/gambar6.jpg" alt="https://unsplash.com/@anniegray"></div>
                                    <div class="test_icon"><img src="images/backpack.png" alt=""></div>
                                    <div class="test_content_container">
                                        <div class="test_content">
                                            <div class="test_item_info">
                                                <div class="test_name">carla smith</div>
                                                <div class="test_date">May 24, 2023</div>
                                            </div>
                                            <div class="test_quote_title">" Best holliday ever "</div>
                                            <p class="test_quote_text">"Tourista made planning our family trip a breeze! From detailed itineraries to personalized recommendations, everything was so well-organized !"</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Testimonial Item -->
                            <div class="owl-item">
                                <div class="test_item">
                                    <div class="test_image"><img src="images/gambar5.jpg" alt="https://unsplash.com/@tschax"></div>
                                    <div class="test_icon"><img src="images/island_t.png" alt=""></div>
                                    <div class="test_content_container">
                                        <div class="test_content">
                                            <div class="test_item_info">
                                                <div class="test_name">Maria Andrew</div>
                                                <div class="test_date">Jun 20, 2022</div>
                                            </div>
                                            <div class="test_quote_title">"User-Friendly Interface "</div>
                                            <p class="test_quote_text">The platform is incredibly easy to use. Within minutes, I had access to tons of information about local attractions, restaurants, and unique activities. Highly recommend for first-time travelers!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Testimonial Item -->
                            <div class="owl-item">
                                <div class="test_item">
                                    <div class="test_image"><img src="images/gambar4.jpg" alt="https://unsplash.com/@seefromthesky"></div>
                                    <div class="test_icon"><img src="images/kayak.png" alt=""></div>
                                    <div class="test_content_container">
                                        <div class="test_content">
                                            <div class="test_item_info">
                                                <div class="test_name">Ally Merry</div>
                                                <div class="test_date">July 12, 2012</div>
                                            </div>
                                            <div class="test_quote_title">" Hidden Gems Explorer "</div>
                                            <p class="test_quote_text">What I love most about Tourista is the focus on hidden gems. It’s not just the usual tourist spots but also lesser-known treasures that made my vacation truly unique!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Testimonial Item -->
                            <div class="owl-item">
                                <div class="test_item">
                                    <div class="test_image"><img src="images/gambar3.jpg" alt=""></div>
                                    <div class="test_icon"><img src="images/island_t.png" alt=""></div>
                                    <div class="test_content_container">
                                        <div class="test_content">
                                            <div class="test_item_info">
                                                <div class="test_name">Jane Joth</div>
                                                <div class="test_date">Jan 09, 2024</div>
                                            </div>
                                            <div class="test_quote_title">" Reliable Customer Support "</div>
                                            <p class="test_quote_text">Their support team is fantastic! I had a last-minute change in my itinerary, and they responded quickly and helped me sort everything out without any hassle.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Testimonial Item -->
                            <div class="owl-item">
                                <div class="test_item">
                                    <div class="test_image"><img src="images/gambar2.jpg" alt=""></div>
                                    <div class="test_icon"><img src="images/backpack.png" alt=""></div>
                                    <div class="test_content_container">
                                        <div class="test_content">
                                            <div class="test_item_info">
                                                <div class="test_name">Brich Mei</div>
                                                <div class="test_date">May 18, 2020</div>
                                            </div>
                                            <div class="test_quote_title">" Affordable and Comprehensive "</div>
                                            <p class="test_quote_text">Tourista offers incredible value for money. From budget-friendly accommodation options to detailed travel guides, everything you need for a perfect trip is right here!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Testimonial Item -->
                            <div class="owl-item">
                                <div class="test_item">
                                    <div class="test_image"><img src="images/gambar1.jpg" alt=""></div>
                                    <div class="test_icon"><img src="images/kayak.png" alt=""></div>
                                    <div class="test_content_container">
                                        <div class="test_content">
                                            <div class="test_item_info">
                                                <div class="test_name">Sally Mith</div>
                                                <div class="test_date">Jul 17, 2019</div>
                                            </div>
                                            <div class="test_quote_title">"Seamless Experience from Start to Finish "</div>
                                            <p class="test_quote_text">Tourista truly delivers on its promise of making travel easy and enjoyable. From booking tickets to exploring local hotspots, every step was smooth and stress-free</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <!-- Testimonials Slider Nav - Prev -->
                        <div class="test_slider_nav test_slider_prev">
                            <svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                <defs>
                                    <linearGradient id='test_grad_prev'>
                                        <stop offset='0%' stop-color='#426253'/>
                                        <stop offset='100%' stop-color='#cdff4f'/>
                                    </linearGradient>
                                </defs>
                                <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
                                M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
                                C22.545,2,26,5.541,26,9.909V23.091z"/>
                                <polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
                                11.042,18.219 "/>
                            </svg>
                        </div>


                        <!-- Testimonials Slider Nav - Next -->
                        <div class="test_slider_nav test_slider_next">
                            <svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                <defs>
                                    <linearGradient id='test_grad_next'>
                                        <stop offset='0%' stop-color='#426253'/>
                                        <stop offset='100%' stop-color='#cdff4f'/>
                                    </linearGradient>
                                </defs>
                            <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
                            M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
                            C22.545,2,26,5.541,26,9.909V23.091z"/>
                            <polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
                            17.046,15.554 "/>
                            </svg>
                        </div>


                    </div>


                </div>
            </div>


        </div>
    </div>
@endsection
