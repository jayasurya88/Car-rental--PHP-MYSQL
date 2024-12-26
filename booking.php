<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "car_rental";
$conn = new mysqli($hostName, $userName, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$email = $_SESSION['email'];
$name = $_SESSION['name'];

if (isset($_POST['search'])) {

    $carname = $_POST['carname'];
    $pickup = $_POST['pickup'];
    $dropoff = $_POST['dropoff'];
    $picktime = $_POST['picktime'];
    $droptime = $_POST['droptime'];



    if (!empty($carname)) {
        $query = "INSERT INTO book(carname,pickup,dropoff,picktime,droptime,email,name,status) VALUES('$carname','$pickup','$dropoff','$picktime','$droptime','$email','$name','pending')";
        $result = $conn->query($query);
        if ($result) {


            echo '<script type="text/javascript">
            alert("BOOK reservation is inserted successfully");
            window.location = "bookingdetail.php";
            </script>';

        }

    }
}
//  else {
//     header('Location: .php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://kit.fontawesome.com/d413a541ab.js" crossorigin="anonymous"></script>
</head>

<body>

    <header id="navbar">
        <nav class="navbar-container container">

            <h3 class="logo">Rentify.</h3>


            <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu"
                aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="navbar-menu" aria-labelledby="navbar-toggle">
                <ul class="navbar-links">
                    <li class="navbar-item"><a class="navbar-link" href="#home">Home</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="aboutus.php">About</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="team.php">Ourteam</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="contact.php">Contact</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="logout.php"
                            style="background-color:black ; border-radius: 0;color :#fff">Logout</a></li>

                    <!-- <li class="navbar-item"><a href="logout.php" class="btn">logout</a></li> -->
                </ul>
            </div>
        </nav>
    </header>



    <section id="home" class="hero-section">
        <div class="container"><img class="bg-shape" src="./img/hero-bg.3b5f7a2502f0f81d1490.png" alt="bg-shape">
            <div class="hero-content">
                <div class="hero-content__text">
                    <h4>Plan your trip now</h4>
                    <h1>Save <span>big</span> with our car rental</h1>
                    <p>Rent the car of your dreams. Unbeatable prices, unlimited miles, flexible pick-up options and
                        much more.</p>
                    <div class="hero-content__text__btns"><a class="hero-content__text__btns__book-ride"
                            href="#booking-section">Book
                            Ride &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="tabler-icon tabler-icon-circle-check">
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M9 12l2 2l4 -4"></path>
                            </svg></a><a class="hero-content__text__btns__learn-more" href="#">Learn More &nbsp; <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="tabler-icon tabler-icon-chevron-right">
                                <path d="M9 6l6 6l-6 6"></path>
                            </svg></a></div>
                </div><img src="./img/main-car.9b30faa59387879fa060.png" alt="car-img" class="hero-content__car-img">
            </div>
        </div>
        <div class="scroll-up ">^</div>
    </section>

    <section id="booking-section" class="book-section">
        <div class="modal-overlay "></div>
        <div class="container">
            <div class="book-content">
                <div class="book-content__box">
                    <h2>Book a car</h2>

                 
                    <form class="box-form" action="" method="post">
                        <div class="box-form__car-type"><label><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="input-icon">
                                    <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5">
                                    </path>
                                </svg> &nbsp; Select Your Car Type <b>*</b></label>
                            <select name="carname" required="">
                                <option value="">Select your car type</option>
                                <option value="Audi A1 S-Line">Audi A1 S-Line</option>
                                <option value="VW Golf 6">VW Golf 6</option>
                                <option value="Toyota Camry">Toyota Camry</option>
                                <option value="BMW 320 ModernLine">BMW 320 ModernLine</option>
                                <option value="Mercedes-Benz GLK">Mercedes-Benz GLK</option>
                                <option value="VW Passat CC">VW Passat CC</option>
                                <option value="benz">Benz</option>
                            </select>
                        </div>
                        <div class="box-form__car-type"><label><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="input-icon">
                                    <path
                                        d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z"
                                        fill="currentColor" stroke-width="0"></path>
                                </svg> &nbsp; Pick-up <b>*</b></label>
                            <select name="pickup" required="">
                                <option value="">Select pick up location</option>
                                <option>Kottayam</option>
                                <option>Ernakulam</option>
                                <option>Thodupuzha</option>
                                <option>Kochi</option>
                                <option>Ramapuram</option>
                            </select>
                        </div>
                        <div class="box-form__car-type"><label><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="input-icon">
                                    <path
                                        d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z"
                                        fill="currentColor" stroke-width="0"></path>
                                </svg> &nbsp; Destination <b>*</b></label>
                            <select name="dropoff" required="">
                                <option value="">Select drop off location</option>
                                <option>Kottayam</option>
                                <option>Ernakulam</option>
                                <option>Thodupuzha</option>
                                <option>Kochi</option>
                                <option>Ramapuram</option>
                            </select>
                        </div>
                        <div class="box-form__car-time"><label for="picktime"> Pick-up <b>*</b></label><input
                                id="picktime" type="date" value="" name="picktime"></div>
                        <div class="box-form__car-time"><label for="droptime"> Drop-of <b>*</b></label><input
                                id="droptime" type="date" value="" name="droptime"></div>
                        <button type="submit" name="search">Book</button>


                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="plan-section">
        <div class="container">
            <div class="plan-container">
                <div class="plan-container__title">
                    <h3>Plan your trip now</h3>
                    <h2>Quick &amp; easy car rental</h2>
                </div>
                <div class="plan-container__boxes">
                    <div class="plan-container__boxes__box"><img
                            src="data:image/png;base64,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"
                            alt="icon_img">
                        <h3>Select Car</h3>
                        <p>We offers a big range of vehicles for all your driving needs. We have the perfect car to meet
                            your needs</p>
                    </div>
                    <div class="plan-container__boxes__box"><img
                            src="data:image/png;base64,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"
                            alt="icon_img">
                        <h3>Contact Operator</h3>
                        <p>Our knowledgeable and friendly operators are always ready to help with any questions or
                            concerns</p>
                    </div>
                    <div class="plan-container__boxes__box"><img
                            src="data:image/png;base64,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"
                            alt="icon_img">
                        <h3>Let's Drive</h3>
                        <p>Whether you're hitting the open road, we've got you covered with our wide range of cars</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pick-section">
        <div class="container">
            <div class="pick-container">
                <div class="pick-container__title">
                    <h3>Vehicle Models</h3>
                    <h2>Our rental fleet</h2>
                    <p>Choose from a variety of our amazing vehicles to rent for your next adventure or business trip
                    </p>
                </div>
                <div class="pick-container__car-content">
                    <div class="pick-box"><button class="colored-button">Audi A1 S-Line</button><button class=""
                            id="btn2">VW Golf 6</button><button class="" id="btn3">Toyota Camry</button><button class=""
                            id="btn4">BMW 320 ModernLine</button><button class="" id="btn5">Mercedes-Benz
                            GLK</button><button class="" id="btn6">VW Passat CC</button></div>
                    <div class="box-cars">
                        <div class="pick-car"><img src="/img/audia1.d038cf70b700e34e607a.jpg" alt="car_img"
                                style="display: block;"></div>
                        <div class="pick-description">
                            <div class="pick-description__price"><span>2500</span>/ rent per day</div>
                            <div class="pick-description__table">
                                <div class="pick-description__table__col"><span>Model</span><span>Audi</span></div>
                                <div class="pick-description__table__col"><span>Mark</span><span>A1</span></div>
                                <div class="pick-description__table__col"><span>Year</span><span>2012</span></div>
                                <div class="pick-description__table__col"><span>Doors</span><span>4/5</span></div>
                                <div class="pick-description__table__col"><span>AC</span><span>Yes</span></div>
                                <div class="pick-description__table__col"><span>Transmission</span><span>Manual</span>
                                </div>
                                <div class="pick-description__table__col"><span>Fuel</span><span>Gasoline</span></div>
                            </div><a class="cta-btn" href="#booking-section">Reserve Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="banner-section">
        <div class="container">
            <div class="banner-content">
                <div class="banner-content__text">
                    <h2>Save big with our cheap car rental!</h2>
                    <p>Top Airports. Local Suppliers. <span>24/7</span> Support.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="choose-section">
        <div class="container">
            <div class="choose-container"><img class="choose-container__img" src="./img/main.70cd75042bdf42515d92.png"
                    alt="car_img">
                <div class="text-container">
                    <div class="text-container__left">
                        <h4>Why Choose Us</h4>
                        <h2>Best valued deals you will ever find</h2>
                        <p>Discover the best deals you'll ever find with our unbeatable offers. We're dedicated to
                            providing you with the best value for your money, so you can enjoy top-quality services and
                            products without breaking the bank. Our deals are designed to give you the ultimate renting
                            experience, so don't miss out on your chance to save big.</p><a href="#home">Find Details
                            &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="tabler-icon tabler-icon-chevron-right">
                                <path d="M9 6l6 6l-6 6"></path>
                            </svg></a>
                    </div>
                    <div class="text-container__right">
                        <div class="text-container__right__box"><img
                                src="data:image/png;base64,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"
                                alt="car-img">
                            <div class="text-container__right__box__text">
                                <h4>Cross Country Drive</h4>
                                <p>Take your driving experience to the next level with our top-notch vehicles for your
                                    cross-country adventures.</p>
                            </div>
                        </div>
                        <div class="text-container__right__box"> <img
                                src="data:image/png;base64,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"
                                alt="coin-img">
                            <div class="text-container__right__box__text">
                                <h4>All Inclusive Pricing</h4>
                                <p>Get everything you need in one convenient, transparent price with our all-inclusive
                                    pricing policy.</p>
                            </div>
                        </div>
                        <div class="text-container__right__box"> <img
                                src="data:image/png;base64,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"
                                alt="coin-img">
                            <div class="text-container__right__box__text">
                                <h4>No Hidden Charges</h4>
                                <p>Enjoy peace of mind with our no hidden charges policy. We believe in transparent and
                                    honest pricing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials-section">
        <div class="container">
            <div class="testimonials-content">
                <div class="testimonials-content__title">
                    <h4>Reviewed by People</h4>
                    <h2>Client's Testimonials</h2>
                    <p>Discover the positive impact we've made on the our clients by reading through their testimonials.
                        Our clients have experienced our service and results, and they're eager to share their positive
                        experiences with you.</p>
                </div>
                <div class="all-testimonials">
                    <div class="all-testimonials__box"><span class="quotes-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="tabler-icon tabler-icon-quote">
                                <path
                                    d="M10 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5">
                                </path>
                                <path
                                    d="M19 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5">
                                </path>
                            </svg></span>
                        <p>"We rented a car from this website and had an amazing experience! The booking was easy and
                            the rental rates were very affordable. "</p>
                        <div class="all-testimonials__box__name">
                            <div class="all-testimonials__box__name__profile"><img
                                    src="img/pfp1.ba7974ae51bb5d44fa69.jpg" alt="user_img"><span>
                                    <h4>Parry Hotter</h4>
                                    <p>Belgrade</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="all-testimonials__box box-2"><span class="quotes-icon"><svg
                                xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="tabler-icon tabler-icon-quote">
                                <path
                                    d="M10 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5">
                                </path>
                                <path
                                    d="M19 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5">
                                </path>
                            </svg></span>
                        <p>"The car was in great condition and made our trip even better. Highly recommend for this car
                            rental website!"</p>
                        <div class="all-testimonials__box__name">
                            <div class="all-testimonials__box__name__profile"><img
                                    src="/img/pfp2.fd9b1716200244ed8905.jpg" alt="user_img"><span>
                                    <h4>Ron Rizzly</h4>
                                    <p>Novi Sad</p>
                                </span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="download-section">
        <div class="container">
            <div class="download-text">
                <h2>Download our app to get most out of it</h2>
                <p>Thrown shy denote ten ladies though ask saw. Or by to he going think order event music. Incommode so
                    intention defective at convinced. Led income months itself and houses you.</p>
                <div class="download-text__btns"><img alt="download_img"
                        src="/img/googleapp.e6493904327fe3f9b89c7c75a4f3ae74.svg"><img alt="download_img"
                        src="/img/appstore.35481c6295b0744dfcc00d35874fbdd8.svg"></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="footer-content">
                <ul class="footer-content__1">
                    <li><span>CAR</span> Rental</li>
                    <li>We offers a big range of vehicles for all your driving needs. We have the perfect car to meet
                        your needs.</li>
                    <li><a href="tel:123456789"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="tabler-icon tabler-icon-phone-call">
                                <path
                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                </path>
                                <path d="M15 7a2 2 0 0 1 2 2"></path>
                                <path d="M15 3a6 6 0 0 1 6 6"></path>
                            </svg> &nbsp; (123) -456-789</a></li>
                    <li><a href="mailto:  carrental@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-mail">
                                <path
                                    d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                </path>
                                <path d="M3 7l9 6l9 -6"></path>
                            </svg>&nbsp; carrental@gmail.com</a></li>
                    <li><a target="_blank" rel="noreferrer" href="https://xpeedstudio.com/"
                            style="font-size: 14px;">Design by Jayasurya,Rijo,johny</a></li>
                </ul>
                <ul class="footer-content__2">
                    <li>Company</li>
                    <li><a href="#home">New York</a></li>
                    <li><a href="#home">Careers</a></li>
                    <li><a href="#home">Mobile</a></li>
                    <li><a href="#home">Blog</a></li>
                    <li><a href="#home">How we work</a></li>
                </ul>
                <ul class="footer-content__2">
                    <li>Working Hours</li>
                    <li>Mon - Fri: 9:00AM - 9:00PM</li>
                    <li>Sat: 9:00AM - 19:00PM</li>
                    <li>Sun: Closed</li>
                </ul>
                <ul class="footer-content__2">
                    <li>Subscription</li>
                    <li>
                        <p>Subscribe your Email address for latest news &amp; updates.</p>
                    </li>
                    <li><input type="email" placeholder="Enter Email Address"></li>
                    <li><button class="submit-email">Submit</button></li>
                </ul>
            </div>
        </div>
    </footer>
    <script>
        var date = new Date();
        var tdate = date.getDate();
        var month = date.getMonth() + 1;
        if (tdate < 10) {
            tdate = '0' + tdate;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var year = date.getUTCFullYear();
        var minDate = year + "-" + month + "-" + tdate;
       
        var sel_pickdate = document.getElementById("picktime");
        document.getElementById("picktime").setAttribute('min', minDate);
        document.getElementById("droptime").setAttribute('min', minDate);
        console.log(minDate);
    </script>
</body>


</html>