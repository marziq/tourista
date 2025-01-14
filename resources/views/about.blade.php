@extends('master.layout')
@section('content')


<!-- Home -->
{{-- <div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/about_us_background.jpg"></div>
    <div class="home_content">
        <div class="home_title">About Us</div>
    </div>
</div> --}}
<style>
.feature_icon {
    width: 100px; /* Fixed width */
    height: 100px; /* Fixed height */
    border-radius: 50%; /* Circular container */
    overflow: hidden; /* Ensure images do not overflow */
    display: flex; /* Center align the image */
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0; /* Background color for consistency */
}


.feature_icon img {
    width: 100%; /* Ensure the image fills the container */
    height: auto; /* Maintain the aspect ratio */
    object-fit: cover; /* Ensure the image covers the container */
    object-position: center; /* Center the focal point of the image */
}




.why_choose_us {
        padding: 80px 0;
        background-color: #edecec;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }


    .why_choose_us .section_title {
        font-size: 40px;
        color: #2c3e50;
        font-weight: 700;
        letter-spacing: 1px;
    }


    .why_choose_us .section_subtitle {
        font-size: 20px;
        color: #7f8c8d;
        margin-top: 10px;
        line-height: 1.6;
    }


    .feature {
        margin-top: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }


    .feature:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }


    .feature_icon {
        background-color: #f0f0f0;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease;
    }


    .feature_icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }


    .feature_icon:hover img {
        transform: scale(1.2);
    }


    .feature_title {
        font-size: 26px;
        color: #2c3e50;
        margin-top: 20px;
        font-weight: 600;
    }


    .feature_text {
        font-size: 18px;
        color: #7f8c8d;
        margin-top: 15px;
        line-height: 1.6;
    }
</style>


<!-- About Us Section -->
<<div class="about_us" style="padding: 100px 0; background-color: #f3f4f7; margin-top: 150px;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about_us_image" style="position: relative;">
                    <img src="images/aboutus.jpg" alt="About Us" style="width: 100%; border-radius: 12px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                    <div style="position: absolute; top: 10%; left: 10%; background-color: rgba(255,255,255,0.9); padding: 10px 20px; border-radius: 6px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                        <span style="font-size: 16px; font-weight: 600; color: #007bff;">Your Travel Partner</span>
                    </div>
                </div>
            </div>


            <!-- Content Section -->
            <div class="col-lg-6">
                <div class="about_us_content" style="padding: 20px 30px; background-color: #fff; border-radius: 12px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                    <h2 class="about_us_title" style="font-size: 40px; font-weight: 700; color: #222; margin-bottom: 20px;">Welcome to Tourista</h2>
                    <p class="about_us_text" style="font-size: 18px; color: #555; line-height: 1.8; margin-bottom: 15px;">
                        At Tourista, we specialize in creating seamless travel experiences. Whether you're booking a car, flight, hotel, or a complete tour package, we're your trusted partner in travel. Our mission is to make every journey unforgettable.
                    </p>
                    <p class="about_us_text" style="font-size: 18px; color: #555; line-height: 1.8; margin-bottom: 15px;">
                        With cutting-edge technology and a team of experienced professionals, we offer personalized services that cater to your unique travel needs.
                    </p>
                    <ul class="about_us_features" style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px; font-size: 16px; color: #444;"><strong>✔ Car Rentals:</strong> Flexible options to explore at your pace.</li>
                        <li style="margin-bottom: 10px; font-size: 16px; color: #444;"><strong>✔ Flight Bookings:</strong> Hassle-free and competitively priced.</li>
                        <li style="margin-bottom: 10px; font-size: 16px; color: #444;"><strong>✔ Hotels:</strong> Accommodations for every budget.</li>
                        <li style="margin-bottom: 10px; font-size: 16px; color: #444;"><strong>✔ Tour Packages:</strong> Curated for solo travelers, families, and groups.</li>
                        <li style="margin-bottom: 10px; font-size: 16px; color: #444;"><strong>✔ Attractions:</strong> Access to iconic landmarks and hidden gems.</li>
                    </ul>
                    <div class="button about_us_button" style="margin-top: 20px; text-align: right;">
                        <a href="#" style="display: inline-block; padding: 12px 30px; font-size: 16px; color: #fff; background-color: #007bff; border-radius: 8px; text-decoration: none; transition: all 0.3s ease;">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="why_choose_us">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title">Why Choose Tourista?</h2>
                <p class="section_subtitle">
                    Discover the Tourista advantage and elevate your travel experiences with unparalleled service,
                    support, and affordability.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center">
                <div class="feature">
                    <div class="feature_icon">
                        <img src="images/expertisegambar.jpg" alt="Expertise">
                    </div>
                    <h3 class="feature_title">Expertise</h3>
                    <p class="feature_text">
                        Our experienced team ensures every detail of your trip is meticulously planned and flawlessly
                        executed.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="feature">
                    <div class="feature_icon">
                        <img src="images/masagambar.jpg" alt="Support">
                    </div>
                    <h3 class="feature_title">24/7 Support</h3>
                    <p class="feature_text">
                        Round-the-clock customer support to assist you anytime, anywhere, ensuring your peace of mind
                        throughout your journey.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="feature">
                    <div class="feature_icon">
                        <img src="images/affordabilitygambar.jpg" alt="Affordability">
                    </div>
                    <h3 class="feature_title">Affordability</h3>
                    <p class="feature_text">
                        Competitive pricing without compromising on quality and comfort, making your travel experience
                        both memorable and budget-friendly.
                    </p>
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
