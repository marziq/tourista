@extends('master.layout')


@section('content')
<style>/* Team Section Styles */
    .team_section {
        padding: 50px 15px;
        background-color: #dbdbdb; /* Dark background */
        color: #1c1c1c;
        text-align: center;
    }


    .team_background {
        position: relative;
        background-size: cover;
        background-position: center;
        height: 300px;
    }


    .team_content {
        margin-top: -150px; /* Overlap effect with background */
        position: relative;
        z-index: 10;
    }


    .team_title {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 10px;
    }


    .team_subtitle {
        font-size: 16px;
        color: #141414;
        margin-bottom: 30px;
    }


    .team_members {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }


    .team_member {
        background-color: #e2e0e0; /* Card background */
        border-radius: 10px;
        padding: 20px;
        width: 300px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s, box-shadow 0.3s;
    }


    .team_member:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.5);
    }


    .team_member img {
        width: 140px;
        height: 160px;
        border-radius: 50%;
        margin-bottom: 15px;
        border: 3px solid #444;
    }


    .team_member h3 {
        font-size: 20px;
        margin-bottom: 5px;
        color: #000000;
    }


    .team_member p {
        font-size: 14px;
        color: #aaa;
        margin-bottom: 15px;
    }


    .team_socials {
        display: flex;
        justify-content: center;
        gap: 10px;
    }


    .team_socials a {
        color: #fff;
        font-size: 18px;
        transition: color 0.3s;
    }


    .team_socials a:hover {
        color: #00aced; /* Twitter blue color */
    }
    .team_member p {
    color: #000; /* Black color */
    font-family: 'Arial', sans-serif; /* Clean and modern font */
    font-size: 16px; /* Adjusted font size */
    font-weight: 400; /* Normal weight for readability */
    line-height: 1.5; /* Improved line height for better readability */
    text-align: center; /* Center text alignment */
    margin-bottom: 15px; /* Space after each paragraph */
}




</style>
<!-- Meet the Team -->
<div class="team_section">
    <div class="team_background parallax-window" data-parallax="scroll" data-image-src="images/team_background.jpg"></div>
    <div class="team_content">
        <div class="team_title">Our Travel Experts</div>
        <p class="team_subtitle">Meet the specialists who make your travel experience unforgettable.</p>


        <div class="team_members">
            <div class="team_member">
                <img src="images/member1.jpg" alt="Tour Package Expert">
                <h3>Amar</h3>
                <p>Tour Packages</p>
                <p>We design personalized tour packages to ensure your trip is perfect from start to finish.</p>
                <p>Phone No. : +60 72843678</p>
                <div class="team_socials">


                </div>
            </div>


            <div class="team_member">
                <img src="images/member2.jpg" alt="Attraction Expert">
                <h3>Nisa Nasuha</h3>
                <p>Attraction</p>
                <p>We help you discover the best attractions around the world for an unforgettable journey.</p>
                <p>Phone No. : +60 62738465</p>
                <div class="team_socials">


                </div>
            </div>


            <div class="team_member">
                <img src="images/member3.jpg" alt="Hotel Expert">
                <h3>Nik Shameera</h3>
                <p>Hotel</p>
                <p>We ensure you stay in the best hotels, offering comfort and luxury at unbeatable prices.</p>
                <p>Phone No. : +60 283948572</p>
                <div class="team_socials">


                </div>
            </div>


            <div class="team_member">
                <img src="images/member4.jpg" alt="Flight Expert">
                <h3> Nur Amira</h3>
                <p>Flight</p>
                <p>We offer flight booking services, ensuring you get the best deals and the most convenient schedules.</p>
                <p>Phone No. : +60 182637485</p>
                <div class="team_socials">


                </div>
            </div>


            <div class="team_member">
                <img src="images/member5.jpg" alt="Car Rental Expert">
                <h3>Amirah Amnani</h3>
                <p>Car Rental</p>
                <p>We offer top-notch car rental services to make your travels smooth and hassle-free.</p>
                <p>Phone No. : +60 185637829</p>
                <div class="team_socials">


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
