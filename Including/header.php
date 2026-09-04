<!-- scroll progress   -->
<div id="progress">
    <span id="progress-value">&#x1F815</span>
</div>


<header class="header" data-header>
    <div class="container">

        <a href="../User/index.php" class="logo">
            <img src="../assets/images/logo.png" width="190" height="28" alt="logo">
        </a>

        <nav class="navbar" data-navbar>

            <ul class="navbar-list">

                <li>
                    <a href="../User/index.php" class="navbar-link label-medium">Home</a>
                </li>

                <li>
                    <a href="../User/aboutus.php" class="navbar-link label-medium">About</a>
                </li>

                <li>
                    <a href="../User/property.php" class="navbar-link label-medium">Property</a>
                </li>

                <li>
                    <a href="../User/FAQs.php" class="navbar-link label-medium">FAQs</a>
                </li>

                <li>
                    <a href="../User/contact.php" class="navbar-link label-medium">Contact</a>
                </li>

            </ul>

            <div class="navbar-wrapper">
                <?php

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }


                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    // If user is logged in, show "My Account" dropdown
                    ?>
                    <div class="dropdown">
                        <li class="btn-link down label-medium" id="dropdownToggle">
                            My Account
                            <span class="material-symbols-rounded" aria-hidden="true">arrow_drop_down</span>
                        </li>

                        <ul class="dropdown-list" data-drop-down>
                            <li>
                                <?php
                                $id = $_SESSION['email'];
                                $sql = "SELECT * FROM users WHERE email='$id'";
                                $data = mysqli_query($conn, $sql);

                                if ($row = mysqli_fetch_assoc($data)) {
                                    $photo = !empty($row['photo']) ? $row['photo'] : 'default.png';
                                } else {
                                    $photo = 'default.png';
                                }
                                ?>

                                <a href="../User/profile.php" class="dropdown-link label-medium">
                                    <span class="dropdownicon">
                                        <img src="../uploadphoto/users/<?php echo $photo; ?>" alt="logo" style="height: 30px; width: 30px; border-radius: 50%; display: inline;" >
                                    </span>
                                    My profile
                                </a>
                            </li>

                            </li>
                            <li>
                                <a href="../User/booking.php" class="dropdown-link label-medium">
                                    <span class="material-symbols-rounded dropdownicon">collections_bookmark</span>
                                    My Booking
                                </a>
                            </li>
                            <li>
                                <a href="logout.php" class="dropdown-link label-medium">
                                    <span class="material-symbols-rounded dropdownicon">logout</span>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                } else {
                    // If user is not logged in, show "Login" button
                    ?>
                    <button class="btn-link label-medium" id="show-login">Login</button>
                    <?php
                }
                ?>

                <a href="../User/submitproperty.php" class="btn btn-fill label-medium">Submit Property</a>
            </div>


        </nav>

        <button class="nav-toggle-btn icon-btn" id="navToggle" aria-label="toggle navbar" data-nav-toggler>

            <span class="material-symbols-rounded open" aria-hidden="true">menu</span>

            <span class="material-symbols-rounded close" aria-hidden="true">close</span>

        </button>

    </div>
</header>

<script>
    // navlink ative 

    const navLinks = document.querySelectorAll(".navbar ul li .navbar-link");
    const windowPathname = window.location.pathname;

    navLinks.forEach(navLinks => {
        if (navLinks.href.includes(windowPathname)) {
            navLinks.classList.add("active");
        }
    });
</script>