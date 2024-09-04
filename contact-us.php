<?php
$title = "Serene Yachts";
$nav_class = "bg-white sticky";
$nav_logo = "logo.png";
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/head.php'; ?>

<body class="bg-white">
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
    <main class="position-relative z-0">
        <section class="contact-hero">
            <div class="container d-flex align-items-center justify-content-center h-100">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-12 text-center">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="cu-sec-1" id="booking">
            <div class="container">
                <div class="ab-hero-content">
                    <div class="row justify-content-center">
                        <div class="ab-hero-img">
                            <img src="assets/images/anchor.png" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 pt-3">
                        <div class="col-12 col-lg-12">
                            <div class="head-inner text-center position-relative">
                                <span class="sec-title-back">
                                    <span class="reveal --i-1">d</span>
                                    <span class="reveal --i-2">i</span>
                                    <span class="reveal --i-3">s</span>
                                    <span class="reveal --i-4">c</span>
                                    <span class="reveal --i-5">o</span>
                                    <span class="reveal --i-6">v</span>
                                    <span class="reveal --i-7">e</span>
                                    <span class="reveal --i-8">r</span>
                                </span>
                                <h5 class="sub-title">NAUTICAL COMPANY</h5>
                                <h1 class="sec-title">Feel free to Contact Us</h1>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-12 col-lg-7">
                                        <p class="text-black-50 mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
                                            quidem et aliquam
                                            dolorem ipsum. Lorem ipsum dolor sit amet consectetur...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cu-sec-2">
            <div class="cu-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3613.3233630269465!2d55.141747!3d25.090912999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjXCsDA1JzI3LjMiTiA1NcKwMDgnMzAuMyJF!5e0!3m2!1sen!2s!4v1720645230470!5m2!1sen!2s"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <?php include 'includes/contact-form.php' ?>
    </main>
    <?php include 'includes/footer.php'; ?>