<?php $activePage = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?>
<header>
    <nav class="navbar navbar-expand-lg <?= $nav_class; ?>" id="NavBar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/images/<?= $nav_logo ?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="qodef-m-icon qodef--open">
                    <span class="qodef-m-lines">
                        <span class="qodef-m-line qodef--1"></span>
                        <span class="qodef-m-line qodef--2"></span>
                        <span class="qodef-m-line qodef--3"></span>
                    </span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto me-5">
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == "index.php" ? 'active' : '' ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == "packages.php" ? 'active' : '' ?>" href="packages.php">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == "about-us.php" ? 'active' : '' ?>"
                            href="about-us.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == "faq.php" ? 'active' : '' ?>" href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage == "contact-us.php" ? 'active' : '' ?>"
                            href="contact-us.php">Contact</a>
                    </li>
                </ul>
                <div class="side_area" id="sidearea_opener">
                    <a class="side-area-opener">
                        <span class="qodef-m-icon qodef--open">
                            <span class="qodef-m-lines">
                                <span class="qodef-m-line qodef--1"></span>
                                <span class="qodef-m-line qodef--2"></span>
                                <span class="qodef-m-line qodef--3"></span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>