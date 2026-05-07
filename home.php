<?php
session_start(); // Start the session

$database = 'weddingdb';
$username = 'root';
$host = 'localhost';
$password = '';

$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}



// Variable to store scroll position
$scrollPosition = 0;

// Set character set
$conn->set_charset("utf8mb4");

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["title"]) && isset($_POST["message"])) {
    $title = $conn->real_escape_string($_POST["title"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insert data into database
    $sql = "INSERT INTO messages (title, message) VALUES ('$title', '$message')";
    if ($conn->query($sql) === TRUE) {
        // Set session variable to indicate form submission
        $_SESSION['form_submitted'] = true;
        // Get scroll position
        $scrollPosition = isset($_POST['scroll_position']) ? $_POST['scroll_position'] : 0;
        // Redirect to prevent duplicate form submission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Unset session variable if the page is refreshed
if (!isset($_SESSION['form_submitted'])) {
    unset($_SESSION['form_submitted']);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ernest & jho</title>
  <link rel="stylesheet" href="style.css ?<?php echo time(); ?>">
  <!--FAVICON-->
  <link rel="icon" type="image/x-icon" href="Assets/logo.png">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    

    <!--NAVBAR SECTION-->
    <header>
        <div class="limiter">
            <nav class="navbar">
                <div class="logo">
                    <a onclick="logo1()" href="#home">
                        <img src="Assets/logo.png" alt=""> 
                    </a>
                </div>

                <ul class="navlinks" id="links" >
                    <li class="navitems" ><a href="#home" id="Home" class="itemlinks active">Home</a></li>
                    <li class="navitems"><a href="#JhoAndErn" id="jhoAndErn" class="itemlinks">Jho & Ern</a></li>
                    <li class="navitems"><a href="#about-wedding" id="About-wedding" class="itemlinks">About Wedding</a></li>
                    <li class="navitems"><a href="#message-main" id="Message-main" class="itemlinks">Messages</a></li>

                </ul>

                <div id="burger">
                    <div class="burgerlines"></div>
                    <div class="burgerlines"></div>
                    <div class="burgerlines"></div>
                </div>
            </nav>
        </div>
    </header>

    

    <!--HOME SECTION-->
    <div class="home-cont" id="home">
        <div class="background">
            <div class="title" data-aos="fade-up" data-aos-duration="2000">Ernest & Jho</div>
            <div class="date" data-aos="fade-up" data-aos-duration="2000">02 • 28 • 24</div>
            <div class="description" data-aos="fade-up" data-aos-duration="2000">Embarking on a journey of love, unity, and 
                endless adventures together, <br> hand in hand  through the beautiful 
                bond of marriage.</div>
            </div>
    </div>


    <!--JHO & ERN SECTION-->
    <div class="jhoAndErn" id="JhoAndErn">
        <div class="container">
            <div class="left-cont">
                <img src="Assets/pic1.png" alt="img" data-aos="fade-left" data-aos-duration="1000">
            </div>
            <div class="right-cont">
                <p class="caption" data-aos="fade-right" data-aos-duration="1000">In life's vast tapestry, meeting a person is a sublime intersection of fate and chance. It's a serendipitous encounter that ignites the dormant embers within our being, offering endless possibilities for connection and understanding in the chaos of existence.
                </p>
            </div>
        </div>

        <div class="container1">

            <div class="left-cont">
                <p class="caption" data-aos="fade-left" data-aos-duration="1000">Sharing experiences with the person you love is like weaving threads of joy and understanding into the fabric of your relationship. Each moment shared becomes a cherished memory, etched in the tapestry of your shared journey. Together, you navigate life's highs and lows, finding solace and strength in each other's embrace.</p>
            </div>

            <div class="right-cont">
                <img src="Assets/pic2.png" alt="img" data-aos="fade-right" data-aos-duration="1000">
            </div>
        </div>

        <div class="container">
            <div class="left-cont">
                <img src="Assets/pic3.png" alt="img" data-aos="fade-left" data-aos-duration="1000">
            </div>
            <div class="right-cont">
                <p class="caption" data-aos="fade-right" data-aos-duration="1000">Love is the melody that orchestrates the symphony of happiness, its gentle notes weaving through the moments of our lives, infusing them with meaning and joy. In the embrace of love, happiness finds its truest expression, blooming like a radiant flower in the garden of the heart. Together, love and happiness create a harmonious duet, enriching each other in a beautiful dance of shared fulfillment.</p>
            </div>
        </div>

        <div class="container1">

            <div class="left-cont" >
                <p class="caption" data-aos="fade-left" data-aos-duration="1000">Intertwining two souls in a timeless dance of love and commitment, where every step is a promise to journey through life together. It's a sacred union where two hearts become one, bound by the threads of shared dreams, laughter, and unwavering support. In the symphony of love, marrying each other is the sweetest melody, resonating with the harmony of forever.</p>
            </div>

            <div class="right-cont">
                <img src="Assets/pic4.png" alt="img" data-aos="fade-right" data-aos-duration="1000">
            </div>
        </div>

    </div>

    <!--ABOUT WEDDING SECTION-->

    <div class="about-wedding" id="about-wedding">
        <h1 data-aos="fade-up" data-aos-duration="500">ABOUT THE WEDDING</h1>
        <div class="main-cont">
            
            <!--Dress code-->
            <div class="dress-cont" data-aos="fade-up" data-aos-duration="500">
                <div class="cont1">
                    <img src="Assets/men.png" alt="" data-aos="flip-left" data-aos-duration="1000">
                </div>
                <div class="cont2" >
                    <div class="attire-title" data-aos="fade-up" data-aos-duration="1000">
                        <p data-aos="fade-up" data-aos-duration="1000">ATTIRE: STRICTLY FORMAL</p>
                    </div>
                    <div class="attire-men" data-aos="fade-up" data-aos-duration="1000">
                        <p class="men-title" >GENTLEMEN</p>
                        <p class="rules" >COAT & TIE OR LONG SLEEVES</p>
                        <p class="avoid" >NO WEARING OF TSHIRTS / POLO SHIRTS / JEANS</p>
                    </div>
                    <div class="attire-lady" data-aos="fade-up" data-aos-duration="1000">
                        <p class="ladies-title" >LADIES</p>
                        <p class="rules" >GOWN / DRESS</p>
                        <p class="avoid" >STRICTLY NO WHITE DRESS / GOWN</p>
                    </div>

                    <div class="pallete" data-aos="fade-up" data-aos-duration="1000" >
                        <img src="Assets/pallet.png" alt="" >
                        <p>PALLETE</p>
                    </div>

                </div>
                <div class="cont3">
                    <img src="Assets/lady.png" alt="" data-aos="flip-right" data-aos-duration="1000">
                </div>
            </div>
            
            <!--Location-->
            <div class="location" data-aos="fade-up" data-aos-duration="500">
                <div class="location-title"  data-aos="slide-up" data-aos-duration="1000">
                    HOW TO GET THERE?
                </div>

                <div class="location-code" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="Assets/location.png" alt="" >
                </div>

                <div class="location-name" data-aos="fade-up" data-aos-duration="1000">
                    CLUB FILIPINO
                </div>

                <div class="time" data-aos="fade-up" data-aos-duration="1000">
                    - 4:00 PM - 
                </div>

                <div class="address" data-aos="fade-up" data-aos-duration="1000">
                    CORNER EISENTOWER ST. CLUB FILIPINO AVENUE, SAN JUAN, 1502 METRO MANILA
                </div>

                <div class="view-button" data-aos="zoom-in" data-aos-duration="1000">
                    <a href="https://maps.app.goo.gl/GUkHrKYUPQt5EEmH7" target="_blank">VIEW LOCATION</a>
                </div>

            </div>

            <!--Send gift-->
            <div class="send-gift" style="display: none;">
                <div class="gift-title" data-aos="slide-up" data-aos-duration="1000">
                    SEND A GIFT
                </div>

                <div class="gift-desc" data-aos="slide-up" data-aos-duration="1000">
                    Your attendance and prayers would mean the world to us on our wedding day. 
                    We don't require or anticipate any other gifts. However, if you feel inclined to express your 
                    love in a monetary way, we would be grateful, as it would only add to our joy.
                </div>
                
                <div class="codes">
                    <div class="gcash">
                        <img src="Assets/gcash.png" alt="" data-aos="zoom-in" data-aos-duration="1000">
                        <p data-aos="zoom-in" data-aos-duration="1000">GCASH</p>
                    </div>
    
                    <div class="bank" >
                        <img src="Assets/bank.png" alt="" data-aos="zoom-in" data-aos-duration="1000">
                        <p data-aos="zoom-in" data-aos-duration="1000">UNION BANK</p>
                    </div>
                </div>



            </div>

        </div>
    </div>

    <!--SEND MESSAGES-->

    <div class="message-main" id="message-main" >
        <div class="message-cont" data-aos="zoom-in" data-aos-duration="1000">
            <div class="message-title" data-aos="fade-up" data-aos-duration="1000">
                Leave your message
                <img src="Assets/paper-plane.png" alt="">
            </div>
            
            
            <form method="post" action="" id="message-form" class="form" accept-charset="UTF-8">
                <label for="title"></label><br>
                <input type="text" id="title" name="title" placeholder="Your Name" class="name">

                <label for="message" class="user-message"></label>
                <textarea id="message" name="message" rows="4" cols="50"placeholder="Message.." class="message"></textarea>

                <input type="submit" value="Send" class="submit" data-aos="zoom-in" data-aos-duration="1000">
                <input type="hidden" name="scroll_position" id="scroll_position" value="<?php echo $scrollPosition; ?>">
            </form>

            <script>
                // JavaScript function to scroll to the message section and show alert
                function scrollToMessageSection() {
                    // Check if the form has been submitted and a message has been successfully stored
                    if (<?php echo isset($_SESSION['form_submitted']) ? 'true' : 'false'; ?>) {
                        document.getElementById("message-main").scrollIntoView({ behavior: 'smooth' });
                        // Show alert when message is successfully submitted
                        alert("Your message has been submitted successfully!");
                        // Unset the session variable to avoid showing the alert again on page reload
                        <?php unset($_SESSION['form_submitted']); ?>;
                    }
                }

                // Call the function when the page loads
                window.onload = scrollToMessageSection;
            </script>


            <div class="comment-main">
                <div class="comment-cont" data-aos="fade-up" data-aos-duration="1000">
                    <?php
                    // Display stored messages
                    $sql = "SELECT title, message FROM messages ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    
                        while ($row = $result->fetch_assoc()) {
                            echo "<p class = 'user-name'>" . $row["title"] . "</p>";
                            echo "<p class = 'user-message'>" . $row["message"] . "</p>";
                        }
                    } else {
                        echo "<p class = 'no-message'>(No posts yet)</p>";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
            
                



        </div>
        
        <div class="thank-you" data-aos="fade-up" data-aos-duration="1000">
            Thank you
        </div>

    </div>

    <!--FOOTER-->
    <div class="footer">
        <div class="footer-cont" data-aos="fade-up" data-aos-duration="1000">
            <img src="Assets/Facebook.png" alt="">
            Join Our Facebook Group | 
            <a href="https://www.facebook.com/groups/3268310670136209/?notif_id=1706782995875638&notif_t=added_to_group_reminder&ref=notif" target="_blank">Click here</a>
        </div>
    </div>


    

    <div class="audio-toggle" onclick="togglePlay()">
        <i id="audioIcon" class="fas fa-music"></i>
      </div>
      
      <audio id="audio" src="Assets/background.mp3" preload="auto" loop autoplay></audio>
      
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var audio = document.getElementById('audio');
          var audioIcon = document.getElementById('audioIcon');
      
          audio.load();
      
          // Adjust the volume 
          audio.volume = 0.25;

        });

        // Function to toggle play state
        function togglePlay() {
            if (audio.paused) {
              audio.play();
              audioIcon.className = 'fas fa-play'; // Change icon to play when audio is playing
            } else {
              audio.pause();
              audioIcon.className = 'fas fa-pause'; // Change icon to paused when audio is paused
            }
          }
      </script>
      
      
      



    <!--MENUBAR SCRIPT-->

        <script>
            const burger = document.getElementById('burger');
            const links = document.getElementById('links');

            burger.addEventListener('click', () => {
                links.classList.toggle('active');
            })

            $("#links").click(() => {
                links.classList.remove('active');
            })
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

        <script>
        $(window).scroll(function(){
            if($(window).scrollTop()){
                $("header").addClass("black");
            }
            else{
                $("header").removeClass("black");
            }
        });
        </script>

    <!--AOS ANIMATION SCRIPT-->

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
        crossorigin="anonymous"></script>

    <!-- ANIMATION -->

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js%22%3E"></script>

        <script>
            AOS.init();
        </script>

</body>
</html>