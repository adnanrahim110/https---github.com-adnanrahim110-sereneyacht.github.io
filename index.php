<?php
$title = "Serene Yachts";
$nav_logo = "logo.png";
$nav_class = "";
$cta1 = "cta_1";
$cta1_title = "EXOTIC SHORE CRUISES";
include 'config/dbcon.php';
$query = "SELECT * FROM yachts ORDER BY id DESC";
$query_run = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/head.php'; ?>

<body class="overflow-x-hidden">
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>
  <main class="position-relative z-0 overflow-x-hidden">
    <section class="hero-sec overflow-x-hidden">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="assets/images/bnnr-2.jpg" alt="Image 3">
            <div class="slide-content sc_5">
              <h1>serene elegance</h1>
              <h1>endless horizons</h1>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="assets/images/ann-pkg-3.jpg" alt="Image 2" style="filter: brightness(80%);">
            <div class="slide-content sc_2 text-center">
              <h1>sail together, love forever</h1>
              <h2>celeberate Anniversary onboard</h2>
              <a href="anniversary-proposal-packages" class="custom-btn btn-2">Explore Anniversary Package <i
                  class="fa-solid fa-angles-right"></i></a>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="assets/images/bd-card.jpg" alt="Image 3">
            <div class="slide-content sc_3 text-center">
              <h2>sail, celeberate</h2>
              <h1>repeat!</h1>
              <a href="anniversary-proposal-packages.php" class="custom-btn btn-2">Explore Birthday Package <i
                  class="fa-solid fa-angles-right"></i></a>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="assets/images/bbq-card.jpg" alt="Image 1">
            <div class="slide-content sc_1">
              <h1>GRILL & CHILL</h1>
              <h2>bbq on the high seas</h2>
              <a href="live-bbq-dinner-packages" class="custom-btn btn-2">Explore BBQ Package <i
                  class="fa-solid fa-angles-right"></i></a>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="assets/images/bnnr-1.jpg" alt=" Image 3">
            <div class="slide-content sc_4">
              <h2>make a splash,!</h2>
              <h1>Live the moment!</h1>
            </div>
          </div>
        </div>
        <div class="slider-counter">
          <svg width="100px" height="100px" viewBox="0 0 42 42" class="spinner js-spinner">
            <circle class="spinner-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#d2d3d4"
              stroke-width="3"></circle>
            <circle class="spinner-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ce4b99"
              stroke-width="3" stroke-dasharray="85 15" stroke-dashoffset="0"></circle>
          </svg>
          <div class="slider-counter__count js-nav-counter"></div>
        </div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>

    <section class="available-sec">
    </section>
    <section class="ytv-sec">
      <div class="container">
        <div class="row text-center justify-content-center sec-head">
          <div class="col-12 text-uppercase">
            <h5 class="sub-title">Serena Yachts</h5>
            <h1 class="sec-title text-white">Dubai's Top Boat Charter</h1>
          </div>
          <div class="col-12 col-md-10">
            <p>
              We exclusively provide luxurious boat charter Dubai with classy exteriors and roomy, luxurious interiors
              for hourly and daily rentals at the most competitive prices. Europeans make up our whole crew, all of whom
              have been handpicked and trained to the exacting standards of Serena Yachts. Their commitment lies on
              offering you the best possible service throughout your journey. At Dubai Harbour Marina, all of our
              luxurious yachts are tied up.
            </p>
          </div>
        </div>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
        ?>
        <div class="container mt-5">
          <?php
            while ($row = mysqli_fetch_array($query_run)) {
              // $image_path = str_replace("../", "", $row['image_path']);
              $image_path = $row['image_path'];
              if (!file_exists($image_path) || empty($image_path)) {
                $image_path = 'assets/images/marya-img1.jpeg'; // Default image path
              }
            ?>
          <div class="ytv-product">
            <span class="border-t-l borderanim"></span>
            <span class="border-b-r borderanim"></span>
            <div class="ytv-product_gallery">
              <div class="ytv-product_slider">
                <a href="ship-details.php?id=<?= $row['id'] ?>" class="ytv-product_img">
                  <img src="<?= $image_path ?>" alt="">
                </a>
              </div>
            </div>
            <div class="ytv-product_main">
              <div class="ytv-product_body">
                <div class="ytv-product_head">
                  <div class="ytv-product_title">
                    <a href="ship-details.php?id=<?= $row['id'] ?>">
                      <span><?= $row['name'] ?></span>
                    </a>
                  </div>
                </div>
                <div class="ytv-product-specs">
                  <dl>
                    <dt>Length:</dt>
                    <dd><?= $row['length'] ?></dd>
                  </dl>
                  <dl>
                    <dt>Capacity:</dt>
                    <dd><?= $row['capacity'] ?></dd>
                  </dl>
                  <dl>
                    <dt>Cabins:</dt>
                    <dd><?= $row['cabins'] ?></dd>
                  </dl>
                  <dl>
                    <dt>Location:</dt>
                    <dd><?= $row['location'] ?></dd>
                  </dl>
                  <dl>
                    <dt>Inclusions:</dt>
                    <dd><?= $row['inclusions'] ?></dd>
                  </dl>
                </div>
                <div class="ytv-product_text">
                  <p><?= $row['description'] ?></p>
                  <ul class="mt-2">
                    <?php
                        $list_desc = explode('|', $row['description_points']);
                        foreach ($list_desc as $item) {
                          echo '<li>' . $item . '</li>';
                        }
                        ?>
                  </ul>
                </div>
              </div>
              <div class="ytv-product_footer">
                <div class="ytv-product_prices">
                  <div class="ytv-product_price">
                    <div class="ytv-product_price-icon">
                      <ion-icon name="hourglass-outline"></ion-icon>
                    </div>
                    <div class="ytv-product_price-title">Per Hour</div>
                    <div class="ytv-product_price-val"> AED <?= $row['price_per_hour'] ?></div>
                  </div>
                </div>
                <div class="ytv-product_form">
                  <a href="https://wa.me/971505653215" target="_blank" class="ytv-product_phone-btn">
                    <span>(+971) 50 565 3215</span>
                  </a>
                  <button class="ytv-product_sumbit-btn"><span>Book Now</span></button>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
            ?>
        </div>

        <?php
        } else {
          echo "<div class='container mt-5'><div class='alert alert-warning'>No blogs found.</div></div>";
        }
        ?>
      </div>
    </section>
    <section class="wcu-sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="ytv-info">
              <h2>
                <span class="lnr lnr-cloud-check"></span>
                Why Choose Us?
              </h2>
              <div>
                <ul class="ytv-info_list">
                  <li>Diverse Team</li>
                  <li>Experienced Captain</li>
                  <li>Professional Crew</li>
                  <li>Luxury Service</li>
                  <li>Best Route</li>
                  <li>Well-Maintained Yachts</li>
                  <li>Safe & Secure Experience</li>
                  <li>Flexible Plan</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ytv-info">
              <h2>
                <span class="lnr lnr-plus-circle"></span>
                Extra Services
              </h2>
              <div>
                <ul class="ytv-info_list">
                  <li>Travel to the Bulgari Resort</li>
                  <li>Italian food</li>
                  <li>Bar (prices on request)</li>
                  <li>voyage to Sir Banias and Oman</li>
                  <li>Holiday planning and hosting</li>
                  <li>Individual conversation</li>
                  <li>Activities for Water Sports</li>
                  <li>Tour of Dubai and Abu Dhabi</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'includes/cta.php'; ?>
    <section class="ednp-sec">
      <div class="container ednp-wrapper">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6 ednp-head">
            <div class="ednp-head-inner">
              <span class="sec-title-back">
                <span class="reveal --i-1">E</span>
                <span class="reveal --i-2">p</span>
                <span class="reveal --i-3">l</span>
                <span class="reveal --i-4">x</span>
                <span class="reveal --i-5">o</span>
                <span class="reveal --i-6">r</span>
                <span class="reveal --i-7">E</span>
              </span>
              <h5 class="sub-title">exotic destinations</h5>
              <h1 class="sec-title">new places</h1>
              <p class="text-light">
                All our luxurious yachts are moored at Dubai Harbour Marina.
              </p>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-12">
            <div class="ednp-map">
              <img src="assets/images/ednp-c-map.png" alt="" class="opacity-100">
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-10">
              <div class="location-line">
                <div class="ll-line"></div>
                <span class="dot dot-3"></span>
                <span class="ednap-map-loc dot3-text">Dubai Harbour</span>
                <span class="dot dot-s dot-4"></span>
                <span class="ednap-map-time dot4-time">2hr</span>
                <span class="ednap-map-loc dot4-text">JBR</span>
                <span class="dot dot-s dot-5"></span>
                <span class="ednap-map-time dot5-time">3hr</span>
                <span class="ednap-map-loc dot5-text">Atlantis, The Palm</span>
                <span class="dot dot-s dot-6"></span>
                <span class="ednap-map-time dot6-time">4hr</span>
                <span class="ednap-map-loc dot6-text">Burj ul Arab</span>
                <span class="dot dot-7"></span>
                <span class="ednap-map-time dot7-time">6hr</span>
                <span class="ednap-map-loc dot7-text">Dubai Canal</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pricing-sec">
      <div class="container-fluid position-relative z-1">
        <div class="row justify-content-center justify-content-lg-start">
          <div class="col-12 col-lg-6">
            <div class="head-inner text-center text-lg-start position-relative">
              <span class="sec-title-back">
                <span class="reveal --i-1">p</span>
                <span class="reveal --i-2">r</span>
                <span class="reveal --i-3">i</span>
                <span class="reveal --i-4">c</span>
                <span class="reveal --i-5">e</span>
                <span class="reveal --i-6">s</span>
              </span>
              <h5 class="sub-title text-white">our Yacht Cruise</h5>
              <h1 class="sec-title text-white">Packages</h1>
            </div>
          </div>
          <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-end">
            <a href="packages.php" class="custom-btn btn-1 w-100">View All Packages</a>
          </div>
        </div>
        <div class="container">
          <div class="row justify-content-center align-items-center mar-top mb-3">
            <div class="pricing-slider">
              <div class="splide">
                <div class="splide__track">
                  <div class="splide__list">
                    <div class="splide__slide">
                      <div class="pricing-card">
                        <div class="pricing-card-item">
                          <div class="card-header">
                            <img src="assets/images/bd-card.jpg" alt="">
                            <div class="pkg-img-overlay">
                            </div>
                            <div class="pkg-btn">
                              <a href="#" class="custom-btn btn-2">Book now</a>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="pkg-name">
                              <h1 class="card-title">Birthday Package</h1>
                              <a href="#" class="sub-title-card">
                                <span>(50 ft Luxury Yacht)</span>
                              </a>
                            </div>
                            <div class="card-content">
                              <h3 class="pkg-price">
                                <span class="money">
                                  <img src="assets/images/icons8-money-bill-96.png" alt="" class="img-fluid">
                                </span>
                                <p class="m-0">
                                  <span id="cut-price" class="p_cut">1699</span>
                                  <span id="current-price">1399</span>
                                  <span class="p_vat">+ vat</span>
                                </p>
                              </h3>
                              <ul class="pkg-config">
                                <li class="pkg-cnfg_item hr_rate">
                                  <span>
                                    <i class="fa-regular fa-clock"></i>
                                  </span>
                                  2 Hours Rate
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <i class="fa-solid fa-gifts"></i>
                                  </span>
                                  Birthday Decoration
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span><i class="fa-solid fa-cake-candles"></i></span>
                                  Birthday Cake
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <ion-icon name="wine-outline"></ion-icon>
                                  </span>
                                  Soft Drinks
                                </li>
                              </ul>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="splide__slide">
                      <div class="pricing-card">
                        <div class="pricing-card-item">
                          <div class="card-header">
                            <img src="assets/images/ann-pkg-3.jpg" alt="">
                            <div class="pkg-img-overlay">
                            </div>
                            <div class="pkg-btn">
                              <a href="#" class="custom-btn btn-2">Book now</a>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="pkg-name">
                              <h1 class="card-title">Anniversary Package</h1>
                              <a href="#" class="sub-title-card">
                                <span>(50 ft Luxury Yacht)</span>
                              </a>
                            </div>
                            <div class="card-content">
                              <h3 class="pkg-price">
                                <span class="money">
                                  <img src="assets/images/icons8-money-bill-96.png" alt="" class="img-fluid">
                                </span>
                                <p class="m-0">
                                  <span id="cut-price" class="p_cut">1799</span>
                                  <span id="current-price">1499</span>
                                  <span class="p_vat">+ vat</span>
                                </p>
                              </h3>
                              <ul class="pkg-config">
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <i class="fa-regular fa-clock"></i>
                                  </span>
                                  2 Hours Rate
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <ion-icon name="rose"></ion-icon>
                                  </span>
                                  Balloons &amp; Flowers
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span><i class="fa-solid fa-cake-candles"></i></span>
                                  Anniversary Cake
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <i class="fa-solid fa-martini-glass"></i>
                                  </span>
                                  Soft Drinks
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="splide__slide">
                      <div class="pricing-card">
                        <div class="pricing-card-item">
                          <div class="card-header">
                            <img src="assets/images/bbq-card.jpg" alt="">
                            <div class="pkg-img-overlay">
                            </div>
                            <div class="pkg-btn">
                              <a href="#" class="custom-btn btn-2">Book now</a>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="pkg-name">
                              <h1 class="card-title">2 hour Live BBQ Dinner</h1>
                              <a href="#" class="sub-title-card">
                                <span>(50 ft Luxury Yacht)</span>
                              </a>
                            </div>
                            <div class="card-content">
                              <h3 class="pkg-price">
                                <span class="money">
                                  <img src="assets/images/icons8-money-bill-96.png" alt="" class="img-fluid">
                                </span>
                                <p class="m-0">1800
                                  <span class="p_vat">+ vat</span>
                                </p>
                              </h3>
                              <ul class="pkg-config">
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <i class="fa-regular fa-clock"></i>
                                  </span>
                                  2 Hours Rate
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <i class="fa-solid fa-martini-glass-citrus"></i>
                                  </span>
                                  Welcome Drinks
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <i class="fa-solid fa-fire-burner"></i>
                                  </span>
                                  BBQ Grill
                                </li>
                                <li class="pkg-cnfg_item">
                                  <span>
                                    <ion-icon name="musical-notes"></ion-icon>
                                  </span>
                                  Music System
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="brands-sec">
        <div class="row">
          <div class="col-4 col-lg-2">
            <img src="assets/images/brands-img-1.png" alt="">
          </div>
          <div class="col-4 col-lg-2">
            <img src="assets/images/brands-img-2.png" alt="">
          </div>
          <div class="col-4 col-lg-2">
            <img src="assets/images/brands-img-3.png" alt="">
          </div>
          <div class="col-4 col-lg-2">
            <img src="assets/images/brands-img-4.png" alt="">
          </div>
          <div class="col-4 col-lg-2">
            <img src="assets/images/brands-img-5.png" alt="">
          </div>
          <div class="col-4 col-lg-2">
            <img src="assets/images/brands-img-6.png" alt="">
          </div>
        </div>
      </div>
    </section>
    <section class="gallery-sec bg-light overflow-hidden">
      <div class="gallery-grid">
        <div class="gallery-item">
          <img src="assets/images/g-2.jpg" alt="">
        </div>
        <div class="gallery-item">
          <img src="assets/images/marya/marya-img15.jpg" alt="">
        </div>
        <div class="gallery-item">
          <img src="assets/images/g-4.jpg" alt="">
        </div>
        <div class="gallery-item">
          <img src="assets/images/sleek/sleek-img8.jpeg" alt="">
        </div>
        <div class="gallery-item">
          <img src="assets/images/g-5.jpg" alt="">
        </div>
      </div>
    </section>
    <?php include 'includes/contact-form.php' ?>
  </main>
  <?php include 'includes/footer.php'; ?>
