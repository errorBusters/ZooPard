<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Park</title>
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <section class="homeSection">
        <div class="home">
            <form action="search.php" method="post">
            <input type="search" name="search" id="search" placeholder="search">
        </form>
            <img src="assets/images/th.jpeg" alt="background" class="bgImg">
            <h2>Zoo Park</h2>
            <h4>Where Nature's Wonders Come Alive!</h4>     
        </div>
    </section>
    <section id="aboutUsSection">
        <div class="aboutUs">
            <div class="aboutCont">
            <div class="aboutText">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>Et voluptatibus nesciunt corporis unde vel sequi commodi <br>itaque fugit aperiam repellendus sint ipsa recusandae expedita <br> sapiente minima esse, libero ab. Similique.</p>
                <p>Ticket Price : 200LKR</p>
            </div>
            <div class="aboutImg">
                <img src="assets/images/img1.jpeg" alt="image">
            </div>
        </div>
        </div>
    </section>
    <section class="animals">
    <div>
            <h2>You Can See</h2>
            <div class="animalContainer">
                <div class="Ani">
                    <img src="assets/images/img1.jpeg" alt="Lion">
                    <h4>Lion</h4>
                </div>
                <div class="Ani">
                    <img src="assets/images/img3.jpeg" alt="Lion">
                    <h4>Rakoon</h4>
                </div>
                <div class="Ani">
                    <img src="assets/images/img2.jpg" alt="Lion">
                    <h4>Sloth</h4>
                </div>
            </div>
    </section>
    <section class="map">
        <div class="map">
            <h2>Zoo Map</h2>
            <iframe src="assets/images/map.jpeg" frameborder="0" class="zooMap"></iframe> 
        </div>  
    </section>
    <section class="comMember">
    <div class="aboutUs">
            <div class="aboutCont">
            <div class="aboutText">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>Et voluptatibus nesciunt corporis unde vel sequi commodi <br>itaque fugit aperiam repellendus sint ipsa recusandae expedita <br> sapiente minima esse, libero ab. Similique.</p>
                <p>Ticket Price : 200LKR</p>
            </div>
            <div class="aboutImg">
                <a href="CommunityMember/index.php">Cummunity Member Login</a><br>
                <a href="joinUs.php">Join Us</a>
            </div>
        </div>
        </div>
    
    </section>
    <section id="foodOutlet">
        <div class="outlet">
            <h2>Food Outlet</h2>
            <div class="foodList">
            <div class="fItem">
                <img src="assets/images/food1.jpg" alt="food">
                <h4>Pizza</h4>
                <p>Prices <br>Small : 500LKR <br> Medium : 1000LKR <br>Large : 1500LKR <br><br><br><br><br></p>
            </div>
            <div class="fItem">
                <img src="assets/images/food2.jpg" alt="food">
                <h4>Cofee</h4>
                <p>Prices <br>Small : 500LKR <br> Medium : 1000LKR <br>Large : 1500LKR<br><br><br><br><br></p>
            </div>
            <div class="fItem">
                <img src="assets/images/food3.jpg" alt="food">
                <h4>Ice Cream</h4>
                <p>Prices <br>Choclate : 200LKR <br> Vanila : 100LKR <br>Mix : 150LKR<br><br><br><br><br></p>
            </div>
            <div class="fItem">
                <img src="assets/images/food4.jpg" alt="food">
                <h4>Chinese</h4>
                <p>Prices <br>Small : 500LKR <br> Medium : 1000LKR <br>Large : 1500LKR<br><br><br><br><br></p>
            </div>
            </div>
        </div>
    </section>
    <section id="contactUsSection">
        <form action="#" class="contactForm">
            <label for="name">I am,</label>
            <input type="text" name="name" id="name">
            <label for="email">My Email Address</label>
            <input type="email" name="email" id="email">
            <label for="message">Message</label>
            <input type="textarea" name="msg" id="msg">
            <button type="Submit">Send</button>
        </form>
    </section>
    <section id="footSection">
        <?php include'footer.html'?>
    </section>
    
</body>
</html>
