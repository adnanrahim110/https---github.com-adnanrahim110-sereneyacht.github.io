<?php
$title = "Serene Yachts";
$nav_class = "bg-white sticky";
$nav_logo = "logo.png";
include 'config/dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement
    $stmt = $con->prepare("SELECT * FROM yachts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $img_stmt = $con->prepare("SELECT * FROM yachtimages WHERE yacht_id = ?");
    $img_stmt->bind_param("i", $id);
    $img_stmt->execute();
    $img_result = $img_stmt->get_result();

    // Check if a yacht with the given id exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">
        <?php include_once 'includes/head.php'; ?>

        <body class="bg-white">
            <?php include 'includes/header.php'; ?>
            <?php include 'includes/sidebar.php'; ?>
            <main class="position-relative z-0">
                <section class="ship-hero"
                    style="background-image:linear-gradient(to left, rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(<?= $row['bg_img_path'] ?>);">
                    <div class="container h-100">
                        <div class="sh-caption text-white">
                            <p>nautical compan</p>
                            <h1><?= $row['name'] ?> Yacht</h1>
                        </div>
                    </div>
                </section>
                <section class="ship-details_sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="sdc-content">
                                    <div class="sd-sub_title">
                                        <span>nautical compan</span>
                                    </div>
                                    <h3 class="sd-title"><?= $row['name'] ?> Yacht</h3>
                                    <div class="sdc-content_text">
                                        <?php
                                        $detailed_text = explode('|', $row['detailed_text']);
                                        foreach ($detailed_text as $item) {
                                            echo '<p>' . $item . '</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="sdc-content_specs">
                                        <div class="sdc-content_specs-title">
                                            <h5 class="m-0">Specifications</h5>
                                        </div>
                                        <div class="sdc-content_specs-details">
                                            <ul>
                                                <li>
                                                    <span class="sdc-csd_label">length:</span>
                                                    <span class="sdc-csd_text"><?= $row['length'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="sdc-csd_label">Guests:</span>
                                                    <span class="sdc-csd_text"><?= $row['capacity'] ?> Guests</span>
                                                </li>
                                                <li>
                                                    <span class="sdc-csd_label">Cabins:</span>
                                                    <span class="sdc-csd_text"><?= $row['cabins'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="sdc-csd_label">Location:</span>
                                                    <span class="sdc-csd_text"><?= $row['location'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="sdc-csd_label">Inclusions:</span>
                                                    <span class="sdc-csd_text"><?= $row['inclusions'] ?></span>
                                                </li>
                                                <li>
                                                    <span class="sdc-csd_label">Boat Type:</span>
                                                    <span class="sdc-csd_text">Yacht</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sdc-content_imgs">
                                        <div class="sdc-content_specs-title">
                                            <h5 class="m-0">Gallery</h5>
                                        </div>
                                        <div class="sdc-content_gallery">
                                            <?php
                                            $images = [];
                                            while ($img_row = $img_result->fetch_assoc()) {
                                            ?>
                                                <div class="sdc-cg_item">
                                                    <img class="w-100 h-100"
                                                        src="assets/images/<?= strtolower($row['name']) ?>/<?= $img_row['image_path'] ?>" alt="">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="sdc-siderbar">
                                    <div class="sdc-enquiry-form">
                                        <form action="">
                                            <h5>Rent Now</h5>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                </div>
                                                <div class="col-12">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </div>
                                                <div class="col-12">
                                                    <label for="phone">Phone Number:</label>
                                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone">
                                                </div>
                                                <div class="col-12">
                                                    <label for="message">Message:</label>
                                                    <textarea type="text" class="form-control" rows="3" name="message" id="message"
                                                        placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="sdc-price col-12 text-center">
                                                <h6 class="text-uppercase fw-bold mb-1">Your Price</h6>
                                                <p class="fw-lighter">AED <?= $row['price_per_hour'] ?>/per hour</p>
                                            </div>
                                            <div class="sdc-submit">
                                                <button class="custom-btn" type="submit" id="enquiry" name="enquire_btn">Send
                                                    Enquiry</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
    <?php
    } else {
        echo "<div class='container mt-5'><div class='alert alert-warning'>No ship found.</div></div>";
    }

    $stmt->close();
} else {
    echo "<div class='container mt-5'><div class='alert alert-warning'>No ship id provided.</div></div>";
}
    ?>
    <?php include 'includes/footer.php'; ?>
