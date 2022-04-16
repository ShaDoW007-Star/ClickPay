<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="../css/ClickPay index css/hf.css">
    <link rel="stylesheet" href="../css/ClickPay index css/about.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body onload="load()">
    <div id="loading"></div>
    <header>
        <nav class="navbar h-nav">
            <div class="container">
                <img src="../img/logo.png" alt="Logo">
                <div class="navitem v-class">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="service.php">Services</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <!-- <li><a href="contact.php">Contact Us</a></li> -->
                    </ul>
                </div>
                <div class="btn v-class">
                    <a href="signup.php"><button id="signup"><strong>Sign Up</strong></button></a>
                    <a href="login.php"><button id="login"><strong>Login</strong></button></a>
                </div>
            </div>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </nav>
    </header>

    <main>
        <section class="head">
            <h1>About Us</h1>
        </section>
        <section class="noclass">
            <div class="per">
                <div class="logo-dis" id="dev" data-aos="fade-right">
                    <img src="../img/user_pic.png" height="100px" width="100px" alt="User Photo">
                    <h1>Devarshi Kayasth</h1>
                    <h2>Database</h2>
                    <h3>
                        i am very successful Developer and i created Clickpay website for xyz company.
                    </h3>
                </div>
                <div class="logo-dis" data-aos="fade-down">
                    <img src="../img/user_pic.png" height="100px" width="100px" alt="User Photo">
                    <h1>Aryan Patel</h1>
                    <h2>Full-Stack Developer</h2>
                    <h3>
                        i am very successful Developer and i created Clickpay website for xyz company.
                    </h3>
                </div>
                <div class="logo-dis" id="ap" data-aos="fade-left">
                    <img src="../img/user_pic.png" height="100px" width="100px" alt="User Photo">
                    <h1>Jaishal Chandiwala</h1>
                    <h2>
                    </h2>
                    <h3>
                        ...................................................... Hamm to BGMI khelenge ......................................................
                    </h3>
                </div>
            </div>
        </section>
        <section class="abt">
            <div class="poly">
                <div class="spc">
                    <p>.</p>
                </div>
                <ul data-aos="zoom-in">
                    <li>The need to establish pay management system in this pandemic is one of the most important thing for the society.</li>
                    <li>The pay management system should be conveying as a Contact less payment(pay/deposit). This consider as trend because our honorable</li>
                    <li>Prime minister Mr. Narendra Modi suggested digitalization for future India. To contribute in this, we will make a website which named as “Click Pay”. By this, we can save our time and transfer the money in just one 'Click'.</li>
                    <li>It can be used for international transfer also by just entering an account number of the person whom you wish to send a money.</li>
                    <li> It is also useful to be informed of your bank account details like available balance, Transfer records etc. </li>
                    <li>Our aim is to make safe and secure to transfer of money from Click pay to avoid scams and ensure your money will be transfer over the network encrypted and more Secure.</li>

                </ul>
            </div>
        </section>
    </main>

    <footer>
        <div class="mainf">
            <div class="footlogo">
                <h3>Find Us Online</h3>
                <!-- <hr width="125px" color="red" id="footlogo"> -->
                <a href="https://facebook.com"><img src="../img/facebook.png" alt="Facebook" id="facebook"></a>
                <a href="https://instagram.com"><img src="../img/instagram.png" alt="Instagram"></a>
                <a href="https://linkedin.com"><img src="../img/linkedin.png" alt="Linked-in"></a>
                <a href="https://twitter.com"><img src="../img/twitter.png" alt="Twitter"></a>
            </div>
        </div>
        <h4>&copy; Copyright-2022 All Rights Reserved</h4>
    </footer>
</body>
<script src="../js/hf.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 200,
        duration: 2000
    });
</script>

</html>